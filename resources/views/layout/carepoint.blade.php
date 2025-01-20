<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Edmin admin is super flexible, powerful, clean &amp; modern responsive bootstrap admin template with unlimited possibilities.">
  <meta name="keywords"
    content="admin template, Edmin admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Edmin - Premium Admin Template</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha384-B6Pv/5zX3W8SWFSa8hxHH3M8rfQAnU59wsBbRUnLkLFPc/0vsFYVS6z38h45d4+h" crossorigin="anonymous"></script>
  <x-carepoint.head></x-carepoint.head>
</head>

<body>
  <!-- tap to top-->
  <div class="tap-top">
    <svg class="feather">
      <use href="{{ asset('') }}assets/svg/feather-icons/dist/feather-sprite.svg#arrow-up"></use>
    </svg>
  </div>
  <!-- loader-->
  <div class="loader-wrapper">
    <div class="loader"></div>
  </div>
  <main class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page header start -->
    <x-carepoint.header></x-carepoint.header>
    <!-- Page header end-->
    <div class="page-body-wrapper">
      <!-- Page sidebar start-->
      <x-carepoint.sidebar></x-carepoint.sidebar>
      <!-- Page sidebar end-->

      {{-- Page content start --}}
      <div class="page-body">
        {{ $slot }}
      </div>
      {{-- Page content end --}}

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 footer-copyright">
              <p class="mb-0">Copyright 2024 © by explode from <a href="https://www.turbo-main.com/" target="_blank">TURBO COMMUNITY.</a></p>
            </div>
            <div class="col-md-6">
              <p class="float-end mb-0">Hand crafted &amp; made with
                <svg class="svg-color footer-icon">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#footer-heart"></use>
                </svg>
              </p>
            </div>
          </div>
        </div>
      </footer>

    </div>
  </main>
  <x-carepoint.script></x-carepoint.script>
</body>

</html>
