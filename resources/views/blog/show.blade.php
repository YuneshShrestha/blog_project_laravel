@extends('layouts.app')
@section('content')
    <div class="show_blog">
        <div class="show_blog_image" data-bs-toggle="modal" data-bs-target="#imageModal" style="background-image: linear-gradient(to bottom, rgba(42, 43, 44, 0.575), rgba(56, 52, 55, 0.73)),url({{ asset($post->image_path) }}); ">
           {{ $post->title }}
        </div>
        <div class="container">
           
            
            <div class="show_blog_by">By <span class="blog_by_user_name font-italic font-weight-bold">{{ $post->user->name }}</span>, Created On: {{ date('jS M Y', strtotime($post->updated_at)) }} </div>
            <div class="show_blog_description">
                {{ $post->description }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <div class="modal_closing_btn">
                    <i class="fas fa-times modal_button" data-bs-dismiss="modal" aria-label="Close"></i>
              </div>

              <img src="{{ asset($post->image_path) }}" alt="" class="modal_image">
            </div>
          </div>
        </div>
      </div>
@endsection