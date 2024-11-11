@section('title', 'Promotion')
<x-app-layout>


    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
                        <a href="{{ route('promotion') }}">
                            <button class="btn cms_top_btn top_btn_height cms_top_btn_active">{{ __('Add New') }}</button>
                        </a>
                        <a href="{{ route('promotion-list') }}">
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
                    <h2>{{ __('Experience List') }}</h2>
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
                        <form action="{{ route('new-promotion') }}" enctype="multipart/form-data" method="post" id="promotion-form" class="smart-form">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Title') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required>
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <label class="label">{{ __('Date From') }} <span style="color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="date_from" name="date_from" value="" required>
                                        </label>
                                    </section>
                                        <section class="col col-2">
                                            <label class="label">{{ __('Date To') }} <span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="date_to" name="date_to" value="" required>
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
                                            <label class="label">{{ __('Description') }} <span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <textarea class="form-control summernote" id="description" name="description" rows="3" required></textarea>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-2">
                                            <label class="label">{{ __('Slider Image') }} (1920 x 600) <span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input" id="image" name="image" style="overflow: hidden;" required>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <img id="preview-image" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
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
                                            <label class="label">{{ __('Home Image ') }} (800 x 1200) </label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input" id="home_image1" name="home_image1" style="overflow: hidden;" >
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <img id="preview-home_image1" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
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
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                $(function(){
                    $('#promotion-form').parsley();
                });

                $(document).ready(function() {

                    $('.summernote').summernote({
                        height: 200,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
                            ['fontname', ['fontname']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'para']], // List options
                            // ['para', ['paragraph']],
                            ['height', ['height']],
                            // ['table', ['table']],
                            // ['insert', ['link', 'picture', 'hr']],
                            // ['view', ['fullscreen', 'codeview', 'help']]
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
    document.getElementById('image').addEventListener('change', function() {
        previewImage(this, 'preview-image');
    });

    document.getElementById('home_image1').addEventListener('change', function() {
        previewImage(this, 'preview-home_image1');
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



                document.addEventListener('DOMContentLoaded', function () {
                // Initialize Date picker for 'Date From'
                let dateFromPicker = flatpickr("#date_from", {
                    dateFormat: "d-m-Y",   // Day-Month-Year format
                    defaultDate: "today",  // Default to today's date
                    allowInput: true,      // Enable manual typing
                    onChange: function(selectedDates, dateStr, instance) {
                        // Update the 'minDate' of 'Date To' based on the selected 'Date From'
                        dateToPicker.set('minDate', dateStr); // Set minDate of date_to to selected date_from
                    }
                });

                // Initialize Date picker for 'Date To'
                let dateToPicker = flatpickr("#date_to", {
                    dateFormat: "d-m-Y",   // Day-Month-Year format
                    defaultDate: "today",  // Default to today's date
                    minDate: "today",      // Disable past dates
                    allowInput: true       // Enable manual typing
                });
            });


            </script>

        </x-slot>
    </x-app-layout>

