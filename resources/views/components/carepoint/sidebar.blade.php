<div class="overlay"></div>
<aside class="page-sidebar" data-sidebar-layout="stroke-svg">
  <div class="left-arrow" id="left-arrow">
    <svg class="feather">
      <use href="{{ asset('') }}assets/svg/feather-icons/dist/feather-sprite.svg#arrow-left">
      </use>
    </svg>
  </div>
  <div id="sidebar-menu">
    <ul class="sidebar-menu" id="simple-bar">
      <li class="pin-title sidebar-list p-0">
        <h5 class="sidebar-main-title">Pinned</h5>
      </li>
      <li class="line pin-line"></li>
      <li class="sidebar-main-title">General</li>
      <li class="sidebar-list">
        <svg class="pinned-icon">
          <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
        </svg><a class="sidebar-link" href="/{{ auth()->user()->roles->pluck('name')->join(', ') }}/dashboard">
          <svg class="stroke-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Home"></use>
          </svg><span>Dashboard</span></a>
      </li>
      <li class="line"> </li>
      <li class="sidebar-main-title">Service</li>
      <li class="sidebar-list">
        <svg class="pinned-icon">
          <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
        </svg><a class="sidebar-link" href="/transaksi">
          <svg class="stroke-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Document"></use>
          </svg><span>Kasir</span></a>
      </li>
      <li class="line"> </li>
      <li class="sidebar-main-title">Data Master</li>
      <li class="sidebar-list">
        <svg class="pinned-icon">
          <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
        </svg><a class="sidebar-link" href="javascript:void(0)">
          <svg class="stroke-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Bag"></use>
          </svg><span>Data MediKit</span>
          <svg class="feather">
            <use href="{{ asset('') }}assets/svg/feather-icons/dist/feather-sprite.svg#chevron-right">
            </use>
          </svg></a>
        <ul class="sidebar-submenu">
          <li><a href="/medikit">
              <svg class="svg-menu">
                <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#right-3"></use>
              </svg>Semua Data</a></li>
          @foreach (kategori_raw() as $item)
            <li><a href="/medikit?key={{ $item->token_kategori }}">
                <svg class="svg-menu">
                  <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#right-3"></use>
                </svg>{{ $item->nama_kategori }}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="sidebar-list">
        <svg class="pinned-icon">
          <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
        </svg><a class="sidebar-link" href="/karyawan">
          <svg class="stroke-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#User"></use>
          </svg><span>Data Karyawan</span></a>
      </li>
      <li class="sidebar-list">
        <svg class="pinned-icon">
          <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
        </svg><a class="sidebar-link" href="/supplier">
          <svg class="stroke-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Ticket-star"></use>
          </svg><span>Data Supplier</span></a>
      </li>
      <li class="sidebar-list">
        <svg class="pinned-icon">
          <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
        </svg><a class="sidebar-link" href="/kategori">
          <svg class="stroke-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Bookmark"></use>
          </svg><span>Data Kategori</span></a>
      </li>
      <li class="line"> </li>
      <li class="sidebar-main-title">Rekap & laporan</li>
      <li class="sidebar-list">
        <svg class="pinned-icon">
          <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
        </svg><a class="sidebar-link" href="/">
          <svg class="stroke-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Activity"></use>
          </svg><span>Rekapitulasi</span></a>
      </li>
      <li class="sidebar-list">
        <svg class="pinned-icon">
          <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
        </svg><a class="sidebar-link" href="/">
          <svg class="stroke-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Paper"></use>
          </svg><span>Laporan</span></a>
      </li>
      <li class="line"> </li>
      <li class="sidebar-main-title">Others & Settings</li>
      <li class="sidebar-list">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
          <svg class="pinned-icon">
            <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Pin"></use>
          </svg><a class="sidebar-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                      this.closest('form').submit();">
            <svg class="stroke-icon">
              <use href="{{ asset('') }}assets/svg/iconly-sprite.svg#Logout"></use>
            </svg><span>Logout</span></a>
        </form>
      </li>
    </ul>
  </div>
  <div class="right-arrow" id="right-arrow">
    <svg class="feather">
      <use href="{{ asset('') }}assets/svg/feather-icons/dist/feather-sprite.svg#arrow-right">
      </use>
    </svg>
  </div>
</aside>
