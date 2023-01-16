@section("title", $pageTitle)
@section("icon", $pageIcon)

<div wire:init="loadData">

    <div class="card">

        <div class="card-header text-white bg-primary">
            {{ trans("index.data") }} @yield("title")
        </div>

        <div class="card-body">

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.button")

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.search")

            @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.data")

        </div>

        <div class="card-footer bg-primary">
        </div>

    </div>
</div>

@push("script")
    <script>
        $("#portfolios_id").on("change", function () {
            @this.set("portfolios_id", $(this).val())
        })

        $("#status").on("change", function () {
            @this.set("status", $(this).val())
        })

        document.addEventListener("livewire:load", () => {
            Livewire.hook("message.processed", (message, component) => {
                $("#portfolios_id").on("change", function () {
                    @this.set("portfolios_id", $(this).val())
                })

                $("#status").on("change", function () {
                    @this.set("status", $(this).val())
                })
            })
        })
    </script>
@endpush
