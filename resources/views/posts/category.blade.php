<x-app-layout>
  <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-6">
    <h1 class="uppercase font-bold text-center text-3xl">Categoria: {{ $category->name }}</h1>
    @foreach ($posts as $post)
      <x-card-post :post="$post" />
    @endforeach

    <div class="mt-4">
      {{ $posts->links() }}
    </div>
  </div>
</x-app-layout>
