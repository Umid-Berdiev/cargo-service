<div class="card">
	<div class="card-header h4 py-2">
		Общие сведения
	</div>
	<div class="card-body">
		<div class="form-row border-bottom">
			<div class="form-group col-3">
				<label class="font-weight-bold" for="doc_type">Вид следования</label>
				<div class="">
					<select class="custom-select" name="tags[p1t1]">
						<option value="1" {{ $tags['p1t1'] == 1 ? 'selected' : '' }}>ЭК</option>
						<option value="2" {{ $tags['p1t1'] == 2 ? 'selected' : '' }}>ИМ</option>
						<option value="3" {{ $tags['p1t1'] == 3 ? 'selected' : '' }}>ТР</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row border-bottom">
			<div class="form-group col-md-6">
				<label for="customSwitch1" class="font-weight-bold">Перевозка с использованием книжек МДП? *</label>
				<div class="custom-control custom-switch">
					<input id="customSwitch1" v-model="isChecked" type="checkbox" class="custom-control-input" />
					<label for="customSwitch1" class="custom-control-label"></label>
				</div>
				<input name="tags[p2t1]" type="hidden" :value="isChecked ? 1 : 0" />

			</div>
			<div v-show="isChecked" class="form-group col-md-6">
				<label>NUMBER_BOOKS_TIR: *</label>
				<div class="row">
					<div class="col-3">
						<input type="text" maxlength="2" name="tags[p3t1]" class="form-control" value="{{ $tags['p3t1'] }}" />
					</div>
					<div class="col-6">
						<input type="text" maxlength="8" name="tags[p4t1]" class="form-control" value="{{ $tags['p4t1'] }}" />
					</div>
				</div>
			</div>
		</div>
		<div class="form-inline border-bottom py-2">
			<div class="form-group mr-4">
				<label for="date_from" class="font-weight-bold mr-2">С</label>
				<input type="date" name="date_from" class="form-control" autocomplete="off" value="{{ $document->date_from }}" />
			</div>
			<div class="form-group">
				<label class="font-weight-bold mr-2">По</label>
				<input type="date" name="tags[p10t1]" class="form-control" autocomplete="off" value="{{ $tags['p10t1'] }}" />
			</div>
		</div>
		<div class="form-group mt-2">
			<label class="font-weight-bold" for="general_customs_to">Таможенный орган в который ожидается прибытие: *</label>
			<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p8t1]">
				@foreach ($customs as $key => $value)
					<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p8t1'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
				@endforeach
			</select>
		</div>	
		<div class="form-group">
			<label class="font-weight-bold" for="general_customs_from">Таможенный орган назначения: *</label>
			<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p9t1]">
				@foreach ($customs as $key => $value)
					<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p9t1'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>
