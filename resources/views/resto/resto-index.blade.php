@extends('layouts.tabler')

@push('links')
    {{-- <script src="{{ asset('tabler/assets/js/require.min.js') }}"></script>
    <script>
    requirejs.config({
        baseUrl: 'tabler'
    });
    </script> --}}

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Dashboard Core -->
    <link href="{{ asset('tabler/assets/css/dashboard.css') }}" rel="stylesheet" />
    {{-- <script src="{{ asset('tabler/assets/js/dashboard.js') }}"></script> --}}
@endpush    

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <resto-group :restos="{{ json_encode($restos) }}"><resto-group>
        </div>
    </div>
</div>
@endsection