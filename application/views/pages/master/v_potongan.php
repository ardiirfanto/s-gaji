<!-- Template -->
<div id="page_potongan" class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input value="<?= $row->id ?? '' ?>" type="hidden" name="id" id="id" ref="id" class="form-control form-control-sm">
                        <input value="<?= $row->potongan ?? '' ?>" type="text" name="potongan" id="potongan" ref="potongan" class="form-control form-control-sm" placeholder="Masukan Jenis Potongan Gaji" required="true">
                    </div>
                    <div class="col-md-2 form-group" style="padding-top: 7px;">
                        <button v-on:click="<?= !$this->uri->segment('2') ? 'doInsert' : 'doUpdate' ?>" class="btn btn-primary btn-sm">
                            <?= $this->uri->segment('2') != null ? "Edit" : "Tambah"; ?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Master Potongan Gaji</h5>
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Jenis Potongan Gaji</th>
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
                                <td><?= $row->potongan ?></td>
                                <td>
                                    <a href="<?= base_url('potongan/edit/' . $row->id) ?>" class="btn btn-sm btn-outline-info rounded-pill">
                                        <span class="material-icons-outlined">
                                            edit
                                        </span>
                                    </a>
                                    <button v-on:click="doDelete(<?= $row->id ?>)" type="button" class="btn btn-sm btn-outline-danger rounded-pill">
                                        <span class="material-icons-outlined">
                                            delete
                                        </span>
                                    </button>
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
<script src="<?= base_url(); ?>vue/master-potongan.js"></script>