@extends('layouts.app')

@section('content')
    <!-- ======= Header ======= -->
    @include('layouts.nav_menu')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.menu')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @if ($message = Session::get('success'))
            <div class="alert alert-success cerrarMensaje alert-dismissible fade show " role="alert"
                style="border-radius: 0; width: 100%"><!--Agregar clase pa los bordes en el sena-->
                <i class="bi bi-check-circle me-1"></i>
                <span>{{ $message }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif ($message = Session::get('danger'))
            <div class="alert alert-danger cerrarMensaje alert-dismissible fade show " role="alert"
                style="border-radius: 0; width: 100%"><!--Agregar clase pa los bordes en el sena-->
                <i class="fa-solid fa-circle-exclamation me-1"></i>
                <span>{{ $message }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="pagetitle">
            <h1>Inicio</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Reproductores <span>| Este Mes</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $reproductores }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Muertos <span>| Este Mes</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-skull-crossbones"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $suma }}</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Alimento <span>| Este Mes</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-apple-whole"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $alimento }}</h6>
                                            <span class="text-danger small pt-1 fw-bold">KG</span> <span
                                                class="text-muted small pt-2 ps-1">Consumo Total</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->
                        <div class="col-12">
                            {{-- <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">Bienvenidos</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6><span class="highlight">Bienvenido a Porcigranja</span>.</h6>
                                            <h6>Tu aliado en la gestión
                                                eficiente de la producción porcina.
                                                Nuestra plataforma intuitiva está diseñada para simplificar tus operaciones
                                                diarias,
                                                desde el seguimiento de reproductores hasta el monitoreo de nacimientos y la
                                                gestión
                                                de la alimentación.

                                                Optimiza tus procesos sin complicaciones. Porcigranja es la solución
                                                integral
                                                que se
                                                adapta a tus necesidades en la granja. Simplifica la gestión, toma
                                                decisiones
                                                informadas y eleva la eficiencia en tu producción porcina.

                                                Descubre cómo Porcigranja puede transformar tu forma de trabajar en la
                                                granja.
                                                ¡Bienvenido a la gestión porcina simplificada!</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <img style="height: 200px !important"
                                                    src="{{ asset('assets/img/cerdos1.jpg') }}" alt="">
                                            </div>
                                            <div>
                                                <img style="height: 200px !important"
                                                    src="{{ asset('assets/img/cerdos1.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card recent-sales overflow-auto">
                                <!-- Mensaje -->
                                <div class="card-body">
                                    <h5 class="card-title">Bienvenidos</h5>
                                    <div>
                                        <h6><span class="highlight resaltar">Bienvenido a Porcigranja</span>.</h6>
                                        <h6>Tu aliado en la gestión
                                            eficiente de la producción porcina.
                                            Nuestra plataforma intuitiva está diseñada para <span class="resaltar">simplificar tus operaciones
                                            diarias</span>,
                                            desde el seguimiento de reproductores hasta el monitoreo de nacimientos y la
                                            gestión
                                            de la alimentación.

                                            Optimiza tus procesos sin complicaciones. <span class="resaltar">Porcigranja es la solución</span>
                                            integral
                                            que se
                                            adapta a tus necesidades en la granja. Simplifica la gestión, toma
                                            decisiones
                                            informadas y eleva la eficiencia en tu producción porcina.

                                            Descubre cómo Porcigranja puede transformar tu forma de trabajar en la
                                            granja.
                                            <span class="resaltar">¡Bienvenido a la gestión porcina simplificada!</span></h6>
                                    </div>
                                    <br>
                                    <!-- Galería de Imágenes -->
                                    <div class="row">
                                        <div class="col-md-4 mb-4 centrado">
                                            <img style="height: 200px !important"
                                                src="{{ asset('assets/img/cerdos1.jpg') }}" alt="">
                                        </div>
                                        <div class="col-md-4 mb-4 centrado">
                                            <img style="height: 200px !important"
                                                src="{{ asset('assets/img/cerdos2.jpg') }}" alt="">
                                        </div>
                                        <div class="col-md-4 mb-4 centrado">
                                            <img style="height: 200px !important"
                                                src="{{ asset('assets/img/cerdos3.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>







@endsection
