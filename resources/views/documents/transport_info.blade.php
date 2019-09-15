<div class="card">
	<div class="card-header h4 py-2">
		Сведения о транспортном средстве
	</div>
	<div class="card-body">
		<div class="form-row border-bottom">
			<div class="form-group col-sm-6">
				<label for="number_auto" class="font-weight-bold">Номер автотранспортного средства: *</label>
				<input type="text" class="form-control" v-model="auto_num" @input="searchItem" name="tags[p15t1]" maxlength="20" />
			</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Тип:</label>
				<select class="selectpicker" data-width="100%" v-model="auto_type" data-live-search="true" name="tags[p12t1]">
					<option v-for="(value, key) in auto_types" :value="key" v-text="key + ' ' + value"></option>
				</select>
			</div>
		</div>
		<div class="form-group border-bottom">
			<label class="font-weight-bold">Страна регистрации: *</label>
			<select class="selectpicker" data-width="100%" v-model="country1" data-live-search="true" name="tags[p14t1]">
				<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
			</select>
		</div>
		<div class="form-row border-bottom pb-1">
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Марка, модель: *</label>
					<input type="text" v-model="marka" value="" name="tags[p11t1]" maxlength="100" class="form-control" />
				</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Т/с перемещается как товар: *</label>
				<select name="tags[p13t1]" class="custom-select">
					<option value="0" {{ $tags['p13t1'] == 0 ? 'selected' : '' }}>Нет</option>
					<option value="1" {{ $tags['p13t1'] == 1 ? 'selected' : '' }}>Да</option>
				</select>
			</div>
		</div>
		<div class="form-row border-bottom">
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Год выпуска: *</label>
				<input type="text" maxlength="4" v-model="made_year" value="" name="tags[p22t1]" class="form-control" />
			</div>
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Цвет: *</label>
				<input type="text" maxlength="20" v-model="auto_color" value="" name="tags[p24t1]" class="form-control" />
			</div>
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Номер тех паспорта: *</label>
				<input type="text" maxlength="20" v-model="texpass_num" value="" name="tags[p27t1]" class="form-control" />
			</div>
		</div>
		<div class="form-row border-bottom pt-2 pb-1">
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">VIN номер: *</label>
				<input type="text" maxlength="20" v-model="vin_num" value="" name="tags[p19t1]" class="form-control" />
			</div>
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Номер двигателя: *</label>
				<input type="text" maxlength="20" v-model="motor_num" value="" name="tags[p20t1]" class="form-control" />
			</div>
			<div class="form-group col-sm-4">
				<label class="font-weight-bold">Объем двигателя (см&sup3): *</label>
				<input type="text" maxlength="8" v-model="motor_size" value="" name="tags[p23t1]" class="form-control" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Номер шасси:</label>
				<input type="text" maxlength="20" v-model="chassis_num" value="" name="tags[p21t1]" class="form-control">
			</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Номер кузова:</label>
				<input type="text" maxlength="20" v-model="carcase_num" value="" name="tags[p17t1]" class="form-control" />
			</div>
		</div>
		<div class="form-row border-bottom">
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Гос. номер прицепа, полуприцепа:</label>
				{{-- <div v-for="(row, index) in trailer_nums" class="input-group" :key="index">
					<input v-model="input" type="text" required maxlength="10" class="form-control" :name=`tags[p16t1][${index}]` />
					<input v-model="trailer_nums" type="text" maxlength="10" class="form-control" />
	      	<div class="input-group-append">
	      		<button v-if="index == 0" @click="addInput" class="btn btn-link input-group-text" type="button"><i class="fas fa-plus fa-xs"></i></button>
	      		<button v-else @click="removeInput(index)" class="btn btn-link input-group-text" type="button"><i class="fas fa-minus fa-xs"></i></button>
	      	</div>
	      </div> --}}

	      <div class="input-group">
					<input v-model="input" name="tags[p16t1][]" type="text" maxlength="10" class="form-control" />
	      	<div class="input-group-append">
	      		<button @click="addInput" class="btn btn-link input-group-text" type="button"><i class="fas fa-plus fa-xs"></i></button>
	      	</div>
	      </div>

	      <div v-for="(row, i) in trailer_nums" class="input-group">
	      	{{-- <input v-if="!row" name=`tags[p16t1]` value="" type="text" maxlength="10" class="form-control" /> --}}
	      	<input v-if="row != null" :value="row" :name=`tags[p16t1][${i}]` type="text" maxlength="10" class="form-control" />
	      	<div v-if="row != null" class="input-group-append">
	      		<button @click="removeInput" class="btn btn-link input-group-text" type="button"><i class="fas fa-minus fa-xs"></i></button>
	      	</div>
	      </div>
			</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold">Номер разрешения:</label>
				<input type="text" value="" maxlength="10" v-model="access_num" name="tags[p28t1]" class="form-control" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-sm-6">
				<label class="font-weight-bold" for="number_auto">Страна начала перевозки: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" v-model="country2" data-live-search="true" name="tags[p5t1]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="font-weight-bold" for="number_auto">Страна окончания перевозки: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" v-model="country3" data-live-search="true" name="tags[p6t1]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
