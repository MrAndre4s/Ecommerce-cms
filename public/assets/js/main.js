tinymce.init({
    selector: "#tinymce_editor",
    height: "480",
    skin: (KTThemeMode.getMode() === "dark") ? "oxide-dark" : "",
    content_css: (KTThemeMode.getMode() === "dark") ? "dark" : "",
});

$('#published_at').flatpickr({dateFormat: "Y-m-d"});

$('select[name="post_status"]').on('change', (event) => {
    event.preventDefault();
    let parent = $('input[name="published_at"]').closest('div')
    if (event.target.value === 'Запланировано') {
        parent.removeClass('d-none');
    } else {
        parent.addClass('d-none');
    }
});

$('[data-bs-target="#modal-delete"]').on('click', (event) => {
    let route = event.target.getAttribute('data-action');
    let title = event.target.getAttribute('data-title');

    $('#modal-delete form').attr('action', route);
    $('#modal-delete form .modal-body span').text(title);
});

$('#product_characteristics').repeater({
    initEmpty: $('#product_characteristics').data('init-empty'),

    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});
