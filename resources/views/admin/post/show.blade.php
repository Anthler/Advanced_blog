@extends('admin.layouts.app')

@section('headSection')

  <link rel="stylesheet" href=" {{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}} ">

@endsection

@section('main-content')

	  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       @if(Session::has('info'))

              <div class="alert alert-success"> {{Session::get('info')}} </div>
        @endif

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Posts</h3>
          @can('posts.create',Auth::user())

             <a href=" {{route('post.create')}} " class="btn btn-success btn-lg col-lg-offset-5">Add New</a>

          @endcan
         

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Title</th>
                  <th>Subitle</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  @can('posts.update', Auth::user())
                    <th>Edit</th>
                  @endcan

                  @can('posts.delete', Auth::user())
                    <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                  <td> {{$loop->index + 1}} </td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->subtitle}}</td>
                  <td>{{$post->slug}}</td>
                  <td>{{$post->created_at}}</td>
                  @can('posts.update', Auth::user())
                    <td><a href=" {{route('post.edit',$post->id)}} "><span class="fa fa-edit" style="font-size:20px"></span></a></td>
                  @endcan

                  @can('posts.delete', Auth::user())
                  <td>
                    <form action="{{route('post.destroy',$post->id)}}" method="post" id="delete-form-{{$post->id}}" style="display:none;">

                      {{ csrf_field() }}

                      {{method_field('DELETE')}}
                    </form>
                    <a href="" 
                        onClick="if(confirm('Are you sure you want to delete this?'))
                        { event.preventDefault();
                        document.getElementById('delete-form-{{$post->id}}').submit();
                          }
                          else{
                            event.preventDefault();
                        }">
                      <span class="fa fa-trash fa-1x" style="font-size:20px">
                    </span>
                  </a>
                  </td>
                  @endcan
                </tr>
                @endforeach
                </tbody>
                <tfoot>
               <tr>
                  <th>Serial No.</th>
                  <th>Title</th>
                  <th>Subitle</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  @can('posts.update',Auth::user())
                      <th>Edit</th>
                  @endcan
                  @can('posts.delete', Auth::user())
                    <th>Delete</th>
                  @endcan
                </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footerSection')

<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script> 

 <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script> 


 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection