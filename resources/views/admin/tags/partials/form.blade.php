<div class="form-group">
  {!! Form::label('name', 'Nombre') !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre']) !!}
</div>
@error('color')
  <span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
  {!! Form::label('slug', 'Slug') !!}
  {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Slug', 'readonly']) !!}
</div>
@error('slug')
  <span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
  {!! Form::label('color', 'Color') !!}
  {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
</div>

@error('color')
  <span class="text-danger">{{ $message }}</span>
@enderror

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
