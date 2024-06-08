$(document).ready(function(){
    $('.comment-reply').click(function(){
        var commentId = $(this).data('comment-id');
        $('.reply-box[data-comment-id="' + commentId + '"]').toggle();
    });

    $('.see-replies').click(function(){
        var commentId = $(this).data('comment-id');
        $('.replies[data-comment-id="' + commentId + '"]').toggle();
    });
});
