@section('title', 'Rooms - Home Content')
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
                <div class="col-lg-12"><br><br></div>
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
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                <header>
                    <h2>{{ __('Rooms - Home Content') }}</h2>
                </header>
                <div>
                    <div class="widget-body no-padding">
                        <form action="{{ route('save-room-home') }}" enctype="multipart/form-data" method="post" id="room-home-form" class="smart-form">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Heading') }}<span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required value="{{ $data->heading }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-11" style="width: 100%;">
                                        <label class="label">{{ __('Description') }}<span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <textarea class="form-control summernote" id="description" name="description" rows="3" required>{{ $data->description }}</textarea>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Sub Heading about Bedrock') }}<span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="subheading" name="subheading" required value="{{ $data->subheading }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-11" style="width: 100%;">
                                        <label class="label">{{ __('Sub Description about Bedrock') }}<span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <textarea class="form-control summernote" id="subdescription" name="subdescription" rows="3" required>{{ $data->subdescription }}</textarea>
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-2">
                                        <label class="label">{{ __('Slider Image 1') }} (800 x 1200) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image1" name="image1" style="overflow: hidden;" >
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <img id="preview-image1" src="storage/app/{{ $data->image1 }}" alt="preview image" style="max-height: 250px;">
                                    </section>

                                </div>
                            </fieldset>
                            <footer>
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <button id="button1id" name="button1id" type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <button type="button" class="btn btn-default" onclick="window.history.back();">
                                    {{ __('Back') }}
                                </button>
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(function(){
                $('#room-home-form').parsley();
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

                // Image Preview Functionality
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
    document.getElementById('image1').addEventListener('change', function() {
        previewImage(this, 'preview-image1');
    });

            });
        </script>
    </x-slot>
</x-app-layout>
