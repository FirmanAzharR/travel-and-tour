// Fungsi inisialisasi card & tooltip
function initCardEventsMasterData() {
    console.log('Initializing master data card events...');

    // Set cursor pointer untuk semua card
    $('.clickable-card-master-data').css('cursor', 'pointer');

    // Event klik card
    $(document)
        .off('click', '.clickable-card-master-data')
        .on('click', '.clickable-card-master-data', function (e) {
            e.preventDefault();

            let viewName = $(this).data('url');
            console.log('Card clicked, loading view:', viewName);

            if (!viewName) {
                console.error('No view name specified in data-url');
                return;
            }

            $('#content-area').html(
                '<div class="text-center py-5">' +
                '<div class="spinner-border text-primary" role="status">' +
                '<span class="sr-only">Loading...</span>' +
                '</div>' +
                '<p class="mt-2">Loading ' + viewName + '...</p>' +
                '</div>'
            );

            // Check if baseUrl is defined
            if (typeof baseUrl === 'undefined') {
                console.error('baseUrl is not defined');
                $('#content-area').html(
                    '<div class="alert alert-danger">Configuration error: baseUrl is not defined</div>'
                );
                return;
            }

            $.ajax({
                url: baseUrl + 'master_data/load_view/' + viewName,
                method: 'GET',
                dataType: 'html',
                success: function (response) {
                    console.log('Successfully loaded view:', viewName);
                    $('#content-area').html(response);
                    initCardEventsMasterData(); // Re-init events for new content
                },
                error: function (xhr, status, error) {
                    console.error('Error loading content:', {
                        status: status,
                        error: error,
                        response: xhr.responseText
                    });

                    let errorMsg = 'Error loading content. Please try again.';
                    if (xhr.status === 404) {
                        errorMsg = 'The requested page was not found.';
                    } else if (xhr.responseText) {
                        errorMsg = xhr.responseText;
                    }

                    $('#content-area').html(
                        '<div class="alert alert-danger">' + errorMsg + '</div>'
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
    initCardEventsMasterData();
    // if (typeof initExtraContent === 'function') {
    //     initExtraContent();
    // }
});
