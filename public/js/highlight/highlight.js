$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('.highlight').hover(function() {
        var highlightId = $(this).data('highlight-id');
        $('.highlight-title[data-highlight-id="' + highlightId + '"]').toggle();
    });
});
