<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"> </a></li>
            <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pelanggan</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('pelanggan/editPelanggan/' . $pelanggan['pelangganID']) ?>" id="editPelangganForm">
                        <input type="hidden" name="pelangganID" value="<?= $pelanggan['pelangganID'] ?>">
                        <div class="form-group">
                            <label for="Nama Pelanggan">Nama Pelanggan</label>
                            <input type="text" name="namapelanggan" class="form-control" placeholder="Nama Pelanggan" value="<?= set_value('namapelanggan', $pelanggan['namapelanggan']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="Alamat Pelanggan">Alamat Pelanggan</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat Pelanggan" value="<?= set_value('alamat', $pelanggan['alamat']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="Nomor Telpon">Nomor Telpon</label>
                            <input type="number" name="nomortelpon" class="form-control" placeholder="Nomor Telpon" value="<?= set_value('nomortelpon', $pelanggan['nomortelpon']); ?>" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="confirmEdit()">Submit</button>
                    </form>
                </div>
            </div>
        </div>

</div>
<script>
function confirmEdit() {
    Swal.fire({
        title: "Yakin ingin menyimpan perubahan?",
        text: "Pastikan data yang diubah sudah benar.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Simpan!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            // Kirim data dengan AJAX
            $.ajax({
                url: $('#editPelangganForm').attr('action'),
                type: 'POST',
                data: $('#editPelangganForm').serialize(),
                success: function (response) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Data pelanggan telah berhasil diperbarui.",
                        icon: "success",
                        showConfirmButton: true,
                        confirmButtonText: "OK",
                    }).then(() => {
                        // Alihkan ke halaman index setelah SweetAlert sukses
                        window.location.href = "<?= base_url('pelanggan/index') ?>";
                    });
                },
                error: function () {
                    Swal.fire({
                        title: "Gagal!",
                        text: "Terjadi kesalahan saat menyimpan data.",
                        icon: "error",
                        showConfirmButton: true,
                        confirmButtonText: "OK",
                    });
                }
            });
        }
    });
}


</script>
