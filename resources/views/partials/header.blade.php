<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="d-flex align-items-center">

                <h1><a href="{{route('home')}}">&#128640; Tavelers</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                  
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('trips.index')}}">I Miei Viaggi</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('trips.create')}}">Crea un nuovo viaggio</a>

                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </nav>
</header>