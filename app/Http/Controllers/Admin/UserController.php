<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = Admin::all();
        return view('admin.users.show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();

        return view('admin/users/create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

             'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
 

        ]);

        $request->status? : $request['status']=0;

        $request['password'] = bcrypt($request->password);

        $user = Admin::create($request->all());
        $user->roles()->sync($request->role);

        return redirect()->route('user.index')->with('info', 'User Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::find($id);
        $roles = role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

             'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
         
        ]);

        $request->status? : $request['status']=0;

        $user = Admin::where('id',$id)->update($request->except('_token', '_method','role'));
        Admin::find($id)->roles()->sync($request->role);

        return redirect(route('user.index'))->with('info', 'User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();

        return redirect(route('user.index'));
    }
}
