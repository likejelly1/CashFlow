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
        <a class="nav-link" href=""><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
      </li>

      <li class="menu-header">Pages</li>
      <li class="@if(Request::is('cogs/*'))active @endif nav-item dropdown">
        <a class="nav-link" href="{{ route('cogs.project')}}"><i class="fas fa-comment-dollar"></i><span>COGS</span></a>
      </li>
      <li class="@if(Request::is('pc/*'))active @endif nav-item dropdown">
        <a class="nav-link" href="{{ route('pc.index')}}"><i class="fas fa-hand-holding-usd"></i><span>Project Cost</span></a>
      </li>
      <li class="@if(Request::is('pnl/*'))active @endif nav-item dropdown">
        <a class="nav-link" href="{{ route('pnl.index')}}"><i class="fas fa-balance-scale"></i><span>PnL</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="nav-link"><i class="fas fa-chart-line"></i><span>Cashflow</span></a>
      </li>
    </ul>
  </aside>
</div>