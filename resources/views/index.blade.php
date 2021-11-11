@extends('layouts.app')
@section('content')
{{-- Hero Start --}}
    <div class="hero">
       <div>
         <h2 class="text-uppercase hero_txt font-weight-bolder text-white">Do you want to become developer</h2>
         <div class="hero_btn">
            <div class="btn text-uppercase btn-secondary">Read more</div>
         </div>
       </div>
    </div>

{{-- Hero End --}}
    
{{-- Struggling to be developer start --}}
<div class="struggling pt-5 container">
    <div class="row">
        <div class="col-lg-6 col-12 struggling_image my-auto">
            <img src="https://images.pexels.com/photos/669228/pexels-photo-669228.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 col-12 struggling_text my-auto">
            <div class="struggling_text_header">
                Struggling to be a better developer?
            </div>
            <div class="struggling_text_para1">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, recusandae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, consequatur.
            </div>
            <div class="struggling_text_para2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum explicabo enim dolores consequatur quibusdam eaque culpa ipsum iure eos id. Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident temporibus placeat delectus architecto nostrum quis, corrupti, voluptatum incidunt adipisci alias voluptas natus ullam saepe sapiente. Itaque illum aliquam distinctio quaerat.
            </div>
            <div class="struggling_text_btn">
                <div class="btn btn-primary text-uppercase rounded-pill">Find out more</div>
            </div>
        </div>
    </div>
</div>
{{-- Struggling to be developer end --}}
{{-- About Me start --}}
<div class="about_me mt-5">
    <div>
        <div class="about_me_text text-center">I'm expert in...</div>
        <div class="about_me_list text-white text-center">
                <p>UX Design</p>
                <p>Frontend Devlopment</p>
                <p>Backend Development</p>
                <p>Mobile App Development</p>
        </div>
    </div>
</div>
{{-- About Me end --}}
{{-- Recent Posts start --}}
<div class="recent_posts pt-5 container">
    <div class="text-center recent_posts_blog_title text-uppercase">
        Blog
    </div>
    <div class="recent_posts_title text-center">
        Recent Posts
    </div>
    <div class="recent_posts_text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, itaque. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    </div>
        <div class="recent_posts_card card bg-dark" style="max-width: 100vw;">
            <div class="row g-0">
              
              <div class="col-lg-6 order-lg-last">
                <img src="https://images.pexels.com/photos/669228/pexels-photo-669228.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-fluid rounded-start recent_posts_card_image" alt="...">
              </div>
              <div class="col-lg-6 my-auto">
                <div class="card-body recent_posts_card_text text-white">
                    <div class="recent_posts_card_text_language">PHP</div>
                    <div class="recent_posts_card_text_description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus repellendus, quidem id porro, error, alias harum libero corporis fugit exercitationem quibusdam. Odio sit dolore iste! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, ducimus.
                    </div>
                    <div class="recent_posts_card_text_btn">
                        <div class="btn btn-outline-light text-uppercase rounded-pill">Find out more</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    
    {{-- <div class="recent_posts_card row">
        <div class="col-md-6 col-12 bg-dark">
            <div class=" text-white">
              
            </div>
        </div>
        <div class="col-md-6 col-12">
                <img src="https://images.pexels.com/photos/669228/pexels-photo-669228.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="recent_posts_card_image img-fluid">
        </div>
       
    </div> --}}
</div>
{{-- Recent Posts end --}}

@endsection