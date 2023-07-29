<div id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home.index')}}">
                <i class="bi bi-grid"></i>
                <span>Inicio</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('porcinos.index')}}">
                        <i class="bi bi-circle"></i><span>Porcinos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('granjas.index')}}">
                        <i class="bi bi-circle"></i><span>Granjas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('corrales.index')}}">
                        <i class="bi bi-circle"></i><span>Corrales</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        
       
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Granja</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('granjas.index')}}">
                        <i class="bi bi-circle"></i><span>General</span>
                    </a>
                </li>

            </ul>
        </li><!-- granja -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->


        </li><!-- End Icons Nav -->

        <li class="nav-heading">Otros</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Perfil</span>
            </a>
        </li><!-- End Profile Page Nav -->

        

    </ul>

</div>

