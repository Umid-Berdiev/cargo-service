@extends('layouts.master')

@section('content')

	<div class="row justify-content-between">
		<div class="col-auto">
			<h2 class="title">Документ {{ $document->title }} </h2>
		</div>
		<div class="col-auto">
			@include('partials.alerts')
		</div>
		<div class="col-auto">
			<a href="{{ route('documents.edit', $document->id) }}" class="btn btn-light border-secondary mr-1">Вернуться к документу</a>
			<a href="{{ route('consignments.create', $document->id) }}" class="btn btn-success">Добавить новую партию</a>
		</div>
	</div>	  
	<hr />

	<table class="bg-white table table-sm table-bordered"> 
		<thead>
			<tr>
				<th>Партия</th>
				<th>Кол. товаров</th>
				<th>Кол. груз. мест</th>
				<th>Вес брутто(кг)</th>
				<th>Стоимость</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($consignments as $record)
				<tr>
					<td>{{ $record->title }}</td>
					<td>{{ $record->goods->count() }}</td>
					<td>
				    {{ (int)json_decode("{" . $record->tags . "}")->p15t2 }}
					</td>
					<td>
						{{ 
							array_reduce(json_decode($record->goods), function($acc, $item) {
								return $acc += $item->p5t3;
							}) 
						}}
					</td>				
					<td>
						<?
							foreach ($currencies as $key => $value) {
								$arr = [];
								foreach ($record->goods as $item) {
									if ($key == $item->p7t3) array_push($arr, $item->p6t3);
								}
								if (count($arr) > 0) {
									$v = array_reduce($arr, function($acc, $item) {
										return $acc += $item;
									});
									echo $v . ' ' . $value;
								}
							}
						?>
					</td>
					<td>
						<a class="btn btn-sm btn-primary float-left mr-1" href="{{ route('consignments.edit', ['document' => $document->id, 'consignment' => $record->id]) }}">
							<i class="fas fa-edit"></i>
						</a>
						<form action="{{ route('consignments.destroy', ['document' => $document->id, 'consignment' => $record->id]) }}" method="post">
							@csrf
							@method('delete')
							<button class="btn btn-sm btn-danger float-left" type="submit" onclick="return confirm('Вы уверены?')">
								<i class="fas fa-trash"></i>
							</button>
						</form>
						{{-- <a href="{{ route('goods.create', [$document->id, $record->id]) }}" class="btn btn-sm btn-success" type="submit"><i class="fas fa-plus"></i></a> --}}
					</td>
				</tr>
			@endforeach
			<tr>
				<th>ВСЕГО</th>
				<th>
					<?
						$totalCount = 0;
						foreach ($consignments as $party) {
							$totalCount += $party->goods->count();
						}
					?>
					{{ $totalCount }}
				</th>
				<th>
					<?
						$totalPlace = 0;
						foreach ($consignments as $record) {
				    	$totalPlace += json_decode("{" . $record->tags . "}")->p15t2;
							
						}
					?>
					{{ $totalPlace }}
				</th>
				<th>
					<?
						$totalWeight = 0;
						foreach ($consignments as $party) {
							foreach ($party->goods as $product) {
								$totalWeight += $product->p5t3;
							}
						}
					?>
					{{ $totalWeight }}
				</th>
				<th>
					<?
						foreach ($currencies as $key => $value) {
							$arr = [];
							$totalValue = 0;
							foreach ($consignments as $party) {
								foreach ($party->goods as $item) {
									if ($key == $item->p7t3) array_push($arr, $item->p6t3);
								}
								if (count($arr) > 0) {
									$totalValue = array_reduce($arr, function($acc, $item) {
										return $acc += $item;
									});
								}
							}
							if($totalValue) echo $totalValue . ' ' . $value . '<br />';
						}
					?>
				</th>
				<th></th>
			</tr>
		</tbody>
	</table>

@endsection
