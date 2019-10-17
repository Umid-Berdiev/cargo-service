<div class="form-group col-2">
	<label>Тип документа:</label>
	<select class="selectpicker" data-width="100%" data-live-search="true" name="p1t4">
		@foreach ($reference_docs_type as $key => $value)
			<option data-tokens="{{ $key }}" value="{{ $key }}" {{ $key == $ref_doc->p1t4 ? 'selected' : '' }}>{{ $key . ' ' . $value }}</option>
		@endforeach
	</select>
</div>
<div class="form-group col-2">
	<label>Номер документа:</label>
	<input type="text" maxlength="100" name="p2t4" value="{{ old("p2t4") ?? $ref_doc->p2t4 }}" class="form-control" />
</div>
<div class="form-group col-2">
	<label>Дата документа:</label>
	<input type="date" name="p3t4" value="{{ old("p3t4") ?? $ref_doc->p3t4 }}" class="form-control" />
</div>
{{-- <div class="form-group col-2">
	<label>Название файла:</label>
	<input disabled type="text" name="p4t4" value="{{ old("p4t4") ?? $ref_doc->p4t4 }}" class="form-control" />
</div> --}}
<div class="form-group col-3">
	<label>Тело электронного документа:</label>
	<input type="file" name="p5t4" class="" /><br />
  <input type="hidden" name="hidden_image" value="{{ $ref_doc->p5t4 }}" />
  <img src="{{ asset('images/' . base64_decode($ref_doc->p5t4)) }}" alt="image" width="100" />
</div>
