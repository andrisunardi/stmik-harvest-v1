<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)

        <div class="col-12">
            <div class="pagination-area">
                <ul class="htc-pagination clearfix">
                @if ($paginator->onFirstPage())
                    <a draggable="false" href="javascript:;" class="prev page-numbers mb-3" disabled><i class="ri-arrow-left-s-line"></i></a>
                @else
                    <a draggable="false"
                        href="javascript:;"
                        class="prev page-numbers mb-3"
                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        wire:loading.attr="disabled"
                    >
                        <i class="ri-arrow-left-s-line"></i>
                    </a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="page-numbers mb-3 current" aria-current="page">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="page-numbers mb-3 current" aria-current="page"
                                    wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">{{ $page }}</span>
                            @else
                                <span wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                                    <a draggable="false" href="javascript:;" class="page-numbers mb-3" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</a>
                                </span>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a draggable="false"
                        href="javascript:;"
                        class="next page-numbers mb-3"
                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        wire:loading.attr="disabled"
                        >
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                @else
                    <a draggable="false" href="javascript:;" class="next page-numbers mb-3" disabled><i class="ri-arrow-right-s-line"></i></a>
                @endif
            </div>
        </div>
    @endif
</div>
