@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="float-left">@include('partials.alerts')</div>
      <a href="{{ route('consignments.edit', [request()->route('document'), request()->route('consignment')]) }}" class="btn btn-light float-right mb-1">Вернуться</a>
    </div>
    <div class="clearfix"></div>
    <div class="col-12 mb-3">
      <div class="card">
      	<div class="card-header h4 py-2">
      		Товаросопроводительный документ - форма добавления
      	</div>
      	<div class="card-body">
      		<?
            $action = '';
            $method = '';
            if (request()->route()->named('reference_docs.edit')) {
              $action = route('reference_docs.update', [request()->route('document'), request()->route('consignment'), request()->route('reference_doc')]);
                $method = method_field('patch');
            } else {
              $action = route('reference_docs.store', [request()->route('document'), request()->route('consignment')]);
              $method = "";
            }
          ?>
          <form action="{{ $action }}" method="post" class="" enctype="multipart/form-data">
            {{ $method }}
            @csrf
            <div class="form-row">
              @include('reference_docs.form')
              <div class="form-group">
                <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Добавить</button>
              </div>
            </div>
          </form>	
      	</div>
      </div>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header h4 py-2">Товаросопроводительные документы</div>
        <div class="card-body">
          <table class="table table-bordered"> 
            <thead>
              <tr>
                <th>Тип документа</th>
                <th>Номер документа</th> 
                <th>Дата документа</th> 
                <th>Название файла</th>
                <th>Тело электронного документа</th>
                <th>Действия</th>
              </tr>
            </thead>
            <tbody>                                 
              @if($ref_docs->count())
                @foreach ($ref_docs as $item)
                  <tr>
                    <td>
                      @foreach ($reference_docs_type as $key => $value)
                        @if($key == $item->p1t4)
                          {{ $value }}
                        @endif
                      @endforeach
                    </td> 
                    <td>{{ $item->p2t4 }}</td>
                    <td>{{ $item->p3t4 }}</td> 
                    <td>{{ $item->p4t4 }}</td> 
                    <td>
                      {{-- <img src="{{ asset('images/' . base64_decode($item->p5t4)) }}" alt="image" width="100px" /> --}}
                      <img src="{{ 'data:image/png/jpeg;base64,' . $item->p5t4 }}" alt="image" width="100px" />
                    </td>
                    <td>
                      {{-- <a class="btn btn-sm btn-primary float-left py-1 mr-1" href="{{ route('reference_docs.edit', [request()->route('document'), request()->route('consignment'), $item->id]) }}">
                        <i class="fas fa-edit"></i></a> --}}
                      <form action="{{ route('reference_docs.destroy', [request()->route('document'), request()->route('consignment'), $item->id]) }}" method="post">
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
  </div>
@endsection

@section('javascripts')
  {{-- <script type="text/javascript">
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
  </script> --}}
@endsection