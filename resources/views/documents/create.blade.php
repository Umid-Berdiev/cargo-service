@extends('layouts.master')

@section('content')
	@include('partials.alerts')
	<div class="col-xs-12 mb-3 ml-3">
		<h2 class="title float-left">Новый документ</h2>
		<div class="float-right">
			{{-- <button target="_blank" href="" class="btn btn-primary">EXPORT XML</button> --}}
		</div>  
		<div class="clearfix"></div>
	</div>
	<hr />

	{{-- <nav class="nav nav-pills mb-3 ml-3">
		<a href="{{ route('documents.create') }}" class="nav-link active">Транспорт</a>
		<a href="{{ route('consignments.index', 'id') }}" class="nav-link cargo_tab" id="">Груз</a>
	</nav> --}}

	<div class="container-fluid">
		<form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<div class="col-md-6">
					@include('documents.general-info')
				</div>
				<div class="col-md-6">
					@include('documents.transport_info')
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6">
					@include('documents.carrier_details')
				</div>
				<div class="col-md-6">
					@include('documents.driver_details')
				</div>
			</div>
			<button type="submit" class="btn btn-primary float-right">Создать</button>
		</form>
	</div> 
@endsection
