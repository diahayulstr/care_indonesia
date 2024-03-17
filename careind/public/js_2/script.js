function validateFile() {
    var fileInput = document.getElementById('dokumen');
    var fileError = document.getElementById('file-error');

    if (fileInput.files.length > 0) {
        var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
        var filePath = fileInput.value;
        var fileExtension = filePath.split('.').pop().toLowerCase();

        if (allowedExtensions.indexOf(fileExtension) === -1) {
            fileError.textContent = 'File harus berupa gambar (jpg, jpeg, png, gif) atau PDF.';
            fileInput.value = ''; // Kosongkan input file
        } else {
            fileError.textContent = '';
        }
    }
}


$(document).ready(function() {
    $('#impact_goals_id').select2();
});


document.addEventListener("DOMContentLoaded", function() {
    // Inisialisasi select2 di tab pertama
    $('#komitmen_sdgs').select2();

    // Menambahkan event handler untuk setiap kali tab diganti
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        // Mengambil ID tab yang baru aktif
        var targetTab = $(e.target).attr('href');

        // Jika ID tab adalah proposal-justified, inisialisasikan select2
        if (targetTab === '#proposal-justified') {
            // Memanggil fungsi select2 pada elemen dengan ID impact_goals_id
            $('#impact_goals_id').select2();
        }
    });
});


// ADMIN ONLY DROPDOWN SELECT
$(document).ready(function(){
    $(document).on('click', '#btn-update', function(){
        let data_id = $(this).attr("data-id");
        let data_name = $(this).attr("data-name");

        $('#name-edit').val(data_name);
        $('#id-edit').val(data_id);

        $('#form-update').modal('show');
    });
});

// MODAL
// $(document).ready(function() {
//     $('#form-edit-master-narahubung').on('hidden.bs.modal', function() {
//         // Menutup modal pertama saat modal kedua ditutup
//         $('#form-add-master-narahubung').modal('hide');
//     });
// });


$(document).ready(function(){
    // Tangani klik tombol #btn-editmaster-narahubung
    $(document).on('click', '#btn-editmaster-narahubung', function() {
            var id = $(this).data('id');
            var donor_id = $(this).data('donor-id');
            var nama_kontak = $(this).data('nama-kontak');
            var jabatan = $(this).data('jabatan');
            var email = $(this).data('email');
            var no_telp = $(this).data('no-telp');
            var status_id = $(this).data('status-id');

            $('#narahubung_id').val(id);
            $('#donor_id-master-narahubung').val(donor_id);
            $('#nama_kontak').val(nama_kontak);
            $('#jabatan').val(jabatan);
            $('#email').val(email);
            $('#no_telp').val(no_telp);
            $('#status_id').val(status_id);

            $('#form-master-narahubung').modal('show');
    });
});




// document.addEventListener('DOMContentLoaded', function () {
//     var deleteButtons = document.querySelectorAll('.delete-btn');
//     deleteButtons.forEach(function (button) {
//         button.addEventListener('click', function (event) {
//             event.preventDefault();
//             var donorId = button.getAttribute('data-donor-id');
//             if (confirm('Are you sure you want to delete this donor?')) {
//                 document.getElementById('delete-form-' + donorId).submit();
//             }
//         });
//     });
// });
