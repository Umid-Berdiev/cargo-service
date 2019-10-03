@extends('layouts.master')

@section('content')

	<div class="row justify-content-between">
		<div class="col-auto">
			<h2 class="title">Документ {{ $document->title }} </h2>
		</div>
		<div class="col-auto">
			@include('partials.alerts')
		</div>
		<div class="col-auto">
			<a href="{{ route('consignments.index', $document->id) }}" class="border-secondary btn btn-light mr-1">Вернуться к списку</a>
			<a href="{{ route('goods.create', [$document->id, $consignment->id]) }}" class="border-secondary btn btn-light mr-1">Добавить товар</a>
			<a href="{{ route('reference_docs.create', [$document->id, $consignment->id]) }}" class="border-secondary btn btn-light">Добавить товаросопроводительных документов</a>
		</div>
	</div>	  
	<hr />

	<form action="{{ route('consignments.update', ['document' => $document, 'consignment' => $consignment->id]) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('patch')
		<div class="row mb-3">
			<div id="consignor" class="col-md-6">
				@include('consignments.consignor')
			</div>
			<div id="consignee" class="col-md-6">
				@include('consignments.consignee')
			</div>
			<button type="submit" class="btn btn-primary ml-auto mt-2 mr-3">Обновить партию</button>
		</div>
		{{-- <div class="row mb-3">
			<div class="col">
				@include('consignments.reference_docs')
			</div>
		</div> --}}
	</form>

@endsection

@section('scripts')
	<script>
		let consignor = new Vue({
			el: '#consignor',

			data: {
				countries: {!! json_encode($countries, JSON_UNESCAPED_UNICODE) !!},
				regions: {!! json_encode($regions, JSON_UNESCAPED_UNICODE) !!},
				tags_arr: {!! json_encode($tags_arr, JSON_UNESCAPED_UNICODE) !!},
				consignor_type: {!! json_encode($tags['p5t2']) !!},
				country1: {!! json_encode($tags['p1t2']) !!},
				country2: {!! json_encode($tags['p2t2']) !!},
				address1: {!! json_encode($tags['p3t2']) !!},
				address2: {!! json_encode($tags['p4t2']) !!},
				passport_s: {!! json_encode($tags['p9t2'][0]) !!},
				passport_n: {!! json_encode($tags['p9t2'][1]) !!},
				firstname: {!! json_encode($tags['p10t2']) !!},
				lastname: {!! json_encode($tags['p11t2']) !!},
				secondname: {!! json_encode($tags['p12t2']) !!},
				country4: {!! json_encode($tags['p13t2']) !!},
				company_name: {!! json_encode($tags['p6t2']) !!},
				country3: {!! json_encode($tags['p7t2']) !!},
				phone_num: {!! json_encode($tags['p8t2']) !!},
			},

			methods: {
				searchItem() {
					for(let i in this.tags_arr) {
						if (this.passport_s == this.tags_arr[i]['p9t2'][0] && this.passport_n == this.tags_arr[i]['p9t2'][1]) {
							this.firstname = this.tags_arr[i]['p10t2']
							this.lastname = this.tags_arr[i]['p11t2']
							this.secondname = this.tags_arr[i]['p12t2']
							this.country4 = this.tags_arr[i]['p13t2']
							this.country1 = this.tags_arr[i]['p1t2']
							this.country2 = this.tags_arr[i]['p2t2']
							this.address1 = this.tags_arr[i]['p3t2']
							this.address2 = this.tags_arr[i]['p4t2']
						}
						if (this.company_name == this.tags_arr[i]['p6t2']) {
							this.country3 = this.tags_arr[i]['p7t2']
							this.phone_num = this.tags_arr[i]['p8t2']
							this.country1 = this.tags_arr[i]['p1t2']
							this.country2 = this.tags_arr[i]['p2t2']
							this.address1 = this.tags_arr[i]['p3t2']
							this.address2 = this.tags_arr[i]['p4t2']
						}
					}
				}
			},

			updated() {
		    $(this.$el).find('.selectpicker').selectpicker('refresh');
			}

		});

		let consignee = new Vue({
			el: '#consignee',

			data: {
				countries: {!! json_encode($countries, JSON_UNESCAPED_UNICODE) !!},
				regions: {!! json_encode($regions, JSON_UNESCAPED_UNICODE) !!},
				tags_arr: {!! json_encode($tags_arr, JSON_UNESCAPED_UNICODE) !!},
				consignee_type: {!! json_encode($tags['p19t2']) !!},
				country1: {!! json_encode($tags['p14t2']) !!},
				country2: {!! json_encode($tags['p16t2']) !!},
				kolich_mest: {!! json_encode($tags['p15t2']) !!},
				address1: {!! json_encode($tags['p17t2']) !!},
				address2: {!! json_encode($tags['p18t2']) !!},
				has_container: {!! json_encode($tags['p29t2']) !!},
				isChecked: {!! ($tags['p29t2']) !!} == 1 ? true : false,
				containers: [
					...{!! json_encode($tags['p30t2']) !!}
				],
				input: "",
				passport_s: {!! json_encode($tags['p24t2'][0]) !!},
				passport_n: {!! json_encode($tags['p24t2'][1]) !!},
				firstname: {!! json_encode($tags['p26t2']) !!},
				lastname: {!! json_encode($tags['p25t2']) !!},
				secondname: {!! json_encode($tags['p27t2']) !!},
				country4: {!! json_encode($tags['p28t2']) !!},
				company_name: {!! json_encode($tags['p20t2']) !!},
				country3: {!! json_encode($tags['p21t2']) !!},
				phone_num: {!! json_encode($tags['p22t2']) !!},
				consignee_inn: {!! json_encode($tags['p23t2']) !!},
			},

			methods: {
				searchItem() {
					for(let i in this.tags_arr) {
						if (this.passport_s == this.tags_arr[i]['p24t2'][0] && this.passport_n == this.tags_arr[i]['p24t2'][1]) {
							this.firstname = this.tags_arr[i]['p26t2']
							this.lastname = this.tags_arr[i]['p25t2']
							this.secondname = this.tags_arr[i]['p27t2']
							this.country4 = this.tags_arr[i]['p28t2']
							this.country1 = this.tags_arr[i]['p14t2']
							this.country2 = this.tags_arr[i]['p16t2']
							this.address1 = this.tags_arr[i]['p17t2']
							this.address2 = this.tags_arr[i]['p18t2']
						}
						if (this.company_name == this.tags_arr[i]['p20t2']) {
							this.country3 = this.tags_arr[i]['p21t2']
							this.phone_num = this.tags_arr[i]['p22t2']
							this.consignee_inn = this.tags_arr[i]['p23t2']
							this.country1 = this.tags_arr[i]['p14t2']
							this.country2 = this.tags_arr[i]['p16t2']
							this.address1 = this.tags_arr[i]['p17t2']
							this.address2 = this.tags_arr[i]['p18t2']
						}
					}
				},

				addInput() {
					this.containers.push(this.input)
					this.input = ""
				},

				removeInput(index) {
          this.containers.splice(index, 1);
				},
			},

			updated() {
		    $(this.$el).find('.selectpicker').selectpicker('refresh');
			}

		});
	</script>
	
@endsection
