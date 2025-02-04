
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= base_url() ?>"> </a></li>
  <li class="breadcrumb-item active" aria-current="page">Produk</li>
</ol>
</div>
<!-- Row -->
<div class="row">
<!-- Datatables -->
<div class="col-lg-12">
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <a href="<?= base_url('pelanggan/tambah') ?>"class ="btn btn-primary">Tambah data Produk</a>
    </div>
    <div class="table-responsive p-3">
      <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Nomor Telpon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Nomor Telpon</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        </tbody>
        <!-- tampilkan data pelanggan-->
        <?php foreach($pelanggan as $p) : ?>
            <tr>
                <td><?= $p['pelangganID']?></td>
                <td><?= $p['namapelanggan']?></td>
                <td><?= $p['alamat']?></td>
                <td><?= $p['nomortelpon']?></td>
                <td>
                  <!-- Tombol Edit -->
                  <a href="<?= base_url('pelanggan/editPelanggan/' . $p['pelangganID']) ?>" class="btn btn-sm btn-warning" title="Edit">
                      <i class="fas fa-edit"></i>
                  </a>
                  <!-- Tombol Hapus -->
                  <form id="deleteForm-<?= $p['pelangganID'] ?>" action="<?= base_url('pelanggan/deletePelanggan/' . $p['pelangganID']) ?>" method="POST" style="display: inline;">
                      <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="confirmDelete('<?= $p['pelangganID'] ?>')">
                          <i class="fas fa-trash"></i>
                      </button>
                  </form>
                </td>
            </tr>
            <?php endforeach ?>
          </tbody>
      </table>
    </div>
  </div>
  <!-- tutup row-->
</div>

<!-- SweetAlert untuk Konfirmasi Hapus -->
<script>
    function confirmDelete(pelangganID) {
        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data ini tidak dapat dikembalikan lagi!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim form untuk menghapus data
                document.getElementById('deleteForm-' + pelangganID).submit();
                // Tampilkan pesan sukses
                Swal.fire({
                    title: "Dihapus!",
                    text: "Data telah berhasil dihapus.",
                    icon: "success",
                    timer: 1000,
                    showConfirmButton: false
                });
            }
        });
    }
</script>
