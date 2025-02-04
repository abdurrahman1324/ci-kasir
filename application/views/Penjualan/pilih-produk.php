    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
        </ol>
      </div>

      <!-- Row -->
      <div class="row">
        <!-- Datatables -->
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Pilih Produk</h6>
            </div>
            <div class="table-responsive p-3">
              <table class="table align-items-center table-flush" id="dataTable">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <!-- tampilkan data produk -->
                  <?php foreach ($produk as $p) : ?>
                    <tr>
                      <td><?= $p['produkID'] ?></td>
                      <td><?= $p['namaProduk'] ?></td>
                      <td>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#coModal<?= $p['produkID'] ?>" class="badge badge-success">Checkout</a>
                      </td>
                    </tr>
                    <!-- Modal checkout -->
                    <div class="modal fade" id="coModal<?= $p['produkID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelLogout">Checkout Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Cek kembali barang sebelum checkout!</p>
                            <form method="POST" action="<?= base_url('penjualan/checkout') ?>">
                              <input type="hidden" name="id" value="<?= $p['produkID'] ?>">
                              <div class="form-group">
                                <label for="namaProduk">Nama Produk</label>
                                <input type="text" name="namaProduk" class="form-control" value="<?= $p['namaProduk'] ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="harga">Harga Produk</label>
                                <input type="text" name="harga" class="form-control" value="<?= $p['harga'] ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="stok">Stok Produk</label>
                                <input type="text" name="stok" class="form-control" value="<?= $p['stok'] ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="stok">Jumlah Beli</label>
                                <input type="text" name="jumlah" class="form-control" required>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Checkout</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- tutup col -->

        <!-- col keranjang -->
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
            </div>
            <div class="table-responsive p-3">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>QTY</th>
                    <th>SubTotal</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- tampilkan data produk -->
                  <?php
                  $total = 0;
                  foreach ($keranjang as $k) :
                    $p = $this->db->get_where('produk', ['produkID' => $k['produkID']])->row_array();
                    $total += $k['SubTotal'];
                  ?>
                    <tr>
                      <td><?= $p['namaProduk'] ?></td>
                      <td><?= $k['Harga'] ?></td>
                      <td><?= $k['jumlahBeli'] ?></td>
                      <td><?= $k['SubTotal'] ?></td>

                    </tr>
                    <!-- Modal checkout -->

                  <?php endforeach ?>
                </tbody>
              </table>
              <hr>
              <table class="font-weight-bold">
                <tr>
                  <td width="150">Total Belanja</td>
                  <td> = Rp. <?= $total ?></td>
                </tr>
                <tr>
                  <td>Pelanggan</td>
                  <td>
                    <select name="" class="form-control form-control-sm">
                      <?php $pelanggan = $this->db->get('pelanggan')->result_array();
                      foreach ($pelanggan as $p) : ?>
                        <option value="<?= $p['pelangganID'] ?>"><?= $p['namapelanggan'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!-- tutup col keranjang -->
        <!-- tutup row -->
      </div>