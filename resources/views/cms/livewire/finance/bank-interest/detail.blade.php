<div>
    <tr id="detail-{{ $bankInterest->id }}" class="collapse {{ !empty($detail[$bankInterest->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $bankInterest->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($bankInterest->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bankInterest->createdBy->id}" }}" target="_blank">
                                    {{ $bankInterest->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($bankInterest->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bankInterest->updatedBy->id}" }}" target="_blank">
                                    {{ $bankInterest->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($bankInterest->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bankInterest->deletedBy->id}" }}" target="_blank">
                                    {{ $bankInterest->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($bankInterest->created_at)
                                {{ $bankInterest->created_at->format("l, H:i:s") }}
                                {{ $bankInterest->created_at->isoFormat("LL") }}
                                ({{ $bankInterest->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($bankInterest->updated_at)
                                {{ $bankInterest->updated_at->format("l, H:i:s") }}
                                {{ $bankInterest->updated_at->isoFormat("LL") }}
                                ({{ $bankInterest->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($bankInterest->deleted_at)
                                    {{ $bankInterest->deleted_at->format("l, H:i:s") }}
                                    {{ $bankInterest->deleted_at->isoFormat("LL") }}
                                    ({{ $bankInterest->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
