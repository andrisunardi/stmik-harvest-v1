@section("title", $pageTitle)
@section("icon", $pageIcon)

<div wire:init="loadData">
    @include("{$subDomain}.livewire.{$pageSlug}.navigation")

    <div class="tab-content" id="pills-tabContent">
        @foreach ($navigations as $navigation)
            <div
                class="tab-pane fade {{ $loop->first ? "show active" : null }}"
                id="pills-{{ $navigation["slug"] }}"
                role="tabpanel"
                aria-labelledby="pills-{{ $navigation["slug"] }}-tab">
                @include("{$subDomain}.livewire.{$pageSlug}.{$navigation["slug"]}")
            </div>
        @endforeach
    </div>
</div>
