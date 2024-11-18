@include('frontend.includes.header')



    <!-- ============================== -->

    <div class="container-fluid cover_bg inner_banner" style=" background-image: linear-gradient(to bottom, rgb(0 0 0 / 50%), rgb(0 0 0 / 50%)), url({{ asset('storage/app/' . $topBanner->banner_image) }});">
      <div class="container">
        <div class="row">
          <h1>{{$topBanner->heading}}</h1>
        </div>
      </div>
    </div>

    <!-- main slider end -->

    <!-- ============================== -->
    <!-- ============================== -->

    <div class="clearfix"></div>

    <!-- exp section start -->
     <div class="container-fluid half_dark_bg" >
      <div class="container">
        <div class="row dark_bg">
          <div class="col-xxl-5 col-xl-5 col-lg-10 col-md-11 col-sm-12 col-12 py-xl-5 pt-5">
            <div class="text_box text-light">

              <h4 class="text-light" data-aos="fade-up">Experiences</h4>

              <h2 class="mb-3 text-light" data-aos="fade-down">{{$experience->heading}}</h2>

              <p>{!! str_replace('<p>', '<p class="text-light">', $experience->description) !!}</p>

            </div>

          </div>

          <div class="col-xxl-7 offset-xl-0 col-xl-7 offset-lg-2 col-lg-10 offset-md-2 col-md-10 col-sm-12 col-12 px-3 position-relative">

            <img src="{{ asset('public/frontend/images/wave_line.png') }}" alt="wave line" class="wave_line_img">

            <div class="swiper mySwiper custom_swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url({{ asset('storage/app/' . $experience->image1) }});"></div>
                <div class="swiper-slide" style="background-image: url({{ asset('storage/app/' . $experience->image2) }});"></div>
                <div class="swiper-slide" style="background-image: url({{ asset('storage/app/' . $experience->image3) }});"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
     </div>
    <!-- exp section end -->

    <div class="clearfix"></div>

    <!-- listing start -->

    <div class="container-fluid py-5 about_text_con">
        <div class="container">
            <div class="row">
                @foreach ($experienceDetail as $experience)
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 exp_div mb-4">
                        <div class="exp_img cover_bg" style="background-image: url('{{ asset('storage/app/' . $experience->image1) }}');">
                        </div>
                        <div class="detail">
                            <h4 data-aos="fade-up">{{ $experience->heading }}</h4>
                            <p>{!! $experience->description !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- ================================= -->
    <!-- ================================= -->


@include('frontend.includes.footer')



