<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)

        <div class="d-lg-flex justify-content-between">
            <p class="text-center mt-lg-1 text-lg-end">
                {{ trans("index.showing") }}
                {{ ($paginator->perPage() * $paginator->currentPage()) - $paginator->perPage() + 1 }}
                {{ trans("index.to") }}
                {{ $paginator->hasMorePages() ? $paginator->perPage() * $paginator->currentPage() : $paginator->total() }}
                {{ trans("index.of") }}
                {{ $paginator->total() }} {{ trans("index.results") }}
            </p>
            <div class="table-responsive pb-3">
                <nav>
                    <ul class="pagination direction-rtl pagination-two justify-content-sm-center">
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="{{ trans("index.previous") }}">
                                <button class="page-link disabled" disabled rel="prev" aria-label="{{ trans("index.previous") }}">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            </li>
                        @else
                            <li class="page-item" aria-label="{{ trans("index.previous") }}">
                                <button class="page-link" rel="prev" aria-label="{{ trans("index.previous") }}" dusk="previousPage{{ $paginator->getPageName() == "page" ? "" : ".{$paginator->getPageName()}" }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            </li>
                        @endif

                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="page-item disabled" aria-disabled="true">
                                    <button class="page-link">{{ $element }}</button>
                                </li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}" aria-current="page">
                                            <button class="page-link">{{ $page }}</button>
                                        </li>
                                    @else
                                        <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                                            <button type="button" class="page-link" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <li class="page-item" aria-label="{{ trans("index.next") }}">
                                <button class="page-link" rel="next" aria-label="{{ trans("index.next") }}" dusk="nextPage{{ $paginator->getPageName() == "page" ? "" : ".{$paginator->getPageName()}" }}" class="page-link" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="{{ trans("index.next") }}">
                                <button class="page-link disabled" disabled rel="prev" aria-label="{{ trans("index.next") }}">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    @endif
</div>
