const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire('Data siswa ', 'Berhasil ' + flashData, 'success'
    );
}


const flashDataKandidat = $('.flash-data-kandidat').data('kandidat');

if (flashDataKandidat) {
    Swal.fire('Data kandidat ', 'Berhasil ' + flashDataKandidat, 'success'
    );
}

const flashDataKelas = $('.flash-data-kelas').data('kelas');

if (flashDataKelas) {
    Swal.fire('Data Kelas ', 'Berhasil ' + flashDataKelas, 'success'
    );
}

const flashDataPassword = $('.flash-data-password').data('password');

if (flashDataPassword) {
    Swal.fire('Password ', 'Berhasil ' + flashDataPassword, 'success'
    );
}




// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data siswa akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$('.tombol-kandidat').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Yakin akan memilih kandidat ini?',
        text: "kandidat akan dipilih",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Pilih'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});



$('.tombol-hapus-kandidat').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data kandidat akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$('.tombol-hapus-kelas').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data kelas akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$('.tombol-reset').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apa kamu yakin ingin mereset voting',
        text: "data voter akan direset",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Reset!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$('.tombol-logout').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apa kamu yakin ingin logout?',
        text: "keluar dari sistem",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'logout'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});