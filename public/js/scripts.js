$(function () {
    $('#image').change(function() {
        var fileName = $('#image').val().split('\\').pop();
        $('.nomeArquivo').text(" Arquivo selecionado: " + fileName);
   });
});

document.addEventListener("click", function(e){
    if (e.target.classList.contains("img-post")) {
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-img").src = src;

        const content = e.target.getAttribute("data-content");
        document.querySelector(".modal-post-content").innerHTML = content;
    }
})

$(document).ready(function (e) {
    $('.delete-btn').click(function (e) {
        var postId = $(this).val();

        var action = `/profile/${postId}`;
        
        $('.delete-form').attr("action", action);

        // var deleteForm = $('.delete-form').attr("action")
        // console.log(deleteForm);
    })
    
    $('.edit-btn').click(function (e) {
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
})

// $(function () {
//     $('#thumb-icon-changed').hide();
    
//     $(document.addEventListener("click", function(e){
//         console.log(e.target.getAttribute("data-id-post"));
        
//     }))
// })
