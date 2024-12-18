<x-carepoint>
  <div class="container-fluid">
    <div class="row page-title">
      <div class="col-sm-6">
        <h3>Edit {{ $detail->nama_medikit }}</h3>
      </div>
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb justify-content-sm-end align-items-center">
            <li class="breadcrumb-item"> <a href="index.html">
                <svg class="svg-color">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Home"></use>
                </svg></a></li>
            <li class="breadcrumb-item">Medikit</li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header pb-0">
      <h4>Validation form</h4>
    </div>
    <div class="card-body checkbox-checked">
      <form class="theme-form row g-3 needs-validation custom-input" novalidate="" method="POST"
        action="/medikit/{{ $detail->token_medikit }}/edit" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
          <div class="col-lg-6">
            <div class="col-12">
              <label class="form-label" for="validationCustom01">Nama Medikit</label>
              <input class="form-control" id="validationCustom01" name="nama_medikit" type="text" placeholder="Mark"
                required value="{{ $detail->nama_medikit }}">
              <div class="invalid-feedback">Please enter your valid </div>
              <div class="valid-feedback">
                Looks's Good!</div>
            </div>
            <div class="row">
              <div class="col-md-6 mt-2">
                <label class="form-label" for="validationCustom04">Kategori</label>
                <select class="form-select" id="validationCustom04" required name="kategori">
                  <option selected="" disabled value="">Pilih...</option>
                  @foreach (kategori_raw() as $item)
                    <option value="{{ $item->token_kategori }}"
                      {{ isset($key_kategori) == $item->token_kategori ? 'selected' : '' }}>{{ $item->nama_kategori }}
                    </option>
                  @endforeach
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
                <div class="valid-feedback">
                  Looks's Good! </div>
              </div>
              <div class="col-md-6 mt-2">
                <label class="form-label" for="validationCustom04">Supplier</label>
                <select class="form-select" id="validationCustom04" required name="supplier">
                  <option selected="" disabled value="">Pilih...</option>
                  @foreach (supplier_raw() as $item)
                    <option value="{{ $item->token_supplier }}"
                        {{ isset($key_supplier) == $item->token_supplier ? 'selected' : '' }}>{{ $item->nama_supplier }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
                <div class="valid-feedback">
                  Looks's Good! </div>
              </div>
            </div>
            <div class="row mt-2">
              <h4 class="mt-4">Harga & Profit</h4>
              <div class="col-6 mt-2">
                <label class="form-label" for="validationTooltipUsername">Harga</label>
                <div class="input-group has-validation"><span class="input-group-text"
                    id="validationTooltipUsernamePrepend">Rp.</span>
                  <input class="form-control" id="validationTooltipUsername" type="number" name="harga"
                    aria-describedby="validationTooltipUsernamePrepend" required="" value="{{ $detail->harga }}">
                  <div class="invalid-feedback">Please choose a unique and valid username.</div>
                </div>
              </div>
              <div class="col-6 mt-2">
                <label class="form-label" for="validationTooltipUsername1">Profit</label>
                <div class="input-group has-validation"><span class="input-group-text"
                    id="validationTooltipUsernamePrepend">%</span>
                  <input class="form-control" id="validationTooltipUsername1" type="number" name="harga_jual"
                    aria-describedby="validationTooltipUsernamePrepend" required="" value="{{ $profit }}">
                  <div class="invalid-feedback">Please choose a unique and valid username.</div>
                </div>
              </div>
              <div class="col-12 mt-2">
                <label class="form-label" for="validationTooltipUsername2">Stok</label>
                <div class="input-group has-validation"><span class="input-group-text"
                    id="validationTooltipUsernamePrepend">Pcs</span>
                  <input class="form-control" id="validationTooltipUsername2" type="number" name="stok"
                    aria-describedby="validationTooltipUsernamePrepend" required="" value="{{ $detail->stok }}">
                  <div class="invalid-feedback">Please choose a unique and valid username.</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="col-12">
              <label class="form-label" for="input-file">Thumbnail</label>
              <div class="col-12 rounded text-center border border-3">
                <label for="input-file" id="drop-area">
                  <div id="image-view">
                    <img src="{{ asset("images/medikits/$detail->thumbnail") }}" id="preview-image" width="100%">
                  </div>
                  <input class="form-control" name="thumbnail" id="input-file" type="file"
                    aria-label="file example" hidden>
                </label>
              </div>
              <div class="invalid-feedback">Invalid form file selected</div>
            </div>
            <div class="col-12 mt-2">
              <label class="form-label" for="validationTextarea">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="validationTextarea" placeholder="Enter your comment"
                required="">{!! $detail->deskripsi !!}</textarea>
              <div class="invalid-feedback">Please enter a message in the textarea.</div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
          <a class="btn btn-danger" href="/medikit">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    const dropArea = document.getElementById("drop-area");
    const inputFile = document.getElementById("input-file");
    const imgView = document.getElementById("image-view");
    const previewImage = document.getElementById("preview-image");

    inputFile.addEventListener("change", uploadImage);

    function uploadImage() {
      if (inputFile.files && inputFile.files[0]) {
        let imgLink = URL.createObjectURL(inputFile.files[0]);
        previewImage.src = imgLink; // Update the src of the image tag with the selected image
        previewImage.style.display = "block"; // Show the image
        imgView.querySelector('p').style.display = "none"; // Hide the "Drag here" text
        imgView.style.border = "none"; // Remove the border
      }
    }

    dropArea.addEventListener("dragover", function(e) {
      e.preventDefault();
    });

    dropArea.addEventListener("drop", function(e) {
      e.preventDefault();
      inputFile.files = e.dataTransfer.files;
      uploadImage();
    });
  </script>
  <x-carepoint.alert></x-carepoint.alert>
</x-carepoint>
