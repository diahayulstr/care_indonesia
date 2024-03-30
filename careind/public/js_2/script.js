// function validateFile() {
//     // Mendapatkan elemen-elemen input file dan pesan error
//     var dokumenInput = document.getElementById('dokumen');
//     var dokumenDonorInput = document.getElementById('dokumen_donor');
//     var dokumenKomunikasiInput = document.getElementById('dokumen_komunikasi');
//     var dokumenProposalInput = document.getElementById('dokumen_proposal');

//     var fileErrorDonor = document.getElementById('file-error-donor');
//     var fileErrorKomunikasi = document.getElementById('file-error-komunikasi');
//     var fileErrorProposal = document.getElementById('file-error-proposal');

//     // Memvalidasi setiap input file
//     validateSingleFile(dokumenInput, fileErrorInput);
//     validateSingleFile(dokumenDonorInput, fileErrorDonor);
//     validateSingleFile(dokumenKomunikasiInput, fileErrorKomunikasi);
//     validateSingleFile(dokumenProposalInput, fileErrorProposal);
// }

// function validateSingleFile(fileInput, fileError) {
//     // Memeriksa apakah ada file yang dipilih
//     if (fileInput.files.length > 0) {
//         var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
//         var filePath = fileInput.value;
//         var fileExtension = filePath.split('.').pop().toLowerCase();

//         // Memeriksa ekstensi file
//         if (allowedExtensions.indexOf(fileExtension) === -1) {
//             fileError.textContent = 'File harus berupa gambar (jpg, jpeg, png, gif) atau PDF.';
//             fileInput.value = ''; // Mengosongkan input file
//         } else {
//             fileError.textContent = ''; // Membersihkan pesan error jika valid
//         }
//     } else {
//         fileError.textContent = ''; // Membersihkan pesan error jika tidak ada file yang dipilih
//     }
// }

function validateFile() {}

// Edit Modal
$(document).ready(function () {
    $("#impact_goals_id").select2();
    $("#komitmen_sdgs").select2();

    $("#form-master-proposal").on("shown.bs.modal", function () {
        $("#impact_goals_id").select2();
    });
});

// Add
$(document).ready(function () {
    $("#myTabjustified").on("click", function () {
        if ($("#proposal-tab").hasClass("active")) {
            $("#impact_goals_id").select2();
        }
    });
});

// Edit Master
$(document).ready(function () {
    $(".impact-goals-select").select2();
});

// Grid Add Proposal
$(document).ready(function () {
    $('#btn-blank-row-proposal').on("click", function() {
        $(".impact-goals-select-grid").select2();
    });
});


// ADMIN ONLY MODAL EDIT
$(document).ready(function () {
    $(document).on("click", "#btn-update", function () {
        let data_id = $(this).attr("data-id");
        let data_name = $(this).attr("data-name");
        let data_email = $(this).attr("data-email");
        let data_password = $(this).attr("data-password");
        let data_role_id = $(this).attr("data-role-id");

        $("#name-edit").val(data_name);
        $("#id-edit").val(data_id);
        $("#email-edit").val(data_email);
        $("#password-edit").val(data_password);
        $("#role_id-edit").val(data_role_id);

        $("#form-update").modal("show");
    });
});

