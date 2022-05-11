@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

@push("meta")
@endpush

@push("css")
@endpush

@push("script")
    <script>
        function elementsSearch() {
            var input = document.getElementById("elementsSearchInput");
            var filter = input.value.toUpperCase();
            var list = document.getElementById("elementsSearchList");
            var listItem = list.getElementsByClassName("affan-element-item");

            for (i = 0; i < listItem.length; i++) {
                var a = listItem[i];
                var textValue = a.textContent || a.innerText;
                if (textValue.toUpperCase().indexOf(filter) > -1) {
                    listItem[i].style.display = "";
                } else {
                    listItem[i].style.display = "none";
                }
            }
        }
    </script>
@endpush

<div>
    <div class="page-content-wrapper py-3" id="elementsSearchList">
        <div class="container-fluid">

            <div class="breadcrumb-wrapper breadcrumb-one mb-3 rounded">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 px-1 py-4">
                            <li class="breadcrumb-item"><a draggable="false" href="{{ route("{$sub_domain}.index") }}"><i class="bi bi-house-door me-1"></i> {{ trans("page.Home") }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="@yield("icon") me-1"></i> @yield("name")</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @include("{$sub_domain}.layouts.alert")

            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <input class="form-control" id="elementsSearchInput" type="search" onkeyup="elementsSearch()" placeholder="{{ trans("general.Search") }} {{ trans("general.Menu") }}...">
                    </div>
                </div>
            </div>

            @foreach ($data_all_menu as $all_menu)
                <a draggable="false" class="affan-element-item" href="{{ route("{$sub_domain}." . Str::slug($all_menu->name) .".index") }}">
                    {{ $all_menu->translate_name }}
                    <i class="bi bi-chevron-right"></i>
                </a>
            @endforeach

            @foreach ($data_all_menu_category as $all_menu_category)
                <div class="affan-element-item">
                    <div class="element-heading-wrapper">
                        <i class="{{ $all_menu_category->icon }}"></i>
                        <div class="heading-text">
                            <h6 class="mb-1">{{ $all_menu_category->translate_name }}</h6>
                            <span>{{ $all_menu_category->translate_description }}</span>
                        </div>
                    </div>
                </div>

                @foreach ($all_menu_category->data_menu as $menu)
                    <a draggable="false" class="affan-element-item" href="{{ route("{$sub_domain}." . Str::slug($menu->name) . ".index") }}">
                        {{ $menu->translate_name }}
                        <i class="bi bi-chevron-right"></i>
                    </a>
                @endforeach
            @endforeach

        </div>
    </div>
</div>
