@if ($errors->any())
    <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-exclamation-circle"></i>
        </div>
        <div class="alert-message">
            {{ trans("message.Please check all form input validation") }}
        </div>
    </div>
@endif

@if(session()->has("primary"))
    <div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ session()->get("primary") }}
        </div>
    </div>
@endif

@if(session()->has("secondary"))
    <div class="alert alert-secondary alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ session()->get("secondary") }}
        </div>
    </div>
@endif

@if(session()->has("success"))
    <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-check"></i>
        </div>
        <div class="alert-message">
            {{ session()->get("success") }}
        </div>
    </div>
@endif

@if(session()->has("danger"))
    <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-exclamation-circle"></i>
        </div>
        <div class="alert-message">
            {{ session()->get("danger") }}
        </div>
    </div>
@endif

@if(session()->has("warning"))
    <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-exclamation"></i>
        </div>
        <div class="alert-message">
            {{ session()->get("warning") }}
        </div>
    </div>
@endif

@if(session()->has("info"))
    <div class="alert alert-info alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-info"></i>
        </div>
        <div class="alert-message">
            {{ session()->get("info") }}
        </div>
    </div>
@endif

@if(session()->has("light"))
    <div class="alert alert-light alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ session()->get("light") }}
        </div>
    </div>
@endif

@if(session()->has("dark"))
    <div class="alert alert-dark alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.Close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ session()->get("dark") }}
        </div>
    </div>
@endif
