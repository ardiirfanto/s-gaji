new Vue({
    el: "#page_pengguna",
    data: {
        no: 1,
        data: [],
        username: null,
        password: null,
        role: null,
        id: null
    },
    methods: {
        doInsert: async function () {
            this.username = this.$refs.username.value;
            this.password = this.$refs.password.value;
            this.role = this.$refs.role.value;

            if (this.username == "" || this.password == "" || this.role == "") {
                alertFailed("Kolom Harus diisi")
                return;
            }

            var formData = new FormData();
            formData.append('username', this.username);
            formData.append('password', this.password);
            formData.append('role', this.role);

            await axios.post(base_url + '/pengguna/add', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Tambah Data Berhasil, Silahkan Tunggu').then(() => {
                        location.href = base_url + '/pengguna'
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
            this.username = this.$refs.username.value;
            this.password = this.$refs.password.value;
            this.role = this.$refs.role.value;

            if (this.username == "" || this.role == "") {
                alertFailed("Kolom Harus diisi")
                return;
            }

            var formData = new FormData();
            formData.append('id', this.id);
            formData.append('username', this.username);
            formData.append('password', this.password);
            formData.append('role', this.role);

            await axios.post(base_url + '/pengguna/update', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Ubah Data Berhasil, Silahkan Tunggu').then(() => {
                        location.href = base_url + '/pengguna'
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
                    axios.post(base_url + '/pengguna/delete', formData).then(res => {
                        if (res.data == 1) {
                            alertSuccess('Hapus Data Berhasil').then(() => {
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