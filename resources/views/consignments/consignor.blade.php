<div class="card">
	<div class="card-header h4 py-2">
		Грузооотправитель
	</div>
	<div class="card-body">
		<div class="form-row border-bottom pb-1 mb-2">
			<div class="col-6">
				<label class="font-weight-bold">Форма собственности:</label>
				<select class="custom-select" name="tags[p5t2]" v-model="consignor_type">
					<option :value="0">Юридическое лицо</option>
					<option :value="1">Физическое лицо</option>
				</select>
			</div>
			<div class="col-6">
				<label class="font-weight-bold">Страна отправки груза:</label>
				<div class="">
					<select class="selectpicker" v-model="country1" data-width="100%" data-live-search="true" name="tags[p1t2]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>
		</div>
		
		{{-- Физическое лицо --}}
		<div v-show="consignor_type == 1" class="">
			<div class="form-row">
				<div class="col-6">
					<label class="font-weight-bold">Серия и № паспорта:</label>
					<div class="form-row">
						<div class="col-3">
							<input type="text" maxlength="2" v-model="passport_s" name="tags[p9t2][0]" class="form-control">
						</div>
						<div class="col-9">
							<input type="text" maxlength="13" @input="searchItem" v-model="passport_n" name="tags[p9t2][1]" class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-6">
					<label class="font-weight-bold">Имя:</label>
					<input type="text" name="tags[p10t2]" maxlength="32" v-model="firstname" class="form-control" />
				</div>
			</div>
			<div class="form-row">
				<div class="col-6 mt-2">
					<label class="font-weight-bold">Фамилия:</label>
					<input type="text" name="tags[p11t2]" maxlength="32" v-model="lastname" class="form-control">
				</div>
				<div class="col-6 mt-2">
					<label class="font-weight-bold">Отчество:</label>
					<input type="text" name="tags[p12t2]" maxlength="32" v-model="secondname" class="form-control">
				</div>
			</div>
			<div class="form-group mt-2">
				<label class="font-weight-bold" for="number_auto">Гражданство:</label>
				<div class="">
					<select class="selectpicker" v-model="country4" data-width="100%" data-live-search="true" name="tags[p13t2]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>
		</div>

		{{-- Юридическое лицо --}}
		<div v-show="consignor_type == 0" class="">
			<div class="form-group">
				<label class="font-weight-bold">Наименование грузоотправителя:</label>
				<div class="">
					<input type="text" name="tags[p6t2]" v-model="company_name" @input="searchItem" class="form-control" maxlength="100" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-6">
					<label class="font-weight-bold">Страна грузоотправителя:</label>
					<div class="">
						<select class="selectpicker" v-model="country3" data-width="100%" data-live-search="true" name="tags[p7t2]">
							<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
						</select>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="font-weight-bold">Телефон грузоотправителя:</label>
					<input type="tel" v-model="phone_num" maxlength="30" name="tags[p8t2]" class="form-control" />
				</div>
			</div>
			{{-- <div class="form-group legal_uz d-none col-6">
				<label class="font-weight-bold">INN:</label>
				<input type="text" name="" value="" class="form-control">
			</div> --}}
		</div>

		<div class="form-row">
			<div class="form-group col-6">
				<label class="font-weight-bold">Государство:</label>
				<div class="">
					<select class="selectpicker" v-model="country2" data-width="100%" data-live-search="true" name="tags[p2t2]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
						
					</select>
				</div>
			</div>
			<div class="form-group col-6">
				<label class="font-weight-bold">Область/город:</label>
				<div v-if="country2 == 860" class="">
					<select class="selectpicker" v-model="address1" required data-width="100%" data-live-search="true" name="tags[p3t2]">
						<option v-for="(value, key) in regions" :value="key" :key="key" v-text="key + ' ' + value"></option>
						
					</select>
				</div>
				<input v-else type="text" name="tags[p3t2]" v-model="address1" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="font-weight-bold">Район, улица и номер дома:</label>
			<textarea class="form-control" name="tags[p4t2]" v-model="address2" rows="2"></textarea>
		</div>
		
	</div>
</div>
