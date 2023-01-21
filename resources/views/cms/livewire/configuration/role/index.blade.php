@section("title", $pageTitle)
@section("icon", $pageIcon)

<div wire:init="loadData">

    @if ($pageType == "index")
        @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.summary")
    @endif

    <div class="card">

        <div class="card-header text-white
            {{ $pageType == "index" || $pageType == "add" ? "bg-primary" : null }}
            {{ $pageType == "clone" ? "bg-info" : null }}
            {{ $pageType == "edit" ? "bg-success" : null }}
            {{ $pageType == "view" ? "bg-dark" : null }}
        ">
            {{ $pageType == "index" ? trans("index.data") : trans("index.{$pageType}") }} @yield("title")
        </div>

        <div class="card-body">

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.button")

            @if ($pageType == "index")

                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.search")

                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.advanced-search")

                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.button-data")

                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.data")

            @endif

            @if ($pageType == "add" || $pageType == "clone" || $pageType == "edit")
                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.form")
            @endif

            @if ($pageType == "view")
                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.view")
            @endif

        </div>

        <div class="card-footer
            {{ $pageType == "index" || $pageType == "add" ? "bg-primary" : null }}
            {{ $pageType == "clone" ? "bg-info" : null }}
            {{ $pageType == "edit" ? "bg-success" : null }}
            {{ $pageType == "view" ? "bg-dark" : null }}
        ">
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

        $("#permission_id").on("change", function () {
            @this.set("permission_id", $(this).val())
        })

        $("#permissions_id").on("change", function () {
            @this.set("permissions_id", $(this).val())
        })

        document.addEventListener("livewire:load", () => {
            Livewire.hook("message.processed", (message, component) => {
                $("#per_page").on("change", function () {
                    @this.set("per_page", $(this).val())
                })

                $("#order_by").on("change", function () {
                    @this.set("order_by", $(this).val())
                })

                $("#sort_by").on("change", function () {
                    @this.set("sort_by", $(this).val())
                })

                $("#permission_id").on("change", function () {
                    @this.set("permission_id", $(this).val())
                })

                $("#permissions_id").on("change", function () {
                    @this.set("permissions_id", $(this).val())
                })
            })
        })
    </script>
@endpush
