<div class="row">
    <div class="col-md-4">
        <!-- pemilihan produk -->  
        <div class="form-group">
        <label for="exampleSelect1" class="form-control-label">Nama Pelanggan</label>
            <input type="text" class="form-control" name="kode_penjualan" value="<?= $nama_pelanggan ?>" readonly>
        </div>
        <form action="<?= base_url('penjualan/addTemp') ?>" method="post">
        <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
        <div class="form-group">
            <label for="exampleSelect1" class="form-control-label">Pilih Produk</label>
            <input type="hidden" name="kode_penjualan" value="<?= $nota ?>">
                <select class="form-control" id="exampleSelect1" name="id_produk">
                    <?php foreach($produk as $pro){ ?>
                    <option value="<?= $pro['id_produk'];?>"><?= $pro['nama'];?> - <?= $pro['kode_produk'] ?>(<?= $pro['stok'] ?>)</option>
                    <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label for="exampleSelect1" class="form-control-label">Jumlah</label>
            <input type="number" name="jumlah"  placeholder="Jumlah Yang Dijual" class="form-control" required>
        </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">Confirm</button>
    </div>
        </form>
        <div class="col-md-8">
                <div class="col-sm-12 table-responsive">
                              <table class="table table-hover"> 
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>Kode Barang</th>
                                       <th>Produk</th>
                                       <th>Jumlah</th>
                                       <th>Harga</th>
                                       <th>Total</th>
                                       <th>Aksi</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $no =1;
                                    $total = 0;
                                    $cek = 0;
                                    foreach($temp as $row){ 
                                    ?>
                                    <tr>
                                       <td><?= $no ?></td>
                                       <td><?= $row['kode_produk'] ?></td>
                                       <td><?= $row['nama'] ?></td>
                                       <td><?= $row['jumlah'] ?>
                                        <?php
                                        if($row['jumlah']>$row['stok']){
                                            echo "<div class='alert alert-danger' role='alert'>
                                            Produk Yang Dipilih Tidak Mencukupi
                                            </div>";
                                            $cek = 1;
                                        }
                                        ?>
                                        </td>
                                       <td>Rp. <?= number_format($row['harga'])?></td>
                                       <td>Rp. <?= number_format($row['jumlah']*$row['harga'])?></td>
                                       <td>
                                        <a onClick="return confirm('Yakin Ingin Menghapus Produk Dari Keranjang?')"
                                        href="<?=base_url('penjualan/tempHapus/'.$row['id_temp']);?>" class="btn btn-danger">
                                            <i class="icon-trash"> Hapus</i>
                                        </a>
                                       </td>
                                    </tr>
                                    <?php $total = $total+$row['jumlah']*$row['harga']; $no++;}?>
                                    <tr>
                                        <td colspan="5">Total Harga</td>
                                        <td>Rp. <?= number_format($total); ?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                <form action="<?= base_url('penjualan/pay') ?>" method="post">
                <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                <?php if(($temp != NULL)AND($cek == 0)){ ?>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Bayar</button>
                    <?php }?>
                </form>
</div>
</div>