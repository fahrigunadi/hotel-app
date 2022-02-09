<nav class="navbar navbar-expand-md navbar-dark bg-info shadow">
    <div class="container">
        <a class="navbar-brand h1" href="{{ route('home') }}">
            <img src="{{ url('images/logo.jpg') }}" width="30" height="30" class="d-inline-block align-top img-circle" alt="Logo">
            Hotel Gunad
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <x-nav-item-tamu label="Home" :link="route('home')"/>
                <x-nav-item-tamu label="Fasilitas" :link="route('guest.fasilitas.index')"/>
                <x-nav-item-tamu label="Kamar" :link="route('guest.kamar.index')"/>
                <x-nav-item-tamu label="Reservasi" :link="route('guest.reservasi.create')"/>
            </ul>
        </div>
    </div>
</nav>
