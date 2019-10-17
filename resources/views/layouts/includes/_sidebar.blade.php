@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp
<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand mt-4">
      <div id="circle" class="mx-auto">
        <img src="{{asset('img/mib_logo.png')}}" class="rounded" alt="PT MIB" style="max-width:100%">
      </div>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <img src="{{asset('img/mib_logo.png')}}" alt="PT MIB" style="max-width:45%">
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header mt-3">Main Page</li>
      <li class="{{ Request::is('/*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('home') !!}"><i class="fas fa-home"></i><span>Home</span></a>
      </li>

      <li class="menu-header">Pages</li>
      @if($user->role_id ==7|| $user->role_id == 1)
      <li class="{{ Request::is('cogs*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('cogs.project') !!}"><i class="fas fa-comment-dollar"></i><span>COGS</span></a>
      </li>
      @endif
      @if($user->role_id == 1|| $user->role_id == 6||$user->role_id == 3||$user->role_id ==7)
      <li class="{{ Request::is('pc*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('pc.index') !!}"><i class="fas fa-hand-holding-usd"></i><span>Project Cost</span></a>
      </li>
      @endif
      @if($user->role_id == 1||$user->role_id == 3||$user->role_id ==7)
      <li class="{{ Request::is('pnl*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('pnl.index') !!}"><i class="fas fa-balance-scale"></i><span>PnL</span></a>
      </li>
      @endif
      @if($user->role_id == 3||$user->role_id ==7)
      <li class="{{ Request::is('cashflow*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('cashflow.index') !!}"><i class="fas fa-chart-line"></i><span>Cashflow</span></a>
      </li>
      @endif
      @if($user->role_id == 2 || $user->role_id == 1||$user->role_id == 7)
      <li class="{{ Request::is('customer*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('customer.index') !!}"><i class="fas fa-users"></i><span>Customer</span></a>
      </li>
      @endif

      @if($user->role_id == 7 || $user->role_id == 5 )
      <li class="{{ Request::is('product*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('product.index') !!}"><i class="fab fa-product-hunt"></i> <span>Product</span></a>
      </li>
      @if($user->role_id == 7|| $user->role_id == 2)
      <li class="{{ Request::is('user*') ? 'active' : '' }}">
        <a class="nav-link" href="{!! route('user.index') !!}"><i class="fas fa-user"></i> <span>Employee</span></a>
      </li>
      @endif
      @endif
    </ul>
  </aside>
</div>