<!-- Template -->
<div id="page_karyawan" class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="margin-bottom: 0px;"><?= $this->uri->segment('3') != null ? 'Edit' : 'Tambah'; ?> Data Karyawan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php if (!$this->uri->segment('3')) { ?>
                        <div class="col-md-12">
                            <b>USER AKUN :</b>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for="username">Username</label>
                            <input ref="username" id="username" name="username" type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="password">Password</label>
                            <input ref="password" id="password" name="password" type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="role">Role</label>
                            <select ref="role" name="role" id="role" class="form-control">
                                <option value="K">Karyawan</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    <?php } ?>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input value="<?= $row->id ?? '' ?>" ref="id" id="id" name="id" type="hidden" class="form-control">
                        <b>DATA KARYAWAN :</b>
                        <br>
                    </div>
                    <div class="col-md-8">
                        <label for="nama">Nama Karyawan</label>
                        <input value="<?= $row->nama_karyawan ?? '' ?>" ref="nama" id="nama" name="nama" type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="jekel">Jenis Kelamin</label>
                        <select ref="jekel" name="jekel" id="jekel" class="form-control">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label for="alamat">Alamat</label>
                        <textarea ref="alamat" name="alamat" id="alamat" rows="5" class="form-control"><?= $row->alamat ?? '' ?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="nohp">No.Handphone</label>
                        <input value="<?= $row->nohp ?? '' ?>" ref="nohp" id="nohp" name="nohp" type="number" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="unit">Unit</label>
                        <select ref="unit" name="unit" id="unit" class="form-control">
                            <?php
                            foreach ($unit as $u) {
                            ?>
                                <option value="<?= $u->id ?>" <?php if (isset($row->unit_id) && $row->unit_id == $u->id) {
                                                                    echo  'SELECTED';
                                                                } ?>> <?= $u->nama_unit ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="gaji">Gaji Pokok(Rp)</label>
                        <input value="<?= $row->gaji ?? '' ?>" ref="gaji" id="gaji" name="gaji" type="number" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="lembur">Lemburan Pokok(Rp)</label>
                        <input value="<?= $row->lembur ?? '' ?>" ref="lembur" id="lembur" name="lembur" type="number" class="form-control">
                    </div>
                </div>
                <div class="row">
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
<script src="<?= base_url(); ?>vue/master-karyawan.js"></script>