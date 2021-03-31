<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('logo.jpg') }}"
             alt="Temu Pakar Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">SPLII</span>
    </a>

    <div class="sidebar">
        <nav class="mt-3 mb-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
