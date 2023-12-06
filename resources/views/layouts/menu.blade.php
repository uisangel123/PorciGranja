<div id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home.index') }}">
                <i class="bi bi-grid"></i>
                <span>Inicio</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @if (auth()->user()->rol === 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('users.index') }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('corrales.index') }}">
                <i class="bi bi-person"></i>
                <span>Corrales</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('lotes.index') }}">
                <i class="bi bi-person"></i>
                <span>Lotes</span>
            </a>
        </li>
        <li class="nav-item dropdown-1">
            <div class="select" data-bs-toggle="dropdown" aria-expanded="false">

                <span class="nav-link collapsed selected" style="width: 100%"><i
                        class="fa-solid fa-heart"></i>Reproducción
                    {{-- <div class="caret"></div> --}}
                </span>
            </div>
            <ul class="menu dropdown-menu dropdown-menu-dark">
                <a href="{{ route('reproducciones.index') }}">
                    <li class="active"><i class="fa-solid fa-heart"></i>Proceso Reproducción</li>
                </a>
                <a href="{{ route('reproductores.index') }}">
                    <li><i class="fa-solid fa-heart"></i><span>Porcinos</span></li>
                </a>
                <a href="{{ route('nacimientos.index') }}">
                    <li><i class="fa-solid fa-heart"></i>Datos Nacimiento</li>
                </a>
            </ul>
        </li>
        @if (auth()->user()->rol === 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('etapas.index') }}">
                    <i class="fa-solid fa-arrows-spin"></i>
                    <span>Etapas</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('etapa-lotes.index') }}">
                <i class="bi bi-person"></i>
                <span>Etapa Lotes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('alimentos.index') }}">
                <i class="fa-solid fa-apple-whole"></i>
                <span>Alimento</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('alimentacion.index') }}">
                <i class="fa-solid fa-apple-whole"></i>
                <span>Alimentación</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('vacunaciones.index') }}">
                <i class="fa-solid fa-syringe"></i>
                <span>Vacunación</span>
            </a>
        </li> --}}
        @if (auth()->user()->rol === 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('razas.index') }}">
                    <i class="fa-solid fa-syringe"></i>
                    <span>Razas</span>
                </a>
            </li>
        @endif
        <!-- End Profile Page Nav -->



    </ul>

</div>
