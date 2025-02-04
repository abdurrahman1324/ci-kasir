<!-- Container Fluid-->
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
            <form id="pelangganForm" method="POST" action="<?= base_url('pelanggan/tambah') ?>">
                <div class="form-group">
                    <label for="Nama Pelanggan">Nama Pelanggan</label>
                    <input type="text" id="namapelanggan" name="namapelanggan" class="form-control" placeholder="Nama Pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                    <label for="Nomor Telpon">Nomor Telepon</label>
                    <input type="number" id="nomortelpon" name="nomortelpon" class="form-control" placeholder="Nomor Telepon" required>
                </div>
                <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Submit</button>
            </form>
          </div>
        </div>
      </div>
    <div>
</div>

<script>
    // Fungsi konfirmasi sebelum submit form
    function confirmSubmit() {
        Swal.fire({
            title: "Yakin ingin menambahkan penjualan?",
            text: "Pastikan data yang diisi sudah benar.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Tambahkan!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim form setelah konfirmasi
                document.getElementById('pelangganForm').submit();
                // Menampilkan SweetAlert sukses setelah form dikirim
                Swal.fire({
                    title: "Berhasil!",
                    text: "Penjualan telah berhasil ditambahkan.",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }
</script>