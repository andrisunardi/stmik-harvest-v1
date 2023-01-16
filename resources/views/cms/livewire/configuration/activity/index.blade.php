@section("title", $pageTitle)
@section("icon", $pageIcon)

<div wire:init="loadData">

    @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.summary")

    <div class="card">

        <div class="card-header text-white bg-primary">
            {{ trans("index.data") }} @yield("title")
        </div>

        <div class="card-body">

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.button")

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.search")

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.advanced-search")

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.data")

        </div>

        <div class="card-footer bg-primary">
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

        $("#log_name").on("change", function () {
            @this.set("log_name", $(this).val())
        })

        $("#event").on("change", function () {
            @this.set("event", $(this).val())
        })

        $("#subject_type").on("change", function () {
            @this.set("subject_type", $(this).val())
        })

        $("#causer_type").on("change", function () {
            @this.set("causer_type", $(this).val())
        })

        $("#user_id").on("change", function () {
            @this.set("user_id", $(this).val())
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

                $("#log_name").on("change", function () {
                    @this.set("log_name", $(this).val())
                })

                $("#event").on("change", function () {
                    @this.set("event", $(this).val())
                })

                $("#subject_type").on("change", function () {
                    @this.set("subject_type", $(this).val())
                })

                $("#causer_type").on("change", function () {
                    @this.set("causer_type", $(this).val())
                })

                $("#user_id").on("change", function () {
                    @this.set("user_id", $(this).val())
                })
            })
        })
    </script>
@endpush
