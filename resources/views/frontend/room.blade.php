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

<!-- stay section start -->
<div class="container-fluid half_dark_bg stay_con">
    <div class="container">
        <div class="row dark_bg">
            <div class="col-xxl-5 col-xl-5 col-lg-10 col-md-11 col-sm-12 col-12 py-xl-5 pt-5">
                <div class="text_box text-light mb-5">

                    <h4 class="text-light" data-aos="fade-up">Stay</h4>

                    <h2 class="mb-3 text-light" data-aos="fade-down">{{ $room->heading }}</h2>

                    <p>{!! str_replace('<p>', '<p class="text-light">', $room->description) !!}</p>
                </div>

                <div class="row">
                    @foreach ($features as $feature)
                        <div class="col-6">
                            <div class="small_icon_box">
                                <img src="{{ asset('storage/app/' . $feature->icon) }}" alt="{{ $feature->title }}">
                                <p>{{ $feature->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div
                class="col-xxl-7 offset-xl-0 col-xl-7 offset-lg-2 col-lg-10 offset-md-2 col-md-10 col-sm-12 col-12 px-3 position-relative">

                <img src="{{ asset('public/frontend/images/wave_line.png') }}" alt="wave line" class="wave_line_img">

                <div class="swiper mySwiper custom_swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"
                            style="background-image: url({{ asset('storage/app/' . $room->image1) }});"></div>
                        <div class="swiper-slide"
                            style="background-image: url({{ asset('storage/app/' . $room->image2) }});"></div>
                        <div class="swiper-slide"
                            style="background-image: url({{ asset('storage/app/' . $room->image3) }});"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- stay section end -->

<div class="clearfix"></div>

<!-- banner start -->

<div class="container-fluid banner_full p-0 cover_bg mt-xl-0" id="promotion">
    <div class="swiper mySwiper custom_swiper" style="top: 0;">
        <div class="swiper-wrapper">
            @foreach ($promotion as $promo)
                <div class="swiper-slide"
                    style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('storage/app/' . $promo->image) }}');">
                    <div class="container h-100">
                        <div class="row justify-content-end h-100">
                            <div
                                class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 d-flex align-items-center">
                                <div class="text_box text-light">
                                    <h4 class="text-light" data-aos="fade-up">Promotion</h4>
                                    <h2 class="mb-3 text-light" data-aos="fade-down">{{ $promo->heading }}</h2>
                                    <p>{!! str_replace('<p>', '<p class="text-light">', $promo->description) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>


<!-- banner start -->

<div class="clearfix"></div>

<!-- room category start -->

<div class="container-fluid room_cate_bg py-5" id="rooms">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 mb-4">
                <div class="text_box">
                    <h4 data-aos="fade-up">Rooms</h4>
                    <h2 class="mb-3" data-aos="fade-down">Where Tranquility Meets Timeless Comfort</h2>
                    <p>At Bedrock Kalpitiya, each room promises a harmonious blend of minimalist elegance,
                        inspired by Greek design and accentuated with local artistry. Our oceanfront suites,
                        Fred's Cave and Wilma's Sanctuary, offer breathtaking sunset views over the beach, while
                        Betty's Pool House and Barney's Hideout provide serene poolside retreats with a view of
                        our freshwater lagoon.
                        <br><br>
                        Every room is crafted to ensure a luxurious, comfortable stay, equipped with thoughtfully
                        arranged amenities like Air Conditioning, WiFi, Tea/Coffee Making, Shisha, Board Games,
                        Netflix, and Books, along with aesthetically curated decor to capture the essence of
                        Kalpitiya’s beauty. Experience coastal luxury, captivating vistas, and warm
                        hospitality—your perfect retreat awaits.
                    </p>
                </div>
            </div>


            @foreach ($roomDetails as $room)
                <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 room_ca_div mb-4">
                    @if ($room->room_images->isNotEmpty())
                        <div class="room_img cover_bg"
                            style="background-image: url({{ asset('storage/app/' . $room->room_images->first()->image_name) }});">
                            <img src="storage/app/{{ $room->character_image }}" alt="character image" class="char_img">
                        </div>
                    @endif
                    <div class="detail">
                        <div class="row">
                            @php
                                // Get the features related to the current room
                                $roomListing = $roomListingFeatures
                                    ->filter(function ($featureData) use ($room) {
                                        return $featureData->room_id === $room->id; // Assuming room_id is the foreign key
                                    })
                                    ->take(3); // Limit to the first 3 features
                            @endphp

                            @foreach ($roomListing as $listingFeatureData)
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 mt-2 md-mt-0">
                                    <div class="d-flex gap-2">
                                        <img src="{{ asset($listingFeatureData->icon) }}" alt="room features"
                                            class="small_icon">
                                        <p>{{ $listingFeatureData->feature_name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <h4 data-aos="fade-up">{{ $room->home_title }}</h4>
                        <p>{{ $room->home_content }}</p>

                        <a href="{{ url('room-details/' . $room->meta_title) }}">
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
</div>






<!-- room category end -->

<!-- ================================= -->
<!-- ================================= -->
@include('frontend.includes.footer')
