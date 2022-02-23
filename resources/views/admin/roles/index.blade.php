@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  @can('admin.roles.create')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-secondary btn-sm float-right">Nuevo Rol</a>
  @endcan
  <h1>Index Roles</h1>
@stop

@section('content')

  @if (session('info'))
    <div class="alert alert-success">
      <strong>{{ session('info') }}</strong>
    </div>
  @endif
  <div class="card">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Role</th>
            <th colspan="2"></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $role->id }}</td>
              <td>{{ $role->name }}</td>
              <td width="10">
                @can('admin.roles.edit')
                  <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary btn-sm">Editar</a>
                @endcan
              </td>
              <td width="10">
                @can('admin.roles.delete')
                  <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                  </form>
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop
