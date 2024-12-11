<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('form[id^="{{ $slot }}"]').forEach(form => {
      form.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah reload halaman
        const formId = form.getAttribute('id');
        const tokenKategori = formId.replace('', '{{ $slot }}');
        const formData = new FormData(form);
        const url = `/kategori/${tokenKategori}`;

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              'X-Requested-With': 'XMLHttpRequest'
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.message) {
              // Pesan sukses
              Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: data.message,
                timer: 2000,
                showConfirmButton: false
              });

              // Perbarui data di UI jika diperlukan
              form.querySelector('.invalid-feedback').innerHTML = ''; // Reset error
              document.querySelector(`#kategori${tokenKategori}`).value = data.data.nama_kategori;
            } else if (data.errors) {
              // Pesan error validasi
              Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal!',
                text: data.errors.kategori || 'Kesalahan tidak diketahui',
              });

              const errorField = form.querySelector('.invalid-feedback');
              errorField.innerHTML = data.errors.kategori || 'Kesalahan tidak diketahui';
              errorField.style.display = 'block';
            }
          })
          .catch(error => {
            // Pesan error jika ada masalah pada request
            Swal.fire({
              icon: 'error',
              title: 'Terjadi Kesalahan!',
              text: 'Gagal memperbarui data. Silakan coba lagi.',
            });
            console.error('Terjadi kesalahan:', error);
          });
      });
    });
  });
</script>
