@extends('layouts.tabler')

@section('links')
    {{-- <script src="{{ asset('tabler/assets/js/require.min.js') }}"></script>
    <script>
    requirejs.config({
        baseUrl: 'tabler'
    });
    </script> --}}

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Dashboard Core -->

    {{-- <script src="{{ asset('tabler/assets/js/dashboard.js') }}"></script> --}}

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <menu-container :items="{{ json_encode($menus) }}" :resto-id="{{ $restoId }}"><menu-container>
        </div>
    </div>
</div>
@endsection