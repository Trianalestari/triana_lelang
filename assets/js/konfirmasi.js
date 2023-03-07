function hapusMenu(url) {

    Swal.fire({
        title: 'are you sure?',
        text: "yakin ingin menghapus?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        canselButtonColor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = url;
        }
    });
}

function hapusRole(url) {

    Swal.fire({
        title: 'are you sure?',
        text: "yakin ingin menghapus?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        canselButtonColor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = url;
        }
    });
}

function hapusSubMenu(url) {

    Swal.fire({
        title: 'are you sure?',
        text: "yakin ingin menghapus?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        canselButtonColor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = url;
        }
    });
}
