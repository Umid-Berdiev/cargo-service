@extends('layouts.master')

@section('content')
  
  <div class="row justify-content-between">
    <div class="col-auto">
      <h2 class="title">Документы </h2>
    </div>
    <div class="col-auto">
      @include('partials.alerts')
    </div>
    <div class="col-auto">
      <a href="{{ route('documents.create') }}" class="btn btn-secondary"><i class="fas fa-plus fa-lg"></i></a>
    </div>
  </div>
  <hr>
  <table class="bg-white table table-sm table-bordered"> 
    <thead>
      <tr>
        <th>#</th>
        <th>Дата создания</th>
        <th>Дата обновления</th>
        <th>Гос.номер транспорта</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($docs as $doc)
        <tr>
          <th>{{ $doc->title }}</th>
          <td>{{ $doc->created_at->format('d/m/Y') }}</td>
          <td>{{ $doc->updated_at->format('d/m/Y') }}</td>
          <td>{{ json_decode("{" . $doc->tags . "}")->p15t1 }}</td>
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

@endsection
