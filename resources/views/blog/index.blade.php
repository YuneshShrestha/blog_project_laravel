@extends('layouts.app')
@section('content')
    <div class="container blog pt-4">
        <div class="text-center blog_posts">Blog Posts</div>
        @foreach ($posts as $post)
            <div class="row pt-4">
                <div class="col-md-6 col-12 my-auto">
                    <img src="https://images.pexels.com/photos/459653/pexels-photo-459653.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 col-12 my-auto">
                    <div class="blog_title">{{ $post->title }}</div>
                    <div class="blog_by">By <span class="blog_by_user_name font-italic font-weight-bold">{{ $post->user->name }}</span>, Created On: {{ date('jS M Y', strtotime($post->updatedAt)) }} </div>
                    <div class="blog_description">
                        {{ $post->description }}
                    </div>
                    <div class="blog_btn">
                        <button class="btn btn-primary rounded-pill text-uppercase">

                            Keep Reading
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection