<nav class="navbar navbar-nav navbar-expand-lg navbar-dark" style="background-color: #030637;">
    <div class="container-fluid ">
        {{-- Bagian kiri navbar --}}
        <a class="navbar-brand" href="/">
            <img src="http://bakso-radja-image-host.vercel.app/img/UAP-Game-Store/uap.png" style="width: 2em; background-color: #FFF3C7; border-radius: 20px;">
            {{ env('APP_NAME')}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('homepage');}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('student.index');}}">Characters</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
