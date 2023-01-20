<div>
    <tr id="detail-{{ $offer->id }}" class="collapse {{ !empty($detail[$offer->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $offer->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td>{!! $offer->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.button_name") }}</td>
                        <td>{{ $offer->button_name }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.button_name_idn") }}</td>
                        <td>{{ $offer->button_name_idn }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.button_link") }}</td>
                        <td>
                            <a draggable="false" href="{{ $offer->button_link }}" target="_blank">
                                {{ $offer->button_link }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($offer->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$offer->createdBy->id}" }}" target="_blank">
                                    {{ $offer->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($offer->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$offer->updatedBy->id}" }}" target="_blank">
                                    {{ $offer->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($offer->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$offer->deletedBy->id}" }}" target="_blank">
                                    {{ $offer->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($offer->created_at)
                                {{ $offer->created_at->format("l, H:i:s") }}
                                {{ $offer->created_at->isoFormat("LL") }}
                                ({{ $offer->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($offer->updated_at)
                                {{ $offer->updated_at->format("l, H:i:s") }}
                                {{ $offer->updated_at->isoFormat("LL") }}
                                ({{ $offer->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($offer->deleted_at)
                                    {{ $offer->deleted_at->format("l, H:i:s") }}
                                    {{ $offer->deleted_at->isoFormat("LL") }}
                                    ({{ $offer->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
