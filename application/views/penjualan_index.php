<div class="card">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Penjualan
</button>
                     <div class="card-header">
                        <h5 class="card-header-text">Data Penjualan Hari Ini</h5> <br>
                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table table-hover"> 
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>No Nota</th>
                                       <th>Nominal</th>
                                       <th>Pelanggan</th>
                                       <th>Aksi</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $no =1; 
                                    $total = 0;
                                    foreach($user as $row){ 
                                    ?>
                                    <tr>
                                       <td><?= $no++ ?></td>
                                       <td><?= $row['kode_penjualan'] ?></td>
                                       <td>Rp. <?= number_format($row['total_harga'])?></td>
                                       <td><?= $row['nama'] ?></td>
                                       <td>
                                        <a
                                        href="<?=base_url('penjualan/invoice/'.$row['kode_penjualan']);?>" class="btn btn-warning">
                                            <i class="icon-trash"> Cek</i>
                                        </a>
                                       </td>
                                    </tr>
                                    <?php $total=$total+$row['total_harga'];}?>
                                    <tr>
                                       <td colspan=2>Total</td>
                                       <td>Rp. <?= number_format($total) ?></td>
                                    </tr>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('penjualan/simpan');?>" method="post">
                <div class="form-group row">
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
                                    <?php 
                                    $no =1;
                                    foreach($pelanggan as $row){ 
                                    ?>
                                    <tr>
                                       <td><?= $no++ ?></td>
                                       <td><?= $row['nama']?></td>
                                       <td><?= $row['alamat'] ?></td>
                                       <td><?= $row['telp'] ?></td>
                                       <td>
                                        <!--  -->
                                        <a href="<?=base_url('penjualan/transaksi/'.$row['id_pelanggan']);?>" class="btn btn-warning">
                                            <i class="icon-wrench"> Pilih</i>
                                        </a>
                                       </td>
                                    </tr>
                                    <?php }?>
                                 </tbody>
                              </table>
                           </div>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>