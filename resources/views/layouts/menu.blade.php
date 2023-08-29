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
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('granjas.index') }}">
                <i class="bi bi-house-door-fill"></i>
                <span>Granja</span>
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
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('porcinos.index') }}">
                <i class="bi bi-piggy-bank-fill"></i>
                <span>Porcino</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('etapas.index') }}">
                <i class="fa-solid fa-arrows-spin"></i>
                <span>Etapas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('etapa-lotes.index') }}">
                <i class="bi bi-person"></i>
                <span>Etapa Lotes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('alimentos.index') }}">
                <i class="fa-solid fa-apple-whole"></i>
                <span>Alimentos</span>
            </a>
        </li>


        <!-- End Profile Page Nav -->



    </ul>

</div>
