@include('frontend.includes.header')
<div class="social_icon_bar">
    <div class="social_icon_div">
        <a href="{{ $contactDetails->facebook_url }}">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="{{ $contactDetails->instagram_url }}">
            <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="{{ $contactDetails->twitter_url }}">
            <i class="fa-brands fa-x-twitter"></i>
        </a>
        <a href="{{ $contactDetails->youtube_url }}">
            <i class="fa-brands fa-youtube"></i>
        </a>

        <hr>

        <p class="mb-0">FOLLOW US ON</p>
    </div>
</div>

<!-- main slider start -->

<div id="carouselExampleCaptions" class="carousel slide carousel" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($sliders as $index => $slider)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach ($sliders as $index => $slider)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }} slider_img"
                style="background-image: linear-gradient(to bottom, rgb(0 0 0 / 20%), rgb(0 0 0 / 20%)), url('storage/app/{{ $slider->desktop_image }}')">
                <div class="carousel-caption d-none d-md-block">
                    <h1>{{ $slider->title_en }}</h1>

                    <div class="slider_desc">

                        {!! $slider->description_en !!}


                        <a href="{{ $slider->link }}">
                            <div class="d-flex align-items-center light_read_btn">
                                <p class="mb-0">Read More</p>
                                <div class="circle">
                                    <span class="icon arrow1"><i class="fa fa-long-arrow-right "></i></span>
                                    <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<div class="container">
    <div class="expe_flex">
        <div class="d-flex justify-content-center d-flex flex-column align-items-center">
            <div class="expe_div">
                <div class="round_bg">
                    <img src="{{ asset('public/frontend/images/surfing.png') }}" alt="kitesurf">
                </div>
                <p>KITESURF</p>
            </div>

            <!-- ============= -->

            <div class="expe_div">
                <div class="round_bg">
                    <img src="{{ asset('public/frontend/images/whale.png') }} " alt="dolphin watching">
                </div>
                <p>Dolphin watching</p>
            </div>

            <!-- ============= -->

            <div class="expe_div">
                <div class="round_bg">
                    <img src="{{ asset('public/frontend/images/sea_food.png') }}" alt="sea food">
                </div>
                <p>Sea Food</p>
            </div>

            <hr>

        </div>

    </div>
</div>

<!-- main slider end -->

<!-- ============================== -->
<!-- ============================== -->

<div class="clearfix"></div>

<!-- about us section start -->

<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 cover_bg about_left"
            style="background-image: url('{{ asset('public/frontend/images/about_left.jpg') }}');">
            <img src="{{ asset('public/frontend/images/about.png') }}" alt="about">
        </div>
        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 d-flex align-items-center cover_bg"
            style="height: 600px; background-image: url('{{ asset('public/frontend/images/wave_bg.jpg') }}');">
            <div class="row">
                <div class="offset-xxl-2 col-xxl-8  col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">
                    <div class="text_box">

                        <h4 data-aos="fade-up">Welcome To Bedrock</h4>

                        <h2 class="mb-3" data-aos="fade-down">{{ $introduction->title }}</h2>

                        {!! $introduction->description !!}


                        <a href="">
                            <div class="d-flex align-items-center dark_read_btn">
                                <p class="mb-0">Read More</p>
                                <div class="circle">
                                    <span class="icon arrow1"><i class="fa fa-long-arrow-right "></i></span>
                                    <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                                </div>


                            </div>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- about us section end -->

<div class="clearfix"></div>