// NARAHUBUNG
$(document).ready(function () {
    // Tangani klik tombol #btn-editmaster-narahubung
    $(document).on("click", "#btn-editmaster-narahubung", function () {
        var id = $(this).data("id");
        var donor_id = $(this).data("donor-id");
        var nama_kontak = $(this).data("nama-kontak");
        var jabatan = $(this).data("jabatan");
        var email = $(this).data("email");
        var no_telp = $(this).data("no-telp");
        var status_id = $(this).data("status-id");

        $("#narahubung_id").val(id);
        $("#donor_id-master-narahubung").val(donor_id);
        $("#nama_kontak").val(nama_kontak);
        $("#jabatan").val(jabatan);
        $("#email").val(email);
        $("#no_telp").val(no_telp);
        $("#status_id").val(status_id);

        $("#form-master-narahubung").modal("show");
    });

    // Membersihkan form saat modal ditutup
    $("#form-master-narahubung").on("hidden.bs.modal", function () {
        $(this).find("form")[0].reset();
    });

    // Membersihkan form saat tombol "Cancel" ditekan
    $("#form-master-narahubung").on(
        "click",
        '[data-bs-dismiss="modal"]',
        function () {
            $("#form-master-narahubung").find("form")[0].reset();
        }
    );

    // Membersihkan form saat tombol "Save" ditekan
    $("#form-master-narahubung").on("submit", "form", function () {
        $(this).find("form")[0].reset();
    });
});

// KOMUNIKASI
$(document).ready(function () {
    $(document).on("click", "#btn-addmaster-komunikasi", function () {
        var donor_id = $(this).data("id");
        $("#donor_id-master-komunikasi").val(donor_id);
        $("#dokumen_komunikasi").change(function () {
            var file = this.files[0];
            var fileType = file.type;
            var reader = new FileReader();

            reader.onload = function (e) {
                if (fileType.startsWith("image")) {
                    $("#filePreview-komunikasi").html(
                        '<img src="' +
                            e.target.result +
                            '" class="img-fluid" alt="Pratinjau Gambar">'
                    );
                } else if (fileType === "application/pdf") {
                    $("#filePreview-komunikasi").html(
                        '<embed src="' +
                            e.target.result +
                            '" type="application/pdf" width="100%" height="400px">'
                    );
                }
            };

            reader.readAsDataURL(file);
        });
        $("#form-master-komunikasi").modal("show");
    });

    // Tangani klik tombol #btn-editmaster-komunikasi
    $(document).on("click", "#btn-editmaster-komunikasi", function () {
        var id = $(this).data("id");
        var donor_id = $(this).data("donor-id");
        var tanggal = $(this).data("tanggal");
        var saluran_id = $(this).data("saluran-id");
        var jenjang_komunikasi_id = $(this).data("jenjang-komunikasi-id");
        var tindak_lanjut_id = $(this).data("tindak-lanjut-id");
        var catatan = $(this).data("catatan");
        var tgl_selanjutnya = $(this).data("tgl-selanjutnya");
        var dokumen = $(this).data("dokumen-komunikasi");

        $("#komunikasi_id").val(id);
        $("#donor_id-master-komunikasi").val(donor_id);
        $("#tanggal").val(tanggal);
        $("#saluran_id").val(saluran_id);
        $("#jenjang_komunikasi_id").val(jenjang_komunikasi_id);
        $("#tindak_lanjut_id").val(tindak_lanjut_id);
        $("#catatan").val(catatan);
        $("#tgl_selanjutnya").val(tgl_selanjutnya);
        $("#nama-dokumen-komunikasi").text(dokumen);

        $("#dokumen_komunikasi").change(function () {
            var file = this.files[0];
            var fileType = file.type;
            var reader = new FileReader();

            reader.onload = function (e) {
                if (fileType.startsWith("image")) {
                    $("#filePreview-komunikasi").html(
                        '<img src="' +
                            e.target.result +
                            '" class="img-fluid" alt="Pratinjau Gambar">'
                    );
                } else if (fileType === "application/pdf") {
                    $("#filePreview-komunikasi").html(
                        '<embed src="' +
                            e.target.result +
                            '" type="application/pdf" width="100%" height="400px">'
                    );
                }
            };

            reader.readAsDataURL(file);
        });

        $("#form-master-komunikasi").modal("show");
    });

    $("#form-master-komunikasi").on("hidden.bs.modal", function () {
        $(this).find("form")[0].reset();
        $("#filePreview-komunikasi").empty();
    });

    $("#form-master-komunikasi").on(
        "click",
        '[data-bs-dismiss="modal"]',
        function () {
            $("#form-master-komunikasi").find("form")[0].reset();
            $("#filePreview-komunikasi").empty();
        }
    );

    $("#form-master-komunikasi").on("submit", "form", function () {
        $(this).find("form")[0].reset();
        $("#filePreview-komunikasi").empty();
    });
});

