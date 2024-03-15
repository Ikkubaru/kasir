<form action="<?= base_url('pelanggan/update');?>" method="post">
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Nama Pelanggan</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nama" value="<?= $user->nama;?>">
                        <input type="hidden" name="id_pelanggan" value="<?= $user->id_pelanggan ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Alamat</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="alamat" value="<?= $user->alamat;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="telp" value="<?= $user->telp;?>">
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
        </form>