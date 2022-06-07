@extends('layouts.main')

@section('title', 'Rede Social')

@section('content')
<!--
<div id="post-create-container" class="col-md-5 offset-md-3">
    <form action="/algumacoisa" method="POST">
        <textarea name="description" id="description" class="form-control" placeholder="Nova publicação"></textarea>
        <input type="submit" class="btn btn-primary" value="Postar">
    </form>
</div>
-->

@foreach ($posts as $post)
    <p>{{ $post->content }}</p>
@endforeach

@endsection
