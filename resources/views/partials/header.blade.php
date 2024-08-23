<header>
    <nav class="p-0 navbar navbar-expand-lg bg-body-tertiary">
        <div class=" py-3 container-fluid bg-purple">
            <div class="d-flex justify-content-between w-100">
                <div class="col-4">
                    <h1><a href="{{route('home')}}">🚀 Travelers</a></h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-3">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('trips.index')}}">I Miei Viaggi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('trips.create')}}">Crea un nuovo viaggio</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</header>