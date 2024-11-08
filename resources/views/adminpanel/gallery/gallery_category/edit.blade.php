@section('title', 'Edit Gallery')

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
                        <a href="{{ route('gallery-detail') }}">
                            <button class="btn cms_top_btn top_btn_height ">{{ __('Add New') }}</button>
                        </a>

                        <a href="{{ route('gallery-list') }}">
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
                    <h2>{{ __('Gallery') }}</h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox"></div>
                    <!-- end widget edit box -->
                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <form action="{{ route('save-gallery') }}" enctype="multipart/form-data" method="post" id="gallery-form" class="smart-form">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Category Name') }}<span style="color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $data->category_name }}" required>
                                        </label>
                                    </section>



                                    <section class="col col-4">
                                        <label class="label">{{ __('Status') }}</label>
                                        <label class="select">
                                            <select name="status" id="status">
                                                <option value="Y" {{ $data->status == 'Y' ? "selected" : "" }}>{{ __('Active') }}</option>
                                                <option value="N" {{ $data->status == 'N' ? "selected" : ""  }}>{{ __('Inactive') }}</option>
                                            </select>

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
                $('#gallery-form').parsley();

                // Preview the selected image
                
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
            //                 <section class="col col-2">
            //                     <button type="button" class="btn-sm btn-danger remove-image">{{ __('Remove') }}</button>
            //                 </section>
            //             </div>`;
            //         imageUploadSection.append(newImageUploadWrapper);
            //     });

            //     // Remove image upload field
            //     $(document).on('click', '.remove-image', function() {
            //         $(this).closest('.image-upload-wrapper').remove();
            //     });

            //     $(document).on('click', '.remove-image', function() {
            //         var imageId = $(this).data('image-id');
            //         if (imageId) {
            //         var deleteImagesInput = $('<input>')
            //         .attr('type', 'hidden')
            //         .attr('name', 'delete_images[]')
            //         .attr('value', imageId);
            //         $('#gallery-form').append(deleteImagesInput);
            //         }
            //         $(this).closest('.image-upload-wrapper').remove();
            //     });

            // });

        </script>
        <script>

                setTimeout(function() {
                    $('.alert').fadeOut('fast');

                    sessionStorage.removeItem('success');
                }, 5000);
        </script>

    </x-slot>
</x-app-layout>
      {{-- <div id="image-upload-section">
                                    @foreach($images as $image)
                                    <div class="row image-upload-wrapper">
                                        <section class="col col-2">
                                            <label class="label">{{ __('Image') }} (1920 x 1080) <span style="color: red;">*</span></label>
                                            <label class="input">
                                                <input type="file" class="form-control form-input image-input" name="images[{{ $loop->index }}][image_name]" style="overflow: hidden;">
                                                <img src="{{ asset('storage/app/' . $image->image_name) }}" alt="image preview" style="max-height: 100px; margin-top: 10px;">
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="label">{{ __('Order') }} <span style="color: red;">*</span></label>
                                            <label class="input">
                                                <input type="number" class="form-control form-input" name="images[{{ $loop->index }}][order]" min="0" value="{{ $image->order }}" required>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <button type="button" class="btn-sm btn-danger remove-image" data-image-id="{{ $image->id }}">{{ __('Remove') }}</button>
                                        </section>
                                    </div>
                                    @endforeach
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
                                                <input type="number" class="form-control form-input" name="images[][order]" min="0" value="" >
                                            </label>
                                        </section>

                                        <section class="col col-2">
                                            <button type="button" class="btn-sm btn-success add-image">{{ __('Add More') }}</button>
                                        </section>
                                    </div>
                                </div> --}}
