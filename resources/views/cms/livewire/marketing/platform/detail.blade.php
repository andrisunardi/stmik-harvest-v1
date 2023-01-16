<div>
    <tr id="detail-{{ $platform->id }}" class="collapse {{ !empty($detail[$platform->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $platform->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.user") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?platform_id={$platform->id}" }}" target="_blank">
                                {{ $platform->users->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($platform->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$platform->createdBy->id}" }}" target="_blank">
                                    {{ $platform->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($platform->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$platform->updatedBy->id}" }}" target="_blank">
                                    {{ $platform->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($platform->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$platform->deletedBy->id}" }}" target="_blank">
                                    {{ $platform->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($platform->created_at)
                                {{ $platform->created_at->format("l, H:i:s") }}
                                {{ $platform->created_at->isoFormat("LL") }}
                                ({{ $platform->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($platform->updated_at)
                                {{ $platform->updated_at->format("l, H:i:s") }}
                                {{ $platform->updated_at->isoFormat("LL") }}
                                ({{ $platform->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($platform->deleted_at)
                                    {{ $platform->deleted_at->format("l, H:i:s") }}
                                    {{ $platform->deleted_at->isoFormat("LL") }}
                                    ({{ $platform->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
