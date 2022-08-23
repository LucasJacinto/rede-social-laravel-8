$(document).ready(function (e) {
    $('#image').change(function() {
        var fileName = $('#image').val().split('\\').pop();
        $('.nomeArquivo').text(" Arquivo selecionado: " + fileName);
   });

    $('.delete-btn').click(function (e) {
        var postId = $(this).val();
        
        var action = `/profile/${postId}`;
        
        $('.delete-form').attr("action", action);
        
        // var deleteForm = $('.delete-form').attr("action")
        // console.log(deleteForm);
    })
    
    $('.edit-btn').click(function(e) {
        var postId = $(this).val();

        var action = `/profile/${postId}`;
        
        $('.edit-form').attr("action", action);
        
        // var deleteForm = $('.delete-form').attr("action")
        // console.log(deleteForm);
        
        var content = $(this).attr("data-content");
        
        $('.form-control').text(content);
        
        //console.log(content);
        
        src = $(this).attr("data-image");
        
        $('.img-preview').attr("src", src)
        
        //console.log(src);
    })

    // $('.like-btn').click(function(e) {
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // var id = $(this).attr("id");
        
        // $.post(`/like/${id}`, function() {
        //     console.log('sucesso!');
        // })
        // .fail(function() {
        //     console.log('error!');
        //   })
        // })

    $('#btn-mobile').click(function(e) {
        const nav = document.getElementById('nav');
        nav.classList.toggle('active');
    })
})

function curtir(elemento) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id = elemento.getAttribute("data-id-post");
    
    $.post(`/like/${id}`, function() {
        console.log('sucesso!');
    })
    .fail(function() {
        console.log('error!');
    });

    elemento.classList.add("active");
}

document.addEventListener("click", function(e){
    if (e.target.classList.contains("img-post")) {
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-img").src = src;

        const content = e.target.getAttribute("data-content");
        document.querySelector(".modal-post-content").innerHTML = content;
    }
})

// $(function () {
//     $('#thumb-icon-changed').hide();

//     $(document.addEventListener("click", function(e){
//         console.log(e.target.getAttribute("data-id-post"));
        
//     }))
// })
