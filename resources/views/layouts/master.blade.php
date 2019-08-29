<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/dded8d9ada.js"></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  {{-- Custom styles --}}
	@yield('css')
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
  	<div class="container">
  		<a class="navbar-brand" href="{{ url('/documents') }}">Документы</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
  			<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
  			<!-- Left Side Of Navbar -->
  			<ul class="navbar-nav mr-auto">
					<li class="dropdown">
	          <a href="#" class="nav-link dropdown-toggle btn text-white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Услуги <span class="caret"></span></a>
	          <ul class="dropdown-menu mt-2">
	            <a class="dropdown-item" href="/">Уведомление о прибытии товаров, перевозимых автомобильным транспортом</a>
	          </ul>
	        </li>
	        @hasrole('admin')
            <li class="nav-item">
              <a class="nav-link btn text-white" href="{{ route('admin.users.index') }}">
              	Управление ползователей</a>
            </li>
          @endhasrole
  			</ul>

  			<!-- Right Side Of Navbar -->
  			<ul class="navbar-nav ml-auto">
  				<!-- Authentication Links -->
  				@guest
  				<li class="nav-item">
  					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
  				</li>
  				@if (Route::has('register'))
  				<li class="nav-item">
  					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
  				</li>
  				@endif
  				@else
  				<li class="nav-item dropdown">
  					<a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
  						{{ Auth::user()->name }} <span class="caret"></span>
  					</a>

  					<div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
  						<a class="dropdown-item" href="{{ url('user.profile') }}"
	  						onclick="event.preventDefault();">
	  						{{ __('Profile') }}
	  					</a>

  						<a class="dropdown-item" href="{{ route('logout') }}"
	  						onclick="event.preventDefault();
	  						document.getElementById('logout-form').submit();">
	  						{{ __('Logout') }}
	  					</a>

	  					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	  						@csrf
  						</form>
	  				</div>
	  			</li>
	  			@endguest
	  		</ul>
	  	</div>
	  </div>
	</nav>

	<main class="py-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
	    		@yield('content')
				</div>
			</div>
		</div>
  </main>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Запросить доп. информацию</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	          <textarea class="form-control" id="codeAlert"></textarea>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary sendCodeAlert">OK</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Добавить код уведомление</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	          <textarea class="form-control" id="codeConfirmAlert"></textarea>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary sendCodeConfirmAlert">OK</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		function	displayNoneBlock(item) {
			var x = document.getElementsByClassName(item);
			for (item of x) {
				item.style.display = item.style.display === 'none' ? '' : 'none';
			}
			// x.style.display = x.style.display === 'none' ? '' : 'none';
	 	}

		function currentDate() {
	 		var date = new Date();
			var currentDate = date.toISOString().slice(0,10);
			return currentDate;
	 	}
		document.getElementById('date_from').value = currentDate();
		document.getElementById('date_to').value = currentDate();

		function onSelectType($select, $type_1, $type_2){
			if ($select.val() == $type_1) {
				$('.individual').removeClass('d-none');
				$('.legal').addClass('d-none');
				// $('.legal_uz').addClass('d-none');
			}else{
				// $('.legal_uz').removeClass('d-none');
				$('.individual').addClass('d-none');
				$('.legal').removeClass('d-none');
			}
		}

		$(document).ready(function(){
			var next = 1;
			$(".add-more").click(function(e){
				e.preventDefault();
				var addto = "#field" + next;
				var addRemove = "#field" + (next);
				next = next + 1;
				var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="tags[container_number][' + (next - 1) + ']" type="text">';
				var newInput = $(newIn);
				var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" ><i class="fa fa-minus"></i></button></div><div id="field" class="input-group">';
				var removeButton = $(removeBtn);
				$(addto).after(newInput);
				$(addRemove).after(removeButton);
				$("#field" + next).attr('data-source',$(addto).attr('data-source'));
				$("#count").val(next);  

				$('.remove-me').click(function(e){
					e.preventDefault();
					var fieldNum = this.id.charAt(this.id.length-1);
					var fieldID = "#field" + fieldNum;
					$(this).remove();
					$(fieldID).remove();
				});
			});
		});

		$(document).ready(function(){
			var next = 1;
			$(".add-more2").click(function(e){
				e.preventDefault();
				var addto = "#govNumber" + next;
				var addRemove = "#govNumber" + (next);
				next = next + 1;
				var newIn = '<input autocomplete="off" class="input form-control" id="govNumber' + next + '" name="govNumber' + next + '" type="text">';
				var newInput = $(newIn);
				var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" ><i class="fa fa-minus"></i></button></div><div id="govNumber" class="input-group">';
				var removeButton = $(removeBtn);
				$(addto).after(newInput);
				$(addRemove).after(removeButton);
				$("#govNumber" + next).attr('data-source',$(addto).attr('data-source'));
				$("#count").val(next);  

				$('.remove-me').click(function(e){
					e.preventDefault();
					var fieldNum = this.id.charAt(this.id.length-1);
					var fieldID = "#govNumber" + fieldNum;
					$(this).remove();
					$(fieldID).remove();
				});
			});
		});

	</script>

	@yield('javascripts')

</body>

</html>
