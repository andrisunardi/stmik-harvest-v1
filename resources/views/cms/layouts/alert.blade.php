@if ($errors->any())
    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-circle-xmark"></i></div>
        <div>
            <strong>{{ trans("index.error") }}</strong><br>
            @foreach ($errors->all() as $error)
                {{ $loop->iteration }}. {{ $error }}<br>
            @endforeach
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has("primary"))
    <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-bell"></i></div>
        <div><strong>{{ trans("index.notification") }}</strong><br>{{ Session::get("primary") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has("secondary"))
    <div class="alert alert-secondary d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-bell"></i></div>
        <div><strong>{{ trans("index.notification") }}</strong><br>{{ Session::get("secondary") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has("success"))
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-circle-check"></i></div>
        <div><strong>{{ trans("index.success") }}</strong><br>{{ Session::get("success") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has("danger"))
    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-triangle-exclamation"></i></div>
        <div><strong>{{ trans("index.danger") }}</strong><br>{{ Session::get("danger") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has("warning"))
    <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-circle-exclamation"></i></div>
        <div><strong><strong>{{ trans("index.warning") }}</strong><br></strong><br>{{ Session::get("warning") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has("info"))
    <div class="alert alert-info d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-circle-info"></i></div>
        <div><strong>{{ trans("index.info") }}</strong><br>{{ Session::get("info") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has("light"))
    <div class="alert alert-light d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-bell"></i></div>
        <div><strong>{{ trans("index.notification") }}</strong><br>{{ Session::get("light") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has("dark"))
    <div class="alert alert-dark d-flex align-items-center alert-dismissible fade show" role="alert">
        <div class="me-3"><i class="fas fa-bell"></i></div>
        <div><strong>{{ trans("index.notification") }}</strong><br>{{ Session::get("dark") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
