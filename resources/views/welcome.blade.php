@extends('layouts.main')

@section('title', 'Rede Social')

@section('content')

<div id="post-create-container" class="col-md-5 offset-md-3">
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="content" id="content" class="form-control" placeholder="Nova publicação"></textarea>
        <div>
            <label class="label-img" for="image">Imagem</label>
            <div class="nomeArquivo"></div>
            <input type="file" name="image" id="image" accept="image/*">
            <input type="submit" class="btn btn-primary" value="Postar">
        </div>
    </form>
</div>

@foreach ($posts as $post)
    <div id="posts-container" class="col-md-12">
        <div id="cards-container" class="row col-md-12">
            <div class="card-post">
                @foreach ($postCreators as $postCreator)
                   @if ($post->user_id === $postCreator->id)
                      <p class="user-name">{{ $postCreator->name }}</p>
                   @endif
                @endforeach
                @if ($post->image !== null)
                    <img class="img-post" id="img-post" src="/img/posts/{{ $post->image }}" alt="Imagem postada por Usuário" data-content="{{ $post->content }}" data-bs-toggle="modal" data-bs-target="#myModal">
                @endif
                <p class="card-content">{{ $post->content }}</p>
                <p class="post-likes">
                    <!-- <ion-icon name="thumbs-up-outline" class="thumbs-icon-changed" id="thumb-icon-changed"></ion-icon>  -->
                    <!-- <input type="checkbox" name="icon-check" id="icon-check"> -->
                    <label class="label" for="icon-check"><ion-icon name="thumbs-up-outline" class="thumbs-icon" id="thumbs-icon" data-id-post="{{ $post->id }}"></ion-icon></label>
                    curtidas: X
                </p>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" >
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img class="modal-img" src="" alt="Imagem postada por Usuário">
              </div>
              <div class="modal-footer">
                <p class="modal-post-content"></p>
              </div>
            </div>
          </div>
        </div>
    </div>
@endforeach


@endsection
