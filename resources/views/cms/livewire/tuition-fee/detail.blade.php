<div>
    <tr id="detail-{{ $tuitionFee->id }}" class="collapse {{ !empty($detail[$tuitionFee->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td class="text-pre-wrap">{!! $tuitionFee->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td class="text-pre-wrap">{!! $tuitionFee->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($tuitionFee->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$tuitionFee->createdBy->id}" }}" target="_blank">
                                    {{ $tuitionFee->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($tuitionFee->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$tuitionFee->updatedBy->id}" }}" target="_blank">
                                    {{ $tuitionFee->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($tuitionFee->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$tuitionFee->deletedBy->id}" }}" target="_blank">
                                    {{ $tuitionFee->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($tuitionFee->created_at)
                                {{ $tuitionFee->created_at->isoFormat("LLLL") }}
                                ({{ $tuitionFee->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($tuitionFee->updated_at)
                                {{ $tuitionFee->updated_at->isoFormat("LLLL") }}
                                ({{ $tuitionFee->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($tuitionFee->deleted_at)
                                    {{ $tuitionFee->deleted_at->isoFormat("LLLL") }}
                                    ({{ $tuitionFee->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
