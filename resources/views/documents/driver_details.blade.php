<div class="card">
	<div class="card-header h4 py-2">
		Сведения о лице, ответственного за доставку груза
	</div>
	<div class="card-body">
		{{-- Физическое лицо --}}
		<div class="form-row">
			<div class="col-md-6 individualDriver">
				<label class="font-weight-bold">Серия и № паспорта:</label>
				<div class="form-row">
					<div class="col-md-3">
						<input type="text" maxlength="2" v-model="passport_s" name="tags[p43t1][0]" class="form-control" />
					</div>
					<div class="col-md-9">
						<input type="text" maxlength="13" v-model=passport_n @input="searchItem" name="tags[p43t1][1]" class="form-control" />
					</div>
				</div>
			</div>

			<div class="form-group individualDriver col-md-6">
				<label class="font-weight-bold">Фамилия:</label>
				<input type="text" name="tags[p40t1]" maxlength="32" v-model="lastname" class="form-control" />
			</div>

			<div class="form-group individualDriver col-md-6">
				<label class="font-weight-bold">Имя:</label>
				<input type="text" name="tags[p41t1]" maxlength="32" v-model="firstname" class="form-control" />
			</div>

			<div class="form-group individualDriver col-md-6">
				<label class="font-weight-bold">Отчество:</label>
				<input type="text" name="tags[p42t1]" maxlength="32" v-model="secondname" class="form-control" />
			</div>

			<div class="form-group individualDriver col-md-12">
				<label class="font-weight-bold" for="">Гражданство:</label>
				<div class="">
					<select class="selectpicker" data-width="100%" v-model="country" data-live-search="true" name="tags[p45t1]">
						<option v-for="(value, key) in countries" :value="key" :key="key" v-text="key + ' ' + value"></option>
					</select>
				</div>
			</div>

			<div class="form-group col-md-12">
				<label class="font-weight-bold">Адрес:</label>
				<textarea class="form-control" name="tags[p46t1]" rows="2" v-model="address"></textarea>
			</div>

			<div class="form-group col-md-12">
				<label class="font-weight-bold">Паспорт кем выдан:</label>
				<input type="text" v-model="auth_affair" name="tags[p44t1]" maxlength="30" class="form-control" />
			</div>	
		</div>
	</div>
</div>
