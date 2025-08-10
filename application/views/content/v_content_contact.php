<?php
// Get contact data
$contact = $this->m_content->get_contact();
?>
<section id="konten-kontak">
    <h4 class="mb-3">Form Kontak & Sosial Media</h4>
    <div id="alert-message" class="alert" style="display: none;"></div>
    <hr>
    <form id="contact-form" method="POST">
        <div class="row">
            <!-- WhatsApp -->
            <div class="form-group col-md-6">
                <label for="whatsapp">WhatsApp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" 
                       value="<?= isset($contact->whatsapp) ? html_escape($contact->whatsapp) : '' ?>" 
                       placeholder="Contoh: 628123456789">
            </div>

            <!-- Email -->
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="<?= isset($contact->email) ? html_escape($contact->email) : '' ?>" 
                       placeholder="Contoh: email@example.com">
            </div>
        </div>

        <div class="row">
            <!-- Alamat -->
            <div class="form-group col-md-12">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" 
                          placeholder="Masukkan alamat lengkap"><?= isset($contact->alamat) ? html_escape($contact->alamat) : '' ?></textarea>
            </div>
        </div>

        <hr>

        <div class="row">
            <!-- Facebook -->
            <div class="form-group col-md-6">
                <label for="facebook">Facebook</label>
                <input type="url" class="form-control" id="facebook" name="facebook" 
                       value="<?= isset($contact->fb) ? html_escape($contact->fb) : '' ?>" 
                       placeholder="https://facebook.com/username">
            </div>

            <!-- Instagram -->
            <div class="form-group col-md-6">
                <label for="instagram">Instagram</label>
                <input type="url" class="form-control" id="instagram" name="instagram" 
                       value="<?= isset($contact->ig) ? html_escape($contact->ig) : '' ?>" 
                       placeholder="https://instagram.com/username">
            </div>
        </div>

        <div class="row">
            <!-- Twitter -->
            <div class="form-group col-md-6">
                <label for="twitter">Twitter</label>
                <input type="url" class="form-control" id="twitter" name="twitter" 
                       value="<?= isset($contact->twitter) ? html_escape($contact->twitter) : '' ?>" 
                       placeholder="https://twitter.com/username">
            </div>

            <!-- TikTok -->
            <div class="form-group col-md-6">
                <label for="tiktok">TikTok</label>
                <input type="url" class="form-control" id="tiktok" name="tiktok" 
                       value="<?= isset($contact->tiktok) ? html_escape($contact->tiktok) : '' ?>" 
                       placeholder="https://www.tiktok.com/@username">
            </div>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</section>

<script>
$(document).ready(function() {
    // Handle form submission
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        var submitBtn = $(this).find('button[type="submit"]');
        var originalText = submitBtn.html();
        submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Menyimpan...');
        
        // Send AJAX request
        $.ajax({
            url: '<?= site_url('content_management/update_contact') ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                // Show success/error message
                var alertDiv = $('#alert-message');
                alertDiv.removeClass('alert-danger alert-success');
                
                if (response.status === 'success') {
                    alertDiv.addClass('alert-success').html('<i class="fa fa-check-circle"></i> ' + response.message).fadeIn();
                } else {
                    alertDiv.addClass('alert-danger').html('<i class="fa fa-exclamation-circle"></i> ' + response.message).fadeIn();
                }
                
                // Hide message after 5 seconds
                setTimeout(function() {
                    alertDiv.fadeOut();
                }, 5000);
            },
            error: function() {
                $('#alert-message')
                    .removeClass('alert-success')
                    .addClass('alert-danger')
                    .html('<i class="fa fa-exclamation-circle"></i> Terjadi kesalahan saat menyimpan data')
                    .fadeIn();
            },
            complete: function() {
                // Reset button state
                submitBtn.prop('disabled', false).html(originalText);
            }
        });
    });
});
</script>
