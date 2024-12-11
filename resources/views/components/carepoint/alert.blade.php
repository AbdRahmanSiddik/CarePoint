@session('store')
  <script>
    var SweetAlert_custom = {
      init: function() {
        // Menampilkan SweetAlert saat halaman dimuat
        Swal.fire(
          'Berhasil!',
          "{{ session('store') }}",
          'success'
        );
      }
    }
  </script>
@endsession

@session('update')
  <script>
    var SweetAlert_custom = {
      init: function() {
        // Menampilkan SweetAlert saat halaman dimuat
        Swal.fire(
          'Berhasil!',
          "{{ session('update') }}",
          'success'
        );
      }
    }
  </script>
@endsession

@session('destroy')
  <script>
    var SweetAlert_custom = {
      init: function() {
        // Menampilkan SweetAlert saat halaman dimuat
        Swal.fire(
          'Berhasil!',
          "{{ session('destroy') }}",
          'warning'
        );
      }
    }
  </script>
@endsession

@if ($errors->any())
  <script>
    var SweetAlert_custom = {
      init: function() {
        // Membungkus setiap pesan error dalam tag <p> dengan class 'text-danger'
        var errorMessages = `{!! implode(
            '',
            array_map(function ($e) {
                return "<p class='text-danger'>" . e($e) . '</p>';
            }, $errors->all()),
        ) !!}`;

        // Menampilkan SweetAlert dengan pesan error terformat
        Swal.fire({
          title: 'Gagal!',
          html: errorMessages, // Menggunakan 'html' untuk memuat tag HTML
          icon: 'error'
        });
      }
    }
  </script>
@endif

<script>
  // Memanggil fungsi init saat halaman selesai dimuat
  window.onload = function() {
    SweetAlert_custom.init();
  }
</script>
