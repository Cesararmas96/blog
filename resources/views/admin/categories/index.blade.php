@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Listado de Categorias</h1>
@stop

@section('content')
  @if (session('info'))
    <div class="alert alert-success">
      <strong>{{ session('info') }}</strong>
    </div>
  @endif
  <div class="card">
    @can('admin.categories.create')
      <div class="card-header">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary btn-sm">Agregar Categorias</a>
      </div>
    @endcan
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td width="10px">
                @can('admin.categories.edit')
                  <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">Editar</a>
                @endcan
              </td>
              <td width="10px">
                @can('admin.categories.delete')
                  <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div>
    {{ $categories->links() }}
  </div>
@stop
