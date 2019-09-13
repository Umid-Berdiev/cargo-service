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
				<label class="font-weight-bold">Перевозка с использованием книжек МДП? *</label>
				<div class="custom-control custom-switch">
					<input type="checkbox" name="tags[p2t1]" autocomplete="off" class="custom-control-input" id="customSwitch1" value="1" />
					<label class="custom-control-label" onclick="displayNoneBlock('numberBooksTir')" 
						for="customSwitch1"></label>
				</div>
			</div>
			<div class="form-group col-md-6 numberBooksTir" style="display: none;" id="">
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
		{{-- <div class="form-row border-bottom">
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Признак контейнерной перевозки: *</label>
				<div class="custom-control custom-switch">
					<input id="customSwitch2" name="tags2['p29t2']" type="checkbox" class="custom-control-input" autocomplete="off">
					<label onclick="displayNoneBlock('numberBooksContainer')" for="customSwitch2" 
						class="custom-control-label"></label>
				</div>
			</div>
			<div class="form-group col-md-6 numberBooksContainer" style="display: none;" id="">
				<input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
          <label class="font-weight-bold" for="field1">Добавить номер контейнера: *</label>
          <form class="input-append">
            <div id="field" class="input-group">
            	@if($tags['container_number'])
								@foreach($tags['container_number'] as $key => $value)
              		<input autocomplete="off" class="form-control" id="field . {{ $key + 1 }}" name="tags[container_number][{{$key}}]" type="text" data-items="8" value="{{ $value }}" />
              	@endforeach
            	@else
          		<input autocomplete="off" class="form-control" id="field1" name="tags[container_number][0]" type="text" data-items="8" value="" />
          		<div class="input-group-append">
			      		<button id="b1" class="btn btn-link input-group-text add-more" type="button"><i class="fa fa-plus"></i></button>
			      	</div>
            	@endif
            </div>
          </form>
        </div>
			</div>
		</div> --}}
		{{-- <div class="form-row border-bottom">
			<div class="form-group">
				<label class="font-weight-bold">Перевозка с грузом? *</label>
				<div class="custom-control custom-switch">
					<input type="checkbox" checked="" autocomplete="off" class="custom-control-input" id="customSwitch3" />
					<label class="custom-control-label" onclick="displayNoneBlock('cargo_tab')" 
						for="customSwitch3"></label>
				</div>
			</div>
		</div> --}}
		<div class="form-inline border-bottom py-2">
			<div class="form-group mr-4">
				<label for="date_from" class="font-weight-bold mr-2">С</label>
				<input type="date" name="tags[date_from]" class="form-control" id="date_from" autocomplete="off" value="{{ $tags['date_from'] }}" />
			</div>
			<div class="form-group">
				<label for="date_to" class="font-weight-bold mr-2">По</label>
				<input type="date" name="tags[date_to]" class="form-control" id="date_to" autocomplete="off" value="{{ $tags['date_to'] }}" />
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
