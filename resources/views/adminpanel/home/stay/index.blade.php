@section('title', 'Room - Home Content')
<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div id="main" role="main">
        <div id="ribbon">
        </div>
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
                    <h2>{{ __('Room - Home Content') }}</h2>
                </header>
                <div>
                    <div class="widget-body no-padding">
                        <form action="{{ route('save-stay-home') }}" enctype="multipart/form-data" method="post" id="stay-home-form" class="smart-form">
                            @csrf
                            @method('PUT')
                            <fieldset>


                                <div class="row">
                                    <section class="col col-2">
                                        <label class="label">{{ __('Slider Image 1') }} (1200 x 800) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image1" name="image1" style="overflow: hidden;" >
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <img id="preview-image1" src="storage/app/{{ $data->image1 }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                    <section class="col col-2">
                                        <label class="label">{{ __('Slider Image 2') }} (1200 x 800) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image2" name="image2" style="overflow: hidden;" >
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <img id="preview-image2" src="storage/app/{{ $data->image2 }}" alt="preview image" style="max-height: 250px;">
                                    </section>


                                    <section class="col col-2">
                                        <label class="label">{{ __('Slider Image 3') }} (1200 x 800) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image3" name="image3" style="overflow: hidden;" >
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <img id="preview-image3" src="storage/app/{{ $data->image3 }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-2">
                                        <label class="label">{{ __('Icon Image 1') }} (512 x 512) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="icon1" name="icon1" style="overflow: hidden;" >
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <img id="preview-icon1" src="storage/app/{{ $data->icon1 }}" alt="preview image" style="max-height: 250px; background-color: black;">
                                    </section>

                                        <section class="col col-4">
                                            <label class="label">{{ __('Icon 1 title') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="icon1_title" name="icon1_title" required value="{{ $data->icon1_title }}">
                                            </label>
                                        </section>

                                </div>
                                <div class="row">
                                    <section class="col col-2">
                                        <label class="label">{{ __('Icon Image 2') }} (512 x 512) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="icon2" name="icon2" style="overflow: hidden;  " >
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <img id="preview-icon2" src="storage/app/{{ $data->icon2 }}" alt="preview image" style="max-height: 250px; background-color: black;">
                                    </section>

                                    <section class="col col-4">
                                        <label class="label">{{ __('Icon 2 title') }}<span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="icon2_title" name="icon2_title" required value="{{ $data->icon2_title }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-2">
                                        <label class="label">{{ __('Icon Image 3') }} (512 x 512) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="icon3" name="icon3" style="overflow: hidden;  " >
                                        </label>
                                    </section>
                                    <section class="col col-2">
                                        <img id="preview-icon3" src="storage/app/{{ $data->icon3 }}" alt="preview image" style="max-height: 250px; background-color: black;">
                                    </section>

                                        <section class="col col-4">
                                            <label class="label">{{ __('Icon 3 title') }}<span style=" color: red;">*</span></label>
                                            <label class="input">
                                                <input type="text" id="icon3_title" name="icon3_title" required value="{{ $data->icon3_title }}">
                                            </label>
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
                $('#stay-home-form').parsley();
            });

            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 5000);


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
    document.getElementById('image2').addEventListener('change', function() {
        previewImage(this, 'preview-image2');
    });
    document.getElementById('image3').addEventListener('change', function() {
        previewImage(this, 'preview-image3');
    });
    document.getElementById('icon1').addEventListener('change', function() {
        previewImage(this, 'preview-icon1');
    });
    document.getElementById('icon2').addEventListener('change', function() {
        previewImage(this, 'preview-icon2');
    });
    document.getElementById('icon3').addEventListener('change', function() {
        previewImage(this, 'preview-icon3');
    });

        </script>
    </x-slot>
</x-app-layout>
