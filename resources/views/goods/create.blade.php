@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="float-left">@include('partials.alerts')</div>
			<a href="{{ route('consignments.edit', [request()->route('document'), request()->route('consignment')]) }}" class="btn btn-light float-right mb-1">Вернуться</a>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header h4 py-2">Список товаров</div>
				<div class="card-body">
					<table class="table table-sm table-bordered" id="goodsList"> 
						<thead>
							<tr>
								<th>Код ТНВЭД</th>
								<th>Кол. товара</th> 
								<th>Вес брутто(кг)</th> 
								<th>Фактурная стоимость</th>
								<th>Действия</th>
							</tr>
						</thead>
						<tbody>																	
							@if($products->count())
								@foreach ($products as $item)
									<tr>
										<td>{{ $item->p2t3 }}</td> 
										<td>{{ $item->p4t3 }}</td>
										<td>{{ $item->p5t3 }}</td> 
										<td>
											@foreach ($currencies as $key => $value)
												{{ $key == $item->p7t3 ? $item->p6t3 . ' (' . $value . ')' : '' }}
											@endforeach
										</td> 
										<td>
											<a class="btn btn-sm btn-primary float-left py-1" href="{{ route('goods.edit', [request()->route('document'), request()->route('consignment'), $item->id]) }}">
												<i class="fas fa-edit"></i></a>
											<form action="{{ route('goods.destroy', [request()->route('document'), request()->route('consignment'), $item->id]) }}" method="post">
				                @csrf
				                @method('delete')
				                <button type="submit" class="btn btn-sm btn-danger py-1" onclick="return confirm('А Вы уверены?')"><i class="fas fa-trash-alt"></i></button>
				              </form>
										</td>
									</tr>
								@endforeach
							@endif
						</tbody> 
					</table>
				</div>
			</div>		
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header h4 py-2">Сведения о товаре</div>
				<div class="card-body">
					<?
						$action = '';
						$method = '';
						if (request()->route()->named('goods.edit')) {
							$action = route('goods.update', [request()->route('document'), request()->route('consignment'), request()->route('goods')]);
								$method = method_field('patch');
				    }
						//if (request(route(''))) {
							//$action = route('goods.update', [request()->route('document'), request()->route('consignment'), request()->route('goods')]);
							//$method = 'patch';
						else {
							$action = route('goods.store', [request()->route('document'), request()->route('consignment')]);
							$method = "";
						}
					?>
					<form action="{{ $action }}" method="post">
						{{-- <input type="hidden" name="_method" value="{{ $method }}"> --}}
						{{ $method }}
						@include('goods.form')
						<button type="submit" class="btn btn-primary ml-auto">Добавить товар</button>
					</form>
				</div>
			</div>
		</div>

	</div>
	
@endsection
