<script>
  $(document).ready(function() {
    $('#kategoriForm').on('submit', function(e) {
      e.preventDefault(); // Mencegah form dikirim secara default

      // Ambil data dari form
      let formData = new FormData(this);
      let url =
        "{{ route('kategori.store') }}"; // Pastikan rute sesuai dengan nama metode store di controller Anda

      // Clear error messages
      $('#errorKategori').text('');

      $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          Swal.fire({
            title: 'Berhasil!',
            text: response.message,
            icon: 'success'
          });

          // Reset form
          $('#kategoriForm')[0].reset();

          // Perbarui data tabel tanpa reload (opsional: tambahkan baris baru)
          $('#basic-1 tbody').append(`
                            <tr>
                                <td class="text-center">New</td>
                                <td class="text-center">${response.data.nama_kategori}</td>
                                <td class="text-center"><strong class="badge badge-warning">${response.data.medikit_count}</strong></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="fa-solid fa-grip fa-fw"></i></button>
                                        <ul class="dropdown-menu dropdown-block">
                                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-syringe fa-fw"></i>
                                                edit</a>
                                            </li>
                                            <li><a class="dropdown-item text-danger" href="#"><i
                                                  class="fa-solid fa-box-archive fa-fw"></i> Remove</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        `);
        },
        error: function(xhr) {
          // Tampilkan error validasi
          if (xhr.status === 422) {
            let errors = xhr.responseJSON.errors;
            $('#errorKategori').text(errors.kategori);
            $('#kategori').addClass('is-invalid');
            e = errors.kategori;
            Swal.fire({
              title: 'Gagal!',
              text: e,
              icon: 'error'
            });
          } else {
            Swal.fire({
              title: 'Gagal!',
              text: 'Terjadi kesalahan, silakan coba lagi.',
              icon: 'error'
            });
          }
        }
      });
    });
  });
</script>
