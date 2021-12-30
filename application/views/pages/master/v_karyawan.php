<!-- Template -->
<div id="page_karyawan" class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('karyawan/form') ?>" class="btn btn-primary btn-sm" style="float: right;">
                    Tambah
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Master Karyawan</h5>
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama</th>
                            <th>Jekel</th>
                            <th>User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $row) {

                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nama_karyawan ?></td>
                                <td><?= $row->jekel ?></td>
                                <td><?= $row->username ?></td>
                                <td>
                                    <a href="<?= base_url('karyawan/form/' . $row->id) ?>" type="button" class="btn btn-sm btn-outline-info rounded-pill">
                                        <span class="material-icons-outlined">
                                            edit
                                        </span>
                                    </a>
                                    <button v-on:click="doDelete(<?= $row->id ?>)" type="button" class="btn btn-sm btn-outline-danger rounded-pill">
                                        <span class="material-icons-outlined">
                                            delete
                                        </span>
                                    </button>
                                    <a href="<?= base_url('karyawan/potongan/' . $row->id) ?>" type="button" class="btn btn-sm btn-outline-warning rounded-pill">
                                        <span class="material-icons-outlined">
                                            money_off
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Vue Script -->
<script src="<?= base_url(); ?>vue/master-karyawan.js"></script>