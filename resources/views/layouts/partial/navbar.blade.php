<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
   <div class="container-fluid">
      <div class="d-flex justify-content-center align-items-center gap-2">
         <img src="{{ asset('assets/smk.png') }}" alt="Logo" class="logo">
         <a class="navbar-brand me-auto fs-2 fw-semibold" href="#">SMK Raden Umar Said Kudus</a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav ms-auto d-flex align-items-center">
            <li class="nav-item">
               <a class="nav-link fs-5" aria-current="page" href="/">Beranda</a>
            </li>
            @auth
            <li class="nav-item">
               <a class="nav-link fs-5" aria-current="page" href="/dashboard">Dashboard</a>
            </li>
            @endauth
            <li class="nav-item">
               <a class="nav-link fs-5" href="/student/">Siswa</a>
            </li>
            <li class="nav-item">
               <a class="nav-link fs-5" href="/guru">Guru</a>
            </li>
            <li class="nav-item">
               <a class="nav-link fs-5" href="/kelas">Kelas</a>
            </li>
            @auth
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle fs-5 fw-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form method="post" action="/login/logout">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else<form class="d-flex gap-2" role="search">
                <a class="btn btn-primary fw-semibold" href="/register">Register</a>
                <a class="btn btn-primary fw-semibold" href="/login">Login</a>
            </form>
            @endauth
         </ul>
      </div>
   </div>
</nav>