<div class="card">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Pelangan
</button>
                     <div class="card-header">
                        <h5 class="card-header-text">Data Pelanggan</h5> <br>
                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table table-hover"> 
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>Nama</th>
                                       <th>Alamat</th>
                                       <th>Telepon</th>
                                       <th>Aksi</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach($user as $row){ 
                                    $no =1;
                                    ?>
                                    <tr>
                                       <td><?= $no++ ?></td>
                                       <td><?= $row['nama']?></td>
                                       <td><?= $row['alamat'] ?></td>
                                       <td><?= $row['telp'] ?></td>
                                       <td>
                                        <a onClick="return confirm('Yakin Ingin Menghapus Data?')"
                                        href="<?=base_url('pelanggan/hapus/'.$row['id_pelanggan']);?>" class="btn btn-danger">
                                            <i class="icon-trash"> Hapus</i>
                                        </a>
                                        <!--  -->
                                        <a href="<?=base_url('pelanggan/edit/'.$row['id_pelanggan']);?>" class="btn btn-warning">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pelanggan/simpan');?>" method="post">
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Nama</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nama" placeholder="Nama pelanggan" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Alamat</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="alamat" placeholder="Alamat" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Telepon</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="telp" placeholder="Nomor Telepon" required>
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