<!-- stay section start -->
<div class="container-fluid half_dark_bg stay_con">
    <div class="container">
        <div class="row dark_bg">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 py-5">
                <div class="text_box text-light mb-5">

                    <h4 class="text-light" data-aos="fade-up">Stay</h4>

                    <h2 class="mb-3 text-light" data-aos="fade-down">Retreat to Comfort and Coastal Charm in the Heart
                        of Kalpitiya</h2>

                    <p class="text-light">Our oceanfront suites have panoramic views of the pristine waters, spacious
                        interiors, and sumptuous bedding that
                        redefine comfort.
                    </p>

                    <a href="{{ route('rooms') }}">
                        <div class="d-flex align-items-center light_read_btn">
                            <p class="mb-0">Read More</p>
                            <div class="circle">
                                <span class="icon arrow1"><i class="fa fa-long-arrow-right "></i></span>
                                <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                            </div>


                        </div>
                    </a>

                </div>

                <div class="d-flex align-items-center gap-5 justify-content-center">
                    <div class="expe_div">
                        <div class="round_bg fade_blue_bg">
                            <img src="storage/app/{{ $stay->icon1 }}" alt="features">
                        </div>
                        <p>{{ $stay->icon1_title }}</p>
                    </div>

                    <!-- ============= -->

                    <div class="expe_div">
                        <div class="round_bg fade_blue_bg">
                            <img src="storage/app/{{ $stay->icon2 }}" alt="features">
                        </div>
                        <p>{{ $stay->icon2_title }}</p>
                    </div>

                    <!-- ============= -->

                    <div class="expe_div">
                        <div class="round_bg fade_blue_bg">
                            <img src="storage/app/{{ $stay->icon3 }}" alt="features">
                        </div>
                        <p>{{ $stay->icon3_title }}</p>
                    </div>

                    <hr>

                </div>

            </div>

            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 px-3 position-relative">

                <img src="{{ asset('public/frontend/images/wave_line.png') }}" alt="wave line" class="wave_line_img">

                <div class="swiper mySwiper custom_swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image: url('storage/app/{{ $stay->image1 }}');">
                        </div>
                        <div class="swiper-slide" style="background-image: url('storage/app/{{ $stay->image2 }}');">
                        </div>
                        <div class="swiper-slide" style="background-image: url('storage/app/{{ $stay->image3 }}');">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- stay section end -->

<div class="clearfix"></div>

<!-- rooms section start -->

<div class="container-fluid rooms_con"
    style="background-image: url('{{ asset('public/frontend/images/wave_full_bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 mb-3">
                <div class="text_box">

                    <h4 data-aos="fade-up">Rooms</h4>

                    <h2 class="mb-3" data-aos="fade-down">{{ $roomContent->heading }}</h2>

                    {!! $roomContent->description !!}


                    <a href="{{ url('rooms/#rooms') }}">
                        <div class="d-flex align-items-center dark_read_btn">
                            <p class="mb-0">Read More</p>
                            <div class="circle">
                                <span class="icon arrow1"><i class="fa fa-long-arrow-right "></i></span>
                                <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="owl-carousel owl-theme rooms_owl">
                    @foreach ($roomTypeDetails as $room)
                        <div class="item custom_card">
                            <img src="{{ asset('storage/app/' . $room->home_image1) }}"
                                alt="{{ $room->home_title }}" class="w-100">
                            <div class="card_text">
                                <h4>{{ $room->home_title }}</h4>
                                <p>{{ $room->home_content }}</p>

                                <a href="{{ url('room-details/' . $room->id) }}">
                                    <div class="d-flex align-items-center dark_read_btn">
                                        <p class="mb-0"><i>Read More</i></p>
                                        <div class="circle"
                                            style="border: none !important; margin-left: -7px; margin-top: 2px;">
                                            <span class="icon arrow1"><i class="fa fa-long-arrow-right"></i></span>
                                            <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Promotion start -->
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 promo_col">
                <div class="item custom_card">
                    <img src="{{ !empty($promotion) ? asset('storage/app/' . $contentToShow->home_image1) : asset('storage/app/' . $contentToShow->image1) }}"
                        alt="promotion" class="w-100">
                    <div class="card_text">
                        <h4>{{ !empty($promotion) ? $contentToShow->home_title : $contentToShow->subheading }}</h4>
                        <p class="text-light">
                            {!! str_replace(
                                '<p>',
                                '<p class="text-light">',
                                !empty($promotion) ? $contentToShow->home_content : $contentToShow->subdescription,
                            ) !!}
                        </p>
                        {{-- <p>{!! str_replace('<p>', '<p class="text-light">', $room->description) !!}</p> --}}
                        <a href="{{ !empty($promotion) ? url('rooms/#promotion') : url('rooms/') }}" class="position-relative">
                            <div class="d-flex align-items-center light_read_btn">
                                <p class="mb-0"><i>Read More</i></p>
                                <div class="circle">
                                    <span class="icon arrow1"><i class="fa fa-long-arrow-right"></i></span>
                                    <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Promotion end -->


        </div>
    </div>
