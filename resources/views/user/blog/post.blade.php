@extends('user/layouts/app')

@section('bg-img', Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('sub-heading',$post->subtitle)



@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=250275658846484&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <small>Created {{$post->created_at->diffForHumans()}}</small> | 
            
            @foreach($post->categories as $category)
            <a href=" {{route('category',$category->slug)}} " class="">
              <span class="badge badge-primary pull-right">
                {{$category->name}}
              </span>
            </a>
            @endforeach
          
          {!!$post->body !!}

          <!-- Tags -->
          <h3>Tags</h3>
          @foreach($post->tags as $tag)
           <a href="{{route('tag',$tag->slug)}}" class="">
            <span class="badge badge-success">
             {{$tag->name}}
            </span>
            @endforeach
          </a>
          </div>
          <div class="fb-comments" data-href=" {{Request::url()}} " data-numposts="5"></div>
        </div>
      </div>
    </article>




@endsection