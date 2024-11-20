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

<div class="container mt-5">
    <div class="row inq_row">

        <div class="offset-xxl-1 col-xxl-8 offset-xl-1 col-xl-8 offset-lg-1 col-lg-8 offset-md-1 col-md-8 col-sm-12 col-12">
            <div class="text_box">

                <h4 data-aos="fade-up">Inquiries</h4>

                <h2 class="mb-3" data-aos="fade-down">We're Here to Connect and Assist You</h2>

                <p>Have questions or need assistance? We're here to help! Reach out to us for inquiries about our
                    accommodations,
                    activities, or bookings, and our friendly team will be delighted to assist you. Your journey to
                    experience the beauty
                    and adventure of Kalpitiya starts with a simple message. Let's create unforgettable memories
                    together!
                </p>

            </div>
        </div>

        <div class="offset-xxl-1 col-xxl-9 offset-xl-1 col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 cover_bg d-flex align-items-center"
                    style="background-image: url({{ asset('public/frontend/images/wave_bg.jpg') }}); box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;">
                    <div class=" contact_col row">

                            <div class="contact_box mb-4 col-6 col-md-12">
                                <p class="head">Address</p>
                                <p class="detail">
                                    {{ $contactDetails->address }}
                                </p>
                            </div>

                            <!-- ================== -->

                            <div class="contact_box mb-4 col-6 col-md-12">
                                <p class="head">Phone Number</p>
                                <p class="detail">
                                    <a href="tel: {{ $contactDetails->contact_no }}">
                                        {{ $contactDetails->contact_no }}
                                    </a>
                                </p>
                            </div>

                            <!-- ================== -->

                            <div class="contact_box mb-4 col-12 col-md-12">
                                <p class="head">Email Address</p>
                                <p class="detail">
                                    <a href="mailto:{{ $contactDetails->email }}">
                                        {{ $contactDetails->email }}
                                    </a>
                                </p>
                            </div>

                            <!-- ================== -->

                            <div class="contact_box mb-4 col-6 col-md-12">
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

                            <div class="contact_box mb-0 col-6 col-md-12">
                                <p class="head">Online Booking</p>
                                <div class="detail d-flex gap-3">
                                    @if($contactDetails->banking1 !='' && $contactDetails->banking1 !='#')
                                    <a href="{{ $contactDetails->banking1 }}" target="_blank">
                                        <img src="{{ asset('public/frontend/images/airbnb.png') }}"
                                            alt="online booking" class="w-100">
                                    </a>
                                    @endif
                                    @if($contactDetails->banking2 !='' && $contactDetails->banking2 !='#')
                                    <a href="{{ $contactDetails->banking2 }}" target="_blank">
                                        <img src="{{ asset('public/frontend/images/booking_icon.png') }}"
                                            alt="online booking" class="w-100">
                                    </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                </div>

                <!-- ============= -->
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 dark_bg py-4 px-5"
                    style="z-index: 9;">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form id="inquiry_form" name="inquiry_form" action="{{ route('new-enquiry') }}"
                        enctype="multipart/form-data" method="post" class="smart-form">
                        @csrf
                        <div class="row form_row">

                            <div class="col-12">
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
                                    <label for="floatingInputEmail">Email Address</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="mobile_no" class="form-control" id="mobile_no"
                                        required="" placeholder="Mobile Number" fdprocessedid="kcqaug">
                                    <label for="floatingInput">Mobile Number</label>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                <div class="form-floating d-flex mb-3">
                                    <input type="text"
                                        class="datepicker_input form-control shadow-none datepicker-input"
                                        id="check_in" required="" placeholder="DD/MM/YYYY" fdprocessedid="d9zs0c"
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
                                        autocomplete="off" required="" name="check_out">
                                    <label for="datepicker1">Check Out</label>
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select shadow-none" name="country" id="country"
                                        aria-label="Floating label select example" fdprocessedid="i20ioc">
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Japan">Japan</option>
                                    </select>
                                    <label for="country">Country</label>
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
        </div>
    </div>
</div>




<div class="clearfix"></div>

<div class="container-fluid p-0 map_con mb-4">
    <div style="width: 100%"><iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0"
            marginwidth="0"
            src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=en&amp;q=bedrock%20kalpitiya+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
            href="https://www.gps.ie/">gps tracker sport</a></iframe></div>
    </div>
</div>

<!-- ================================= -->
<!-- ================================= -->
@include('frontend.includes.footer')






