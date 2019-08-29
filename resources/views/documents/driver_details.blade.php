<div class="card">
	<div class="card-header h4 py-2">
		Сведения о лице, ответственного за доставку груза
	</div>
	<div class="card-body">
		{{-- Физическое лицо --}}
		<div class="form-row">
			<div class="col-md-6 individualDriver">
				<label class="font-weight-bold">Серия и № паспорта: *</label>
				<div class="form-row">
					<div class="col-md-3">
						<input type="text" maxlength="2" value="{{ old("tags[p43t1][0]") ?? $tags['p43t1'][0] }}" name="tags[p43t1][0]" class="form-control" />
					</div>
					<div class="col-md-9">
						<input type="text" maxlength="13" value="{{ old("tags[p43t1][0]") ?? $tags['p43t1'][1] }}" name="tags[p43t1][1]" class="form-control" />
					</div>
				</div>
			</div>

			<div class="form-group individualDriver col-md-6">
				<label class="font-weight-bold">Фамилия: *</label>
				<input type="text" name="tags[p40t1]" maxlength="32" value="{{ old('tags[p40t1]') ?? $tags['p40t1'] }}" class="form-control" />
			</div>

			<div class="form-group individualDriver col-md-6">
				<label class="font-weight-bold">Имя: *</label>
				<input type="text" name="tags[p41t1]" maxlength="32" value="{{ old('tags[p41t1]') ?? $tags['p41t1'] }}" class="form-control" />
			</div>

			<div class="form-group individualDriver col-md-6">
				<label class="font-weight-bold">Отчество:</label>
				<input type="text" name="tags[p42t1]" maxlength="32" value="{{ old('tags[p42t1]') ?? $tags['p42t1'] }}" class="form-control" />
			</div>

			<div class="form-group individualDriver col-md-12">
				<label class="font-weight-bold" for="">Гражданство: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p45t1]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p45t1'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group col-md-12">
				<label class="font-weight-bold">Адрес *</label>
				<textarea class="form-control" name="tags[p46t1]" maxlength="80" rows="2">{{ old('tags[p46t1]') ?? $tags['p46t1'] }}</textarea>
			</div>

			<div class="form-group col-md-12">
				<label class="font-weight-bold">Паспорт кем выдан: *</label>
				<input type="text" value="{{ old('tags[p44t1]') ?? $tags['p44t1'] }}" name="tags[p44t1]" maxlength="30" class="form-control" />
			</div>	
		</div>
	</div>
</div>
