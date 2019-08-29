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

<script type="text/javascript">
	$(document).ready(function() {
		$("#add_row").on("click", function() {
      // Dynamic Rows Code
      
      // Get max row id and set new id
      var newid = 0;
      $.each($("#tab_logic tr"), function() {
      	if (parseInt($(this).data("id")) > newid) {
      		newid = parseInt($(this).data("id"));
      	}
      });
      newid++;
      
      var tr = $("<tr></tr>", {
      	id: "addr"+newid,
      	"data-id": newid
      });
      
      // loop through each td and create new elements with name of newid
      $.each($("#tab_logic tbody tr:nth(0) td"), function() {
      	var td;
      	var cur_td = $(this);

      	var children = cur_td.children();

        // add new td and element if it has a nane
        if ($(this).data("name") !== undefined) {
        	td = $("<td></td>", {
        		"data-name": $(cur_td).data("name")
        	});

        	var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
        	c.attr("name", $(cur_td).data("name") + newid);
        	c.appendTo($(td));
        	td.appendTo($(tr));
        } else {
        	td = $("<td></td>", {
        		'text': $('#tab_logic tr').length
        	}).appendTo($(tr));
        }
      });
      
      // add delete button and td
      /*
      $("<td></td>").append(
          $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
              .click(function() {
                  $(this).closest("tr").remove();
              })
      ).appendTo($(tr));
      */
      
      // add the new row
      $(tr).appendTo($('#tab_logic'));
      
      $(tr).find("td button.row-remove").on("click", function() {
      	$(this).closest("tr").remove();
      });
    });

    // Sortable Code
    var fixHelperModified = function(e, tr) {
    	var $originals = tr.children();
    	var $helper = tr.clone();

    	$helper.children().each(function(index) {
    		$(this).width($originals.eq(index).width())
    	});

    	return $helper;
    };

    $(".table-sortable tbody").sortable({
    	helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();

    $("#add_row").trigger("click");
  });
</script>