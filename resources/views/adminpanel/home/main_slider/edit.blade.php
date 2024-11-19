@section('title', 'Main Slider')
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
                        <a href="{{ route('main-slider') }}">
                            <button class="btn cms_top_btn top_btn_height ">{{ __('Add New') }}</button>
                        </a>

                        <a href="{{ route('main-slider-list') }}">
                            <button class="btn cms_top_btn top_btn_height">{{ __('View All') }}</button>
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
                    <h2>{{ __('Main Slider') }}</h2>
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
                        <form action="{{ route('save-main-slider') }}" enctype="multipart/form-data" method="post" id="main-slider-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Title') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="title_en" name="title_en" required value="{{ $data->title_en }}">
                                            
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <label class="label">{{ __('Order') }} <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="number" id="order" name="order" required value="{{ $data->order }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Status') }}</label>
                                        <label class="select">
                                            <select name="status" id="status">
                                                <option value="Y" {{ $data->status == 'Y' ? "selected" : "" }}>{{ __('Active') }}</option>
                                                <option value="N" {{ $data->status == 'N' ? "selected" : ""  }}>{{ __('Inactive') }}</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                                    <div class="row">
                                        <section class="col col-11" style="width: 100%;">
                                            <label class="label">{{ __('Description') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <textarea class="form-control summernote" id="description_en" name="description_en" rows="3" required>{{ $data->description_en }}</textarea>
                                                <span id="warning" style="display:none; color:red;">This value is required.</span>

                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="label">{{ __('Read More (URL)') }}</label>
                                            <label class="input">
                                                <input type="text" id="link" name="link" value="{{ $data->link }}" >
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">{{ __('Desktop Image') }} (1920 x 1080) <span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input" id="desktop_image" name="desktop_image" style="overflow: hidden;">
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <img id="preview-image-before-upload-desktop" src="../storage/app/{{ $data->desktop_image }}" alt="preview image" style="max-height: 250px;">
                                        </section>

                                        <section class="col col-2">
                                            <label class="label">{{ __('Mobile Image') }} (1920 x 1080) <span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input" id="mobile_image" name="mobile_image" style="overflow: hidden;">
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <img id="preview-image-before-upload-mobile" src="../storage/app/{{ $data->mobile_image }}" alt="preview image" style="max-height: 250px;">
                                        </section>
                                    </div>



                            </fieldset>
                            <footer>
                                <input type="hidden" name="id" value="{{ $data->id }}>">
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
                $('#main-slider-form').parsley();
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

            $('#button1id').click(function(event) {
            var summernoteContent = $('.summernote').summernote('isEmpty') ? '' : $('.summernote').summernote('code');
            
            if (summernoteContent.trim() === '') {
                event.preventDefault(); // Prevent form submission
                $('#warning').show(); // Show the warning message
            } else {
                $('#warning').hide();
            }
        });
            
        </script>

        <script type="text/javascript">
            $(document).ready(function(e) {

                $('#desktop_image').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-desktop').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

                $('#mobile_image').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-mobile').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

            });
        </script>
    </x-slot>
</x-app-layout>
