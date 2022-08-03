<div>
    <div class="breadcrumb-wrapper breadcrumb-one mb-3 rounded">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 px-1 py-4">
                    <li class="breadcrumb-item"><a draggable="false" href="{{ route("{$sub_domain}.index") }}"><i class="bi bi-house-door me-1"></i> {{ trans("index.home") }}</a></li>
                    @if ($menu_type == "index")
                        <li class="breadcrumb-item active" aria-current="page"><i class="@yield("icon") me-1"></i> @yield("name")</li>
                    @else
                        <li class="breadcrumb-item"><a draggable="false" href="javascript:;" wire:click="index"><i class="@yield("icon") me-1"></i> @yield("name")</a></li>
                    @endif
                    @if ($menu_type == "add")
                        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-plus-lg me-1"></i> {{ trans("index.Add") }}</li>
                    @endif
                    @if ($menu_type == "clone")
                        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-clipboard me-1"></i> {{ trans("index.Clone") }}</li>
                    @endif
                    @if ($menu_type == "edit")
                        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil me-1"></i> {{ trans("index.Edit") }}</li>
                    @endif
                    @if ($menu_type == "view")
                        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-eye me-1"></i> {{ trans("index.View") }}</li>
                    @endif
                    @if ($menu_type == "trash")
                        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-trash me-1"></i> {{ trans("index.Trash") }}</li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>
</div>
