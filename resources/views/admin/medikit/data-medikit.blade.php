<x-carepoint>
  <div class="container-fluid">
    <div class="row page-title">
      <div class="col-sm-6">
        <h3>Data Medikit</h3>
      </div>
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb justify-content-sm-end align-items-center">
            <li class="breadcrumb-item"> <a href="index.html">
                <svg class="svg-color">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Home"></use>
                </svg></a></li>
            <li class="breadcrumb-item {{ isset($key) ? '' : 'active' }}">Medikit</li>
            @isset($key)
              <li class="breadcrumb-item active">{{ $key->nama_kategori }}</li>
            @endisset
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
                    <th>Harga</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    @if (!isset($key))
                      <th>Kategori</th>
                    @endif
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($medikits as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama_medikit }}</td>
                      <td>@rupiah($item->harga)</td>
                      <td>@rupiah($item->harga_jual)</td>
                      <td>{{ $item->stok }}</td>
                      @if (!isset($key))
                        <td>{{ $item->kategori->nama_kategori }}</td>
                      @endif
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="/medikit/{{ $item->token_medikit }}/edit"><i
                                class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a role="button" data-bs-toggle="modal"
                            data-bs-target="#tooltipmodal{{ $item->token_medikit }}"><i
                                class="icon-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr>

                    {{-- modal delete start --}}
                    <div class="modal fade" id="tooltipmodal{{ $item->token_medikit }}" tabindex="-1" role="dialog"
                      aria-labelledby="tooltipmodal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi hapus data {{ $item->nama_medikit }}</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center">
                            <h5>Tooltips in a modal</h5>
                            <p class="mt-2 text-danger">Anda Yakin untuk menghapus data ini?.</p>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                            <a class="btn btn-danger fw-xl"
                              href="/medikit/{{ $item->token_medikit }}/hapus">Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- modal delete end --}}
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-carepoint.alert></x-carepoint.alert>
</x-carepoint>
