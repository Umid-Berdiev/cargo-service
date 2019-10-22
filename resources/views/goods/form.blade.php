@csrf
<div class="form-group">
	<label>Наименование товара:</label>
	<input type="text" name="p1t3" value="{{ old("p1t3") ?? $product->p1t3 }}" required class="form-control" autocomplete="off" maxlength="150" />
</div>
<div class="form-row">
	<div class="form-group col-md-6">
		<label>Код ТНВЭД:</label>
		<div class="input-group">
			<input type="number" maxlength="10" name="p2t3" required value="{{ old("p2t3") ?? $product->p2t3 }}" class="form-control" autocomplete="off" />
		</div>
	</div>
	<div class="form-group col-md-6">
		<label>Еденица измерения:</label>
		<select class="selectpicker" data-width="100%" required data-live-search="true" name="p3t3">
			@foreach ($units as $key => $value)
				<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $product->p3t3 ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-md-6">
		<label>Кол. товаров по еденице измерения:</label>
		<input type="number" step="0.001" min="0" name="p4t3" required value="{{ old("p4t3") ?? $product->p4t3 }}" class="form-control" autocomplete="off" />
	</div>
	<div class="form-group col-md-6">
		<label>Вес брутто товара (кг):</label>
		<input type="text" name="p5t3" required value="{{ old("p5t3") ?? $product->p5t3 }}" class="form-control" autocomplete="off" />
	</div>
	<div class="form-group col-md-6">
		<label>Фактурная стоимость:</label>
		<input type="text" name="p6t3" required value="{{ old("p6t3") ?? $product->p6t3 }}" class="form-control" autocomplete="off" />
	</div>
	<div class="form-group col-md-6">
		<label>Код валюты:</label>
		<select class="selectpicker" required data-width="100%" data-live-search="true" name="p7t3">
			@foreach ($currencies as $key => $value)
				<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $product->p7t3 ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
			@endforeach
		</select>
	</div>
</div>
