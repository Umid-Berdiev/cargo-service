<div class="card">
	<div class="card-header h4 py-2">
		Грузооотправитель
	</div>
	<div class="card-body">
		<div class="form-row border-bottom pb-2">
			<div class="col-6">
				<label class="font-weight-bold">Форма собственности:</label>
				<select class="custom-select" name="tags[p5t2]" autocomplete="off" 
					onchange="onSelectType2($(this), '1', '0')">
					<option value="0" {{ $tags['p5t2'] == '0' ? 'selected' : '' }}>Юридическое лицо</option>
					<option value="1" {{ $tags['p5t2'] == '1' ? 'selected' : '' }}>Физическое лицо</option>
				</select>
			</div>
			<div class="col-6">
				<label class="font-weight-bold">Страна отправки груза: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p1t2]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p1t2'] ? 'selected' : '' }}>
								{{ $key . ' ' . $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="form-group my-3">
			<label class="font-weight-bold">Государство: *</label>
			<div class="">
				<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p2t2]">
					@foreach ($countries as $key => $value)
						<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p2t2'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="font-weight-bold">Область/город: *</label>
			<input type="text" name="tags[p3t2]" value="{{ old("tags[p3t2]") ?? $tags['p3t2'] }}" class="form-control">
		</div>
		<div class="form-group">
			<label class="font-weight-bold">Район, улица и номер дома: *</label>
			<textarea class="form-control" name="tags[p4t2]" rows="2">{{ old("tags['p4t2']") ?? $tags['p4t2'] }}</textarea>
		</div>
		
		{{-- Физическое лицо --}}
		<div class="individual_consignor d-none">
			<div class="form-row">
				<div class="col-6">
					<label class="font-weight-bold">Серия и № паспорта: *</label>
					<div class="form-row">
						<div class="col-3">
							<input type="text" maxlength="2" value="{{ old("tags[p9t2][0]") ?? $tags['p9t2'][0] }}" name="tags[p9t2][0]" class="form-control">
						</div>
						<div class="col-9">
							<input type="text" maxlength="13" value="{{ old("tags[p9t2][1]") ?? $tags['p9t2'][1] }}" name="tags[p9t2][1]" class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-6">
					<label class="font-weight-bold">Имя: *</label>
					<input type="text" name="tags[p10t2]" maxlength="32" value="{{ old("tags['p10t2']") ?? $tags['p10t2'] }}" class="form-control" />
				</div>
			</div>
			<div class="form-row">
				<div class="col-6 mt-2">
					<label class="font-weight-bold">Фамилия: *</label>
					<input type="text" name="tags[p11t2]" maxlength="32" value="{{ old("tags['p11t2']") ?? $tags['p11t2'] }}" class="form-control">
				</div>
				<div class="col-6 mt-2">
					<label class="font-weight-bold">Отчество:</label>
					<input type="text" name="tags[p12t2]" maxlength="32" value="{{ old("tags['p12t2']") ?? $tags['p12t2'] }}" class="form-control">
				</div>
			</div>
			<div class="form-group mt-2">
				<label class="font-weight-bold" for="number_auto">Гражданство: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p13t2]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p13t2'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		{{-- Юридическое лицо --}}
		<div class="legal_consignor">
			<div class="form-group">
				<label class="font-weight-bold">Наименование грузоотправителя: *</label>
				<div class="">
					<input type="text" name="tags[p6t2]" value="{{ old("tags['p6t2']") ?? $tags['p6t2'] }}" class="form-control" maxlength="100" />
				</div>
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Страна грузоотправителя: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p7t2]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p7t2'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-sm-6">
					<label class="font-weight-bold">Телефон грузоотправителя: *</label>
					<input type="tel" value="{{ old("tags['p8t2']") ?? $tags['p8t2'] }}" maxlength="30" name="tags[p8t2]" class="form-control" />
				</div>
			</div>
			{{-- <div class="form-group legal_uz d-none col-6">
				<label class="font-weight-bold">INN: *</label>
				<input type="text" name="" value="" class="form-control">
			</div> --}}
		</div>
		
	</div>
</div>
