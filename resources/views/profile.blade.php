@extends('layouts.main')

@section('title', 'Perfil')

@section('content')

@if (count($user->posts) <= 0)
    <h1 class="title-profile">Você ainda não tem postagens.</h1> 
    <a class="link-to-home-profile" href="/">Experimente compartilhar agora!</a>
@else
    <h1 class="title-profile">Meus Posts</h1>

    <div id="posts-container" class="col-md-12">
        @foreach ($posts as $post)
            @if ($user->id === $post->user_id)
                <div id="cards-container" class="row col-md-12">
                    <div class="card-post">
                        <p class="user-name-profile">{{ $user->name }}</p>
                        <div class="btn-actions-profile">
                            <a href="#" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                            <button class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#modalDelete" value="{{ $post->id }}">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </div>
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

                <!-- Modal Img -->
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

                <!-- Modal delete -->
                
                <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" >
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h5>Deseja mesmo excluir este post?</h5>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form class="delete-form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn-modal">Excluir</button>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
            @endif
        @endforeach
    </div>
@endif

@endsection
