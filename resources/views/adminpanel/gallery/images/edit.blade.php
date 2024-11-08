@section('title', 'Edit Images')

<x-app-layout>
    <x-slot name="header"></x-slot>

    <div id="main" role="main">
        <!-- RIBBON -->
        <div id="ribbon"></div>
        <!-- END RIBBON -->
        <div id="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row cms_top_btn_row" style="margin-left:auto;margin-right:auto;">
                        <a href="{{ route('images') }}">
                            <button class="btn cms_top_btn top_btn_height ">{{ __('Add New') }}</button>
                        </a>

                        <a href="{{ route('images-list') }}">
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
                    <h2>{{ __('Images') }}</h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox"></div>
                    <!-- end widget edit box -->
                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <form action="{{ route('save-images') }}" enctype="multipart/form-data" method="post" id="images-form" class="smart-form">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">Category</label>
                                        <label class="select">
                                            <select name="category_id" required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>

                                </div>
                                <section class="col col-4">
                                    <label class="label">{{ __('Image') }} (1920 x 1080) <span style="color: red;">*</span></label>
                                    <label class="input">
                                        <input type="file" class="form-control form-input" id="image" name="image" style="overflow: hidden;">
                                    </label>
                                </section>
                                {{-- <section class="col col-2">
                                    <img id="preview-image-before-upload" src="../storage/app/{{ $data->images}}" alt="preview image" style="max-height: 250px;">
                                </section> --}}
                                        <section class="col col-2">
                                            <label class="label">{{ __('Order') }} <span style="color: red;">*</span></label>
                                            <label class="input">
                                                <input type="number" class="form-control form-input" name="images[{{ $loop->index }}][image_order]" min="0" value="{{ $image->image_order }}" required>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <button type="button" class="btn-sm btn-danger remove-image" data-image-id="{{ $image->id }}">{{ __('Remove') }}</button>
                                        </section>
                                    </div>


                                    <div class="row image-upload-wrapper">
                                        <section class="col col-2">
                                            <label class="label">{{ __('Image') }} (1920 x 1080)</label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input image-input" name="images[][image_name]" style="overflow: hidden;" >
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">{{ __('Order') }} </label>
                                            <label class="input">
                                                <input type="number" class="form-control form-input" name="images[][image_order]" min="0" value="" >
                                            </label>
                                        </section>

                                        <section class="col col-2">
                                            <button type="button" class="btn-sm btn-success add-image">{{ __('Add More') }}</button>
                                        </section>
                                    </div>
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
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </div>
    </div>
    <x-slot name="script">
        <script>
            $(function(){
                $('#images-form').parsley();

                // Preview the selected image
                $('#image').on('change', function() {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                });

                // Add more image upload fields
                $(document).on('click', '.add-image', function() {
                    var imageUploadSection = $('#image-upload-section');
                    var newImageUploadWrapper = `
                        <div class="row image-upload-wrapper">
                            <section class="col col-2">
                                <label class="label">{{ __('Image') }} (1920 x 1080) <span style="color: red;">*</span></label>
                                <label class="input">
                                    <input type="file" class="form-control form-input image-input" name="images[][image_name]" style="overflow: hidden;" required>
                                </label>
                            </section>
                            <section class="col col-2">
                                <label class="label">{{ __('Order') }} <span style="color: red;">*</span></label>
                                <label class="input">
                                    <input type="number" class="form-control form-input" name="images[][image_order]" min="0" value="" required>
                                </label>
                            </section>
                            <section class="col col-2">
                                <button type="button" class="btn-sm btn-danger remove-image">{{ __('Remove') }}</button>
                            </section>
                        </div>`;
                    imageUploadSection.append(newImageUploadWrapper);
                });

                // Remove image upload field
                $(document).on('click', '.remove-image', function() {
                    $(this).closest('.image-upload-wrapper').remove();
                });

                $(document).on('click', '.remove-image', function() {
                    var imageId = $(this).data('image-id');
                    if (imageId) {
                    var deleteImagesInput = $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'delete_images[]')
                    .attr('value', imageId);
                    $('#gallery-form').append(deleteImagesInput);
                    }
                    $(this).closest('.image-upload-wrapper').remove();
                });

            });

        </script>
        <script>

                setTimeout(function() {
                    $('.alert').fadeOut('fast');

                    sessionStorage.removeItem('success');
                }, 5000);
        </script>

    </x-slot>
</x-app-layout>
