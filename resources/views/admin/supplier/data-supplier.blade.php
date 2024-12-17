<x-carepoint>
  <div class="container-fluid">
    <div class="row page-title">
      <div class="col-sm-6">
        <h3>Supplier</h3>
      </div>
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb justify-content-sm-end align-items-center">
            <li class="breadcrumb-item"> <a href="index.html">
                <svg class="svg-color">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">Supplier</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0 b-b-primary d-flex justify-content-between">
            <h4 class="mt-1">Data Supplier</h4>
            <button class="btn btn-primary mb-3" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
              <i class="fa-solid fa-plus fa-fw"></i> Tambah Supplier
            </button>

            <div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="offcanvasExample"
              aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header b-b-primary">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Tambah Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <form action="/supplier/tambah" method="POST" class="theme-form row g-3 needs-validation custom-input"
                  novalidate>
                  @csrf
                  <div class="col-12 mb-2">
                    <label class="form-label" for="supplier">Nama Supplier</label>
                    <input class="form-control" id="supplier" type="text" placeholder="Masukkan nama supplier"
                      required name="supplier" value="{{ old('supplier') }}">
                    <div class="invalid-feedback text-danger">Field ini harus terisi</div>
                  </div>
                  <div class="col-12 mb-2">
                    <label class="form-label" for="kontak">Kontak</label>
                    <input class="form-control" id="kontak" type="text" placeholder="hp, email" required
                      name="kontak" value="{{ old('kontak') }}">
                    <div class="invalid-feedback text-danger">Field ini harus terisi</div>
                  </div>
                  <div class="col-12 mb-2">
                    <label class="form-label" for="alamat">Alamat</label>
                    <input class="form-control" id="alamat" type="text" placeholder="Masukkan alamat" required
                      name="alamat" value="{{ old('alamat') }}">
                    <div class="invalid-feedback text-danger">Field ini harus terisi</div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kontak</th>
                    <th class="text-center">Jumlah Barang</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($suppliers as $item)
                    <tr id="123">
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td class="text-center">{{ $item->nama_supplier }}</td>
                      <td class="text-center">{{ $item->alamat }}</td>
                      <td class="text-center">{{ $item->kontak }}</td>
                      <td class="text-center">
                        <strong class="badge badge-warning">{{ $item->medikit_count }}</strong>
                      </td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fa-solid fa-grip fa-fw"></i></button>
                          <ul class="dropdown-menu dropdown-block">
                            <li><a class="dropdown-item" role="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasExample{{ $item->token_supplier }}"
                                aria-controls="offcanvasExample">
                                <i class="fa-solid fa-syringe fa-fw"></i>
                                edit</a>
                            </li>
                            <li><a class="dropdown-item text-danger" role="button" data-bs-toggle="modal"
                                data-bs-target="#tooltipmodal{{ $item->token_supplier }}"><i class="fa-solid fa-box-archive fa-fw"></i>
                                Remove</a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>

                    {{-- modal delete start --}}
                    <div class="modal fade" id="tooltipmodal{{ $item->token_supplier }}" tabindex="-1" role="dialog"
                      aria-labelledby="tooltipmodal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi hapus data </h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center">
                            <h5>{{ $item->nama_supplier }}</h5>
                            <p class="mt-2 text-danger">Anda Yakin untuk menghapus data ini?.</p>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                            <a class="btn btn-danger fw-xl" href="/supplier/{{ $item->token_supplier }}/hapus">Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- modal delete end --}}

                    {{-- ofcanvass edit start --}}
                    <div class="offcanvas offcanvas-end bg-white" tabindex="-1"
                      id="offcanvasExample{{ $item->token_supplier }}" aria-labelledby="offcanvasExampleLabel">
                      <div class="offcanvas-header b-b-primary">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Supplier
                          {{ $item->nama_supplier }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                          aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <form action="/supplier/{{ $item->token_supplier }}/edit" method="POST"
                          class="theme-form row g-3 needs-validation custom-input" novalidate>
                          @csrf
                          <div class="col-12 mb-2 mt-3">
                            <label class="form-label" for="supplier">Nama Supplier</label>
                            <input class="form-control" id="supplier" type="text"
                              placeholder="Masukkan nama supplier" required name="supplier"
                              value="{{ $item->nama_supplier }}">
                            <div class="invalid-feedback text-danger">Field ini harus terisi</div>
                          </div>
                          <div class="col-12 mb-2">
                            <label class="form-label" for="kontak">Kontak</label>
                            <input class="form-control" id="kontak" type="text" placeholder="hp, email"
                              required name="kontak" value="{{ $item->kontak }}">
                            <div class="invalid-feedback text-danger">Field ini harus terisi</div>
                          </div>
                          <div class="col-12 mb-2">
                            <label class="form-label" for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" type="text" placeholder="Masukkan alamat"
                              required name="alamat" value="{{ $item->alamat }}">
                            <div class="invalid-feedback text-danger">Field ini harus terisi</div>
                          </div>
                          <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    {{-- ofcanvass edit end --}}
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
