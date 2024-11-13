    <!-- ================================= -->
    <!-- ================================= -->

    <!-- footer start -->
    <div class="container-fluid cover_bg py-5" style="background-image: url('{{asset('public/frontend/images/footer_bg.jpg')}}');">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 right_border p-3">
              <a href="{{ url('/') }}">
              <img src="{{asset('public/frontend/images/logo.jpg')}}" alt="logo" class="footer_logo mb-3">
              </a>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
              aliqua. Ut enim ad minim veniam.  </p>
            </div>
            <!-- ========== -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 right_border p-5">
              <div class="contact_box mb-2">
                <p class="head">Navigation</p>

                <div class="row">
                  <div class="col-6">
                    <p class="detail ms-0">
                      <a href="{{ route('home') }}">
                        <i class="fa fa-long-arrow-right me-2"></i>
                        Home
                      </a>
                    </p>
                    <!-- ========== -->
                    <p class="detail ms-0">
                      <a href="">
                        <i class="fa fa-long-arrow-right me-2"></i>
                        About Us
                      </a>
                    </p>
                    <!-- ========== -->
                    <p class="detail ms-0">
                      <a href="{{ route('rooms') }}">
                        <i class="fa fa-long-arrow-right me-2"></i>
                        Rooms
                      </a>
                    </p>
                  </div>

                  <div class="col-6">
                    <p class="detail ms-0">
                      <a href="{{ route('experience-detail') }}">
                        <i class="fa fa-long-arrow-right me-2"></i>
                        Experiences
                      </a>
                    </p>
                    <!-- ========== -->
                    <p class="detail ms-0">
                      <a href="{{ route('gallery') }}">
                        <i class="fa fa-long-arrow-right me-2"></i>
                        Gallery
                      </a>
                    </p>
                    <!-- ========== -->
                    <p class="detail ms-0">
                      <a href="{{ route('contact-us') }}">
                        <i class="fa fa-long-arrow-right me-2"></i>
                        Contact Us
                      </a>
                    </p>
                  </div>
                </div>


              </div>

              <div class="contact_box">
                <p class="head">Online Booking</p>
                <div class="detail d-flex gap-3">
                @if($contactDetails->banking1 != "" && $contactDetails->banking1 != "#")
                  <a href="{{ $contactDetails->banking1 }}" target="_blank">
                     <img src="{{ asset('public/frontend/images/agoda_icon.jpg') }}" alt="online banking" class="w-100">
                  </a>
                @endif
                @if($contactDetails->banking2 != "" && $contactDetails->banking2 != "#")
                  <a href="{{ $contactDetails->banking2 }}" target="_blank">
                    <img src="{{ asset('public/frontend/images/booking_icon.png') }}" alt="online banking" class="w-100">
                  </a>
                @endif
                </div>
              </div>
            </div>
            <!-- ========== -->
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 p-5">

              <div class="contact_box mb-4">
                <p class="head">Phone Number</p>
                <p class="detail">
                  <a href="tel: {{ $contactDetails->contact_no }}">
                    {{ $contactDetails->contact_no }}
                  </a>
                </p>
              </div>

              <!-- ================== -->

              <div class="contact_box mb-4">
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
                <div class="detail d-flex gap-3">
                  
                  <div class="footer_social_icon">
                    @if($contactDetails->facebook_url != "" && $contactDetails->facebook_url != "#")
                    <a href="{{ $contactDetails->facebook_url }}" target="_blank">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    @endif
                  </div>

                  <div class="footer_social_icon">
                    @if($contactDetails->instagram_url != "" && $contactDetails->instagram_url != "#")
                    <a href="{{ $contactDetails->instagram_url }}" target="_blank">
                      <i class="fa-brands fa-instagram"></i>
                    </a>
                    @endif
                  </div>
                  

                  <div class="footer_social_icon">
                    @if($contactDetails->twitter_url != "" && $contactDetails->twitter_url != "#")
                    <a href="{{ $contactDetails->twitter_url }}" target="_blank">
                      <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    @endif
                  </div>

                  <div class="footer_social_icon">
                    @if($contactDetails->youtube_url != "" && $contactDetails->youtube_url != "#")
                    <a href="{{ $contactDetails->youtube_url }}" target="_blank">
                      <i class="fa-brands fa-youtube"></i>
                    </a>
                    @endif
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
       </div>
      <!-- footer end -->

      <!-- copyrights -->
       <div class="container-fluid" style="background-color: #019392;">
        <div class="container">
          <div class="row justify-content-center copyright_row">
            <div class="col-5">
              <p>
                Copyright © 2024 BEDROCK. All rights reserved.
              </p>
            </div>

            <div class="col-5">
              <p class="d-flex justify-content-end">
                Design & Developed by <span class="ms-1"><a href="https://www.tekgeeks.net/" target="_blank" >TekGeeks</a></span>
              </p>
            </div>
          </div>
        </div>
       </div>
      <!-- copyrights -->

      <!-- ================================= -->
      <!-- ================================= -->
      <!-- ================================= -->


      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="{{ asset('public/frontend/js/jquery-3.2.1.min.js')}}"></script>
      <script src="{{ asset('public/frontend/js/popper.min.js')}}" ></script>
      <script src="{{ asset('public/frontend/js/bootstrap.min.js')}}" ></script>

      <!-- owl carousel -->
      <script src="{{ asset('public/frontend/owl/owl.carousel.min.js')}}"></script>
      <script src="{{ asset('public/frontend/owl/owl_js.js')}}"></script>
      <!-- owl carousel -->

      <!-- Swiper JS -->
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

      <!-- loading effect -->
      <script src="{{ asset('public/frontend/js/aos.js')}}"></script>

       <!-- date picker -->

       <script src='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js'></script>

       <script src="{{ asset('public/frontend/date_picker/date_picker.js')}}"></script>
       <!-- date picker -->
      <script>
        AOS.init({
          easing: 'ease-out-back',
          duration: 1000
        });
      </script>
      <!-- loading effect -->

      <!-- Initialize Swiper -->
      <script>
        var swiper = new Swiper(".custom_swiper", {
          direction: "horizontal",
          spaceBetween: 0,
          loop: true,
          speed: 2000,
          grabCursor: true,
          autoplay: {
            delay:4000,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
      </script>


      <!-- scroll top -->
      <script type="module">
        import ScrollTop from 'https://cdn.skypack.dev/smooth-scroll-top';
        const scrollTop = new ScrollTop();
        scrollTop.init();
      </script>
      <!-- scroll top -->

      <!-- owl carousel -->
       <script>
        $('.rooms_owl').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            responsiveClass: true,
            responsive: {
              0: {
                items: 1,
                nav: false
              },
              600: {
                items: 3,
                nav: false
              },

              1199: {
                items: 3,
                nav: false,
                loop: true
              },

              1000: {
                items: 2,
                nav: false,
                loop: true
              }
            }
          })
       </script>

       <script>
        $('.expe_owl').owlCarousel({
          loop: true,
          margin: 10,
          responsiveClass: true,
          responsive: {
            0: {
              items: 1,
              nav: false
            },
            600: {
              items: 4,
              nav: false
            },

            1199: {
                items: 4,
                nav: false,
                loop: true
              },

            1000: {
              items: 3,
              nav: false,
              loop: true
            }
          }
        })
      </script>
      <!-- owl carousel -->

      <!-- Room -->
      <script>
        var swiper = new Swiper(".thumb-swiper", {
          loop: true,
          spaceBetween: 0,
          slidesPerView: 4,
          freeMode: true,
          watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".thumb-swiper2", {
          loop: true,
          spaceBetween: 0,
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          thumbs: {
            swiper: swiper,
          },
        });
      </script>
      <!-- Room -->

      <!-- gallery -->
      <script src="{{ asset('public/frontend/gallery/fancybox.min.js')}}"></script>
      <!-- gallery -->




    </body>
  </html>
