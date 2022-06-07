@extends('layouts.main')

@section('title', 'Rede Social')

@section('content')

<h1>Algum título</h1>
@if (10 > 5)
    <p>A condição é true</p>
@endif

@if ($nome == "Lucas")
<p>O nome é {{ $nome }} e ele tem {{ $idade }} anos</p>
@else
<p>O nome não é Lucas</p>
@endif

@for ($i = 0; $i < count($arr); $i++)
    <p>{{ $arr[$i] }}</p>
    @if ($i == 2)
    <p>i = 2</p>
    @endif
@endfor

@foreach ($nomes as $nome)
    <p>{{ $loop->index }} - {{ $nome }}</p>
@endforeach

@endsection
