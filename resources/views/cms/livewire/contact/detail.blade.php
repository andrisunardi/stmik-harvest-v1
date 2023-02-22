<div>
    <tr id="detail-{{ $contact->id }}" class="collapse {{ !empty($detail[$contact->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.subject") }}</td>
                        <td>{{ $contact->subject }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.message") }}</td>
                        <td class="text-pre-wrap">{!! $contact->message !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($contact->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$contact->createdBy->id}" }}" target="_blank">
                                    {{ $contact->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($contact->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$contact->updatedBy->id}" }}" target="_blank">
                                    {{ $contact->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($contact->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$contact->deletedBy->id}" }}" target="_blank">
                                    {{ $contact->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($contact->created_at)
                                {{ $contact->created_at->format("l, H:i:s") }}
                                {{ $contact->created_at->isoFormat("LL") }}
                                ({{ $contact->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($contact->updated_at)
                                {{ $contact->updated_at->format("l, H:i:s") }}
                                {{ $contact->updated_at->isoFormat("LL") }}
                                ({{ $contact->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($contact->deleted_at)
                                    {{ $contact->deleted_at->format("l, H:i:s") }}
                                    {{ $contact->deleted_at->isoFormat("LL") }}
                                    ({{ $contact->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
