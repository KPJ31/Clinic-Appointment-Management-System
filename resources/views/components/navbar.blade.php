<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">CAMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('specialIndex') }}">Specializations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('doctorIndex') }}">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/patients') }}">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/appoinments') }}">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/servies') }}">Services</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
