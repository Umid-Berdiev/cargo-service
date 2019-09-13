<div class="card">
	<div class="card-header h4 py-2">
		Сведения о перевозчике
	</div>
	<div class="card-body">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Форма собственности:</label>
				<select class="custom-select" name="tags[p31t1]" v-model="carrier_type">
					<option :value="0">Юридическое лицо</option>
					<option :value="1">Физическое лицо</option>
				</select>
			</div>
		</div>
		
		{{-- Физическое лицо --}}
		<div v-show="carrier_type == 1" class="form-row">
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Серия и № паспорта: *</label>
				<div class="form-row">
					<div class="col-md-3">
						<input type="text" maxlength="2" v-model="passport_s" name="tags[p38t1][0]" class="form-control">
					</div>
					<div class="col-md-9">
						<input type="text" maxlength="13" @input="searchItem" v-model="passport_n" name="tags[p38t1][1]" class="form-control" />
					</div>
				</div>
			</div>

			<div class="form-group col-md-6">
				<label class="font-weight-bold">Фамилия: *</label>
				<input type="text" maxlength="32" name="tags[p35t1]" v-model="lastname" class="form-control" />
			</div>

			<div class="form-group col-md-6">
				<label class="font-weight-bold">Имя: *</label>
				<input type="text" maxlength="32" name="tags[p36t1]" v-model="firstname" class="form-control" />
			</div>

			<div class="form-group col-md-6">
				<label class="font-weight-bold">Отчество:</label>
				<input type="text" name="tags[p37t1]" maxlength="32" v-model="secondname" class="form-control" />
			</div>

			<div class="form-group col-md-12">
				<label class="font-weight-bold" for="">Гражданство: *</label>
				<div class="">
					<select class="selectpicker" data-width="100%" v-model="country" data-live-search="true" name="tags[p39t1]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>	
		</div>
		
		{{-- Юридическое лицо --}}
		<div v-show="carrier_type == 0" class="form-row">
			<div class="form-group col-md-12">
				<label class="font-weight-bold">Полное наименование перевозчика: *</label>
				<div class="">
					<input type="text" name="tags[p32t1]" @input="searchItem" v-model="company_name" class="form-control" maxlength="100" />
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="font-weight-bold">Страна: *</label>
				<div class="">
					<select class="selectpicker" v-model="company_country" data-width="100%" data-live-search="true" name="tags[p33t1]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="font-weight-bold">Телефон: *</label>
				<input type="tel" maxlength="30" name="tags[p34t1]" v-model="phone_num" class="form-control" />
			</div>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Адрес *</label>
			<textarea class="form-control" name="tags[p30t1]" rows="2" v-model="address"></textarea>
		</div>

		{{-- <div class="form-inline px-10 mb-10 numberBooksTir" style="display: none;">
			<label><b>MDP Number</b></label>
			<div class="clearfix"></div>
			<div class=" col-md-2">
				<input type="text" value="" maxlength="3" name="Carrier[mdp_number_first]" class="form-control" autocomplete="false" />
			</div>
			<div class=" col-md-2">
				<input type="text" value="" maxlength="3" name="Carrier[mdp_number_second]" class="form-control" autocomplete="false" />
			</div>
			<div class=" col-md-6">
				<input type="text" maxlength="10" value="" name="Carrier[mdp_number]" class="form-control" autocomplete="false" />
			</div>
		</div> --}}
	</div>
</div>
