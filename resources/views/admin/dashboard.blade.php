<x-carepoint>
  <div class="container-fluid">
    <div class="row page-title">
      <div class="col-sm-6">
        <h3>Welcome</h3>
      </div>
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb justify-content-sm-end align-items-center">
            <li class="breadcrumb-item"> <a href="index.html">
                <svg class="svg-color">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Home"></use>
                </svg></a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Default</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="container-fluid default-dashboard">
    <div class="row">
      <div class="col-sm-6 col-xl-4">
        <div class="card profile-greeting card-hover">
          <div class="card-body">
            <div class="img-overlay">
              <h1>Good day, {{ auth()->user()->name }}</h1>
              <p>Welcome to the Edmin family! We are delighted that you have visited our dashboard.</p><a
                class="btn btn-primary" href="/medikit">Go To Data</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">

      </div>
      <div class="col-sm-6 col-xl-2">

      </div>
      <div class="col-sm-6 col-xl-3">

      </div>
    </div>
  </div>
</x-carepoint>
