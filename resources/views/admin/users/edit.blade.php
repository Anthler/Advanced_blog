@extends('admin/layouts/app')


@section('main-content')


  @extends('admin/layouts/app')

  @section('main-content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

                    <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Post</h3>
            </div>
            <div class="col-md-6 col-md-offset-3">
              
              @include('admin/partials/messages')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form action=" {{route('user.update',$user->id)}} " method="post" role="form">
              {{csrf_field()}}
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="col-lg-offset-3 col-md-6 "> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="title" value=" {{old('name') ?? $user->name}} ">
                </div>


                <div class="form-group">
                 <label for="email">Email</label>
                 <input type="email" name="email" class="form-control" id="email" placeholder="Email" value=" {{old('email') ?? $user->email}}">
               </div>

               <div class="form-group">
                 <label for="exampleInputPassword1">Phone</label>
                 <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number..." value="{{ old('phone') ?? $user->phone }}">
               </div>

               <div class="form-group">
                  <label for="status">Status</label>
                  <div class="checkbox">
                    <label ><input name="status" type="checkbox"@if (old('status')== 1 || $user->status == 1)
                      checked
                    @endif value="1" >Status</label>
                  </div>
                </div>
              
               <div class="form-group col-lg-12">
                <label for="">Assign Role</label>
                <div class="row">
                  
                  @foreach($roles as $role)
                <div class="col-lg-3">
                  <div class="checkbox">
                    <label for=""><input name="role[]" type="checkbox" value="{{$role->id}}" 
                      
                      @foreach($user->roles as $user_role)
                        @if($user_role->id == $role->id)

                          checked

                        @endif
                      @endforeach
                      > {{$role->name}}</label>
                  </div>   
                </div>
                @endforeach
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href=" {{route('user.index')}} " class="btn btn-danger col-lg-offset-2">Go back</a>
              </div>
               </div>
              <!-- /.box-body -->
            </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
@endsection