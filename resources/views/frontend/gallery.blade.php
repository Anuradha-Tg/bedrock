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

<div class="container mb-5 mt-5">
    <div class="row m-auto">
        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
            <div class="text_box">

                <h4 data-aos="fade-up">Gallery</h4>

                <h2 class="mb-3" data-aos="fade-down">Discover Bedrock’s Unique Charm Through Captivating Moments</h2>

                <p>Our gallery showcases the breathtaking views, luxurious accommodations, and exhilarating experiences
                    that
                    make Bedrock
                    Kalpitiya a standout among Kalpitiya beach hotels. Browse through to catch a glimpse of the coastal
                    paradise
                    that awaits
                </p>

            </div>
        </div>

        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 d-flex align-items-end">
            <img src="{{ asset('public/frontend/images/wave_line.png') }}" alt="wave line" class="w-100">
        </div>
    </div>

    <div class="row justify-content-center mt-4 m-auto">
        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">

            <nav>
                <div class="nav nav-tabs mb-1" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">ALL</button>
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

                <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">

                        @foreach ($allImages as $image)
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                <a href="{{ asset('storage/app/' . $image->image) }}" data-fancybox="images"
                                    data-caption="All Images" class="w-100">
                                    <div class="cover_bg gallery_s"
                                        style="background-image: url('{{ asset('storage/app/' . $image->image) }}');">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tabs for each category -->
                @foreach ($galleryCategories as $category)
                    <div class="tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel"
                        aria-labelledby="nav-{{ $category->id }}-tab">
                        <div class="row">
                            @if ($category->images->isNotEmpty())
                                @foreach ($category->images as $image)
                                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <a href="{{ asset('storage/app/' . $image->image_name) }}"
                                            data-fancybox="images" data-caption="{{ $category->category_name }}"
                                            class="w-100">
                                            <div class="cover_bg gallery_s"
                                                style="background-image: url('{{ asset('storage/app/' . $image->image_name) }}');">
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center">No images available for {{ $category->category_name }}.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

    <div class="clearfix"></div>

    <!-- ================================= -->
    <!-- ================================= -->
    @include('frontend.includes.footer')
