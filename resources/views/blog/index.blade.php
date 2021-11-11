@extends('layouts.app')
@section('content')
    <div class="container blog pt-4">
        <div class="text-center blog_posts">Blog Posts</div>
        <div class="row">
            <div class="col-md-6 col-12 my-auto">
                <img src="https://images.pexels.com/photos/459653/pexels-photo-459653.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 col-12 my-auto">
                <div class="blog_title">Learn something new</div>
                <div class="blog_by">By <span class="blog_by_user_name font-italic font-weight-bold">Yunesh Shrestha</span>, 1day ago</div>
                <div class="blog_description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sapiente provident excepturi aut inventore, similique a temporibus tempore veniam natus ex autem deleniti et distinctio doloremque, tempora, quae iusto id? Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, eligendi.
                </div>
                <div class="blog_btn">
                    <button class="btn btn-primary rounded-pill text-uppercase">

                        Keep Reading
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection