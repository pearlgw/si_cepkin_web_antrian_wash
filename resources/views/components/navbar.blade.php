@auth
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Si Cepkin (Cepat Kinclong)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Si Cepkin (Cepat Kinclong)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-3" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active me-3" aria-current="page" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active me-3" aria-current="page" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active me-3" aria-current="page" href="/sign-up">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/sign-in">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endauth
