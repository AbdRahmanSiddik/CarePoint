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
            <li class="breadcrumb-item active">Medikit</li>
            @if ($key)
              <li class="breadcrumb-item active">Medikit</li>
            @endif
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0 card-no-border">
            <h4>Zero Configuration</h4><span>DataTables has most features enabled by default, so all you need to do to
              use it with your own tables is to call the construction
              function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness will be
              immediately added to the table, as shown in this example.</span>
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
                    @if ($key)
                        <th>Nama Kategori</th>
                    @endif
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($medikits as $item)
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
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
