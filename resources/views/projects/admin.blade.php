@extends('layouts.tabler')
@section('title', 'Homepage')

@push('links')

	<script src="{{ asset('tabler/assets/js/require.min.js') }}"></script>
	<script>
		requirejs.config({
				baseUrl: '/tabler'
		});
	</script>

	<script src="{{ asset('js/app.js') }}" defer></script>

	<link href="{{ asset('tabler/assets/css/dashboard.css') }}" rel="stylesheet" />
	<script src="{{ asset('tabler/assets/js/dashboard.js') }}"></script>

	{{-- <!-- c3.js Charts Plugin -->
	<link href="{{ asset('tabler/assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
	<script src="{{ asset('tabler/assets/plugins/charts-c3/plugin.js') }}"></script> --}}
  <style>

  </style>
@endpush

@section('content')
  <projects-admin></projects-admin>
@endsection

@push('scripts')

@endpush		