// PROPOSAL
$(document).ready(function () {
    $(document).on("click", "#btn-addmaster-proposal", function () {
        var donor_id = $(this).data("id");
        $("#donor_id-master-proposal").val(donor_id);
        $("#dokumen_proposal").change(function () {
            var file = this.files[0];
            var fileType = file.type;
            var reader = new FileReader();

            reader.onload = function (e) {
                if (fileType.startsWith("image")) {
                    $("#filePreview-proposal").html(
                        '<img src="' +
                            e.target.result +
                            '" class="img-fluid" alt="Pratinjau Gambar">'
                    );
                } else if (fileType === "application/pdf") {
                    $("#filePreview-proposal").html(
                        '<embed src="' +
                            e.target.result +
                            '" type="application/pdf" width="100%" height="400px">'
                    );
                }
            };

            reader.readAsDataURL(file);
        });
        $("#form-master-proposal").modal("show");
    });

    // Tangani klik tombol #btn-editmaster-proposal
    $(document).on("click", "#btn-editmaster-proposal", function () {
        var id = $(this).data("id");
        var donor_id = $(this).data("donor-id");
        var tujuan_pendanaan_id = $(this).data("tujuan-pendanaan-id");
        var jenis_penerimaan_id = $(this).data("jenis-penerimaan-id");
        var saluran_pendanaan_id = $(this).data("saluran-pendanaan-id");
        var jenis_intermediaries_id = $(this).data("jenis-intermediaries-id");
        var nama_proyek = $(this).data("nama-proyek");
        var klasifikasi_portfolio_id = $(this).data("klasifikasi-portfolio-id");
        var impact_goals_id = $(this).data("impact-goals-id");
        var estimasi_nilai_usd = $(this).data("estimasi-nilai-usd");
        var estimasi_nilai_idr = $(this).data("estimasi-nilai-idr");
        var usulan_durasi = $(this).data("usulan-durasi");
        var status_kemajuan_id = $(this).data("status-kemajuan-id");
        var dokumen = $(this).data("dokumen-proposal");

        $("#proposal_id").val(id);
        $("#donor_id-master-proposal").val(donor_id);
        $("#tujuan_pendanaan_id").val(tujuan_pendanaan_id);
        $("#jenis_penerimaan_id").val(jenis_penerimaan_id);
        $("#saluran_pendanaan_id").val(saluran_pendanaan_id);
        $("#jenis_intermediaries_id").val(jenis_intermediaries_id);
        $("#nama_proyek").val(nama_proyek);
        $("#klasifikasi_portfolio_id").val(klasifikasi_portfolio_id);
        $("#impact_goals_id").val(impact_goals_id);
        $("#estimasi_nilai_usd").val(estimasi_nilai_usd);
        $("#estimasi_nilai_idr").val(estimasi_nilai_idr);
        $("#usulan_durasi").val(usulan_durasi);
        $("#status_kemajuan_id").val(status_kemajuan_id);
        $("#nama-dokumen-proposal").text(dokumen);

        $("#dokumen_proposal").change(function () {
            var file = this.files[0];
            var fileType = file.type;
            var reader = new FileReader();

            reader.onload = function (e) {
                if (fileType.startsWith("image")) {
                    $("#filePreview-proposal").html(
                        '<img src="' +
                            e.target.result +
                            '" class="img-fluid" alt="Pratinjau Gambar">'
                    );
                } else if (fileType === "application/pdf") {
                    $("#filePreview-proposal").html(
                        '<embed src="' +
                            e.target.result +
                            '" type="application/pdf" width="100%" height="400px">'
                    );
                }
            };

            reader.readAsDataURL(file);
        });

        $("#form-master-proposal").modal("show");
    });

    $("#form-master-proposal").on("hidden.bs.modal", function () {
        $(this).find("form")[0].reset();
        $("#filePreview-proposal").empty();
    });

    $("#form-master-proposal").on(
        "click",
        '[data-bs-dismiss="modal"]',
        function () {
            $("#form-master-proposal").find("form")[0].reset();
            $("#filePreview-proposal").empty();
        }
    );

    $("#form-master-proposal").on("submit", "form", function () {
        $(this).find("form")[0].reset();
        $("#filePreview-proposal").empty();
    });
});

