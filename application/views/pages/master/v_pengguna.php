<!-- Template -->
<div id="page_pengguna" class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('pengguna/form') ?>" class="btn btn-primary btn-sm" style="float: right;">
                    Tambah
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Master Pengguna</h5>
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $row) {
                            if ($row->role == 'AP') {
                                $role = 'Admin Personalia';
                            } else if ($row->role == 'P') {
                                $role = 'Pimpinan';
                            } else {
                                $role = 'Karyawan';
                            }

                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->username ?></td>
                                <td><?= $role ?></td>
                                <td>
                                    <?php
                                    if ($row->username == $this->session->userdata('username')) {
                                    ?>
                                    <span class="badge badge-pill badge-primary">Pengguna Diri Sendiri</span>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url('pengguna/form/' . $row->id) ?>" type="button" class="btn btn-sm btn-outline-info rounded-pill">
                                            <span class="material-icons-outlined">
                                                edit
                                            </span>
                                        </a>
                                        <button v-on:click="doDelete(<?= $row->id ?>)" type="button" class="btn btn-sm btn-outline-danger rounded-pill">
                                            <span class="material-icons-outlined">
                                                delete
                                            </span>
                                        </button>
                                    <?php
                                    }
                                    ?>

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
<script src="<?= base_url(); ?>vue/master-pengguna.js"></script>