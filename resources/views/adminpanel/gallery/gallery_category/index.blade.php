@section('title', 'Gallery Categories')
<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div id="main" role="main">
        <div id="ribbon"></div>
        <div id="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row cms_top_btn_row" style="margin-left:auto;margin-right:auto;">
                        <a href="{{ route('gallery-detail') }}">
                            <button class="btn cms_top_btn top_btn_height cms_top_btn_active">{{ __('Add New') }}</button>
                        </a>
                        <a href="{{ route('gallery-list') }}">
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

            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                <header>
                    <h2>{{ __('Gallery') }}</h2>
                </header>

                <div>
                    <div class="jarviswidget-editbox"></div>
                    <div class="widget-body no-padding">
                        <form action="{{ route('new-gallery') }}" enctype="multipart/form-data" method="post" id="gallery-category-form" class="smart-form">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Category Name') }}<span style="color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="category_name" name="category_name" required>
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
                                {{-- <div id="image-upload-section">
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
                                                <input type="number" class="form-control form-input" name="images[][order]" min="0" value="" required>
                                            </label>
                                        </section>
                                        <section class="col col-2" style="display: flex; align-items: flex-end;">
                                            <button type="button" class="btn-sm btn-success add-image">{{ __('Add More') }}</button>
                                        </section>
                                    </div>
                                </div>
                                <div id="video-upload-section">
                                    <div class="row video-upload-wrapper">
                                        <section class="col col-2">
                                            <label class="label">{{ __('Video') }} <span style="color: red;">*</span></label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input video-input" name="videos[][video_name]" style="overflow: hidden;" required>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">{{ __('Order') }} <span style="color: red;">*</span></label>
                                            <label class="input">
                                                <input type="number" class="form-control form-input" name="videos[][order]" min="0" value="" required>
                                            </label>
                                        </section>
                                        <section class="col col-2" style="display: flex; align-items: flex-end;">
                                            <button type="button" class="btn-sm btn-success add-video">{{ __('Add More') }}</button>
                                        </section>
                                    </div>
                                </div>
                                 --}}
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
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            $(function(){
                $('#gallery-category-form').parsley();

                // Preview the selected thumbnail
                
            });

            //     // Add more image upload fields
            //     $(document).on('click', '.add-image', function() {
            //         var imageUploadSection = $('#image-upload-section');
            //         var newImageUploadWrapper = `
            //             <div class="row image-upload-wrapper">
            //                 <section class="col col-2">
            //                     <label class="label">{{ __('Image') }} (1920 x 1080) <span style="color: red;">*</span></label>
            //                     <label class="input">
            //                         <input type="file" class="form-control form-input image-input" name="images[][image_name]" style="overflow: hidden;" required>
            //                     </label>
            //                 </section>
            //                 <section class="col col-2">
            //                     <label class="label">{{ __('Order') }} <span style="color: red;">*</span></label>
            //                     <label class="input">
            //                         <input type="number" class="form-control form-input" name="images[][order]" min="0" value="" required>
            //                     </label>
            //                 </section>
            //                 <section class="col col-2" style="display: flex; align-items: flex-end;">
            //                     <button type="button" class="btn-sm btn-danger remove-image">{{ __('Remove') }}</button>
            //                 </section>
            //             </div>`;
            //         imageUploadSection.append(newImageUploadWrapper);
            //     });
            //     $(document).on('click', '.add-video', function() {
            //         var videoUploadSection = $('#video-upload-section');
            //         var newVideoUploadWrapper = `
            //             <div class="row video-upload-wrapper">
            //                 <section class="col col-2">
            //                     <label class="label">{{ __('Video') }} <span style="color: red;">*</span></label>
            //                     <label class="input">
            //                         <input type="file" class="form-control form-input video-input" name="videos[][video_name]" style="overflow: hidden;" required>
            //                     </label>
            //                 </section>
            //                 <section class="col col-2">
            //                     <label class="label">{{ __('Order') }} <span style="color: red;">*</span></label>
            //                     <label class="input">
            //                         <input type="number" class="form-control form-input" name="videos[][order]" min="0" value="" required>
            //                     </label>
            //                 </section>
            //                 <section class="col col-2" style="display: flex; align-items: flex-end;">
            //                     <button type="button" class="btn-sm btn-danger remove-video">{{ __('Remove') }}</button>
            //                 </section>
            //             </div>`;
            //         videoUploadSection.append(newVideoUploadWrapper);
            //     });

            //     $(document).on('click', '.remove-video', function() {
            //     $(this).closest('.video-upload-wrapper').remove();
            //     });


            //     // Remove image upload field
            //     $(document).on('click', '.remove-image', function() {
            //         $(this).closest('.image-upload-wrapper').remove();
            //     });

            // });

            setTimeout(function() {
                    $('.alert').fadeOut('fast');
                }, 5000);
        </script>

    </x-slot>
</x-app-layout>
