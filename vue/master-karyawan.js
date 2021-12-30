new Vue({
    el: "#page_karyawan",
    data: {
        no: 1,
        data: [],
        username: null,
        password: null,
        role: null,
        nama: null,
        unit: null,
        jekel: null,
        alamat: null,
        nohp: null,
        gaji: null,
        lembur: null,
        id: null
    },
    methods: {
        doInsert: async function () {
            this.username = this.$refs.username.value;
            this.password = this.$refs.password.value;
            this.role = this.$refs.role.value;
            this.nama = this.$refs.nama.value;
            this.unit = this.$refs.unit.value;
            this.jekel = this.$refs.jekel.value;
            this.alamat = this.$refs.alamat.value;
            this.nohp = this.$refs.nohp.value;
            this.gaji = this.$refs.gaji.value;
            this.lembur = this.$refs.lembur.value;

            if (this.username == "" ||
                this.password == "" ||
                this.role == "" ||
                this.nama == "" ||
                this.unit == "" ||
                this.jekel == "" ||
                this.alamat == "" ||
                this.nohp == "" ||
                this.gaji == "" ||
                this.lembur == "") {
                alertFailed("Kolom Harus diisi")
                return;
            }

            var formData = new FormData();
            formData.append('username', this.username);
            formData.append('password', this.password);
            formData.append('role', this.role);
            formData.append('nama', this.nama);
            formData.append('unit', this.unit);
            formData.append('jekel', this.jekel);
            formData.append('alamat', this.alamat);
            formData.append('nohp', this.nohp);
            formData.append('gaji', this.gaji);
            formData.append('lembur', this.lembur);

            await axios.post(base_url + '/karyawan/add', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Tambah Data Berhasil, Silahkan Tunggu').then(() => {
                        location.href = base_url + '/karyawan'
                    });
                } else if (res.data == 0) {
                    alertFailed('Tambah Data Gagal');
                } else {
                    alertFailed(res.data);
                }
            }).catch(e => {
                console.error(e);
                alertFailed(e);
            });
        },
        doUpdate: async function () {
            this.id = this.$refs.id.value;
            this.nama = this.$refs.nama.value;
            this.unit = this.$refs.unit.value;
            this.jekel = this.$refs.jekel.value;
            this.alamat = this.$refs.alamat.value;
            this.nohp = this.$refs.nohp.value;
            this.gaji = this.$refs.gaji.value;
            this.lembur = this.$refs.lembur.value;

            if (this.nama == "" ||
                this.unit == "" ||
                this.jekel == "" ||
                this.alamat == "" ||
                this.nohp == "" ||
                this.gaji == "" ||
                this.lembur == "") {
                alertFailed("Kolom Harus diisi")
                return;
            }

            var formData = new FormData();
            formData.append('id', this.id);
            formData.append('nama', this.nama);
            formData.append('unit', this.unit);
            formData.append('jekel', this.jekel);
            formData.append('alamat', this.alamat);
            formData.append('nohp', this.nohp);
            formData.append('gaji', this.gaji);
            formData.append('lembur', this.lembur);

            await axios.post(base_url + '/karyawan/update', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Ubah Data Berhasil, Silahkan Tunggu').then(() => {
                        this._resetField()
                        location.href = base_url + '/karyawan'
                    });
                } else if (res.data == 0) {
                    alertFailed('Ubah Data Gagal');
                } else {
                    alertFailed(res.data);
                }
            }).catch(e => {
                console.error(e);
                alertFailed(e);
            });
        },
        doDelete: async function (id) {
            Swal.fire({
                title: 'Yakin Ingin Menghapus Data?',
                text: "Data yang dihapus akan hilang secara permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus Data',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();
                    formData.append('id', id);
                    axios.post(base_url + '/karyawan/delete', formData).then(res => {
                        if (res.data == 1) {
                            alertSuccess('Hapus Data Berhasil').then(() => {
                                this._resetField()
                                location.reload()
                            });
                        } else if (res.data == 0) {
                            alertFailed('Hapus Gagal');
                        } else {
                            alertFailed(res.data);
                        }
                    }).catch(e => {
                        console.error(e);
                        alertFailed(e);
                    });
                }
            })
        },
        _resetField: function () {
        }
    }
});