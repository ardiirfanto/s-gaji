<!-- Template -->
<div id="page_pengguna" class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="margin-bottom: 0px;"><?= $this->uri->segment('3') != null ? 'Edit' : 'Tambah'; ?> Data Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="username">Username</label>
                        <input value="<?= $row->id ?? '' ?>" ref="id" id="id" name="id" type="hidden" class="form-control">
                        <input value="<?= $row->username ?? '' ?>" ref="username" id="username" name="username" type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="password">Password</label>
                        <input ref="password" id="password" name="password" type="text" class="form-control">
                        <?php
                        if ($this->uri->segment('3') != null) {
                        ?>
                            <p style="font-size: 10px;margin:0px;color:crimson">*Kosongkan jika tidak merubah password</p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-4">
                        <label for="role">Role</label>
                        <select ref="role" name="role" id="role" class="form-control">
                            <option value="AP" <?php if (isset($row)) {
                                                    if ($row->role == 'AP') {
                                                        echo 'SELECTED';
                                                    }
                                                } ?>>Admin Personalia</option>
                            <option value="P" <?php if (isset($row)) {
                                                    if ($row->role == 'P') {
                                                        echo 'SELECTED';
                                                    }
                                                } ?>>Pimpinan</option>
                            <option value="K" <?php if (isset($row)) {
                                                    if ($row->role == 'K') {
                                                        echo 'SELECTED';
                                                    }
                                                } ?>>Karyawan</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <a href="javascript:history.back()" style="float: left;" type="button" class="btn btn-secondary rounded-pill">
                            Kembali
                        </a>
                        <button v-on:click="<?= $this->uri->segment('3') != null ? 'doUpdate' : 'doInsert' ?>" style="float: right;" type="button" class="btn btn-primary rounded-pill">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vue Script -->
<script src="<?= base_url(); ?>vue/master-pengguna.js"></script>