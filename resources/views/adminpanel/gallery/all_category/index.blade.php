@section('title', 'All Category Images')
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
                        <a href="{{ route('all-category') }}">
                            <button class="btn cms_top_btn top_btn_height cms_top_btn_active">{{ __('Add New') }}</button>
                        </a>
                        <a href="{{ route('all-category-list') }}">
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
                    <h2>{{ __('All Category Images') }}</h2>
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
                        <form action="{{ route('new-all-category') }}" enctype="multipart/form-data" method="post" id="all-category-form" class="smart-form">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <section class="col col-2">
                                        <label class="label">{{ __(' Image ') }} (1200 x 800) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image" name="image" style="overflow: hidden;" required>
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <img id="preview-image" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                    </section>

                                <section class="col col-2">
                                    <label class="label">{{ __('Order') }} <span style=" color: red;">*</span></label>
                                    <label class="input">
                                        <input type="number" id="order" name="order" value="" required>
                                    </label>
                                </section>



                                        <section class="col col-12">
                                            {{-- <label class="label">{{ __('Show in the Home page') }}</label> --}}
                                            <div style="display:  flex-wrap: wrap; gap: 100px;">

                                            <label class="checkbox" style="display: flex; align-items: center;  gap: 100px;">

                                                    <input type="checkbox" name="checkbox" value="1" >
                                                    <i></i>Show in the Home page
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
                    $('#all-category-form').parsley();
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

</script>


        </x-slot>
    </x-app-layout>

