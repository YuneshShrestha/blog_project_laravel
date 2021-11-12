@extends('layouts.app')
@section('content')
    <div class="container blog pt-4">
        <div class="text-center blog_posts">Blog Posts</div>
        <form action="/blog" method="get">
            <div class="form-group">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search by name or post title..." name= "search" value="{{ $search }}">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                    <a href="/blog">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-recycle"></i></button>
                    </a>
                   
                  </div>
            </div>
            
        </form>
        @if (Auth::check())
            <a class="btn btn-outline-primary w-100 rounded-pill" href="/blog/create">Create Post</a>
        @endif
        @if (session()->has('message'))
            @if (session()->get('message.message_type') == 'delete')
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <p>{{ session()->get('message.message') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @else
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    <p>{{ session()->get('message.message') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @endif
        @foreach ($posts as $post)
            <div class="row pt-4">
                <div class="col-md-6 col-12 my-auto">
                    <img src="{{ asset($post->image_path) }}" class="blog_image img-thumbnail" alt="{{ $post->slug . ' image' }}">
                </div>
                <div class="col-md-6 col-12 my-auto">
                    <div class="blog_title">{{ $post->title }}</div>
                    <div class="blog_by">By <span class="blog_by_user_name font-italic font-weight-bold">{{ $post->user->name }}</span>, Created On: {{ date('jS M Y', strtotime($post->updated_at)) }} </div>
                    <div class="blog_description">
                        {{Str::limit($post->description, 300, $end='...')}}
                    </div>
                    <div class="blog_btn">
                        <div class="row gy-2">
                            <div class="col-md-8 col-12 d-grid">
                                <a class="btn btn-info rounded-pill text-uppercase" href="/blog/{{ $post->slug }}">

                                    Keep Reading
                                </a>
                            </div>
                            <div class="col-md-4 col-12 d-sm-flex d-flex justify-content-md-between justify-content-end">
                                @if (isset($post->user_id) && $post->user_id == Auth::id())
                                    <a class="btn btn-success rounded-pill text-uppercase mr-1" href="/blog/{{ $post->slug }}/edit">
                                        Edit
                                    </a>
                                    <form action="/blog/{{ $post->slug }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger rounded-pill text-uppercase">
                                            Delete
                                        </button>
                            
                                    </form>
                                @endif
                                
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