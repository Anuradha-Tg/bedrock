@section('title', 'Contact Us Details')
<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div id="main" role="main">
        <!-- RIBBON -->
        <div id="ribbon">
        </div>
        <!-- END RIBBON -->
        <div id="content">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
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
                    <h2>{{ __('Contact Us Details') }}</h2>
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
                        <form action="{{ route('save-contact-us') }}" enctype="multipart/form-data" method="post" id="contactus-details-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Contact Number') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="contact_no" name="contact_no"  required value="{{ $data->contact_no }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Hotline') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="hotline" name="hotline"   value="{{ $data->hotline }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Email') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="email" name="email" required value="{{ $data->email }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Address') }} <span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ $data->address }}</textarea>
                                        </label>
                                    </section>
                                    {{-- <section class="col col-4">
                                        <label class="label">{{ __('Map') }} <span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <textarea class="form-control" id="map" name="map" rows="3" required>{{ $data->map }}</textarea>
                                        </label>
                                    </section> --}}
                                </div>
                                <div class="row">
                                    <section class="col col-10">

                                <header>
                                    {{ __('Social Media Links') }}
                                </header>
                            </section>

                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Facebook URL') }}</label>
                                        <label class="input">
                                            <input type="text" id="facebook_url" name="facebook_url" maxlength="190" value="{{ $data->facebook_url }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Instagram URL') }} </label>
                                        <label class="input">
                                            <input type="text" id="instagram_url" name="instagram_url" maxlength="190" value="{{ $data->instagram_url }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Twitter URL') }} </label>
                                        <label class="input">
                                            <input type="text" id="twitter_url" name="twitter_url" maxlength="190" value="{{ $data->twitter_url }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Youtube URL') }} </label>
                                        <label class="input">
                                            <input type="text" id="youtube_url" name="youtube_url" maxlength="190" value="{{ $data->youtube_url }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-10">

                                <header>
                                    {{ __('Online Banking Links') }}
                                </header>
                            </section>

                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Online Banking URL 1') }}</label>
                                        <label class="input">
                                            <input type="text" id="banking1" name="banking1" maxlength="190" value="{{ $data->banking1 }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Online Banking URL 2') }} </label>
                                        <label class="input">
                                            <input type="text" id="banking2" name="banking2" maxlength="190" value="{{ $data->banking2 }}">
                                        </label>
                                    </section>
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
        <script>
            $(function(){
                $('#contactus-details-form').parsley();
            });
        </script>
    </x-slot>
</x-app-layout>
