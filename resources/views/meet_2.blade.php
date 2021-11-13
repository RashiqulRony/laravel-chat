@extends('layouts.app')

@section('content')
    <iframe id="zoomSection" style="border:none; height: 600px; width: 100%;"
            src="https://zoom.us/wc/{{ $meetConfig['id'] }}/join?prefer=1&un=webapp&pwd={{ $meetConfig['password'] }}&un=webapp"
            sandbox="allow-forms allow-scripts allow-same-origin allow-pointer-lock allow-popups" allow="microphone; camera"></iframe>
@endsection

@push('scripts')
    <script>
        var myobj = document.getElementById("zmmtg-root");
        myobj.remove();

        // $('#zoomSection').contents().find('#header_container').removeClass("sliderContainer-full").addClass("sliderContainer-box");

        $('#zoomSection').contents().find('#header_container').append("<style>#header_outer {display: none!important;}</style>");

        // #header_container
    </script>
@endpush

