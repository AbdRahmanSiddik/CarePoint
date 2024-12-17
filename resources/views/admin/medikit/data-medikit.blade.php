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
            <a href="/medikit/tambah" class="btn btn-primary">
              <i class="fa-solid fa-plus fa-fw"></i> Tambah Medikit
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    @if (!isset($key))
                      <th>Nama Kategori</th>
                    @endif
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($medikits as $item)
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>$320,800</td>
                      <td>$320,800</td>
                      <td>61</td>
                      @if (!isset($key))
                        <td>{{ $item->kategori->nama_kategori }}</td>
                      @endif
                      <td>
                        <ul class="action">
                          <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                          <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
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
