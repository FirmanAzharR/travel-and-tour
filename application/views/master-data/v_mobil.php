<div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#carModal">
            <i class="fas fa-plus"></i> Tambah Data Mobil
        </button>
    </div>

    <!-- Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Mobil</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="carsTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be loaded via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="carModalLabel">Form Input Data Mobil</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="carForm">
                    <input type="hidden" id="carId">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nama Mobil</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama mobil" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Masukkan deskripsi mobil" required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Gambar Mobil</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" accept="image/*" required>
                            <label class="custom-file-label" for="image">Pilih gambar...</label>
                        </div>
                        <div class="mt-2" id="imagePreview"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveCar">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Initialize DataTable and Form Handling -->
<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#carsTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": baseUrl + "master_data/get_cars",
            "type": "POST"
        },
        "language": {
            "url": baseUrl + "sb-admin/js/i18n/Indonesian.json"
        },
        "responsive": true,
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        "pageLength": 10,
        "columns": [
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                "orderable": false,
                "width": "5%"
            },
            { "data": "name", "width": "20%" },
            { "data": "description", "width": "30%" },
            {
                "data": "image",
                "render": function(data, type, row) {
                    return data ? '<img src="' + data + '" class="img-thumbnail" style="max-width: 100px; max-height: 60px;">' : '-';
                },
                "orderable": false,
                "width": "15%"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-primary edit-btn" data-id="${row.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="${row.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                },
                "orderable": false,
                "width": "15%"
            }
        ]
    });

    // Handle edit button click
    $('#carsTable').on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        // TODO: Implement edit functionality
        console.log('Edit car with ID:', id);
        $('#carModal').modal('show');
    });

    // Handle delete button click
    $('#carsTable').on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            // TODO: Implement delete functionality
            console.log('Delete car with ID:', id);
        }
    });

    // Handle image preview
    $('#image').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 200px;">');
            }
            reader.readAsDataURL(file);
            $('.custom-file-label').text(file.name);
        }
    });

    // Handle form submission
    $('#saveCar').on('click', function() {
        // TODO: Implement form submission
        console.log('Form submitted');
        // After successful save:
        // $('#carModal').modal('hide');
        // table.ajax.reload();
    });

    // Reset form when modal is closed
    $('#carModal').on('hidden.bs.modal', function () {
        $('#carForm')[0].reset();
        $('.custom-file-label').text('Pilih gambar...');
        $('#imagePreview').empty();
    });
});
</script>