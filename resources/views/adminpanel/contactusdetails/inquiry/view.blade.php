@section('title', 'Inquiry')
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
                    <div class="row cms_top_btn_row" style="margin-left:auto;margin-right:auto;">
                        <a href="{{ route('inquiry-list') }}">
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
                    <h2>{{ __('Inquiry') }}</h2>
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
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width:100% ;  border-style: hidden">
                                <tbody style=" border-style: hidden">
                                    <tr style=" border-style: hidden">
                                        <td style="width: 20%;">{{ __('Full Name') }} </td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->full_name }}</td>
                                    </tr>
                                    {{-- <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">{{ __('Contact Number') }} </td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->tel }}</td>
                                    </tr> --}}
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">{{ __('Email') }} </td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->email }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">{{ __('Check In Date') }} </td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->check_in }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">{{ __('Check Out Date') }} </td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->check_out }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">{{ __('Country') }} </td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->country }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">{{ __('Message') }} </td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->message }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                        </div>
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
                $('#inquiry-form').parsley();
            });
        </script>
    </x-slot>
</x-app-layout>
