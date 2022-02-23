<div>
  {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
  <div class="card">

    <div class="card-header">
      <input class="form-control" placeholder="Nombre o Correo de un Usuario" type="text" wire:model="search">

    </div>

    @if ($users->count())
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td width="10">
                  @can('admin.users.edit')
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Editar</a>
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="card-footer">
        {{ $users->links() }}
      </div>
    @else
      <div class="card-bod">
        <strong>No Exiten Registros</strong>
      </div>
    @endif
  </div>
</div>
