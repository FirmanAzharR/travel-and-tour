(function (window, document) {
    'use strict';
    var popupApi = window.__sitePopupApi || '/Content_Management/public_popup_list';
    var storageKey = window.__sitePopupStorageKey || 'sitePopupShown_v1';

    try {
        var shown = localStorage.getItem(storageKey);
        if (shown) return;
    } catch (e) {
        // ignore storage errors
    }

    fetch(popupApi, { method: 'GET', headers: { 'Accept': 'application/json' } })
        .then(function (resp) { return resp.json(); })
        .then(function (res) {
            if (!res || res.status !== 'success' || !res.data || !res.data.length) return;
            var img = res.data[0];
            if (!img || !img.url_image) return;
            var imageEl = document.getElementById('sitePopupImage');
            if (!imageEl) return;
            imageEl.src = img.url_image;

            setTimeout(function () {
                var modalEl = document.getElementById('sitePopupModal');
                if (!modalEl) return;
                try {
                    var bsModal = new bootstrap.Modal(modalEl, { backdrop: 'static' });
                    bsModal.show();
                    try { localStorage.setItem(storageKey, '1'); } catch (e) { }
                } catch (e) {
                    window.open(img.url_image, '_blank');
                }
            }, 350);
        })
        .catch(function () {
            // ignore fetch errors
        });
})(window, document);