</div>


<!-- rooms section end -->

<div class="clearfix"></div>

<!-- food section start -->

<div class="container">
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 pe-0">
            <div class="swiper mySwiper custom_swiper food_slider top-0 mb-5">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"
                        style="background-image: url({{ asset('storage/app/' . $food->image1) }});"></div>
                    <!-- <div class="swiper-slide" style="background-image: url(images/food1.jpg);"></div> -->
                    <div class="swiper-slide"
                        style="background-image: url({{ asset('storage/app/' . $food->image2) }});"></div>
                    <div class="swiper-slide"
                        style="background-image: url({{ asset('storage/app/' . $food->image3) }});"></div>
                    <div class="swiper-slide"
                        style="background-image: url({{ asset('storage/app/' . $food->image4) }});"></div>
                    <div class="swiper-slide"
                        style="background-image: url({{ asset('storage/app/' . $food->image5) }});"></div>
                    <div class="swiper-slide"
                        style="background-image: url({{ asset('storage/app/' . $food->image6) }});"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!-- ============================= -->

        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 p-0"
            style="background-image: url('{{ asset('public/frontend/images/ocean_bg.jpg') }}');">
            <div class="row cover_bg h-100">
                <div
                    class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 p-5 d-flex justify-content-center align-items-center">
                    <div class="text_box">

                        <h4 data-aos="fade-up">Foods</h4>

                        <h2 class="mb-3" data-aos="fade-down">{{ $food->heading }}</h2>

                        {!! $food->description !!}


                        <a href="">
                            <div class="d-flex align-items-center dark_read_btn">
                                <p class="mb-0">Read More</p>
                                <div class="circle">
                                    <span class="icon arrow1"><i class="fa fa-long-arrow-right "></i></span>
                                    <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- ========================== -->

                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                    <div class="dark_bg food_right_div">
                        <img src="{{ asset('public/frontend/images/food_plate1.png') }}" alt="food plate"
                            class="food_plate">
                        <img src="{{ asset('public/frontend/images/wave_line.png') }}" alt="wave line"
                            class="wave_line">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- food section end -->

<div class="clearfix"></div>

<!-- banner start -->

<div class="container-fluid banner_full p-0">
    <div class="banner_img cover_bg"
        style="background-image: url('{{ asset('public/frontend/images/banner.jpg') }}');"></div>
</div>

<!-- banner start -->

<div class="clearfix"></div>

<!-- Experiences start -->

