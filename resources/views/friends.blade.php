@extends('layouts.main')

@section('title', 'Meus Amigos | Rede Social')

@section('content')

<h1>Meus amigos</h1>
@if ($busca != '')
<p>Amigo: {{ $busca }}</p>
@endif

<a href="/">Voltar para a home</a>
@endsection
