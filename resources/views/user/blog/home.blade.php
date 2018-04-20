@extends('user/layouts/app')

@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title','Welcome To Richix Blog')
@section('sub-heading','Get All The Best News And Trends')

@section('head')
<style>
  span.fa-thumbs-up:hover{
        color:red;
  }
</style>

@endsection

@section('content')

<div class="container">
      <div id="app" class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach($posts as $post)
          <div class="post-preview">
           <a href=" {{route('post',$post->slug)}} ">
              <h2 class="post-title">
                {{$post->title}}
              </h2>
              <h3 class="post-subtitle">
                {{$post->subtitle}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              Created at {{$post->created_at->diffForHumans()}} <small>0</small> <a href=""><span class="fa fa-thumbs-up" aria-hidden="true">Like</span></a></p>

          </div>
          @endforeach
          <hr>
          <!-- Pager -->
          <div class="clearfix col-lg-offset-2">
            {{$posts->links()}}
            <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
          </div>
        </div>
      </div>
    </div>

    <hr>

@endsection