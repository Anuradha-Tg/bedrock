<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    @php
        $room = e(Request::segment(2)); // Get the second segment and sanitize it

        if (request()->is('rooms')) {
            $meta = \App\Helpers\HeaderHelper::getMeta('rooms');
        } elseif (request()->is('experience-detail')) {
            $meta = \App\Helpers\HeaderHelper::getMeta('experience-detail');
        } elseif (request()->is('gallery')) {
            $meta = \App\Helpers\HeaderHelper::getMeta('gallery');
        } elseif (request()->is('contact-us')) {
            $meta = \App\Helpers\HeaderHelper::getMeta('contact-us');
        } elseif (request()->is('room-details/' . $room)) {
            $meta = \App\Helpers\HeaderHelper::getRoomDetail($room, 'room-details');
            // dd($meta);
        } else {
            // dd('hi');
            $meta = \App\Helpers\HeaderHelper::getMeta('home');
        }
        // dd($meta);
    @endphp




    <meta http-equiv="cleartype" content="on">
    <meta name="MobileOptimized" content="width">
    <link rel="icon" type="image/png" href="{{ asset('public/frontend/images/favicon.png') }}">
    <meta name="og:title" content="{{ $meta->og_title }}" />
    <meta name="og:type" content="{{ $meta->og_type }}" />
    <meta name="og:tag" content="{{ $meta->og_tag }}" />
    <meta name="og:url" content="{{ $meta->og_url }}" />
    <meta name="og:image" content="{{ asset('storage/app/' . $meta->og_image) }}" />
    <meta name="og:site_name" content="{{ $meta->og_sitename }}" />
    <meta name="og:description" content="{{ $meta->description }}" />
    <meta name="og:email" content="{{ $meta->og_email }}" />
    <link rel="canonical" href="{{ url()->full() }}" />
    <title>{{ $meta->page_title }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('public/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/mediaquery.css') }}" rel="stylesheet">
    <!-- Custom CSS -->

    <title>Bedrock</title>

    <!--favicon-->
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/favicon.png') }}" />
    <!--favicon-->

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Add icon library -->

    <!-- owl carousel -->
    <link href="{{ asset('public/frontend/owl/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/owl/owl_css.css') }}">
    <!-- owl carousel -->

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- loading effect -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/loading_styles.css') }}">
    <!-- loading effect -->

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/gallery/fancybox.min.css') }}">
    <!-- Fancybox CSS -->

    <!-- date picker -->
    <link rel='stylesheet' href="{{ asset('public/frontend/date_picker/bootstrap-datepicker.min.css') }}">
    <link src="{{ asset('public/frontend/date_picker/date_picker.css') }}">
    </link>
    <!-- date picker -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!--scroll bar style-->
    <style>
        ::-webkit-scrollbar {
            background: #000000;
            height: 5px;
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 2px #73A9AD;
        }

        ::-webkit-scrollbar-thumb {
            background: #73A9AD;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #73A9AD;
        }
    </style>
    <!--scroll bar style-->


</head>

<body>

    <!-- main slider start -->

    <main>
        <div class="container-fluid position-relative nav_col">

            <a href="{{ url('/') }}">
                <img src="{{ asset('public/frontend/images/logo.jpg') }}" alt="logo" class="header_logo">
            </a>

            <div class="container d-flex d-lg-none justify-content-end align-items-center top_con">
                <div class="row text-end">
                    <div class="top_nav d-flex justify-content-end gap-4">

                        <a href="tel: {{ $contactDetails->contact_no }}">
                            <p class="mb-0"><i class="fa-solid fa-phone me-2"></i>
                                {{ $contactDetails->contact_no }}
                            </p>
                        </a>
                        <!-- ======================= -->
                        <a href="mailto:{{ $contactDetails->email }}">
                            <p class="mb-0"><i class="fa-regular fa-envelope me-2"></i>{{ $contactDetails->email }}
                            </p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container d-flex justify-content-end align-items-center top_con">
                <div class="row text-end">
                    <div class="top_nav justify-content-end gap-4 d-none d-lg-flex">

                        <a href="tel: {{ $contactDetails->contact_no }}">
                            <p class="mb-0"><i class="fa-solid fa-phone me-2"></i>
                                {{ $contactDetails->contact_no }}
                            </p>
                        </a>
                        <!-- ======================= -->
                        <a href="mailto:{{ $contactDetails->email }}">
                            <p class="mb-0"><i class="fa-regular fa-envelope me-2"></i>{{ $contactDetails->email }}
                            </p>
                        </a>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                                        href="{{ url('/') }}">Home</a>
                                </li>
                               
                                <li class="nav-item">
                                <a class="nav-link {{ request()->is('about-us') ? 'active' : ''}}"  href="{{ route('about-us') }}">About Us</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('rooms') ? 'active' : '' }}"
                                        href="{{ route('rooms') }}">Rooms</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('experience-detail') ? 'active' : '' }}"
                                        href="{{ route('experience-detail') }}">Experiences</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}"
                                        href="{{ route('gallery') }}">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-0 {{ request()->is('contact-us') ? 'active' : '' }}"
                                        href="{{ route('contact-us') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>

                <!-- =========================================== -->
                <!-- =========================================== -->
                <!-- =========================================== -->

                <div>
                    <a href="#">
                        <button class="blue_btn">
                            <i class="fa-solid fa-bell"></i>
                            BOOK NOW
                        </button>
                    </a>
                </div>

                {{-- mobile menu start --}}
                <div id="menuArea" class="d-lg-none d-block mobi_menu_btn">
                    <input type="checkbox" id="menuToggle"></input>

                    <label for="menuToggle" class="menuOpen">
                    <div class="open"></div>
                    </label>

                    <div class="menu menuEffects">
                    <label for="menuToggle"></label>
                    <div class="menuContent">
                        <ul>
                            <li>
                                <a class="mobi_nav_link {{ request()->is('/') ? 'active' : ''}}" aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                           
                            <li>
                                <a class="mobi_nav_link {{ request()->is('about-us') ? 'active' : ''}}"  href="{{ route('about-us') }}">About Us</a>
                            </li>
                            <li>
                                <a class="mobi_nav_link {{ request()->is('rooms') ? 'active' : ''}}"  href="{{ route('rooms') }}">Rooms</a>
                            </li>
                            <li>
                                <a class="mobi_nav_link {{ request()->is('experience-detail') ? 'active' : ''}}" href="{{ route('experience-detail') }}">Experiences</a>
                            </li>
                            <li>
                                <a class="mobi_nav_link {{ request()->is('gallery') ? 'active' : ''}}" href="{{ route('gallery') }}">Gallery</a>
                            </li>
                            <li>
                                <a class="mobi_nav_link {{ request()->is('contact-us') ? 'active' : ''}}" href="{{ route('contact-us') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                {{-- mobile menu end --}}

            </div>
        </div>
    </main>

    <!-- ============================== -->
    <!-- ============================== -->
