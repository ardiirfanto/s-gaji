<!-- Template -->
<div id="page_unit" class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input value="<?= $row->id ?? '' ?>" type="hidden" name="id" id="id" ref="id" class="form-control form-control-sm">
                        <input value="<?= $row->nama_unit ?? '' ?>" type="text" name="unit" id="unit" ref="unit" class="form-control form-control-sm" placeholder="Masukan Nama Unit" required="true">
                    </div>
                    <div class="col-md-2 form-group" style="padding-top: 7px;">
                        <button v-on:click="<?= !$this->uri->segment('2') ? 'doInsert' : 'doUpdate' ?>" class="btn btn-primary btn-sm">
                            <?= $this->uri->segment('2') != null ? "Edit" : "Tambah"; ?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Master Unit</h5>
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama Unit</th>
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
                                <td><?= $row->nama_unit ?></td>
                                <td>
                                    <a href="<?= base_url('unit/edit/' . $row->id) ?>" class="btn btn-sm btn-outline-info rounded-pill">
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
                        <!-- <tr v-for="(row,i) in data" :key="i">
                            <td>{{ no+i }}</td>
                            <td>{{ row.nama_unit }}</td>
                            <td>
                                <a href="<?= base_url('unit/edit') ?>" class="btn btn-sm btn-outline-info rounded-pill">
                                    <span class="material-icons-outlined">
                                        edit
                                    </span>
                                </a>
                                <button v-on:click="doDelete(row.id)" type="button" class="btn btn-sm btn-outline-danger rounded-pill">
                                    <span class="material-icons-outlined">
                                        delete
                                    </span>
                                </button>
                            </td>
                        </tr> -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Vue Script -->
<script src="<?= base_url(); ?>vue/master-unit.js"></script>