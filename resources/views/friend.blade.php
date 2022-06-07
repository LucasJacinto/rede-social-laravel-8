@extends('layouts.main')

@section('title', 'Amigo | Rede Social')

@section('content')

@if ($id != null)
<p>Amigo: {{ $id }}</p>
@endif

<a href="/">Voltar para a home</a>
@endsection