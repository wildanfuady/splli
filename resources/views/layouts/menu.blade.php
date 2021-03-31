<li class="nav-item">
    <a href="{{ url('home') }}"
       class="nav-link {{ Request::is('home') || Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('barangs.index') }}"
       class="nav-link {{ Request::is('barangs*') ? 'active' : '' }}">
       <i class="nav-icon fa fa-briefcase"></i>
        <p>Pembelian Barang</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('stokBarangs.index') }}"
       class="nav-link {{ Request::is('stokBarangs*') ? 'active' : '' }}">
       <i class="nav-icon fa fa-layer-group"></i>
        <p>Stok Barang</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('uangKeluars.index') }}"
       class="nav-link {{ Request::is('uangKeluars*') ? 'active' : '' }}">
       <i class="nav-icon fa fa-money-bill-wave"></i>
        <p>Uang Keluar</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('uangDiluars.index') }}"
       class="nav-link {{ Request::is('uangDiluars*') ? 'active' : '' }}">
       <i class="nav-icon fa fa-money-bill-alt"></i>
        <p>Uang Diluar</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('pembayarans.index') }}"
       class="nav-link {{ Request::is('pembayarans*') ? 'active' : '' }}">
       <i class="nav-icon fa fa-cash-register"></i>
        <p>Pembayaran</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('hasilUsahas.index') }}"
       class="nav-link {{ Request::is('hasilUsahas*') ? 'active' : '' }}">
       <i class="nav-icon fa fa-hand-holding-usd"></i>
        <p>Hasil Usaha</p>
    </a>
</li>
<li class="nav-header">ACCOUNT</li>
<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-sign-in-alt" style="color: orange"></i>
        <p>Logs</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    class="nav-link">
       <i class="nav-icon fas fa-sign-out-alt" style="color: red"></i>
       <p>Logout</p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>


