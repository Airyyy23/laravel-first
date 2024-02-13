<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
   <div class="container-fluid">
      <a class="navbar-brand me-auto fs-2" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav ms-auto d-flex align-items-center">
            <li class="nav-item">
               <a class="nav-link fs-5" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link fs-5" href="/about">About</a>
            </li>
            <li class="nav-item">
               <a class="nav-link fs-5" href="/student/all">Student</a>
            </li>
            <li class="nav-item">
               <a class="nav-link fs-5" href="/extra">Extracurricular</a>
            </li>
            <li class="nav-item">
               <a class="nav-link fs-5" href="/kelas">Kelas</a>
            </li>
            @auth
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <form method="post" action="/login/logout">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else<form class="d-flex gap-2" role="search">
                <a class="btn btn-success fw-semibold" href="/register">Register</a>
                <a class="btn btn-success fw-semibold" href="/login">Login</a>
            </form>
            @endauth
         </ul>
      </div>
   </div>
</nav>