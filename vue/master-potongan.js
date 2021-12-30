new Vue({
    el: "#page_potongan",
    data: {
        no: 1,
        data: [],
        potongan: null,
        id: null
    },
    methods: {
        doInsert: async function () {
            this.potongan = this.$refs.potongan.value;

            if (this.potongan == "") {
                alertFailed("Kolom Harus diisi")
                return;
            }

            var formData = new FormData();
            formData.append('potongan', this.potongan);

            await axios.post(base_url + '/potongan/add', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Tambah Data Berhasil, Silahkan Tunggu').then(() => {
                        this._resetField()
                        location.reload()
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
            this.potongan = this.$refs.potongan.value;

            if (this.potongan == "") {
                alertFailed("Kolom Harus diisi")
                return;
            }

            var formData = new FormData();
            formData.append('id', this.id);
            formData.append('potongan', this.potongan);

            await axios.post(base_url + '/potongan/update', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Ubah Data Berhasil, Silahkan Tunggu').then(() => {
                        this._resetField()
                        location.href = base_url + '/potongan'
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
                    axios.post(base_url + '/potongan/delete', formData).then(res => {
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
            this.$refs.id.value = "";
            this.$refs.potongan.value = "";
        }
    }
});