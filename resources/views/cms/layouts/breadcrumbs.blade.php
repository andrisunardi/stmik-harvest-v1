<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-3 bg-light rounded px-3">
            <li class="breadcrumb-item">
                <a draggable="false" href="{{ route("{$subDomain}.index") }}">
                    <i class="fas fa-home me-1"></i> {{ trans("index.home") }}
                </a>
            </li>
            @if ($pageType == "index")
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="@yield("icon") me-1"></i> @yield("title")
                </li>
            @else
                <li class="breadcrumb-item">
                    <a draggable="false" href="javascript:;" wire:click="index">
                        <i class="@yield("icon") me-1"></i> @yield("title")
                    </a>
                </li>
            @endif
            @if ($pageType == "add")
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-plus me-1"></i> {{ trans("index.add") }}
                </li>
            @endif
            @if ($pageType == "clone")
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-clone me-1"></i> {{ trans("index.clone") }}
                </li>
            @endif
            @if ($pageType == "edit")
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-edit me-1"></i> {{ trans("index.edit") }}
                </li>
            @endif
            @if ($pageType == "view")
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-eye me-1"></i> {{ trans("index.view") }}
                </li>
            @endif
            @if ($pageType == "trash")
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-trash me-1"></i> {{ trans("index.trash") }}
                </li>
            @endif
        </ol>
    </nav>
</div>
