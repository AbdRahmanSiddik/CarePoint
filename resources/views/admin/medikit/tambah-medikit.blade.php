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
            <li class="breadcrumb-item">Medikit</li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <form action="">
    <div class="row">
      <div class="col-xl-6">
        <div class="card">
          <div class="card-body">
            <div class="product-info">
              <h4>Description</h4>
              <div class="product-group">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Product Name</label>
                      <input class="form-control" placeholder="Enter Product Name" type="text"><span
                        class="text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Product Description</label>
                      <input class="form-control" placeholder="Enter Product Description" type="text"><span
                        class="text-danger"></span>
                    </div>
                  </div>
                </div>
              </div>
              <h4 class="mt-4">Categories</h4>
              <div class="product-group">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Product Category</label>
                      <select class="form-select">
                        <option>Select..</option>
                        <option>Man's Shirt</option>
                        <option>Man's Jeans</option>
                        <option>Women T-shirt</option>
                        <option>Women Skirt</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label class="form-label">Brand Icons</label>
                      <select class="form-select">
                        <option>Select..</option>
                        <option>Levi's</option>
                        <option>Hudson</option>
                        <option>Denizen</option>
                        <option>Spykar</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label class="form-label">Color</label>
                      <select class="form-select">
                        <option>Select..</option>
                        <option>Black</option>
                        <option>Red</option>
                        <option>Blue</option>
                        <option>White</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Quality</label>
                      <select class="form-select">
                        <option>Brand New</option>
                        <option>Second Hand</option>
                        <option>Both Quality</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card">
          <div class="card-body">
            <div class="product-info">
              <h4>Product Image</h4>
              <form class="dropzone" id="singleFileUpload" action="https://admin.pixelstrap.net/upload.php">
                <div class="dz-message needsclick"><i class="icon-cloud-up"></i>
                  <h6>Drop files here or click to upload.</h6><span class="note needsclick"></span>(This is
                  just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)
                </div>
              </form>
              <h4 class="mt-4">Select Size</h4>
              <div class="product-group">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label class="form-label">Size</label>
                      <select class="form-select">
                        <option>S </option>
                        <option>M </option>
                        <option>L </option>
                        <option>XL </option>
                        <option>XXL</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label class="form-label">Date</label>
                      <input class="form-control" type="date">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Price</label>
                      <input class="form-control" type="number">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-4">
              <div class="row">
                <div class="col-sm-12 text-end">
                  <button type="submit" class="btn btn-primary me-3">ADD </button>
                  <a class="btn btn-secondary">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</x-carepoint>
