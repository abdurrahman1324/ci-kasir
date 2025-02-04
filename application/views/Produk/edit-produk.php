<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produk</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Produk</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('produk/editProduk/' . $produk['produkID']) ?>" id="produkForm">
                        <input type="hidden" name="produkID" value="<?= $produk['produkID'] ?>">
                        <div class="form-group">
                            <label for="Nama Produk">Nama Produk</label>
                            <input type="text" name="namaProduk" class="form-control" placeholder="Nama Produk" value="<?= set_value('namaProduk', $produk['namaProduk']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="Harga Produk">Harga Produk</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?= set_value('harga', $produk['harga']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="Stok Produk">Stok Produk</label>
                            <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="<?= set_value('stok', $produk['stok']); ?>" required>
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
                // Kirim form setelah konfirmasi
                document.getElementById('produkForm').submit();
                // Menampilkan SweetAlert sukses setelah form dikirim
                Swal.fire({
                    title: "Berhasil!",
                    text: "Penjualan telah berhasil ditambahkan.",
                    icon: "success",
                    timer: 10000,
                    showConfirmButton: false
                });
            }
        });
    }
</script>
