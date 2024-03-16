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
    // Tangani klik tombol #btn-addmaster-narahubung
    $(document).on('click', '#btn-addmaster-narahubung', function(){
        let data_id = $(this).attr("data-id");
        $('#donor_id-master-narahubung').val(data_id);
        $('#form-add-master-narahubung').modal('show');
    });

    // Tangani klik tombol #btn-addmaster-komunikasi
    $(document).on('click', '#btn-addmaster-komunikasi', function(){
        let data_id = $(this).attr("data-id");
        $('#donor_id-master-komunikasi').val(data_id);
        $('#form-add-master-komunikasi').modal('show');
    });

    // Tangani klik tombol #btn-addmaster-proposal
    $(document).on('click', '#btn-addmaster-proposal', function(){
        let data_id = $(this).attr("data-id");
        $('#donor_id-master-proposal').val(data_id);
        $('#form-add-master-proposal').modal('show');
    });

    // Tangani klik tombol #btn-editmaster-narahubung
    $(document).on('click', '#btn-editmaster-narahubung', function() {
        var narahubungId = $(this).data("narahubung-id");
        var donorId = $(this).data("donor-id");
        var namaKontak = $(this).data("nama-kontak");
        var jabatan = $(this).data("jabatan");
        var email = $(this).data("email");
        var noTelp = $(this).data("no-telp");
        // var statusId = $(this).data("status-id");
        var statusId = this.getAttribute('data-status-id');
        console.log(statusId);

        $('#narahubung_id-master-narahubung').val(narahubungId);
        $('#donor_id-masteredit-narahubung').val(donorId);
        $('#nama_kontak_edit').val(namaKontak);
        $('#jabatan_edit').val(jabatan);
        $('#email_edit').val(email);
        $('#no_telp_edit').val(noTelp);
        $('#status_id_edit').val(statusId).change();

    });

    // Tangani klik tombol #btn-editmaster-komunikasi
    $(document).on('click', '#btn-editmaster-komunikasi', function() {
        var komunikasiId = $(this).data("komunikasi-id");
        var donorId = $(this).data("donor-id");

        $('#komunikasi_id-master-komunikasi').val(komunikasiId);
        $('#donor_id-masteredit-komunikasi').val(donorId);
    });

    // Tangani klik tombol #btn-editmaster-proposal
    $(document).on('click', '#btn-editmaster-proposal', function() {
        var proposalId = $(this).data("proposal-id");
        var donorId = $(this).data("donor-id");

        $('#proposal_id-master-proposal').val(proposalId);
        $('#donor_id-masteredit-proposal').val(donorId);
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
