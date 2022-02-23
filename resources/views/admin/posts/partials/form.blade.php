  <div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
  </div>

  @error('name')
    <small class="text-danger">{{ $message }}</small>
  @enderror

  <div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del blog', 'readonly']) !!}
  </div>


  @error('slug')
    <small class="text-danger">{{ $message }}</small>
  @enderror

  <div class="form-group">
    {!! Form::label('category_id', 'Categorias:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
  </div>

  @error('category_id')
    <small class="text-danger">{{ $message }}</small>
  @enderror

  <div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
      <label class="mr-2">
        {!! Form::checkbox('tags[]', $tag->id, null) !!}
        {{ $tag->name }}
      </label>
    @endforeach
  </div>

  @error('tags')
    <small class="text-danger">{{ $message }}</small>
  @enderror


  <div class="row mb-3">
    <div class="col">
      <div class="imageWrapper">
        {{-- verifica si esta definido --}}
        @isset($post->image)
          <img id="picture" class="image" src="{{ Storage::url($post->image->url) }}" alt="">
        @else
          <img id="picture" class="image" src="{{ url('storage/policlinica.jpg') }}" alt="">
        @endisset
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        {!! Form::label('file', 'Imagen del Post') !!}
        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        @error('file')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>


      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam cupiditate deserunt saepe inventore vitae sint
      fugiat laudantium ratione, error repudiandae rem consequatur eos, tempore nemo omnis quod dolor quisquam ab!
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
  </div>

  @error('extract')
    <small class="text-danger">{{ $message }}</small>
  @enderror



  <div class="form-group">
    {!! Form::label('body', 'Contenido:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
  </div>

  @error('body')
    <small class="text-danger">{{ $message }}</small>
  @enderror

  <div class="form-group">
    <p class="font-weight-bold"> Estado</p>
    <label for="" class="mr-2">
      {!! Form::radio('status', 1, true) !!}
      Borrador
    </label>

    <label for="">
      {!! Form::radio('status', 2) !!}
      Publicado
    </label>
  </div>
