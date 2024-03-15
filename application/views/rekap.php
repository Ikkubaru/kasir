<div class="card">
                     <div class="card-header">
                        <h5 class="card-header-text">Rekap Suara Pilpres 2024</h5> <br>
                     </div>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Input Suara
                    </button>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table table-hover">
                                 <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>Paslon No 1</th>
                                       <th>Paslon No 2</th>
                                       <th>Paslon No 3</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($suara as $vote){ ?>
                                    <tr>
                                       <td><?= $no++ ?></td>
                                       <td><?= $vote['suara_no1'] ?></td>
                                       <td><?= $vote['suara_no2'] ?></td>
                                       <td><?= $vote['suara_no3'] ?></td>
                                    </tr>
                                    <?php }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--  -->
                  <div class="card">
                     <div class="card-header">
                        <h5 class="card-header-text">Rekap Suara Pilpres 2024</h5> <br>
                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table table-hover">
                                 <thead>
                                    <tr>
                                        <th>No</th>
                                       <th>Total Suara</th>
                                       <th>Total Suara Sah</th>
                                       <th>Total Suara Tidak Sah</th>
                                       <th>Nama TPS</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($suara as $vote){ ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                       <td><?= $vote['total_suara_20'] ?></td>
                                       <td><?= $vote['total_suara_sah_20'] ?></td>
                                       <td><?= $vote['total_suara_tidak_sah_20'] ?></td>
                                       <td> TPS <?= $vote['nama_tps'] ?></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Input Suara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('suara/simpan');?>" method="post">
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Total Suara</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="total_suara_20" placeholder="Total Suara" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Total Suara Sah</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="total_suara_sah_20" placeholder="Total Suara Sah" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Total Suara Tidak Sah</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="total_suara_tidak_sah_20" placeholder="Total Suara Tidak Sah" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Suara Paslon No 1</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="suara_no1" placeholder="Suara Paslon No 1" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Suara Paslon No 2</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="suara_no2" placeholder="Suara Paslon No 2" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Suara Paslon No 3</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="suara_no3" placeholder="Suara Paslon No 3" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Nama TPS</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="nama_tps" placeholder="Nama TPS" required>
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