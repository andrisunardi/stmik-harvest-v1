<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)

        <div class="d-lg-flex justify-content-between mt-3">
            <p class="text-center mt-lg-1 text-lg-end">
                {{ trans("index.Showing") }}
                {{ ($paginator->perPage() * $paginator->currentPage()) - $paginator->perPage() + 1 }}
                {{ trans("index.to") }}
                {{ $paginator->hasMorePages() ? $paginator->perPage() * $paginator->currentPage() : $paginator->total() }}
                {{ trans("index.of") }}
                {{ $paginator->total() }} {{ trans("index.Results") }}
            </p>
            <div class="table-responsive pb-3">
                <nav>
                    <ul class="pagination direction-rtl pagination-two justify-content-sm-center">
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang("general.Previous")">
                                <a draggable="false" class="page-link disabled" disabled href="javascript:;" rel="prev" aria-label="@lang("general.Previous")">
                                    <svg class="bi bi-chevron-left" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li class="page-item" aria-label="@lang("general.Previous")">
                                <a draggable="false" class="page-link" href="javascript:;" rel="prev" aria-label="@lang("general.Previous")" dusk="previousPage{{ $paginator->getPageName() == "page" ? "" : ".{$paginator->getPageName()}" }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
                                    <svg class="bi bi-chevron-left" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                    </svg>
                                </a>
                            </li>
                        @endif

                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="page-item disabled" aria-disabled="true">
                                    <a draggable="false" class="page-link" href="javascript:;">{{ $element }}</a>
                                </li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}" aria-current="page">
                                            <a draggable="false" class="page-link" href="javascript:;">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                                            <button type="button" class="page-link" href="javascript:;" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <li class="page-item" aria-label="@lang("general.next")">
                                <a draggable="false" class="page-link" href="javascript:;" rel="next" aria-label="@lang("general.Next")" dusk="nextPage{{ $paginator->getPageName() == "page" ? "" : ".{$paginator->getPageName()}" }}" class="page-link" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
                                    <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang("general.Next")">
                                <a draggable="false" class="page-link disabled" disabled href="javascript:;" rel="prev" aria-label="@lang("general.Next")">
                                    <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    @endif
</div>
