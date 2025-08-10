// Inisialisasi input file
function initFileInput() {
    const fileInput = document.getElementById('fileInput');
    if (!fileInput) return;

    fileInput.addEventListener('change', function () {
        console.log("File selected:", this.files[0]);
        // Tambahkan logika upload di sini
    });
}

// Inisialisasi gallery klik
function initGallery() {
    $('.gallery-item').off('click').on('click', function () {
        const src = $(this).attr('src');
        $('#galleryModal img').attr('src', src);
        $('#galleryModal').modal('show');
    });
}

// Inisialisasi popup button
function initPopupButtons() {
    $('.popup-button').off('click').on('click', function () {
        alert("Popup button clicked: " + $(this).text());
    });
}

// Fungsi inisialisasi semua fitur extra
function initExtraContent() {
    initFileInput();
    initGallery();
    initPopupButtons();
}
