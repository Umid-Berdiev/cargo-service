<div class="card">
	<div class="card-header h4 py-2">
		Сведения о транспортном средстве
	</div>
	<div class="card-body">
		<div class="form-row border-bottom">
			<div class="form-group col-sm-6">
				<label for="number_auto" class="font-weight-bold">Номер автотранспортного средства: *</label>
				<div class="">
					<input type="text" name="tags[p15t1]" class="form-control" value="{{ $tags['p15t1'] }}" id="number_auto" maxlength="20" autocomplete="off" />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Тип:</label>
				<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p12t1]">
					@foreach ($auto_type as $key => $value)
						<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p12t1'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group border-bottom">
			<label class="font-weight-bold">Страна регистрации: *</label>
			<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p14t1]">
				@foreach ($countries as $key => $value)
					<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p14t1'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-row border-bottom pb-1">
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Марка, модель: *</label>
					<input type="text" value="{{ $tags['p11t1'] }}" name="tags[p11t1]" maxlength="100" class="form-control" />
				</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Т/с перемещается как товар: *</label>
				<select name="tags[p13t1]" class="custom-select">
					<option value="0">Нет</option>
					<option value="1">Да</option>
				</select>
			</div>
		</div>
		<div class="form-row border-bottom">
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Год выпуска: *</label>
				<input type="text" maxlength="4" value="{{ $tags['p22t1'] }}" name="tags[p22t1]" class="form-control" />
			</div>
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Цвет: *</label>
				<input type="text" maxlength="20" value="{{ $tags['p24t1'] }}" name="tags[p24t1]" class="form-control" />
			</div>
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Номер тех паспорта: *</label>
				<input type="text" maxlength="20" value="{{ $tags['p27t1'] }}" name="tags[p27t1]" class="form-control" />
			</div>
		</div>
		<div class="form-row border-bottom pt-2 pb-1">
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">VIN номер: *</label>
				<input type="text" maxlength="20" value="{{ $tags['p19t1'] }}" name="tags[p19t1]" class="form-control" />
			</div>
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Номер двигателя: *</label>
				<input type="text" maxlength="20" value="{{ $tags['p20t1'] }}" name="tags[p20t1]" class="form-control" />
			</div>
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Объем двигателя (см&sup3): *</label>
				<input type="text" maxlength="8" value="{{ $tags['p23t1'] }}" name="tags[p23t1]" class="form-control" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Номер шасси:</label>
				<input type="text" maxlength="20" value="{{ $tags['p21t1'] }}" name="tags[p21t1]" class="form-control">
			</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Номер кузова:</label>
				<input type="text" maxlength="20" value="{{ $tags['p17t1'] }}" name="tags[p17t1]" class="form-control" />
			</div>
		</div>
		<div class="form-row border-bottom">
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Гос. номер прицепа, полуприцепа:</label>
				<div id="govNumber" class="input-group">
	      	<input type="text" maxlength="10" class="form-control" autocomplete="off" id="govNumber1" name="tags[p16t1][]" value="{{ $tags['p16t1'][0] }}" />
	      	<div class="input-group-append">
	      		<button id="govBtn1" class="add-more2 btn btn-link input-group-text" type="button"><i class="fa fa-plus"></i></button>
	      	</div>
	      </div>
			</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Номер разрешения:</label>
				<input type="text" value="{{ old("tags[p28t1]") ?? $tags['p28t1'] }}" maxlength="10" name="tags[p28t1]" class="form-control" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-sm-6">
				<label class="font-weight-bold" for="number_auto">Страна начала перевозки: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p5t1]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p5t1'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold" for="number_auto">Страна окончания перевозки: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p6t1]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p6t1'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
							}
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
