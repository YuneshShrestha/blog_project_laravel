@extends('layouts.app')
@section('content')
    @if (isset(auth()->user()->id))
    <div class="user_profile">
        <div class="side_bar">
            <div>
                <div class="side_bar_user_image"> 
                    <img src="{{ asset($user->picture) }}"  alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center;">
                </div>
                <p>{{ auth()->user()->id == $user->id ? 'You' : $user->name }}</p>
            </div>
        </div>
        <div class="posts">
            <div class="posts_container">
                @foreach ($user->post as $post)
                    <div class="post pt-4">
                        <img src="{{ asset($post->image_path) }}" class="img-thumbnail" alt="{{ $post->slug . ' image' }}" style="height: 60vh; width: 100vw; object-fit: cover; object-position: center;">
                        <div class="blog_title">{{ $post->title }}</div>
                        <div class="blog_by">By <span class="blog_by_user_name font-italic font-weight-bold">{{ $post->user->name }}</span>, Created On: {{ date('jS M Y', strtotime($post->updated_at)) }} </div>
                        <div class="blog_description">
                            {{Str::limit($post->description, 300, $end='...')}}
                        </div>
                        <div class="blog_btn">
                            <div class="row gy-2">
                                <div class="col-md-{{ auth()->user()->id == $user->id ? '8' : '12' }} col-12 d-grid btn_1">
                                    <a class="btn btn-info rounded-pill text-uppercase" href="{{ asset('/blog'.'/'. $post->slug) }}">
                                        Keep Reading
                                    </a>
                                </div>
                                <div class="col-md-{{ auth()->user()->id == $user->id ? '4' : '0' }} col-12 d-sm-flex d-flex justify-content-end btn_2 ">
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
                @endforeach
            </div>
        </div>
    </div>
        
    @else
    <div class="user_profile">
        <div class="side_bar">
            <div>
                <div class="side_bar_user_image"> 
                    <img src="{{ asset($user->picture) }}"  alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center;">
                </div>
                <p>{{  $user->name }}</p>
            </div>
        </div>
        <div class="posts">
            <div class="posts_container">
                @foreach ($user->post as $post)
                    <div class="post pt-4">
                        <img src="{{ asset($post->image_path) }}" class="img-thumbnail" alt="{{ $post->slug . ' image' }}" style="height: 60vh; width: 100vw; object-fit: cover; object-position: center;">
                        <div class="blog_title">{{ $post->title }}</div>
                        <div class="blog_by">By <span class="blog_by_user_name font-italic font-weight-bold">{{ $post->user->name }}</span>, Created On: {{ date('jS M Y', strtotime($post->updated_at)) }} </div>
                        <div class="blog_description">
                            {{Str::limit($post->description, 300, $end='...')}}
                        </div>
                        <div class="blog_btn">
                            <div class="row gy-2">
                                <div class="col-12 d-grid btn_1">
                                    <a class="btn btn-info rounded-pill text-uppercase" href="{{ asset('/blog'.'/'. $post->slug) }}">
                                        Keep Reading
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 
    @endif
@endsection