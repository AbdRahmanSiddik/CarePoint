<x-carepoint>
  <div class="container-fluid">
    <div class="row page-title">
      <div class="col-sm-6">
        <h3>Kasir</h3>
      </div>
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb justify-content-sm-end align-items-center">
            <li class="breadcrumb-item"> <a href="index.html">
                <svg class="svg-color">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">Kasir</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Form Pencarian</h4>
          </div>
          <div class="card-body px-4">
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="search" class="form-label">Cari Medkit</label>
                  <input type="text" class="form-control" name="search" id="search"
                    placeholder="Masukkan Nama Barang..." />
                  <div id="pesan-search" class="text-warning"></div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-responsive" id="barangTable">
                      <thead>
                        <tr>
                          <th>Nama Medkit</th>
                          <th>Kategori</th>
                          <th>Harga</th>
                          <th>Sisa Stok</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <form action="/transaksi" method="POST" class="needs-validation" id="checkoutForm">
          @csrf
          <div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-header">
                  <h3>Form Data Customer</h3>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <label for="nama_customer" class="form-label">Nama Customer</label>
                    <input type="text" class="form-control" name="nama_customer" id="nama_customer"
                      aria-describedby="helpId" placeholder="" />
                  </div>
                  <div class="mb-3">
                    <label for="alamat_customer" class="form-label">Alamat Customer</label>
                    <input type="text" class="form-control" name="alamat_customer" id="alamat_customer"
                      aria-describedby="helpId" placeholder="" />
                  </div>
                  <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak Customer</label>
                    <input type="text" class="form-control" name="kontak" id="kontak" aria-describedby="helpId"
                      placeholder="" />
                  </div>
                  <div class="mb-3">
                    <label for="total" class="form-label">Total Harga</label>
                    <input type="number" class="form-control" name="total" id="total" aria-describedby="helpId"
                      placeholder="" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card">
                <div class="card-header">
                  <h3>Form Checkout</h3>
                </div>
                <div class="card-body">
                  <table class="table table-responsive" id="keranjangTable">
                    <thead>
                      <tr>
                        <th>Nama Medkit</th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Jumlah harga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Checkout</button>

                  <strong id="" class="text-warning">Total: <strong id="totalKeseluruhan" class="text-dark"></strong></strong>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#search').on('keyup', function() {
        const query = $(this).val().trim();
        const url = `{{ route('medikit.api', '') }}/${query}`;

        if (query.length > 0) {
          $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
              const tableBody = $('#barangTable tbody');
              tableBody.empty(); // Kosongkan tabel
              //   console.log(response);
              response.forEach(item => {
                tableBody.append(`
                <tr>
                  <td>${item.nama_medikit}</td>
                  <td>${item.kategori}</td>
                  <td>${formatRupiah(item.harga_jual)}</td>
                  <td>${item.stok}</td>
                  <td>
                    <button class="btn btn-success btn-sm add-to-cart" id="addtochart"
                      data-id="${item.id_barang}"
                      data-nama="${item.nama_medikit}"
                      data-harga="${item.harga_jual}">Tambah</button>
                  </td>
                </tr>
              `);
              });
            },
            error: function() {
              const tableBody = $('#barangTable tbody');
              tableBody.empty();
              tableBody.append(`
              <tr>
                <td colspan="5" class="text-center">Data tidak ditemukan</td>
              </tr>
            `);
            }
          });
        } else {
          // Kosongkan tabel jika input pencarian kosong
          $('#barangTable tbody').empty();
        }
      });

      $(document).on('click', '#addtochart', function(event) {
        event.preventDefault();

        const nama = $(this).data('nama');
        const harga = $(this).data('harga');
        const jumlah = 1; // Jumlah awal
        const kode_barang = $(this).data('id');

        // Hitung total awal
        const total = harga * jumlah;


        // Tambahkan barang ke tabel keranjang
        $('#keranjangTable tbody').append(`
            <tr>
            <td>${nama}</td>
            <td>${formatRupiah(harga)}</td>
            <td>
                <input type="text" name="id_barang[]" value="${kode_barang}" hidden>
                <div class="input-group qty-icons w-50">
                <button class="btn btn-primary btn-sm decrement-qty">-</button>
                <input type="number" class="form-control qty-input" min="1" value="${jumlah}" data-harga="${harga}" style="pointer-events: none;" name="kuantitas[]">
                <button class="btn btn-primary btn-sm increment-qty">+</button>
                </div>
            </td>
            <td class="total-harga">Rp ${total.toLocaleString()}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-from-cart">Hapus</button>
            </td>
            </tr>
        `);

        updateTotalKeseluruhan();
      });

      // Mengurangi jumlah barang
      $(document).on('click', '.decrement-qty', function() {
        event.preventDefault();
        const input = $(this).siblings('.qty-input');
        const harga = input.data('harga');
        let jumlah = parseInt(input.val());

        if (jumlah > 1) {
          jumlah -= 1;
          input.val(jumlah);

          // Perbarui total di baris ini
          const total = harga * jumlah;
          $(this).closest('tr').find('.total-harga').text(`Rp ${total.toLocaleString()}`);
        }

        updateTotalKeseluruhan();
      });

      // Menambah jumlah barang
      $(document).on('click', '.increment-qty', function() {
        event.preventDefault();
        const input = $(this).siblings('.qty-input');
        const harga = input.data('harga');
        let jumlah = parseInt(input.val());

        jumlah += 1;
        input.val(jumlah);

        // Perbarui total di baris ini
        const total = harga * jumlah;
        $(this).closest('tr').find('.total-harga').text(`Rp ${total.toLocaleString()}`);

        updateTotalKeseluruhan();
      });

      // Menghapus barang dari keranjang
      $(document).on('click', '.remove-from-cart', function() {
        event.preventDefault();
        $(this).closest('tr').remove();
        updateTotalKeseluruhan();
      });

      // Fungsi untuk menghitung total keseluruhan
      function updateTotalKeseluruhan() {
        let totalKeseluruhan = 0;

        $('#keranjangTable tbody tr').each(function() {
          const total = $(this)
            .find('.total-harga')
            .text()
            .replace('Rp ', '') // Hilangkan "Rp "
            .replace(/\,/g, ''); // Hilangkan semua titik ribuan
          totalKeseluruhan += parseInt(total) || 0; // Pastikan total adalah angka, atau 0 jika kosong
        });

        // Tampilkan total keseluruhan dengan format angka ribuan
        $('#totalKeseluruhan').text(`Rp ${totalKeseluruhan.toLocaleString()}`);
        $('#total').val(totalKeseluruhan);
      }

      $('#checkoutForm').on('submit', function(event) {

        if (event.originalEvent.submitter && event.originalEvent.submitter.type === 'submit') {
          // Biarkan form terkirim jika tombol submit yang ditekan
          return true;
        }
        // Jika tombol lain atau event lain yang menyebabkan submit, hentikan pengiriman form
        event.preventDefault();

      });

      function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 0, // Menghilangkan angka desimal
          maximumFractionDigits: 0 // Membatasi tanpa desimal
        }).format(angka);
      }


    });
  </script>
</x-carepoint>
