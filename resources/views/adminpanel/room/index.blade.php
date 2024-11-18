@section('title', 'Rooms')
<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <style>
            .note-editable {
                min-height: 300px !important;
            }
            .note-editable ul {
                list-style: disc !important;
                list-style-position: inside !important;
            }
            .note-editable ol {
                list-style: decimal !important;
                list-style-position: inside !important;
            }
        </style>
    </x-slot>

    <div id="main" role="main">
        <!-- RIBBON -->
        <div id="ribbon">
        </div>
        <!-- END RIBBON -->
        <div id="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row cms_top_btn_row" style="margin-left:auto;margin-right:auto;">
                        <a href="{{ route('room') }}">
                            <button class="btn cms_top_btn top_btn_height cms_top_btn_active">{{ __('Add New') }}</button>
                        </a>
                        <a href="{{ route('room-list') }}">
                            <button class="btn cms_top_btn top_btn_height ">{{ __('View All') }}</button>
                        </a>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                <header>
                    <h2>{{ __('Room List') }}</h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->
                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <form action="{{ route('new-room') }}" enctype="multipart/form-data" method="post" id="room-form" class="smart-form">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Title') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="title" name="title" required>
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('SubTitle') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="subtitle" name="subtitle" required>
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Status') }}</label>
                                        <label class="select">
                                            <select name="status" id="status">
                                                <option value="Y">{{ __('Active') }}</option>
                                                <option value="N">{{ __('Inactive') }}</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>


                                    <div class="row">
                                        <section class="col col-11" style="width: 100%;">
                                            <label class="label">{{ __('Description 1') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <textarea class="form-control summernote" id="description1" name="description1" rows="3" required></textarea>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-11" style="width: 100%;">
                                            <label class="label">{{ __('Description 2') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <textarea class="form-control summernote" id="description2" name="description2" rows="3" required></textarea>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Villa Size') }}<span style="color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="room_size" name="room_size" required>
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Rooms Bed') }}<span style="color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="rooms_bed" name="rooms_bed" required>
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Occupancy') }}<span style="color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="occupancy" name="occupancy" required>
                                        </label>
                                    </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-2">
                                            <label class="label">{{ __('Character Image') }} (800 x 1175) </label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input" id="character_image" name="character_image" style="overflow: hidden;" required>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <img id="preview-character-image" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                        </section>


                                    </div>
                                    <div class="row">
                                        <section class="col col-12">
                                            <label class="label">{{ __('Room Features') }}</label>
                                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                @foreach ($features as $feature)
                                            <label class="checkbox" style="display: flex; align-items: center; gap: 10px;">

                                                    <input type="checkbox" name="features[{{ $feature->id }}]" value="1">
                                                    <i></i> {{ $feature->feature_name }}
                                                </label>
                                            @endforeach

                                        </section>


                                        <section class="col col-12 gap: 100px;">
                                            <label class="label">{{ __('Room Facilities') }}</label>
                                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                @foreach ($facilities as $facility)
                                            <label class="checkbox" style="display: flex; align-items: center; gap: 10px;">

                                                    <input type="checkbox" name="facilities[{{ $facility->id }}]" value="1">
                                                    <i></i> {{ $facility->facility_name }}
                                                </label>
                                            @endforeach
                                        </section>

                                        <section class="col col-12 gap: 100px;">
                                            <label class="label">{{ __('Listing Page Room Facilities') }}</label>
                                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                @foreach ($listingFeatures as $listingFeature)
                                            <label class="checkbox" style="display: flex; align-items: center; gap: 10px;">

                                                    <input type="checkbox" name="listingFeatures[{{ $listingFeature->id }}]" value="1">
                                                    <i></i> {{ $listingFeature->feature_name }}
                                                </label>
                                            @endforeach
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">{{ __('Home Title') }} </label>
                                            <label class="input">
                                                <input type="text" id="home_title" name="home_title" >
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="label">{{ __('Home Content') }}  </label>
                                            <label class="input">
                                                <textarea class="form-control" id="home_content" name="home_content" rows="3" ></textarea>
                                            </label>
                                        </section>
                                        <section class="col col-12">
                                            {{-- <label class="label">{{ __('Show in the Home page') }}</label> --}}
                                            <div style="display:  flex-wrap: wrap; gap: 100px;">

                                            <label class="checkbox" style="display: flex; align-items: center;  gap: 100px;">

                                                    <input type="checkbox" name="checkbox" value="1" >
                                                    <i></i>Show in the Home page
                                                </label>
                                                <span id="checkbox-warning" style="display:none; color:red;">Home Title and Home Content are required to show this on the homepage</span>

                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-2">
                                            <label class="label">{{ __('Home Image 1') }} (800 x 1000) </label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input" id="home_image1" name="home_image1" style="overflow: hidden;" >
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <img id="preview-home_image1" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                        </section>


                                    </div>

                                    

                                    {{-- <div class="row">
                                        <section class="col col-12" style="width: 100%;">
                                            <label class="label">{{ __('Page Title') }} <span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="page_title" name="page_title" required>
                                                
                                            </label>
                                        </section>
                                    </div> --}}
                                    <div class="row">
                                        <section class="col col-12"  style="width: 100%;">
                                            <label class="label">{{ __('Description') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="description" name="description" >
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-12"  style="width: 100%;">
                                            <label class="label">{{ __('Keywords') }}</label>
                                            <label class="input">
                                                <input type="text" id="keywords" name="keywords" >
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-12"  style="width: 100%;">
                                            <label class="label">{{ __('OG Title') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="og_title" name="og_title" required>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-12"  style="width: 100%;">
                                            <label class="label">{{ __('OG Type') }} <span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="og_type" name="og_type" required>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-12"  style="width: 100%;">
                                            <label class="label">{{ __('OG Tag') }} <span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="og_tag" name="og_tag" required>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-12"  style="width: 100%;">
                                            <label class="label">{{ __('OG Url') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="og_url" name="og_url" required>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-12" style="width: 100%;">
                                            <label class="label">{{ __('OG Image') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input" id="og_image" name="og_image" style="overflow: hidden;">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                           
                                            <img id="preview-image-before-upload" src="{{ asset('public/back/img/whitebg.jpg') }}" alt="default image" style="max-height: 250px;">
                                            
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-12"  style="width: 100%;">
                                            <label class="label">{{ __('OG Sitename') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="og_sitename" name="og_sitename" required>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-12"  style="width: 100%;">
                                            <label class="label">{{ __('OG Description') }}</label>
                                            <label class="input">
                                                <input type="text" id="og_description" name="og_description" >
                                            </label>
                                        </section>
                                    </div>

                                    

                            </fieldset>
                            <footer>
                                <button id="button1id" name="button1id" type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <button type="button" class="btn btn-default" onclick="window.history.back();">
                                    {{ __('Back') }}
                                </button>
                            </footer>
                        </form>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </div>
    </div>
    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        <script>
            $(function(){
                //window.ParsleyValidator.setLocale('ta');
                $('#room-form').parsley();
            });

            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 5000);

            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'para']],
                        ['height', ['height']],
                        ['view', ['codeview']]
                    ]
                });
            });

            function previewImage(input, previewId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listeners for each file input

    document.getElementById('home_image1').addEventListener('change', function() {
        previewImage(this, 'preview-home_image1');
    });
    document.getElementById('og_image').addEventListener('change', function() {
        previewImage(this, 'preview-image-before-upload');
    });
    document.getElementById('character_image').addEventListener('change',function(){
        previewImage(this, 'preview-character-image');
    });

</script>

<script>
    $(document).ready(function () {

        // Check initial conditions when the page loads
        checkFields();

        // Event listener to check fields and toggle submit button based on checkbox
        $('input[type="checkbox"]').change(function() {
            checkFields();
        });

        // Function to check if Home Title or Home Content is empty and toggle submit button and message
        function checkFields() {
            const homeTitle = $('#home_title').val();
            const homeContent = $('#home_content').val();
            const checkbox = $('input[name="checkbox"]');
            const checkboxWarning = $('#checkbox-warning');
            const submitButton = $('#button1id');

            if (checkbox.is(':checked') && (!homeTitle || !homeContent)) {
                // If checkbox is checked and Home Title or Home Content is empty, show warning and disable submit button
                checkboxWarning.show();
                submitButton.prop('disabled', true);
            } else {
                // If conditions are met, hide warning and enable submit button
                checkboxWarning.hide();
                submitButton.prop('disabled', false);
            }
        }

        // Event listeners to check on keyup or change
        $('#home_title, #home_content').on('keyup change', function () {
            checkFields();
        });
    });
</script>
    </x-slot>
</x-app-layout>
