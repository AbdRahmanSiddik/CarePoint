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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target=".bd-example-modal-fullscreen">
              <i class="fa-solid fa-plus fa-fw"></i> Tambah Medikit
            </button>

            <div class="modal fade bd-example-modal-fullscreen" tabindex="-1" role="dialog"
              aria-labelledby="myFullLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myFullLargeModalLabel">Extra large modal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body dark-modal">
                    <div class="large-modal-header">
                      <svg class="feather">
                        <use
                          href="{{ asset('') }}assets/svg/feather-icons/dist/feather-sprite.svg#chevrons-right">
                        </use>
                      </svg>
                      <h6>Web design </h6>
                    </div>
                    <p class="modal-padding-space">We build specialised websites for companies, list them on digital
                      directories, and set up a sales funnel to boost ROI.</p>
                    <div class="large-modal-header">
                      <svg class="feather">
                        <use
                          href="{{ asset('') }}assets/svg/feather-icons/dist/feather-sprite.svg#chevrons-right">
                        </use>
                      </svg>
                      <h6>Content marketing </h6>
                    </div>
                    <p class="modal-padding-space">Through better opportunities and knowledgeable marketing strategies,
                      we aid business funnel. We won't only hit the target; instead, we'll aim higher and surpass the
                      objectives.</p>
                    <div class="large-modal-header">
                      <svg class="feather">
                        <use
                          href="{{ asset('') }}assets/svg/feather-icons/dist/feather-sprite.svg#chevrons-right">
                        </use>
                      </svg>
                      <h6>PPC </h6>
                    </div>
                    <p class="modal-padding-space">Customized advertising to increase visitors and improve conversion.
                      To increase retention, identify the correct audience and remarket to them.</p>
                    <div class="large-modal-header">
                      <svg class="feather">
                        <use
                          href="{{ asset('') }}assets/svg/feather-icons/dist/feather-sprite.svg#chevrons-right">
                        </use>
                      </svg>
                      <h6>UX designer </h6>
                    </div>
                    <p class="modal-padding-space">The capacity to comprehend and experience other people's feelings is
                      known as empathy. A positive consumer experience is prioritised by UX. The finest UX designers
                      spend time studying individuals and their tendencies because of this. Designers may produce goods
                      that genuinely engage and excite customers by having a thorough understanding of the end
                      consumers.</p>
                  </div>
                </div>
              </div>
            </div>

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
