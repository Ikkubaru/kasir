<div class="row">
                  <div class="card">
                     <div class="card-block">
                        <div class="md-card-block">
                            <h4>Toko ERCE Invoice</h4> <br>
                           <div class="col-sm-4">
                            From
                            <address>
                                <strong>KASIR RC</strong> <br>
                                Jl. Lawu <br>
                                Phone : 08570000 <br>
                                Email : random@gmail.com
                            </address>
                           </div>
                           <div class="col-sm-4">
                            To <br>
                            <address>
                                <strong><?= $penjualan->nama;?></strong> <br>
                                Address : <?= $penjualan->alamat ?> <br>
                                Contact Person : <?= $penjualan->telp;?>
                            </address>
                           </div>
                           <div class="col-sm-4">
                            <b>Nomor Nota : <?= $nota ?></b>
                           </div>
<!--  -->
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
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $no =1;
                                    $total = 0;
                                    foreach($detail as $row){ 
                                    ?>
                                    <tr>
                                       <td><?= $no ?></td>
                                       <td><?= $row['kode_produk'] ?></td>
                                       <td><?= $row['nama'] ?></td>
                                       <td><?= $row['jumlah'] ?></td>
                                       <td>Rp. <?= number_format($row['harga'])?></td>
                                       <td>Rp. <?= number_format($row['jumlah']*$row['harga'])?></td>
                                    </tr>
                                    <?php $total = $total+$row['jumlah']*$row['harga']; $no++;}?>
                                    <tr>
                                        <td colspan="5">Total Harga</td>
                                        <td>Rp. <?= number_format($total); ?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="<?= base_url('penjualan/print/'.$nota) ?>" class="btn btn-info" target="_blank">
                                    Cetak Nota
                                </a>
                            </div>
                        </div>
                     </div>
                  </div>
            </div>