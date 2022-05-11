@if ($paginator->lastPage() > 1)
    <nav aria-label="Page Navigation" class="mt-3 mb-5">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($paginator->currentPage() == 1) ? "disabled" : "" }}">
                <a draggable="false" class="page-link" href="{{ $paginator->url(1) }}"><i class="fas fa-chevron-left"></i></a>
            </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? "active" : "" }}">
                    <a draggable="false" class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? "disabled" : "" }}">
                <a draggable="false" class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}"><i class="fas fa-chevron-right"></i></a>
            </li>
        </ul>
    </nav>
@endif
