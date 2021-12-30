new Vue({
    el: "#page_karyawan_potongan",
    data: {
        no: 1,
        data: [],
        id:null,
        user: null,
        potongan: null,
        nominal: null,
    },
    mounted(){
        this.viewData()
    },
    methods: {
        viewData: async function () {
            this.user = this.$refs.user.value;
            await axios.get(base_url + '/karyawan/potongan_view/' + this.user).then(res => {
                if (res.data != null) {
                    this.data = res.data;
                }
            }).catch(e => {
                console.error(e);
            });
        },
        doInsert: async function () {
            this.user = this.$refs.user.value;
            this.potongan = this.$refs.potongan.value;
            this.nominal = this.$refs.nominal.value;

            if (this.user == "" ||
                this.potongan == "" ||
                this.nominal == "") {
                alertFailed("Kolom Harus diisi")
                return;
            }

            var formData = new FormData();
            formData.append('user', this.user);
            formData.append('potongan', this.potongan);
            formData.append('nominal', this.nominal);

            await axios.post(base_url + '/karyawan/potongan_add', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Tambah Data Berhasil, Silahkan Tunggu').then(() => {
                        this.nominal = this.$refs.nominal.value = "";
                        this.viewData();
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
        doUpdate: async function (id) {
            this.id = id
            this.user = this.$refs.user.value;
            this.potongan = this.$refs.potongan.value;
            this.nominal = document.getElementById('nominal' + id).value;

            if (this.user == "" ||
                this.potongan == "" ||
                this.nominal == "") {
                alertFailed("Kolom Harus diisi")
                return;
            }

            var formData = new FormData();
            formData.append('id', this.id);
            formData.append('user', this.user);
            formData.append('potongan', this.potongan);
            formData.append('nominal', this.nominal);

            await axios.post(base_url + '/karyawan/potongan_update', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Ubah Data Berhasil, Silahkan Tunggu').then(() => {
                        this.viewData();
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
                    axios.post(base_url + '/karyawan/potongan_delete', formData).then(res => {
                        if (res.data == 1) {
                            alertSuccess('Hapus Data Berhasil').then(() => {
                                this.viewData();
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
        }
    }
});