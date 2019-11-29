<div class="card">
	<div class="card-header h4 py-2">
		Грузополучатель
	</div>
	<div class="card-body">
		<div class="form-row border-bottom pb-1 mb-2">
			<div class="col-6">
				<label class="font-weight-bold">Форма собственности:</label>
				<select class="custom-select" name="tags[p19t2]" v-model="consignee_type">
					<option :value="0">Юридическое лицо</option>
					<option :value="1">Физическое лицо</option>
				</select>
			</div>
			<div class="col-6">
				<label class="font-weight-bold">Страна назначения груза:</label>
				<div class="">
					<select class="selectpicker" v-model="country1" data-width="100%" data-live-search="true" name="tags[p14t2]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>
		</div>

		{{-- Физическое лицо --}}
		<div v-show="consignee_type == 1" class="">
			<div class="form-row">
				<div class="col-6">
					<label class="font-weight-bold">Серия и № паспорта:</label>
					<div class="form-row">
						<div class="col-3">
							<input type="text" maxlength="2" v-model="passport_s" name="tags[p24t2][0]" class="form-control">
						</div>
						<div class="col-9">
							<input type="text" maxlength="13" @input="searchItem" v-model="passport_n" name="tags[p24t2][1]" class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-6">
					<label class="font-weight-bold">Имя:</label>
					<input type="text" name="tags[p26t2]" maxlength="32" v-model="firstname" class="form-control" />
				</div>
			</div>
			<div class="form-row">
				<div class="col-6 mt-2">
					<label class="font-weight-bold">Фамилия:</label>
					<input type="text" name="tags[p25t2]" maxlength="32" v-model="lastname" class="form-control">
				</div>
				<div class="col-6 mt-2">
					<label class="font-weight-bold">Отчество:</label>
					<input type="text" name="tags[p27t2]" maxlength="32" v-model="secondname" class="form-control">
				</div>
			</div>
			<div class="form-group mt-2">
				<label class="font-weight-bold">Гражданство:</label>
				<div class="">
					<select class="selectpicker" v-model="country4" data-live-search="true" data-width="100%" name="tags[p28t2]">
						<option v-for="(value, key) in countries" :selected="key" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>
		</div>

		{{-- Юридическое лицо --}}
		<div v-show="consignee_type == 0" class="">
			<div class="form-group">
				<label class="font-weight-bold">Наименование грузополучателя:</label>
				<div class="">
					<input type="text" name="tags[p20t2]" v-model="company_name" @input="searchItem" class="form-control" maxlength="100" />
				</div>
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Страна грузополучателя:</label>
				<div class="">
					<select class="selectpicker" v-model="country3" data-width="100%" data-live-search="true" name="tags[p21t2]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-sm-6">
					<label class="font-weight-bold">Телефон грузополучателя:</label>
					<input type="tel" v-model="phone_num" maxlength="30" name="tags[p22t2]" class="form-control" />
				</div>
				<div class="form-group col-sm-6">
					<label class="font-weight-bold">ИНН получателя:</label>
					<input type="text" v-model="consignee_inn" maxlength="9" name="tags[p23t2]" class="form-control" />
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-9">
				<label class="font-weight-bold">Государство:</label>
				<select class="selectpicker" v-model="country2" data-width="100%" data-live-search="true" name="tags[p16t2]">
					<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					
				</select>
			</div>
			<div class="col-3">
				<label class="font-weight-bold">Кол-во мест:</label>
				<input type="number" name="tags[p15t2]" v-model="kolich_mest" class="form-control" maxlength="12" />
			</div>
		</div>
		<div class="form-row mt-2">
			<div class="form-group col-6">
				<label class="font-weight-bold">Область/город:</label>
				<div v-if="country2 == 860" class="">
					<select class="selectpicker" v-model="address1" required data-width="100%" data-live-search="true" name="tags[p17t2]">
						<option v-for="(value, key) in regions" :value="key" :key="key" v-text="key + ' ' + value"></option>
						
					</select>
				</div>
				<input v-else type="text" name="tags[p17t2]" v-model="address1" class="form-control" />
			</div>
			<div class="form-group col-6">
				<label class="font-weight-bold">Район, улица и номер дома:</label>
				<textarea class="form-control" name="tags[p18t2]" v-model="address2" rows="2"></textarea>
			</div>
		</div>
		<div class="form-row border-bottom">
			<div class="form-group col-md-6">
				<label for="customSwitch2" class="font-weight-bold">Признак контейнерной перевозки:</label>
				<div class="custom-control custom-switch">
					<input id="customSwitch2" v-model="isChecked" type="checkbox" class="custom-control-input" />
					<label for="customSwitch2" class="custom-control-label"></label>
				</div>
				<input name="tags[p29t2]" type="hidden" :value="isChecked ? 1 : 0" />
				
			</div>
			<div v-show="isChecked" class="form-group col-md-6">
        <div class="control-group">
          <label class="font-weight-bold">Добавить номер контейнера:</label>
          
          <div class="input-group">
						<input v-model="input" name="tags[p30t2][]" type="text" maxlength="10" class="form-control" />
		      	<div class="input-group-append">
		      		<button @click="addInput" class="btn btn-link input-group-text" type="button"><i class="fas fa-plus fa-xs"></i></button>
		      	</div>
		      </div>

		      <div v-for="(row, i) in containers" class="input-group">
		      	{{-- <input v-if="!row" name=`tags[p30t2]` value="" type="text" maxlength="10" class="form-control" /> --}}
		      	<input v-if="row != null" :value="row" :name=`tags[p30t2][${i}]` type="text" maxlength="10" class="form-control" />
		      	<div v-if="row != null" class="input-group-append">
		      		<button @click="removeInput" class="btn btn-link input-group-text" type="button"><i class="fas fa-minus fa-xs"></i></button>
		      	</div>
		      </div>

          {{-- <form class="input-append">
            <div v-for="(row, index) in containers" :key="index" class="input-group">
          		<input v-model="row.input" type="text" required maxlength="10" class="form-control" :name="'tags[p30t2][' + index + ']'" />
			      	<div class="input-group-append">
			      		<button v-if="index == 0" @click="addInput" class="btn btn-link input-group-text" type="button"><i class="fas fa-plus fa-xs"></i></button>
			      		<button v-else @click="removeInput(index)" class="btn btn-link input-group-text" type="button"><i class="fas fa-minus fa-xs"></i></button>
			      	</div>
            </div>
          </form> --}}
        </div>
			</div>
		</div>
	</div>
</div>
