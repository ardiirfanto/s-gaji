<!-- Template -->
<div id="page_karyawan_potongan" class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="margin-bottom: 0px;">Kelola Potongan Karyawan : <?= $karyawan->nama_karyawan; ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <input value="<?= $this->uri->segment('3') ?? '' ?>" ref="user" id="user" name="user" type="hidden" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="potongan">Potongan</label>
                        <select ref="potongan" name="potongan" id="potongan" class="form-control">
                            <?php
                            foreach ($potongan as $p) {
                            ?>
                                <option value="<?= $p->id ?>"> <?= $p->potongan ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="nominal">Nominal(Rp)</label>
                        <input ref="nominal" id="nominal" name="nominal" type="number" class="form-control">
                    </div>
                    <div class="col-md-3" style="padding-top: 33px;">
                        <a href="javascript:history.back()" style="float: left;" type="button" class="btn btn-secondary rounded-pill">
                            Kembali
                        </a>
                        <button v-on:click="doInsert" style="float: right;" type="button" class="btn btn-primary rounded-pill">
                            Simpan
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <th width="250px">Jenis</th>
                                <th width="350px">Nominal(Rp)</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <tr v-for="(row,i) in data" :key="i">
                                    <td>{{row.potongan}}</td>
                                    <td>
                                        <input v-bind:ref="'nominal' + row.id" v-bind:id="'nominal' + row.id" v-bind:value="row.nominal" type="text" class="form-control">
                                    </td>
                                    <td>
                                        <button v-on:click="doUpdate(row.id)" type="button" class="btn btn-success rounded-pill">
                                            <span class="material-icons-outlined">
                                                save
                                            </span>
                                        </button>
                                        <button v-on:click="doDelete(row.id)" type="button" class="btn btn-danger rounded-pill">
                                            <span class="material-icons-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vue Script -->
<script src="<?= base_url(); ?>vue/data-karyawan-potongan.js"></script>