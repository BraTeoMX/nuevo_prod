<div class="sidebar" data-color="brown" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal"> <img class="navbar-brand-logo-mini" src="{!! asset('/material/img/logo.png') !!}" alt="Logo" width='80%'>
    </a>
  </div>
  <div class="sidebar-wrapper" >
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'avanceproduccion' ? ' active' : '' }}"  >
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons" >avanceproduccion</i>
            <p >{{ __('Avance Diario') }}</p>
        </a>
      </li>
   <!--  <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}" >
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">avanceproduccions</i>
            <p>{{ __('Avance Semanal') }}</p>
        </a>
      </li>-->

     <!--<li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Catalogos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('vpf.index') }}">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal">{{ __('Módulos') }} </span>
              </a>
            </li>

           <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('vprh.index') }}">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal"> {{ __('Team Leader') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>-->
      @if(auth()->user()->email =='gvm7506@gmail.com' || auth()->user()->email=='admin@hotmail.com'	)

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample2" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Planeación') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample2">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('actualizacion.index') }}">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal">{{ __('Registro x Hora') }} </span>
              </a>
            </li>

          <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('actualizacion.index') }}">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal"> {{ __('Registro Inicial') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endif
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample3" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Cumplimiento de Metas') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample3">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
            <a class="nav-link" href="{!! url('SemanaActual') !!}" title="Captura semana actual"  data-placement="left">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal">{{ __('Registro Semanal') }} </span>
              </a>
            </li>

           <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
           <a class="nav-link" href="{!! url('/ReporteGeneral') !!}" title="Reporte"
                                        data-placement="left">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal"> {{ __('Reporte') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
            <a class="nav-link" href="{!! url('/TeamLeaderModulo') !!}" title="Reporte"
                                        data-placement="left">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal"> {{ __('Team_Leader - Modulo') }} </span>
              </a>
            </li>

          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
