@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon-warning"></i>
        {!! trans("message.Please check all form input validation") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has("primary"))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="icon-bell-alt"></i>
        {!! session()->get("primary") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has("secondary"))
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <i class="icon-bell-alt"></i>
        {!! session()->get("secondary") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="icon-ok-circle"></i>
        {!! session()->get("success") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has("danger"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon-warning"></i>
        {!! session()->get("danger") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has("warning"))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="icon-attention-circled"></i>
        {!! session()->get("warning") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has("info"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="icon-info-circled"></i>
        {!! session()->get("info") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has("light"))
    <div class="alert alert-light alert-dismissible fade show" role="alert">
        <i class="icon-bell-alt"></i>
        {!! session()->get("light") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has("dark"))
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <i class="icon-bell-alt"></i>
        {!! session()->get("dark") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
