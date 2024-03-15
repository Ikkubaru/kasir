<div class="card">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Produk
</button>
                     <div class="card-header">
                        <h5 class="card-header-text">Data Produk</h5> <br>
                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table table-hover"> 
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>Nama</th>
                                       <th>Kode Produk</th>
                                       <th>Stok</th>
                                       <th>Harga</th>
                                       <th>Aksi</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $no =1; 
                                    foreach($user as $row){ 
                                    ?>
                                    <tr>
                                       <td><?= $no++ ?></td>
                                       <td><?= $row['nama']?></td>
                                       <td><?= $row['kode_produk'] ?></td>
                                       <td><?= $row['stok'] ?></td>
                                       <td>Rp. <?= number_format($row['harga'])?></td>
                                       <td>
                                        <a onClick="return confirm('Yakin Ingin Menghapus Data?')"
                                        href="<?=base_url('produk/hapus/'.$row['id_produk']);?>" class="btn btn-danger">
                                            <i class="icon-trash"> Hapus</i>
                                        </a>
                                        <!--  -->
                                        <a href="<?=base_url('produk/edit/'.$row['id_produk']);?>" class="btn btn-warning">
                                            <i class="icon-wrench"> Edit</i>
                                        </a>
                                       </td>
                                    </tr>
                                    <?php }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('produk/simpan');?>" method="post">
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nama" placeholder="Nama Produk" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Harga</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="harga" placeholder="Harga" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Stok</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="stok" placeholder="Stok" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Kode Produk</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="kode_produk" placeholder="Kode Produk" required>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
        </form>
      </div>
    </div>
  </div>
</div>