@extends('layouts.master')

@section('content')
	<div class="row justify-content-between">
		<div class="col-auto">
			<h2 class="title">Документ {{ $document->title }} </h2>
		</div>
		<div class="col-auto">
			@include('partials.alerts')
		</div>  
	</div>  
	<div class="clearfix"></div>
	<hr />

	<form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="row mb-3">
			<div id="general_info" class="col-md-6">
				@include('documents.general-info')
			</div>
			<div id="transport_info" class="col-md-6">
				@include('documents.transport_info')
			</div>
		</div>
		<div class="row mb-3">
			<div id="carrier_info" class="col-md-6">
				@include('documents.carrier_details')
			</div>
			<div id="driver_info" class="col-md-6">
				@include('documents.driver_details')
			</div>
		</div>
		<button type="submit" class="btn btn-primary float-right mb-3">Создать</button>
	</form>
@endsection

@section('scripts')
	<script>
		let general_info = new Vue({
			el: "#general_info",

			data: {
				countries: @json($countries),
				country1: "000",
		    country2: "000",
				isChecked: false,
		    transportation_types: @json($transportation_types),
		    transportation_type: @json($tags['p7t1']),
			}
		});

		let transport_info = new Vue({
			el: "#transport_info",

			data: {
				countries: {!! json_encode($countries, JSON_UNESCAPED_UNICODE) !!},
				regions: @json($regions),
				tags_arr: {!! json_encode($tags_arr, JSON_UNESCAPED_UNICODE) !!},
				auto_types: {!! json_encode($auto_types, JSON_UNESCAPED_UNICODE) !!},
				auto_num: {!! json_encode($tags['p15t1']) !!},
				auto_type: "20",
				access_num: {!! json_encode($tags['p28t1']) !!},
				auto_color: {!! json_encode($tags['p24t1']) !!},
				carcase_num: {!! json_encode($tags['p17t1']) !!},
				chassis_num: {!! json_encode($tags['p21t1']) !!},
				country1: "000",
				made_year: {!! json_encode($tags['p22t1']) !!},
				marka: {!! json_encode($tags['p11t1']) !!},
				motor_num: {!! json_encode($tags['p20t1']) !!},
				motor_size: {!! json_encode($tags['p23t1']) !!},
				texpass_num: {!! json_encode($tags['p27t1']) !!},
				trailer_nums: [],
				input: "",
				vin_num: {!! json_encode($tags['p19t1']) !!},
				address1: @json($tags['p25t1']),
				arrival_purpose: @json($tags['p26t1']),
				collateral_id: @json($tags['p29t1']),
			},

			methods: {
				searchItem() {
					for (let i in this.tags_arr) {
						if (this.auto_num == this.tags_arr[i]['p15t1']) {
							this.auto_type = this.tags_arr[i]['p12t1']
							this.access_num = this.tags_arr[i]['p28t1']
							this.auto_color = this.tags_arr[i]['p24t1']
							this.carcase_num = this.tags_arr[i]['p17t1']
							this.chassis_num = this.tags_arr[i]['p21t1']
							this.country1 = this.tags_arr[i]['p14t1']
							this.country2 = this.tags_arr[i]['p5t1']
							this.country3 = this.tags_arr[i]['p6t1']
							this.made_year = this.tags_arr[i]['p22t1']
							this.marka = this.tags_arr[i]['p11t1']
							this.motor_num = this.tags_arr[i]['p20t1']
							this.motor_size = this.tags_arr[i]['p23t1']
							this.texpass_num = this.tags_arr[i]['p27t1']
							this.trailer_nums = this.tags_arr[i]['p16t1']
							this.vin_num = this.tags_arr[i]['p19t1']
						}
					}
				},

				addInput() {
					if (!this.trailer_nums.includes(this.input)) this.trailer_nums.push(this.input)
					else alert("Это номер уже существует!")
					this.input = ""
				},

				removeInput(index) {
          this.trailer_nums.splice(index, 1);
				},
			},

			updated() {
		    $(this.$el).find('.selectpicker').selectpicker('refresh');
		  },
		
		});

		let carrier_info = new Vue({
			el: "#carrier_info",

			data: {
				countries: {!! json_encode($countries, JSON_UNESCAPED_UNICODE) !!},
				tags_arr: {!! json_encode($tags_arr, JSON_UNESCAPED_UNICODE) !!},
				carrier_type: 0,
				passport_s: {!! json_encode($tags['p38t1'][0]) !!},
				passport_n: {!! json_encode($tags['p38t1'][1]) !!},
				lastname: {!! json_encode($tags['p35t1']) !!},
				firstname: {!! json_encode($tags['p36t1']) !!},
				secondname: {!! json_encode($tags['p37t1']) !!},
				country: "000",
				company_name: {!! json_encode($tags['p32t1']) !!},
				company_country: "000",
				phone_num: {!! json_encode($tags['p34t1']) !!},
				address: {!! json_encode($tags['p30t1']) !!},
			},

			methods: {
				searchItem() {
					for(let i in this.tags_arr) {
						if (this.passport_s == this.tags_arr[i]['p38t1'][0] && this.passport_n == this.tags_arr[i]['p38t1'][1]) {
							this.lastname = this.tags_arr[i]['p35t1']
							this.firstname = this.tags_arr[i]['p36t1']
							this.secondname = this.tags_arr[i]['p37t1']
							this.country = this.tags_arr[i]['p39t1']
							this.address = this.tags_arr[i]['p30t1']
						}
						if (this.tags_arr[i]['p32t1'] == this.company_name) {
							this.company_country = this.tags_arr[i]['p33t1']
							this.phone_num = this.tags_arr[i]['p34t1']
							this.address = this.tags_arr[i]['p30t1']
						}
					}
				}
			},

			updated() {
		    $(this.$el).find('.selectpicker').selectpicker('refresh');
		  },
		});

		let driver_info = new Vue({
			el: "#driver_info",

			data: {
				countries: {!! json_encode($countries, JSON_UNESCAPED_UNICODE) !!},
				tags_arr: {!! json_encode($tags_arr, JSON_UNESCAPED_UNICODE) !!},
				passport_s: {!! json_encode($tags['p43t1'][0]) !!},
				passport_n: {!! json_encode($tags['p43t1'][1]) !!},
				lastname: {!! json_encode($tags['p40t1']) !!},
				firstname: {!! json_encode($tags['p41t1']) !!},
				secondname: {!! json_encode($tags['p42t1']) !!},
				country: "000",
				address: {!! json_encode($tags['p46t1']) !!},
				auth_affair: {!! json_encode($tags['p44t1']) !!},
			},

			methods: {
				searchItem() {
					for(let i in this.tags_arr) {
						if (this.passport_s == this.tags_arr[i]['p43t1'][0] && this.passport_n == this.tags_arr[i]['p43t1'][1]) {
							this.lastname = this.tags_arr[i]['p40t1']
							this.firstname = this.tags_arr[i]['p41t1']
							this.secondname = this.tags_arr[i]['p42t1']
							this.country = this.tags_arr[i]['p45t1']
							this.address = this.tags_arr[i]['p46t1']
							this.auth_affair = this.tags_arr[i]['p44t1']
						}
					}
				}
			},

			updated() {
		    $(this.$el).find('.selectpicker').selectpicker('refresh');
		  },

		});


	</script>
@endsection
