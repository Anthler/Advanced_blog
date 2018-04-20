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
              <h3 class="box-title">Permission</h3>
            </div>
            <div class="col-md-6 col-md-offset-3">
              
              @include('admin/partials/messages')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form action=" {{route('permission.update', $permission->id)}} " method="post" role="form">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="box-body">
                <div class="col-lg-offset-3 col-md-6 "> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Permission</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="title" value=" {{$permission->name}} ">
                </div>

                <div class="for-group">
                  <label for="for">Permission for</label>
                  <select name="for" id="for" class="form-control">
                    <option value="" selected disabled>permission for</option>
                    <option value="user">User</option>
                    <option value="post">Post</option>
                    <option value="other">Other</option>
                  </select>
                </div>
                <br>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href=" {{route('permission.index')}} " class="btn btn-danger col-lg-offset-2">Go back</a>
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