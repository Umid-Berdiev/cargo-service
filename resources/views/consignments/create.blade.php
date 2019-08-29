@extends('layouts.master')

@section('content')
	<div class="col-sm-12 mb-3">
		<h2 class="title float-left">Документ {{ $document->title }}</h2>
		<div class="float-right">
			<a href="{{ route('consignments.index', $document->id) }}" class="btn btn-light">Вернуться к списку</a>
			<button id="downloadXml" target="_blank" href="6607" class="btn btn-primary">EXPORT XML</button>
		</div>  
		<div class="clearfix"></div>
	</div>
	<hr />

	<div class="container-fluid">
		<form action="{{ route('consignments.store', $document->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<div class="col-md-6">
					@include('consignments.consignor')
				</div>
				<div class="col-md-6">
					@include('consignments.consignee')
				</div>
				<button type="submit" class="btn btn-primary ml-auto mt-2 mr-3">Создать партию</button>
			</div>
		</form>
	</div>

@endsection

<script type="text/javascript">
	function onSelectType2($select, $type_1, $type_2){
		if ($select.val() == $type_1) {
			$('.individual_consignor').removeClass('d-none');
			$('.legal_consignor').addClass('d-none');
		}else{
			$('.individual_consignor').addClass('d-none');
			$('.legal_consignor').removeClass('d-none');
		}
	}

	function onSelectType3($select, $type_1, $type_2){
		if ($select.val() == $type_1) {
			$('.individual_consignee').removeClass('d-none');
			$('.legal_consignee').addClass('d-none');
		}else{
			$('.individual_consignee').addClass('d-none');
			$('.legal_consignee').removeClass('d-none');
		}
	}
</script>