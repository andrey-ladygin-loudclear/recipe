$('.show-select-icon-popup').on('shown.bs.modal', function () {
    $('.select-icon-popup').trigger('focus')
});

$('.icon').on('click', function () {
    $('input[name="icon"]').val($(this).data('icon'));
    $('.icon-preview').html(`<img src="${$(this).find('img').attr('src')}" data-toggle="modal" data-target="#selectIconPopup"/>`)
});