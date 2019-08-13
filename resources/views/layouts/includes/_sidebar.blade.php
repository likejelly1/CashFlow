<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">
              <figure class="avatar mr-2 avatar-xs">
                  <img src="{{asset('/img/mib_logo_circle.png')}}" alt="...">
              </figure> Mitra Inti Bersama
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">
              <figure class="avatar">
                  <img src="{{asset('/img/mib_logo_circle.png')}}" alt="...">
              </figure>
            </a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown active">
                <a href=""><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              
              <li class="menu-header">Pages</li>
              <li class="nav-item dropdown">
                <a href="{{ url ('/cogs/index2')}}"><i class="fa fa-project-diagram"></i> <span>COGS</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{route('pc.index')}}"><i class="fas fa-money-bill-alt"></i> <span>Project Cost</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href=""><i class="fas fa-bicycle"></i> <span>PnL</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href=""><i class="fas fa-ellipsis-h"></i> <span>Cashflow</span></a>
              </li>
            </ul>
        </aside>
      </div>