// Delete Master Edit
function deleteNarahubung() {
    var form = document.getElementById("deleteFormNarahubung");
    form.submit();
}

function deleteKomunikasi() {
    var form = document.getElementById("deleteFormKomunikasi");
    form.submit();
}

function deleteProposal() {
    var form = document.getElementById("deleteFormProposal");
    form.submit();
}

// Delete Grid Edit
function deleteGridEditNarahubung() {
    var form = document.getElementById("deleteFormGridEditNarahubung");
    form.submit();
}

function deleteGridEditKomunikasi() {
    var form = document.getElementById("deleteFormGridEditKomunikasi");
    form.submit();
}

function deleteGridEditProposal() {
    var form = document.getElementById("deleteFormGridEditProposal");
    form.submit();
}

// File Preview
$(document).ready(function () {
    function previewFile(inputElement, previewElement) {
        inputElement.change(function () {
            var file = this.files[0];
            var fileType = file.type;
            var reader = new FileReader();

            reader.onload = function (e) {
                if (fileType.startsWith("image")) {
                    previewElement.html(
                        '<img src="' +
                            e.target.result +
                            '" class="img-fluid" alt="Pratinjau Gambar">'
                    );
                } else if (fileType === "application/pdf") {
                    previewElement.html(
                        '<embed src="' +
                            e.target.result +
                            '" type="application/pdf" width="100%" height="400px">'
                    );
                }
            };

            reader.readAsDataURL(file);
        });
    }
    // add
    previewFile($("#dokumen_donor"), $("#filePreview-addMaster-donor"));
    previewFile(
        $("#dokumen_komunikasi"),
        $("#filePreview-addMaster-komunikasi")
    );
    previewFile($("#dokumen_proposal"), $("#filePreview-addMaster-proposal"));

    previewFile($("#dokumen_donor"), $("#filePreview-add-donor"));
    previewFile($("#dokumen_komunikasi"), $("#filePreview-add-komunikasi"));
    previewFile($("#dokumen_proposal"), $("#filePreview-add-proposal"));

    // edit
    previewFile($("#dokumen_donor"), $("#filePreview-edit-donor"));
    previewFile($("#dokumen_komunikasi"), $("#filePreview-edit-komunikasi"));
    previewFile($("#dokumen_proposal"), $("#filePreview-edit-proposal"));
    previewFile($("#dokumen_donor"), $("#filePreview-edit-master-donor"));

    $(document).on("click", "#btn-addMaster", function () {
        $("#form-add-master").show();
    });

    $(document).on("click", "#btn-add-donor", function () {
        $("#form-add-donor").show();
    });

    $(document).on("click", "#btn-add-komunikasi", function () {
        $("#form-add-komunikasi").show();
    });

    $(document).on("click", "#btn-add-proposal", function () {
        $("#form-add-proposal").show();
    });

    $(document).on("click", "#btn-edit-donor", function () {
        $("#form-edit-donor").show();
    });

    $(document).on("click", "#btn-edit-komunikasi", function () {
        $("#form-edit-komunikasi").show();
    });

    $(document).on("click", "#btn-edit-proposal", function () {
        $("#form-edit-proposal").show();
    });

    $(document).on("click", "#btn-edit-master", function () {
        $("#form-edit-master").show();
    });
});

// ADD BLANK ROW NARAHUBUNG



