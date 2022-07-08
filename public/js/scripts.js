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

        const myModal = new bootstrap.Modal(document.getElementById('myModal'));
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
})

// $(function () {
//     $('#thumb-icon-changed').hide();
    
//     $(document.addEventListener("click", function(e){
//         console.log(e.target.getAttribute("data-id-post"));
        
//     }))
// })
