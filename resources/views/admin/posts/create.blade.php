@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Crear</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}


      @include('admin.posts.partials.form')

      {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}

    </div>
  </div>
@stop

@section('css')
  <style>
    .imageWrapper {
      position: relative;
      padding-botton: 55%;
    }



    .image {
      position: relative;
      object-fit: cover;
      width: 100%;
      height: 100%;
      border-radius: 10%;
      padding: 20px;
    }

  </style>
@stop



@section('js')
  <script
    src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}">
  </script>
  <script>
    $(document).ready(function() {
      $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
      });
    });
  </script>
@endsection

@push('js')
  <script src={{ asset('ckeditor/ckeditor.js') }}></script>
  <script>
    ClassicEditor
      .create(document.querySelector('#extract'))
      .catch(error => {
        console.error(error);
      });

    ClassicEditor
      .create(document.querySelector('#body'))
      .catch(error => {
        console.error(error);
      });


    // Cambiar imagenes

    document.getElementById('file').addEventListener('change', cambiarImagenes);

    function cambiarImagenes(event) {
      var file = event.target.files[0];
      var reader = new FileReader();
      reader.onload = event => {
        document.getElementById('picture').setAttribute('src', event.target.result);
      }
      reader.readAsDataURL(file);
    }
  </script>
@endpush
