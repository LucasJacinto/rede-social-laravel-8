@extends('layouts.main')

@section('title', 'Rede Social')

@section('content')

<div id="post-create-container" class="col-md-5 offset-md-3">
    <form action="/algumacoisa" method="POST">
        <textarea name="description" id="description" class="form-control" placeholder="Nova publicação"></textarea>
        <div>
            <input type="submit" class="btn btn-primary" value="Postar">
        </div>
    </form>
</div>


<div id="posts-container" class="col-md-12">
    @foreach ($posts as $post)
        <div id="cards-container" class="row col-md-12">
            <div id="teste">
                <p class="card-date">08/06/2022</p>
                <img src="/img/banner.jpg" alt="Imagem postada por Xxx">
                <p class="card-content">{{ $post->content }}</p>
            </div>
        </div>
    @endforeach
</div>

@endsection
