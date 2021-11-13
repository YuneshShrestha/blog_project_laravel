@extends('layouts.app')
@section('content')
    <div class="container pt-4">
        <div class="create_title">Create Post</div>
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Title..." name="title" value="{{ old('title') }}">
                <label for="title">Title</label>
             </div>
             @error('title')
                <p class="text-danger">{{ $message }}</p>
             @enderror
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Description..." id="floatingTextarea2" style="height: 100px" name="description">{{ old('description') }}</textarea>
                <label for="floatingTextarea2">Description</label>
              </div>
              @error('description')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <div class="form-group">
                  <input id="image" class="form-control" type="file" name="image">
              </div>
              <div>
                @error('image')
                 <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            
              <button type="submit" class="btn btn-primary rounded-pill">Post</button>
        </form>
    </div>
@endsection