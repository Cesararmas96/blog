<div class="card">
  <div class="card-header">
    <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre">
  </div>
  @if ($posts->count())

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
          @foreach ($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>{{ $post->name }}</td>
              <td width="10">
                @can('admin.posts.edit')
                  <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">
                    Editar
                  @endcan
                </a>
              </td>
              <td width="10">
                @can('admin.posts.delete')
                  <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('delete')

                    <button class="btn btn-danger btn-sm" type="submit">Eliminar </button>
                  </form>
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="card-footer">
      <div>
        {{ $posts->links() }}
      </div>
    </div>
  @else
    <div>
      <strong>No hay Registro</strong>
    </div>
  @endif

</div>
