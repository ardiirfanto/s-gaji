var alertSuccess = (msg) => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
    })

    return Toast.fire({
        icon: 'success',
        title: msg
    });
}

var alertFailed = (msg) => {
    Swal.fire({
        title: 'Gagal!',
        text: msg,
        icon: 'error',
        confirmButtonText: 'Kembali'
    });
}