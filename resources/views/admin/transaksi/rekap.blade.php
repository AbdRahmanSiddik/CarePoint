<x-carepoint>
  <div class="container-fluid">
    <div class="row page-title">
      <div class="col-sm-6">
        <h3>Rekapitulasi</h3>
      </div>
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb justify-content-sm-end align-items-center">
            <li class="breadcrumb-item"> <a href="index.html">
                <svg class="svg-color">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">Rekap</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0 card-no-border d-flex justify-content-between">
            <h4>Data Medikit</h4>
            <a href="/medikit/tambah{{ isset($key) ? "?key=$key->token_kategori" : '' }}" class="btn btn-primary">
              <i class="fa-solid fa-plus fa-fw"></i> Tambah Medikit
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transaksis as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama_customer }}</td>
                      <td>{{ $item->alamat_customer }}</td>
                      <td>{{ $item->kontak }}</td>
                      <td>{{ $item->jumlah_barang }}</td>
                      <td>@rupiah($item->total_harga)</td>
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="{{ route('transaksi.show', $item->token_transaksi) }}"><i
                                class="icon-pencil-alt"></i>Detail</a></li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-carepoint>
