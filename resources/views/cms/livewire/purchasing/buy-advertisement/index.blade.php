@section("title", $pageTitle)
@section("icon", $pageIcon)

<div wire:init="loadData">

    @if ($pageType == "index" || $pageType == "trash")
        @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.summary")
    @endif

    <div class="card">

        <div class="card-header text-white
            {{ $pageType == "index" || $pageType == "add" ? "bg-primary" : null }}
            {{ $pageType == "clone" ? "bg-info" : null }}
            {{ $pageType == "edit" ? "bg-success" : null }}
            {{ $pageType == "trash" ? "bg-warning" : null }}
            {{ $pageType == "view" ? "bg-dark" : null }}
        ">
            {{ $pageType == "index" ? trans("index.data") : trans("index.{$pageType}") }} @yield("title")
        </div>

        <div class="card-body">

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.button")

            @if ($pageType == "index" || $pageType == "trash")

                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.search")

                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.advanced-search")

                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.button-data")

                @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.summary")

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
            {{ $pageType == "trash" ? "bg-warning" : null }}
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

        $("#created_by").on("change", function () {
            @this.set("created_by", $(this).val())
        })

        $("#updated_by").on("change", function () {
            @this.set("updated_by", $(this).val())
        })

        $("#deleted_by").on("change", function () {
            @this.set("deleted_by", $(this).val())
        })

        $("#is_active").on("change", function () {
            @this.set("is_active", $(this).val())
        })

        $("#advertisement_provider_id").on("change", function () {
            @this.set("advertisement_provider_id", $(this).val())
        })

        $("#bank_id").on("change", function () {
            @this.set("bank_id", $(this).val())
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

                $("#created_by").on("change", function () {
                    @this.set("created_by", $(this).val())
                })

                $("#updated_by").on("change", function () {
                    @this.set("updated_by", $(this).val())
                })

                $("#deleted_by").on("change", function () {
                    @this.set("deleted_by", $(this).val())
                })

                $("#is_active").on("change", function () {
                    @this.set("is_active", $(this).val())
                })

                $("#advertisement_provider_id").on("change", function () {
                    @this.set("advertisement_provider_id", $(this).val())
                })

                $("#bank_id").on("change", function () {
                    @this.set("bank_id", $(this).val())
                })
            })
        })
    </script>
@endpush
