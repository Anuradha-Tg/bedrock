 @include('frontend.includes.header')

 <!-- ============================== -->
 <!-- ============================== -->

 <div class="container-fluid cover_bg inner_banner"
     style=" background-image: linear-gradient(to bottom, rgb(0 0 0 / 50%), rgb(0 0 0 / 50%)), url({{ asset('storage/app/' . $topBanner->banner_image) }});">
     <div class="container">
         <div class="row">
             <h1>{{ $topBanner->heading }}</h1>
         </div>
     </div>
 </div>

 <!-- main slider end -->

 <!-- ============================== -->
 <!-- ============================== -->

 <div class="clearfix"></div>

 <!-- who we are section start -->
 <div class="container-fluid half_dark_bg">
     <div class="container">
         <div class="row dark_bg">
             <div class="col-xxl-5 col-xl-5 col-lg-10 col-md-11 col-sm-12 col-12 py-xl-5 pt-5">
                 <div class="text_box text-light">

                     <h2 class="mb-3 text-light" data-aos="fade-down">Who We Are</h2>

                     <p>{!! str_replace('<p>', '<p class="text-light">', $whoWeAre->description) !!}</p>
                 </div>
             </div>

             <div class="col-xxl-7 offset-xl-0 col-xl-7 offset-lg-2 col-lg-10 offset-md-2 col-md-10 col-sm-12 col-12 px-3 position-relative">

                 <img src="{{ asset('public/frontend/images/wave_line.png') }}" alt="wave_line" class="wave_line_img">

                 <div class="swiper mySwiper custom_swiper">
                     <div class="swiper-wrapper">
                         <div class="swiper-slide"
                             style="background-image: url({{ asset('storage/app/' . $whoWeAre->image1) }});"></div>
                         <div class="swiper-slide"
                             style="background-image: url({{ asset('storage/app/' . $whoWeAre->image2) }});"></div>
                         <div class="swiper-slide"
                             style="background-image: url({{ asset('storage/app/' . $whoWeAre->image3) }});"></div>
                     </div>
                     <div class="swiper-pagination"></div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- who we are section end -->

 <div class="clearfix"></div>

 <!-- about kalpitiya start -->

 <div class="container-fluid py-5 about_text_con">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">
                 <div class="text_box">

                     <h2 class="mb-3" data-aos="fade-down">{{ $aboutUsContent->heading }}</h2>

                     <img src="storage/app/{{ $aboutUsContent->image1 }}" alt="about us" class="float_img  d-none d-md-block">

                     <p class="text">{!! $aboutUsContent->description !!}</p>

                     <img src="storage/app/{{ $aboutUsContent->image1 }}" alt="about us" class="float_img  d-block d-md-none">

                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- about kalpitiya end -->

 <!-- ================================= -->
 <!-- ================================= -->
 @include('frontend.includes.footer')
