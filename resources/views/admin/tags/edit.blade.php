@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Editar</h1>
@stop

@section('content')
@if (session('info'))
  <div class="alert alert-success" role="alert">
    <strong>{{ session('info') }}</strong>
  </div>
@endif
  <div class="card">
    <div class="card-body">
      {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}
      @include('admin.tags.partials.form')

      {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
      {!! Form::close() !!}
    </div>
  </div>
@stop
