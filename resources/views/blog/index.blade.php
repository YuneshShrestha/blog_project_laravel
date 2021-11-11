@extends('layouts.app')
@section('content')
    <div class="container blog pt-4">
        <div class="text-center blog_posts">Blog Posts</div>
        @if (Auth::check())
            <a class="btn btn-outline-primary w-100 rounded-pill" href="/blog/create">Create Post</a>
        @endif
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <p>{{ session()->get('message') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @foreach ($posts as $post)
            <div class="row pt-4">
                <div class="col-md-6 col-12 my-auto">
                    <img src="{{ asset($post->image_path) }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 col-12 my-auto">
                    <div class="blog_title">{{ $post->title }}</div>
                    <div class="blog_by">By <span class="blog_by_user_name font-italic font-weight-bold">{{ $post->user->name }}</span>, Created On: {{ date('jS M Y', strtotime($post->updated_at)) }} </div>
                    <div class="blog_description">
                        {{Str::limit($post->description, 200, $end='...')}}
                    </div>
                    <div class="blog_btn">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="btn btn-info rounded-pill text-uppercase" href="/blog/{{ $post->slug }}">

                                    Keep Reading
                                </a>
                            </div>
                            <div class="col-md-4 d-flex justify-content-around">
                                <a class="btn btn-success rounded-pill text-uppercase" href="/blog/{{ $post->slug }}/edit">
                                    Edit
                                </a>
                                <a class="btn btn-danger rounded-pill text-uppercase" href="/blog/{{ $post->slug }}">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-4 d-flex justify-content-end"> {{ $posts->links() }}</div>
        <style>
            .w-5{
                width: 25px;
            }
        </style>
    </div>
@endsection