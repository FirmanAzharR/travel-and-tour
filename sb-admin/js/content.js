// Fungsi inisialisasi card & tooltip
function initCardEvents() {
    // Set cursor pointer untuk semua card
    $('.clickable-card').css('cursor', 'pointer');

    // Event klik card
    $(document)
        .off('click', '.clickable-card')
        .on('click', '.clickable-card', function () {
            let viewName = $(this).data('url');

            $('#content-area').html(
                '<div class="text-center py-5">' +
                '<div class="spinner-border text-primary" role="status">' +
                '<span class="sr-only">Loading...</span>' +
                '</div>' +
                '</div>'
            );

            $.ajax({
                url: baseUrl + 'content_management/load_view/' + viewName,
                method: 'GET',
                success: function (response) {
                    $('#content-area').html(response);

                    // Re-init event untuk konten baru
                    initCardEvents();
                    if (typeof initExtraContent === 'function') {
                        initExtraContent();
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error loading content:', error);
                    $('#content-area').html(
                        '<div class="alert alert-danger">Error loading content. Please try again.</div>'
                    );
                }
            });
        });

    // Event tooltip untuk elemen baru
    $(document)
        .off('mouseenter', '[data-toggle="tooltip"]')
        .on('mouseenter', '[data-toggle="tooltip"]', function () {
            $(this)
                .tooltip({
                    trigger: 'hover',
                    placement: 'top'
                })
                .tooltip('show');
        });
}

// Jalankan saat halaman pertama kali ready
$(document).ready(function () {
    initCardEvents();
    if (typeof initExtraContent === 'function') {
        initExtraContent();
    }
});
