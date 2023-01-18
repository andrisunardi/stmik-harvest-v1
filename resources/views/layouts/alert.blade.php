@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon-warning"></i>
        <div>
            @foreach ($errors->all() as $error)
                {{ $loop->iteration }}. {{ $error }}<br>
            @endforeach
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if(Session::has("primary"))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="icon-bell-alt"></i>
        {!! Session::get("primary") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if(Session::has("secondary"))
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <i class="icon-bell-alt"></i>
        {!! Session::get("secondary") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if(Session::has("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="icon-ok-circle"></i>
        {!! Session::get("success") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if(Session::has("danger"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon-warning"></i>
        {!! Session::get("danger") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if(Session::has("warning"))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="icon-attention-circled"></i>
        {!! Session::get("warning") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if(Session::has("info"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="icon-info-circled"></i>
        {!! Session::get("info") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if(Session::has("light"))
    <div class="alert alert-light alert-dismissible fade show" role="alert">
        <i class="icon-bell-alt"></i>
        {!! Session::get("light") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif

@if(Session::has("dark"))
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <i class="icon-bell-alt"></i>
        {!! Session::get("dark") !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>
@endif
