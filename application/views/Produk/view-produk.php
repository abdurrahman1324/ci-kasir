
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
                  <a href="<?= base_url('produk/tambah') ?>"class ="btn btn-primary">Tambah data Produk</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    </tbody>
                    <!-- tampilkan data produk-->
                    <?php foreach($produk as $p) : ?>
                        <tr>
                            <td><?= $p['produkID']?></td>
                            <td><?= $p['Nama Produk']?></td>
                            <td><?= $p['Harga']?></td>
                            <td><?= $p['stok']?></td>
                            <td>Edit</td>
                        </tr>
                       <?php endforeach ?>
                     </tbody>
                  </table>
                </div>
              </div>
              <!-- tutup row-->
            </div>
