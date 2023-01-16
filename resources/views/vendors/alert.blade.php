@if ($errors->any())
    <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-exclamation-circle"></i>
        </div>
        <div class="alert-message">
            <div>
                @foreach ($errors->all() as $error)
                    {{ $loop->iteration }}. {{ $error }}<br>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if (Session::has("primary"))
    <div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ Session::get("primary") }}
        </div>
    </div>
@endif

@if (Session::has("secondary"))
    <div class="alert alert-secondary alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ Session::get("secondary") }}
        </div>
    </div>
@endif

@if (Session::has("success"))
    <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-check"></i>
        </div>
        <div class="alert-message">
            {{ Session::get("success") }}
        </div>
    </div>
@endif

@if (Session::has("danger"))
    <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-exclamation-circle"></i>
        </div>
        <div class="alert-message">
            {{ Session::get("danger") }}
        </div>
    </div>
@endif

@if (Session::has("warning"))
    <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-exclamation"></i>
        </div>
        <div class="alert-message">
            {{ Session::get("warning") }}
        </div>
    </div>
@endif

@if (Session::has("info"))
    <div class="alert alert-info alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-info"></i>
        </div>
        <div class="alert-message">
            {{ Session::get("info") }}
        </div>
    </div>
@endif

@if (Session::has("light"))
    <div class="alert alert-light alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ Session::get("light") }}
        </div>
    </div>
@endif

@if (Session::has("dark"))
    <div class="alert alert-dark alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
        <div class="alert-icon">
            <i class="fas fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ Session::get("dark") }}
        </div>
    </div>
@endif
