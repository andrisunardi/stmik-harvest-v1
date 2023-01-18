<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)

        <div class="row">
            <div class="col-12">
                <nav>
                    <ul class="pagination htc-pagination clearfix">
                        @if ($paginator->onFirstPage())
                            <li class="disabled">
                                <a draggable="false" href="javascript:;" disabled><i class="icon ion-ios-arrow-left"></i></a>
                            </li>
                        @else
                            <li>
                                <a draggable="false" href="javascript:;">
                                    <div dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
                                        <i class="icon ion-ios-arrow-left"></i>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="disabled"><a draggable="false" href="javascript:;">{{ $element }}</a></li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="active" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"><a draggable="false" href="javascript:;">{{ $page }}</a></li>
                                    @else
                                        <li wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                                            <a draggable="false" href="javascript:;">
                                                <div wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">
                                                    {{ $page }}
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <li>
                                <a draggable="false" href="javascript:;">
                                    <div dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
                                        <i class="icon ion-ios-arrow-right"></i>
                                    </div>
                                </a>
                            </li>
                        @else
                            <li class="disabled">
                                <a draggable="false" href="javascript:;"><i class="icon ion-ios-arrow-right"></i></a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    @endif
</div>
