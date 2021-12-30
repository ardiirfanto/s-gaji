new Vue({
    el: "#app_login",
    data: {
        title: "SiGaji",
        username: null,
        password: null,
    },
    methods: {
        doLogin: async function () {
            this.username = this.$refs.username.value;
            this.password = this.$refs.password.value;

            var formData = new FormData();
            formData.append('username', this.username);
            formData.append('password', this.password);

            axios.post(base_url + '/auth/login', formData).then(res => {
                if (res.data == 1) {
                    alertSuccess('Login Berhasil, Silahkan Tunggu').then(() => {
                        location.href = base_url + ''
                    });
                } else if (res.data == 2) {
                    alertFailed('Password Salah');
                } else if (res.data == 0) {
                    alertFailed('Akun tidak ditemukan');
                } else {
                    alertFailed(res.data);
                }
            }).catch(e => {
                console.error(e);
                alertFailed(e);
            });
        }
    }
});