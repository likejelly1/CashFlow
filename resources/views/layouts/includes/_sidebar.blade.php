<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="">Mitra Inti Bersama</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="">MIB</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="@if(Request::is('home/*'))active @endif nav-item dropdown">
          <a class="nav-link" href=""><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        
        <li class="menu-header">Pages</li>
        <li class="@if(Request::is('cogs/*'))active @endif nav-item dropdown">
          <a class="nav-link" href="{{ url ('/cogs/index2')}}"><i class="far fa-user"></i> <span>COGS</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href=""><i class="fas fa-exclamation"></i> <span>Project Cost</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href=""><i class="fas fa-bicycle"></i> <span>PnL</span></a>
        </li>
        <li class="nav-item dropdown">
          <a href=""><i class="fas fa-ellipsis-h"></i> <span>Cashflow</span></a>
        </li>
      </ul>
  </aside>
</div>
