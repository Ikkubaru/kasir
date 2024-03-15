<form action="<?= base_url('pengguna/update');?>" method="post">
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  value="<?= $user->username;?>" readonly>
                        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Nama</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nama" value="<?= $user->nama;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Level</label>
                    <div class="col-sm-10">
                        <select name="level" class="form-control">
                            <option value="admin" <?php if($user->level=='admin'){echo "selected";} ?>>Admin</option>
                            <option value="kasir" <?php if($user->level=='kasir'){echo "selected";} ?>>Kasir</option>
                        </select>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
        </form>