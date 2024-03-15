<form action="<?= base_url('produk/update');?>" method="post">
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nama" value="<?= $user->nama;?>">
                        <input type="hidden" name="id_produk" value="<?= $user->id_produk ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Harga</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="harga" value="<?= $user->harga;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Stok</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="stok" value="<?= $user->stok;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Kode Produk</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="kode_produk" value="<?= $user->kode_produk;?>">
                    </div>
                </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
        </form>