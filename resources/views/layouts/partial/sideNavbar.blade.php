<div class="sidebar">
   <div class="sidebar-logo">
       <img src="{{ asset('assets/smk.png') }}" alt="Logo" class="logo">
       <h1>SMK Raden Umar Said Kudus</h1>
   </div>
   <ul class="d-flex flex-column gap-2">
       <li>
           <a class="d-flex gap-2 {{ Request::is('/') ? 'active' : '' }} rounded-start" href="/">
               <i class="fas fa-home"></i>
               <span>Beranda</span>
           </a>
       </li>
       <li>
           <a class="d-flex gap-2 {{ Request::is('/dashboard') ? 'active' : '' }} rounded-start" href="/dashboard">
               <i class="fas fa-tachometer-alt"></i>
               <span>Dashboard</span>
           </a>
       </li>
       <li>
           <a class="d-flex gap-2 {{ Request::is('/dashboard/student') ? 'active' : '' }} rounded-start" href="/dashboard/student">
               <i class="fas fa-user"></i>
               <span>Siswa</span>
           </a>
       </li>
       <li>
           <a class="d-flex gap-2 {{ Request::is('/dashboard/guru') ? 'active' : '' }} rounded-start" href="/dashboard/guru">
               <i class="fas fa-chalkboard-teacher"></i>
               <span>Guru</span>
           </a>
       </li>
       <li>
           <a class="d-flex gap-2 {{ Request::is('/dashboard/kelas') ? 'active' : '' }} rounded-start" href="/dashboard/kelas">
               <i class="fas fa-chalkboard"></i>
               <span>Kelas</span>
           </a>
       </li>
       @if(auth()->check())
    <li>
        <form method="post" action="/login/logout">
            @csrf
            <button type="submit" class="btn btn-outline-light d-flex align-items-center rounded-start">
                <i class="fas fa-sign-out-alt me-2"></i>
                Logout
            </button>
        </form>
    </li>
      @else
    <li>
        <a class="btn btn-outline-light d-flex align-items-center rounded-start" href="/login">
            <i class="fas fa-sign-in-alt me-2"></i>
            <span>Login</span>
        </a>
      </li>
      @endauth
   </ul>
</div>
