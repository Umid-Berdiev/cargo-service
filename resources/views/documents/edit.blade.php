@extends('layouts.master')

@section('content')
	@include('partials.alerts')
	<div class="col-xs-12 mb-3 ml-3">
		<h2 class="title float-left">Документ {{ $document->title }} </h2>
		<div class="float-right">
			<a href="{{ route('documents.arrtoxml', $document->id) }}" class="btn btn-primary">EXPORT TO XML</a>
		</div>  
		<div class="clearfix"></div>
	</div>
	<hr />

	<nav class="nav nav-pills mb-3 ml-3">
		{{-- <a href="{{ route('documents.edit', $document->id) }}" class="nav-link active">Транспорт</a> --}}
		<a href="{{ route('consignments.index', $document->id) }}" class="nav-link ml-auto mr-3 btn-light cargo_tab" id="">Список партии</a>
	</nav>

	<div class="create">
		<form action="{{ route('documents.update', $document->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<div class="col">
				<div class="row mb-3">
					<div class="col">
						@include('documents.general-info')
					</div>
					<div class="col">
						@include('documents.transport_info')
					</div>
				</div>
				<div class="row mb-3">
					<div class="col">
						@include('documents.carrier_details')
					</div>
					<div class="col">
						@include('documents.driver_details')
					</div>
				</div>
				<button type="submit" class="btn btn-primary float-right">Сохранить</button>
			</div>
		</form>
	</div> 

@endsection
