<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/">SCHOOLMEDIA</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">SCHM</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
          @if (Auth::user()->role == 'admin')
          <li class="dropdown {{ Request::is('siswa', 'kelas','sekolah') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
            <ul class="dropdown-menu">
              <li class="{{ Request::is('sekolah') ? 'active' : '' }}"><a class="nav-link " href="{{ route('sekolah.create')}}">Profil Sekolah</a></li>
              <li class="{{ Request::is('siswa') ? 'active' : '' }}"><a class="nav-link " href="{{ route('siswa.index')}}">Manajemen Siswa</a></li>
              <li class="{{ Request::is('kelas') ? 'active' : '' }}"><a class="nav-link" href="{{ route('kelas.index')}}">Manajemen Kelas</a></li>
            </ul>
          </li>
          @endif
          <li class="{{ Request::is('data_kelas') ? 'active' : '' }}"><a class="nav-link" href="{{ route('kelas.data')}}"><i class="fas fa-user-graduate"></i> <span>Data Kelas</span></a></li>
          @if (Auth::user()->role == 'admin')
          <li class="menu-header">Manajemen User</li>
          <li class="dropdown {{ Request::is('manajemen_user', 'role') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Manajemen User</span></a>
            
            <ul class="dropdown-menu">
              <li class="{{ Request::is('manajemen_user') ? 'active' : '' }}"><a class="nav-link" href="{{ route('manajemen_user.index')}}">USER</a></li>
            </ul>
          </li>
          @endif
    </aside>
  </div>