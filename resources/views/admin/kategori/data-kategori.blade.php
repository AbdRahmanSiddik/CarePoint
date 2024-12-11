<x-carepoint>
  <div class="container-fluid">
    <div class="row page-title">
      <div class="col-sm-6">
        <h3>Kategori</h3>
      </div>
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb justify-content-sm-end align-items-center">
            <li class="breadcrumb-item"> <a href="index.html">
                <svg class="svg-color">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
            <h4 class="mt-1">Data kategori</h4>
            <button class="btn btn-primary mb-3" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
              <i class="fa-solid fa-plus fa-fw"></i> Tambah Kategori
            </button>

            <div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="offcanvasExample"
              aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header b-b-primary">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <form class="theme-form row g-3 needs-validation custom-input" novalidate id="kategoriForm">
                  @csrf
                  <div class="col-12">
                    <label class="form-label" for="kategori">Nama Kategori</label>
                    <input class="form-control" id="kategori" type="text"
                      placeholder="Ex: Suntikan, Obat Capsul, dll." required name="kategori"
                      value="{{ old('kategori') }}">
                    <div class="invalid-feedback text-danger" id="errorKategori"></div>
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
                    <th class="text-center">Jumlah Medikit</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kategoris as $item)
                    <tr id="{{ $item->token_kategori }}">
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td class="text-center">{{ $item->nama_kategori }}</td>
                      <td class="text-center"><strong class="badge badge-warning">{{ $item->medikit_count }}</strong>
                      </td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fa-solid fa-grip fa-fw"></i></button>
                          <ul class="dropdown-menu dropdown-block">
                            <li><a class="dropdown-item" role="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasExample{{ $item->token_kategori }}"
                                aria-controls="offcanvasExample"><i class="fa-solid fa-syringe fa-fw"></i>
                                edit</a>
                            </li>
                            <li><a class="dropdown-item text-danger" role="button" data-bs-toggle="modal"
                                data-bs-target="#tooltipmodal{{ $item->token_kategori }}"><i class="fa-solid fa-box-archive fa-fw"></i> Remove</a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>

                    {{-- modal delete start --}}
                    <div class="modal fade" id="tooltipmodal{{ $item->token_kategori }}" tabindex="-1" role="dialog"
                      aria-labelledby="tooltipmodal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi hapus data {{ $item->nama_kategori }}</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center">
                            <h5>Tooltips in a modal</h5>
                            <p class="mt-2 text-danger">Anda Yakin untuk menghapus data ini?.</p>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                            <a class="btn btn-danger fw-xl" href="{{ route('kategori.destroy', $item->token_kategori) }}">Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- modal delete end --}}

                    {{-- ofcanvass edit start --}}
                    <div class="offcanvas offcanvas-end bg-white" tabindex="-1"
                      id="offcanvasExample{{ $item->token_kategori }}" aria-labelledby="offcanvasExampleLabel">
                      <div class="offcanvas-header b-b-primary">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Kategori
                          {{ $item->nama_kategori }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                          aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <form class="theme-form row g-3 needs-validation custom-input mt-2" novalidate method="POST"
                          action="{{ route('kategori.update', $item->token_kategori) }}">
                          @csrf
                          <div class="col-12">
                            <label class="form-label mb-3" for="kategori">Nama Kategori</label>
                            <input class="form-control" id="kategori{{ $item->token_kategori }}" type="text"
                              placeholder="Ex: Suntikan, Obat Capsul, dll." required name="kategori"
                              value="{{ $item->nama_kategori }}">
                            <div class="invalid-feedback text-danger" id="errorKategori{{ $item->token_kategori }}">
                            </div>
                          </div>
                          <div class="col-12 mt-3">
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
  <x-carepoint.kategori.create></x-carepoint.kategori.create>

</x-carepoint>
