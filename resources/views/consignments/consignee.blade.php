<div class="card">
	<div class="card-header h4 py-2">
		Грузополучатель
	</div>
	<div class="card-body">
		<div class="form-row border-bottom">
			<div class="col-6 mb-2">
				<label class="font-weight-bold">Форма собственности:</label>
				<select class="custom-select" name="tags[p19t2]" autocomplete="off" 
					onchange="onSelectType3($(this), '1', '0')">
					<option value="0" {{ $tags['p19t2'] == '0' ? 'selected' : '' }}>Юридическое лицо</option>
					<option value="1" {{ $tags['p19t2'] == '1' ? 'selected' : '' }}>Физическое лицо</option>
				</select>
			</div>
			<div class="col-6">
				<label class="font-weight-bold">Страна назначения груза: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p14t2]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p14t2'] ? 'selected' : '' }}>
								{{ $key . ' ' . $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="form-row my-3">
			<div class="col-9">
				<label class="font-weight-bold">Государство: *</label>
				<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p16t2]">
					@foreach ($countries as $key => $value)
						<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p16t2'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-3">
				<label class="font-weight-bold">Кол-во мест: *</label>
				<input type="text" name="tags[p15t2]" value="{{ old('tags[p15t2]') ?? $tags['p15t2'] }}" class="form-control" maxlength="12" />
			</div>
		</div>
		<div class="form-group">
			<label class="font-weight-bold">Область/город: *</label>
			<input type="text" name="tags[p17t2]" value="{{ old("tags[p17t2]") ?? $tags['p17t2'] }}" class="form-control" />
		</div>
		<div class="form-group">
			<label class="font-weight-bold">Район, улица и номер дома: *</label>
			<textarea class="form-control" name="tags[p18t2]" rows="2">{{ old("tags['p18t2']") ?? $tags['p18t2'] }}</textarea>
		</div>
		<div class="form-row border-bottom">
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Признак контейнерной перевозки: *</label>
				<div class="custom-control custom-switch">
					<input id="customSwitch2" name="tags2['p29t2']" type="checkbox" class="custom-control-input" autocomplete="off" value="1" />
					<label onclick="displayNoneBlock('numberBooksContainer')" for="customSwitch2" 
						class="custom-control-label"></label>
				</div>
			</div>
			<div class="form-group col-md-6 numberBooksContainer" style="display: none;">
				<input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
          <label class="font-weight-bold" for="field1">Добавить номер контейнера: *</label>
          <form class="input-append">
            <div id="field" class="input-group">
            	@if($tags['p30t2'])
								@foreach($tags['p30t2'] as $key => $value)
              		<input autocomplete="off" class="form-control" id="field . {{ $key + 1 }}" name="tags[p30t2][{{$key}}]" type="text" value="{{ $value }}" />
              	@endforeach
            	@else
          		<input autocomplete="off" class="form-control" id="field1" name="tags[p30t2][0]" type="text" value="" />
          		<div class="input-group-append">
			      		<button id="b1" class="btn btn-link input-group-text add-more" type="button"><i class="fa fa-plus"></i></button>
			      	</div>
            	@endif
            </div>
          </form>
        </div>
			</div>
		</div>

		{{-- Физическое лицо --}}
		<div class="individual_consignee d-none">
			<div class="form-row">
				<div class="col-6">
					<label class="font-weight-bold">Серия и № паспорта: *</label>
					<div class="form-row">
						<div class="col-3">
							<input type="text" maxlength="2" value="{{ old("tags[p24t2][0]") ?? $tags['p24t2'][0] }}" name="tags[p24t2][0]" class="form-control">
						</div>
						<div class="col-9">
							<input type="text" maxlength="13" value="{{ old("tags[p24t2][1]") ?? $tags['p24t2'][1] }}" name="tags[p24t2][1]" class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-6">
					<label class="font-weight-bold">Имя: *</label>
					<input type="text" name="tags[p26t2]" maxlength="32" value="{{ old("tags['p26t2']") ?? $tags['p26t2'] }}" class="form-control" />
				</div>
			</div>
			<div class="form-row">
				<div class="col-6 mt-2">
					<label class="font-weight-bold">Фамилия: *</label>
					<input type="text" name="tags[p25t2]" maxlength="32" value="{{ old("tags['p25t2']") ?? $tags['p25t2'] }}" class="form-control">
				</div>
				<div class="col-6 mt-2">
					<label class="font-weight-bold">Отчество:</label>
					<input type="text" name="tags[p27t2]" maxlength="32" value="{{ old("tags['p27t2']") ?? $tags['p27t2'] }}" class="form-control">
				</div>
			</div>
			<div class="form-group mt-2">
				<label class="font-weight-bold" for="number_auto">Гражданство: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p28t2]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p28t2'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		{{-- Юридическое лицо --}}
		<div class="legal_consignee">
			<div class="form-group">
				<label class="font-weight-bold">Наименование грузополучателя: *</label>
				<div class="">
					<input type="text" name="tags[p20t2]" value="{{ old("tags['p20t2']") ?? $tags['p20t2'] }}" class="form-control" maxlength="100" />
				</div>
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Страна грузополучателя: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" data-live-search="true" name="tags[p21t2]">
						@foreach ($countries as $key => $value)
							<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $tags['p21t2'] ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-sm-6">
					<label class="font-weight-bold">Телефон грузополучателя: *</label>
					<input type="tel" value="{{ old("tags['p22t2']") ?? $tags['p22t2'] }}" maxlength="30" name="tags[p22t2]" class="form-control" />
				</div>
				<div class="form-group col-sm-6">
					<label class="font-weight-bold">ИНН получателя: *</label>
					<input type="text" name="tags[p23t2]" value="{{ old("tags[p23t2]") ?? $tags['p23t2'] }}" maxlength="9" class="form-control">
				</div>
			</div>
		</div>
	</div>
</div>