<div class="container-fluid cover_bg py-5 mb-5"
    style="background-image: linear-gradient(to left, #ffffff 7%, rgba(0, 0, 0, 0) 7%), url('{{ asset('public/frontend/images/wave_blue_bg.jpg') }}');">
    <div class="container">
        <div class="row mb-4">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                <div class="text_box text-light">

                    <h4 class="text-light" data-aos="fade-up">Experiences</h4>

                    <h2 class="text-light" data-aos="fade-down">Adventure Awaits, Make Every Moment Yours</h2>

                </div>
            </div>
            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 pt-4">

                <p class="text-light">At Bedrock Kalpitiya, your stay could be a serene retreat or a thrilling
                    adventure as you wish. Whether you desire
                    peaceful relaxation or a high-energy adventure, our exclusive hand crafted experiences allow you to
                    explore the stunning
                    Kalpitiya coastline like never before.
                </p>

                <a href="{{ route('experience-detail') }}">
                    <div class="d-flex align-items-center light_read_btn">
                        <p class="mb-0">Read More</p>
                        <div class="circle">
                            <span class="icon arrow1"><i class="fa fa-long-arrow-right "></i></span>
                            <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <!-- Experience Slider Start -->
        <div class="row">
            <div class="owl-carousel owl-theme expe_owl">
                @foreach ($experience as $exp)
                    <div class="item expe_card"
                        style="background-image: url('{{ asset('storage/app/' . $exp->home_image1) }}');">
                        <div class="expe_box">
                            <h4>{{ $exp->home_title }}</h4>
                            <p class="mt-2">{{ $exp->home_content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Experience Slider End -->



    </div>
</div>

<!-- Experiences end -->

<div class="clearfix"></div>

<!-- Gallery start -->
<div class="container mb-5">
    <div class="row">
        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
            <div class="text_box">

                <h4 data-aos="fade-up">Gallery</h4>

                <h2 class="mb-3" data-aos="fade-down">Discover Bedrock’s Unique Charm Through Captivating Moments
                </h2>

                <p>Our gallery showcases the breathtaking views, luxurious accommodations, and exhilarating experiences
                    that make Bedrock
                    Kalpitiya a standout among Kalpitiya beach hotels. Browse through to catch a glimpse of the coastal
                    paradise that awaits
                </p>

            </div>
        </div>

        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 d-flex align-items-end">
            <img src="{{ asset('public/frontend/images/wave_line.png') }}" alt="wave line" class="w-100">
        </div>
    </div>

    <!-- In your Blade template -->
    {{-- <div class="row justify-content-center mt-4">
        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">
            <nav>
                <div class="nav nav-tabs mb-1" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true">ALL</button>
                    @foreach ($galleryCategories as $category)
                        <button class="nav-link" id="nav-{{ $category->id }}-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-{{ $category->id }}" type="button" role="tab"
                            aria-controls="nav-{{ $category->id }}" aria-selected="false">
                            {{ $category->category_name }}
                        </button>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content pt-3" id="nav-tabContent">
                <!-- ALL Tab -->
                <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div class="row">
                        @foreach ($allImages as $image)
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <a href="{{ asset('storage/app/' . $image->image_name) }}" data-fancybox="images"
                                    data-caption="All Images" class="w-100">
                                    <div class="cover_bg gallery_s"
                                        style="background-image: url('{{ asset('storage/app/' . $image->image_name) }}');">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Category-specific Tabs -->
                @foreach ($galleryCategories as $category)
                    <div class="tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel"
                        aria-labelledby="nav-{{ $category->id }}-tab">
                        <div class="row">
                            @foreach ($categoryImages[$category->id] as $image)
                                <!-- Use the prepared category images -->
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="{{ asset('storage/app/' . $image->image_name) }}" data-fancybox="images"
                                        data-caption="{{ $category->category_name }}" class="w-100">
                                        <div class="cover_bg gallery_s"
                                            style="background-image: url('{{ asset('storage/app/' . $image->image_name) }}');">
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}



    <div class="row justify-content-center mt-4">
        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">

            <nav>
                <div class="nav nav-tabs mb-1" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true">ALL</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile"
                        aria-selected="false">Hotel</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact"
                        aria-selected="false">Foods</button>
                    <button class="nav-link" id="exp-contact-tab" data-bs-toggle="tab" data-bs-target="#exp-contact"
                        type="button" role="tab" aria-controls="exp-contact" aria-selected="false"
                        style="border-right: none !important;">Experiences</button>
                </div>
            </nav>
            <div class="tab-content pt-3" id="nav-tabContent">

                <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div class="row">

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $allImages[0]->image) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $allImages[0]->image) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $allImages[1]->image) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $allImages[1]->image) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $allImages[2]->image) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $allImages[2]->image) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $allImages[3]->image) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $allImages[3]->image) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $allImages[4]->image) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $allImages[4]->image) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $allImages[5]->image) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $allImages[5]->image) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $allImages[6]->image) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $allImages[6]->image) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $allImages[7]->image) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $allImages[7]->image) }});">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $hotelImages[0]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $hotelImages[0]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $hotelImages[1]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $hotelImages[1]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $hotelImages[2]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $hotelImages[2]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $hotelImages[3]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $hotelImages[3]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $hotelImages[4]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $hotelImages[4]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $hotelImages[5]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $hotelImages[5]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $hotelImages[6]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $hotelImages[6]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $hotelImages[7]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $hotelImages[7]->image_name) }});">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $foodImages[0]->image_name) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $foodImages[0]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $foodImages[1]->image_name) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $foodImages[1]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $foodImages[2]->image_name) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $foodImages[2]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $foodImages[3]->image_name) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $foodImages[3]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $foodImages[4]->image_name) }}" data-fancybox="images"
                                data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $foodImages[4]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $foodImages[5]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $foodImages[5]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $foodImages[6]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $foodImages[6]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $foodImages[7]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $foodImages[7]->image_name) }});">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="exp-contact" role="tabpanel" aria-labelledby="exp-contact-tab">
                    <div class="row">

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $experienceImages[0]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $experienceImages[0]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $experienceImages[1]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $experienceImages[1]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $experienceImages[2]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $experienceImages[2]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $experienceImages[3]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $experienceImages[3]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $experienceImages[4]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $experienceImages[4]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $experienceImages[5]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $experienceImages[5]->image_name) }});">
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="{{ asset('storage/app/' . $experienceImages[6]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_l"
                                    style="background-image: url({{ asset('storage/app/' . $experienceImages[6]->image_name) }});">
                                </div>
                            </a>
                            <a href="{{ asset('storage/app/' . $experienceImages[7]->image_name) }}"
                                data-fancybox="images" data-caption="This image has a caption" class="w-100">
                                <div class="cover_bg gallery_s"
                                    style="background-image: url({{ asset('storage/app/' . $experienceImages[7]->image_name) }});">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end pe-2">
                <a href="{{ route('gallery') }}">
                    <div class="d-flex align-items-center dark_read_btn justify-content-end">
                        <p class="mb-0">view all</p>
                        <div class="circle">
                            <span class="icon arrow1"><i class="fa fa-long-arrow-right "></i></span>
                            <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- </div>
    </div> --}}
        </div>
    </div>
    <!-- Gallery end -->

    <div class="clearfix"></div>

    <!-- Inquiries start -->
    <div class="container mb-5">
        <div class="row inq_row">

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="text_box">

                    <h4 data-aos="fade-up">Inquiries</h4>

                    <h2 class="mb-3" data-aos="fade-down">Ready to Book Your Adventure? Reach Out to Us Today!</h2>

                    <p>Ready to book your stay at one of the best hotels in Kalpitiya, Sri Lanka? Reach out to us to
                        plan
                        your perfect
                        getaway.
                        Our team is here to make your stay unforgettable, blending luxury, nature, and adventure into
                        one
                        remarkable
                        experience.
                    </p>

                </div>
            </div>

            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 cover_bg"
                        style="background-image: url('{{ asset('public/frontend/images/wave_bg.jpg') }}'); box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;">
                        <div class=" contact_col">

                            <div class="contact_box">
                                <p class="head">Address</p>
                                <p class="detail">
                                    {{ $contactDetails->address }}
                                </p>
                            </div>

                            <!-- ================== -->

                            <div class="contact_box">
                                <p class="head">Phone Number</p>
                                <p class="detail">
                                    <a href="tel: {{ $contactDetails->contact_no }}">
                                        {{ $contactDetails->contact_no }}
                                    </a>
                                </p>
                            </div>

                            <!-- ================== -->

                            <div class="contact_box">
                                <p class="head">Email Address</p>
                                <p class="detail">
                                    <a href="mailto:{{ $contactDetails->email }}">
                                        {{ $contactDetails->email }}
                                    </a>
                                </p>
                            </div>

                            <!-- ================== -->

                            <div class="contact_box">
                                <p class="head">Social Media</p>
                                <p class="detail d-flex gap-3">
                                    @if ($contactDetails->facebook_url != '' && $contactDetails->facebook_url != '#')
                                        <a href="{{ $contactDetails->facebook_url }}" target="_blank">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    @endif
                                    @if ($contactDetails->instagram_url != '' && $contactDetails->instagram_url != '#')
                                        <a href="{{ $contactDetails->instagram_url }}" target="_blank">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    @endif
                                    @if ($contactDetails->twitter_url != '' && $contactDetails->twitter_url != '#')
                                        <a href="{{ $contactDetails->twitter_url }}" target="_blank">
                                            <i class="fa-brands fa-x-twitter"></i>
                                        </a>
                                    @endif
                                    @if ($contactDetails->youtube_url != '' && $contactDetails->youtube_url != '#')
                                        <a href="{{ $contactDetails->youtube_url }}" target="_blank">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    @endif
                                </p>
                            </div>

                            <!-- ================== -->

                            <div class="contact_box">
                                <p class="head">Online Booking</p>
                                <div class="detail d-flex gap-3">
                                    <a href="{{ $contactDetails->banking1 }}" target="_blank">
                                        <img src="{{ asset('public/frontend/images/agoda_icon.jpg') }}"
                                            alt="online banking" class="w-100">
                                    </a>
                                    <a href="{{ $contactDetails->banking2 }}" target="_blank">
                                        <img src="{{ asset('public/frontend/images/booking_icon.png') }}"
                                            alt="online banking" class="w-100">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- ============= -->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please submit again!</strong><br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($errors->has('token'))
                        <span class="text-danger">{{ $errors->first('token') }}</span>
                    @endif
                        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 dark_bg py-4 px-5" style="z-index: 9;">

                        <form id="inquiry_form" name="inquiry_form" action="{{ route('new-enquiry') }}"
                            enctype="multipart/form-data" method="post" class="smart-form">
                            @csrf
                            <div class="row form_row">

                                <div class="dol-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="full_name" class="form-control" id="full_name"
                                            required="" placeholder="Full Name" fdprocessedid="kcqaug">
                                        <label for="floatingInput">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="email"
                                            required="" placeholder="Email Address" fdprocessedid="kcqaug">
                                        <label for="floatingInput">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-floating d-flex mb-3">
                                        <input type="text"
                                            class="datepicker_input form-control shadow-none datepicker-input"
                                            id="check_in" placeholder="DD/MM/YYYY" fdprocessedid="d9zs0c"
                                            autocomplete="off" name="check_in">
                                        <label for="datepicker1">Check In</label>
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>

                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-floating d-flex mb-3">
                                        <input type="text"
                                            class="datepicker_input form-control shadow-none datepicker-input"
                                            id="check_out" placeholder="DD/MM/YYYY" fdprocessedid="d9zs0c"
                                            autocomplete="off" name="check_out">
                                        <label for="datepicker1">Check Out</label>
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select shadow-none" name="country" id="country"
                                            aria-label="Floating label select example" fdprocessedid="i20ioc">
                                            <option value="">Select the venue</option>
                                            <option value="">Select the venue</option>
                                            <option value="">Select the venue</option>
                                        </select>
                                        <label for="floatingSelect">Country</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="" name="message" id="message" rows="5" required=""
                                            spellcheck="false"></textarea>
                                        <label for="floatingTextarea">Message</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form_btn_row justify-content-end">
                                <button type ="submit">
                                    <div class="d-flex align-items-center light_read_btn">
                                        <p class="mb-0"><i>Send Now</i></p>
                                        <div class="circle">
                                            <span class="icon arrow1"><i class="fa fa-long-arrow-right "></i></span>
                                            <span class="icon arrow2"><i class="fa fa-long-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 right_col">

                    <div style="width: 100%"><iframe width="100%" height="650" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=en&amp;q=bedrock%20kalpitiya+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                href="https://www.gps.ie/">gps tracker sport</a></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Inquiries end -->

<div class="clearfix"></div>

<!-- ================================= -->
<!-- ================================= -->

@include('frontend.includes.footer')
