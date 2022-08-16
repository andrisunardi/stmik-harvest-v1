@section("name", trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

@push("meta")
@endpush

@push("css")
@endpush

@push("script")
@endpush

<div>
    <div class="page-content-wrapper py-3">
        <div class="container-fluid">

            @include("{$sub_domain}.layouts.breadcrumb")

            @include("{$sub_domain}.layouts.alert")

            <div class="card">
                <div class="card-header text-white
                    {{ $menu_type == "index" || $menu_type == "add" ? "bg-primary" : null }}
                    {{ $menu_type == "clone" ? "bg-info" : null }}
                    {{ $menu_type == "edit" ? "bg-success" : null }}
                    {{ $menu_type == "trash" ? "bg-warning" : null }}
                    {{ $menu_type == "view" ? "bg-dark" : null }}
                ">
                    {{ $menu_type == "index" ? trans("index.data") : trans("index.{$menu_type}") }} @yield("name")
                </div>

                <div class="card-body">

                    @include("{$sub_domain}.livewire.{$menu_slug}.button")

                    @if ($menu_type == "index" || $menu_type == "trash")

                        @include("{$sub_domain}.livewire.{$menu_slug}.search")

                        @include("{$sub_domain}.livewire.{$menu_slug}.button-data")

                        @include("{$sub_domain}.livewire.{$menu_slug}.data")

                    @endif

                    @if ($menu_type == "add" || $menu_type == "clone" || $menu_type == "edit")
                        @include("{$sub_domain}.livewire.{$menu_slug}.form")
                    @endif

                    @if ($menu_type == "view")
                        @include("{$sub_domain}.livewire.{$menu_slug}.view")
                    @endif

                </div>

                <div class="card-footer
                    {{ $menu_type == "index" || $menu_type == "add" ? "bg-primary" : null }}
                    {{ $menu_type == "clone" ? "bg-info" : null }}
                    {{ $menu_type == "edit" ? "bg-success" : null }}
                    {{ $menu_type == "trash" ? "bg-warning" : null }}
                    {{ $menu_type == "view" ? "bg-dark" : null }}
                ">
                </div>
            </div>

        </div>
    </div>
</div>

@push("script")
    <script>
        $("#per_page").on("change", function () {
            @this.set("per_page", $(this).val())
        })

        $("#order_by").on("change", function () {
            @this.set("order_by", $(this).val())
        })

        $("#sort_by").on("change", function () {
            @this.set("sort_by", $(this).val())
        })

        $("#created_by").on("change", function () {
            @this.set("created_by", $(this).val())
        })

        $("#updated_by").on("change", function () {
            @this.set("updated_by", $(this).val())
        })

        $("#deleted_by").on("change", function () {
            @this.set("deleted_by", $(this).val())
        })

        $("#blog_category").on("change", function () {
            @this.set("blog_category", $(this).val())
        })

        $("#active").on("change", function () {
            @this.set("active", $(this).val())
        })
    </script>
@endpush
