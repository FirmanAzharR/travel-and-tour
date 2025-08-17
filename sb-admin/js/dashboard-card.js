// Fungsi inisialisasi card & tooltip untuk dashboard
function initDashboardCardEvents() {
    console.log('Initializing dashboard data card events...');

    // Set cursor pointer untuk semua card
    $('.clickable-card-dashboard').css('cursor', 'pointer');

    // Event klik card
    $(document)
        .off('click', '.clickable-card-dashboard')
        .on('click', '.clickable-card-dashboard', function (e) {
            e.preventDefault();

            let viewName = $(this).data('url');
            console.log('Dashboard card clicked, loading view:', viewName);

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

            // Load the view via AJAX
            $.ajax({
                url: baseUrl + 'dashboard/load_view/' + viewName,
                method: 'GET',
                dataType: 'html',
                success: function (response) {
                    console.log('Successfully loaded view:', viewName);
                    $('#content-area').html(response);
                    initDashboardCardEvents(); // Re-init events for new content
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
    // Only initialize if we're on the dashboard page
    if ($('.clickable-card-dashboard').length) {
        initDashboardCardEvents();
    }
});
