  @extends('admin/layouts/app')

   @section('headSection')

  <link rel="stylesheet" href=" {{asset('admin/bower_components/select2/dist/css/select2.min.css')}} ">
  @endsection

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
            <!-- /.box-header -->
            @include('admin/partials/messages')
            <!-- form start -->
            
            <form role="form" action="{{route('post.store')}}" enctype="multipart/data-form" method="POST">
              {{csrf_field()}}
              <div class="box-body">
                <div class="col-md-6"> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="title">
                </div>
               <div class="form-group">
                 <label for="exampleInputPassword1">Post Sub Title</label>
                 <input type="text" name="subtitle" class="form-control" id="sub-title" placeholder="Sub title">
               </div>

                <div class="form-group">
                 <label for="exampleInputPassword1">Slug</label>
                 <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
               </div>
               </div>
          
                                <div class="col-md-6">
                  <br>
                 <div class="form-group">
                  <div class="pull-right">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="image">
                </div>

                  <div class="checkbox pull-left" >
                  <label>
                    <input type="checkbox" name="status" value="1"> Publish
                  </label>
                </div>
                </div>

                <br><br>

                <div class="form-group">
                <label>Tag(s)</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                 
                  @foreach($tags as $tag)
                    <option value="{{$tag->id}}"> {{$tag->name}} </option>
                  @endforeach
                </select>
              </div>

                <div class="form-group">
                <label>Category(s)</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                  @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                  @endforeach
                  
                </select>
              </div>
                </div>
          

               </div>

              <!-- /.box-body -->
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Write your post here
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <!-- <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button> -->
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea id="editor1" name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            
            </div>
          </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                 <a href=" {{route('post.index')}} " class="btn btn-danger col-lg-offset-2">Go back</a>
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

  @section('footerSection')

  <!-- <script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script> -->

  <script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  });

    $(document).ready(function(){
      $('.select2').select2();
    });
  </script>
  @endsection