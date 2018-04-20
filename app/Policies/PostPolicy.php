<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\User\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this-> getPermission($user, 4);
    }

    public function tag(Admin $user)
    {
        return $this-> getPermission($user, 11);
    }

    public function category(Admin $user)
    {
        return $this-> getPermission($user, 12);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Admin $user)
    {
       return $this->getPermission($user, 5);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user, 6);
       
    }


    protected function getPermission($user,$p_id){

     foreach($user->roles as $role){
            foreach($role->permissions as $permission){

              if($permission->id == $p_id) {
                return true;
              } 
            }
        }

      return false;
}

}



