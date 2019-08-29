@if (session('success'))
	<div class="alert alert-success text-center mb-0 py-2" role='alert'>
		{{ session('success') }}
	</div>
@endif

@if (session('warning'))
	<div class="alert alert-warning text-center mb-0 py-2" role='alert'>
		{{ session('warning') }}
	</div>
@endif

@if ($errors->any())
	<div class="alert alert-danger mb-0 py-2" role='alert'>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif