@if ($errors->any())
    <div class="alert alert-imaged alert-danger alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="alert-circle-outline"></ion-icon></div>
        <div>
            @foreach ($errors->all() as $error)
                {{ $loop->iteration }}. {{ $error }}<br>
            @endforeach
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif

@if (Session::has("primary"))
    <div class="alert alert-imaged alert-primary alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="information-circle-outline"></ion-icon></div>
        <div>{{ Session::get("primary") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif

@if (Session::has("secondary"))
    <div class="alert alert-imaged alert-secondary alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="information-circle-outline"></ion-icon></div>
        <div>{{ Session::get("secondary") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif

@if (Session::has("success"))
    <div class="alert alert-imaged alert-success alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="checkmark-circle-outline"></ion-icon></div>
        <div>{{ Session::get("success") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif

@if (Session::has("danger"))
    <div class="alert alert-imaged alert-danger alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="alert-circle-outline"></ion-icon></div>
        <div>{{ Session::get("danger") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif

@if (Session::has("warning"))
    <div class="alert alert-imaged alert-warning alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="warning-outline"></ion-icon></div>
        <div>{{ Session::get("warning") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif

@if (Session::has("info"))
    <div class="alert alert-imaged alert-info alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="information-circle-outline"></ion-icon></div>
        <div>{{ Session::get("info") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif

@if (Session::has("light"))
    <div class="alert alert-imaged alert-light alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="information-circle-outline"></ion-icon></div>
        <div>{{ Session::get("light") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif

@if (Session::has("dark"))
    <div class="alert alert-imaged alert-dark alert-dismissible fade show" role="alert">
        <div class="icon-wrap"><ion-icon name="information-circle-outline"></ion-icon></div>
        <div>{{ Session::get("dark") }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ trans("index.close") }}"></button>
    </div>
@endif
