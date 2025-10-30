<nav class="navbar navbar-expand-lg navbar-dark theme-navbar fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">PurrBabies</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pets.index') }}">Pets</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('adopters.index') }}">Adopters</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('adoptions.index') }}">Adoptions</a></li>
     </ul>
    </div>
  </div>
</nav>
