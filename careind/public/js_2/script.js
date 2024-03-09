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
