@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp
<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="">PT. Mitra Inti Bersama</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="">MIB</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::is('home*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('cogs.project') !!}"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
      </li>

      <li class="menu-header">Pages</li>
      <li class="{{ Request::is('cogs*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('cogs.project') !!}"><i class="fas fa-comment-dollar"></i><span>COGS</span></a>
      </li>
      <li class="{{ Request::is('pc*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('pc.index') !!}"><i class="fas fa-hand-holding-usd"></i><span>Project Cost</span></a>
      </li>
      <li class="{{ Request::is('pnl*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('pnl.index') !!}"><i class="fas fa-balance-scale"></i><span>PnL</span></a>
      </li>
      <li class="{{ Request::is('cashflow*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('cashflow.index') !!}"><i class="fas fa-chart-line"></i><span>Cashflow</span></a>
      </li>
      <li class="{{ Request::is('customer*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('customer.index') !!}"><i class="fas fa-users"></i><span>Customer</span></a>
      </li>

      @if($user->role_id == 7 || $user->role_id == 6 )
      <li class="{{ Request::is('product*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('product.index') !!}"><i class="fab fa-product-hunt"></i> <span>Product</span></a>
      </li>
      @if($user->role_id == 7)
      <li class="{{ Request::is('user*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('user.index') !!}"><i class="fas fa-user"></i> <span>Employee</span></a>
      </li>
      @endif
      @endif
    </ul>
  </aside>
</div>