<div>
    <tr id="detail-{{ $gallery->id }}" class="collapse {{ !empty($detail[$gallery->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td class="text-pre-wrap">{!! $gallery->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td class="text-pre-wrap">{!! $gallery->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.tag") }}</td>
                        <td>{{ $gallery->tag }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.tag_idn") }}</td>
                        <td>{{ $gallery->tag_idn }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($gallery->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $gallery->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $gallery->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    @if ($gallery->category->value == 2)
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.video") }}</td>
                            <td>
                                @if ($gallery->checkVideo())
                                    <a draggable="false" class="btn btn-sm btn-primary" href="{{ $gallery->assetVideo() }}" target="_blank">
                                        <i class="fas fa-eye me-1"></i>
                                        {{ trans("index.view") }}
                                    </a>
                                    <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $gallery->assetVideo() }}" download>
                                        <i class="fas fa-download me-1"></i>
                                        {{ trans("index.download") }}
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($gallery->category->value == 3)
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.youtube") }}</td>
                            <td>
                                <a draggable="false" href="{{ $gallery->youtube }}" target="_blank">
                                    {{ $gallery->youtube }}
                                </a>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($gallery->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$gallery->createdBy->id}" }}" target="_blank">
                                    {{ $gallery->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($gallery->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$gallery->updatedBy->id}" }}" target="_blank">
                                    {{ $gallery->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($gallery->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$gallery->deletedBy->id}" }}" target="_blank">
                                    {{ $gallery->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($gallery->created_at)
                                {{ $gallery->created_at->format("l, H:i:s") }}
                                {{ $gallery->created_at->isoFormat("LL") }}
                                ({{ $gallery->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($gallery->updated_at)
                                {{ $gallery->updated_at->format("l, H:i:s") }}
                                {{ $gallery->updated_at->isoFormat("LL") }}
                                ({{ $gallery->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($gallery->deleted_at)
                                    {{ $gallery->deleted_at->format("l, H:i:s") }}
                                    {{ $gallery->deleted_at->isoFormat("LL") }}
                                    ({{ $gallery->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
