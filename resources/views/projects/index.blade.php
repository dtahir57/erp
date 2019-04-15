@extends('layouts.tabler')
@section('title', 'Homepage')

@push('links')

	<script src="{{ asset('tabler/assets/js/require.min.js') }}"></script>
	<script>
		requirejs.config({
				baseUrl: 'tabler'
		});
	</script>

	<script src="{{ asset('js/app.js') }}" defer></script>

	<link href="{{ asset('tabler/assets/css/dashboard.css') }}" rel="stylesheet" />
	<script src="{{ asset('tabler/assets/js/dashboard.js') }}"></script>

	<!-- c3.js Charts Plugin -->
	<link href="{{ asset('tabler/assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
	<script src="{{ asset('tabler/assets/plugins/charts-c3/plugin.js') }}"></script>
  <style>
    .card {
      margin-bottom: -5px;
    }
  </style>
@endpush

@section('content')
  <div class="my-3 my-md-5">
    <div class="container">
      <a class="text-muted pull-right" href="{{ route('projects.admin') }}" target="_blank">Admin</a>
      <div class="row col-8 offset-2">
        <div class="col-md-6 col-xl-4 offset-4">
          <div class="card">
            <div class="card-status bg-red"></div>
            <div class="card-header">
              <h3 class="card-title">Laxyo Protocol</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt
            </div>
          </div>
        </div>
      </div>

      <hr>

      <div class="row col-8 offset-2">
        <div class="col-md-6 col-xl-4">
          <div class="card">
            <div class="card-status bg-green"></div>
            <div class="card-header">
              <h3 class="card-title">Card blue</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
              </div>
            </div>
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card">
            <div class="card-status bg-green"></div>
            <div class="card-header">
              <h3 class="card-title">Card blue</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card">
            <div class="card-status bg-green"></div>
            <div class="card-header">
              <h3 class="card-title">Card blue</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt
            </div>
          </div>
        </div>
      </div>

      <hr>

      <div class="row col-8 offset-2">
        <div class="col-md-6 col-xl-4">
          <div class="card">
            <div class="card-status bg-blue"></div>
            <div class="card-header">
              <h3 class="card-title">Card blue</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card">
            <div class="card-status bg-blue"></div>
            <div class="card-header">
              <h3 class="card-title">Card blue</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card">
            <div class="card-status bg-blue"></div>
            <div class="card-header">
              <h3 class="card-title">Card blue</h3>
              <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              </div>
            </div>
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('scripts')

@endpush		