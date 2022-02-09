<aside class="main-sidebar sidebar-dark-indigo elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ url('images/logo.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <x-nav-item label="Dashboard" icon="fas fa-tachometer-alt" :link="route('dashboard')" />
          <x-nav-item label="Pemesanan" icon="fas fa-cash-register" :link="route('pemesanan.index')" />

          <x-nav-item label="Kamar" icon="fas fa-bed" :link="route('kamar.index')" />
          <x-nav-item label="Fasilitas Hotel" icon="fas fa-swimming-pool" :link="route('fasilitas.index')" />

          @can('role','admin')
          <x-nav-item label="User Admin" icon="fas fa-users" :link="route('admin.index')" />
          @endcan
        </ul>
      </nav>
    </div>
  </aside>
