@if ($errors->any())
    <div class="alert custom-alert-2 alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-x-circle"></i>
        {{ trans("index.Please check all form input validation") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif

@if(session()->has("primary"))
    <div class="alert custom-alert-2 alert-primary alert-dismissible fade show" role="alert">
        <i class="bi bi-bell"></i>
        {{ session()->get("primary") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif

@if(session()->has("secondary"))
    <div class="alert custom-alert-2 alert-secondary alert-dismissible fade show" role="alert">
        <i class="bi bi-bell"></i>
        {{ session()->get("secondary") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif

@if(session()->has("success"))
    <div class="alert custom-alert-2 alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i>
        {{ session()->get("success") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif

@if(session()->has("danger"))
    <div class="alert custom-alert-2 alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-x-circle"></i>
        {{ session()->get("danger") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif

@if(session()->has("warning"))
    <div class="alert custom-alert-2 alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle"></i>
        {{ session()->get("warning") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif

@if(session()->has("info"))
    <div class="alert custom-alert-2 alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i>
        {{ session()->get("info") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif

@if(session()->has("light"))
    <div class="alert custom-alert-2 alert-light alert-dismissible fade show" role="alert">
        <i class="bi bi-bell"></i>
        {{ session()->get("light") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif

@if(session()->has("dark"))
    <div class="alert custom-alert-2 alert-dark alert-dismissible fade show" role="alert">
        <i class="bi bi-bell"></i>
        {{ session()->get("dark") }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
    </div>
@endif
