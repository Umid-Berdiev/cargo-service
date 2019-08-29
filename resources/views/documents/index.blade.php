@extends('layouts.master')

@section('content')
  
  <div class="col">@include('partials.alerts')</div>
  <div class="clearfix mb-3" style="border-bottom: 1px solid #b7b7b7;">
    <h2 class="float-left">Документы </h2>
    <a href="{{ route('documents.create') }}" class="ml-3 btn btn-secondary float-right"><i class="fas fa-plus fa-lg"></i></a> 
  </div>
  <div class="col-xs-12 bg-white">
    <table class="table table-sm table-bordered"> 
      <thead>
        <tr>
          <th>#</th>
          <th>Дата создания</th>
          <th>Дата обновления</th>
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($docs as $doc)
          <tr>
            <th>{{ $doc->title }}</th>
            <td>{{ $doc->created_at }}</td>
            <td>{{ $doc->updated_at }}</td>
            <td>
              <a class="btn btn-sm btn-primary float-left mr-1" href="{{ route('documents.edit', $doc->id) }}"><i class="fas fa-edit"></i></a>
              <form action="{{ route('documents.destroy', $doc->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('А Вы уверены?')"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
        {{-- <tr> 
          <th scope="row">6602</th>
          <td>В процессе</td>
          <td>0</td>
          <td>06-07-2019</td>
          <td>11-07-2019</td>
          <td>
            <a href="/documents/edit"><i class="fas fa-edit fa-lg"></i></a>
          </td>
        </tr> --}}
      </tbody>
    </table>
  </div>

@endsection
