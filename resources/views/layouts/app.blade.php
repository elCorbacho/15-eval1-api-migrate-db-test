<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<link rel="manifest" href="/site.webmanifest" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
    <header class="bg-primary py-4 shadow">
        <div class="container">
            <h1 class="text-white fw-bold m-0 text-center" style="letter-spacing:2px;">PROYECTOS IT</h1>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(Request::is('proyectos')) active fw-bold @endif" href="{{ url('/proyectos') }}">Obtener Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::is('proyectos/crear')) active fw-bold @endif" href="{{ url('/proyectos/crear') }}">Crear Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::is('proyectos/eliminar')) active fw-bold @endif" href="{{ url('/proyectos/eliminar') }}">Eliminar Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::is('proyecto/buscar')) active fw-bold @endif" href="{{ url('/proyecto/buscar') }}">Buscar Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::is('proyectos/editar') || Request::is('proyectos/editar/*')) active fw-bold @endif" href="{{ url('/proyectos/editar') }}">Editar Proyecto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm p-4">
                    <div id="main-content" class="fade-transition fade-in-onload">@yield('content')</div>
    <style>
    .fade-transition {
        opacity: 1;
        transition: opacity 0.3s cubic-bezier(.4,0,.2,1);
    }
    .fade-transition.fade-out {
        opacity: 0;
    }
    .fade-in-onload {
        opacity: 0;
        animation: fadeInProgressive 0.6s cubic-bezier(.4,0,.2,1) forwards;
    }
    @keyframes fadeInProgressive {
        0% {
            opacity: 0;
        }
        60% {
            opacity: 0.7;
        }
        100% {
            opacity: 1;
        }
    }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const main = document.getElementById('main-content');
        // Fade-in progresivo al cargar
        void main.offsetWidth;
        main.classList.add('fade-in-onload');
        setTimeout(() => {
            main.classList.remove('fade-in-onload');
        }, 600);

        // Fade-out al navegar
        document.querySelectorAll('.navbar-nav .nav-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                if (this.hostname === window.location.hostname) {
                    e.preventDefault();
                    main.classList.add('fade-out');
                    setTimeout(() => {
                        window.location = this.href;
                    }, 300);
                }
            });
        });
    });
    </script>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer bg-white fixed-bottom py-2 border-top shadow-sm d-flex justify-content-between align-items-center px-4">
        <x-uf />
        <h5 class="fw-light mb-0 text-muted">AC DEVops</h5>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <!--<script>
    // Obtener valor UF del día desde mindicador.cl
    fetch('https://mindicador.cl/api/uf')
      .then(response => response.json())
      .then(data => {
        const uf = data.serie && data.serie.length > 0 ? data.serie[0].valor : null;
        if (uf) {
          document.getElementById('uf-value').textContent = `UF hoy: $${uf.toLocaleString('es-CL', {minimumFractionDigits: 2})}`;
        } else {
          document.getElementById('uf-value').textContent = 'UF no disponible';
        }
      })
      .catch(() => {
        document.getElementById('uf-value').textContent = 'UF no disponible';
      });
    </script>-->
</body>
</html>