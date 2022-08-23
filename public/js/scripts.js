$(document).ready(function (e) {
    $('#image').change(function (e) { 
        const fileToUpload = e.target.files.item(0);
    
        const reader = new FileReader();
        reader.onload = e => $('.preview-img').attr("src", e.target.result);
        reader.readAsDataURL(fileToUpload);
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
        
        $('.img-preview').attr("src", src);
        
        //console.log(src);
    })

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
