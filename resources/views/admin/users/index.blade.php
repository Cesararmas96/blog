@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Users</h1>
@stop

@section('content')
  <p>Listado </p>
  @livewire('admin.user-index')
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop
