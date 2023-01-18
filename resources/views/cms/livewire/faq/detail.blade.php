<div>
    <tr id="detail-{{ $faq->id }}" class="collapse {{ !empty($detail[$faq->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.answer") }}</td>
                        <td>{!! $faq->answer !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.answer_idn") }}</td>
                        <td>{!! $faq->answer_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($faq->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$faq->createdBy->id}" }}" target="_blank">
                                    {{ $faq->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($faq->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$faq->updatedBy->id}" }}" target="_blank">
                                    {{ $faq->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($faq->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$faq->deletedBy->id}" }}" target="_blank">
                                    {{ $faq->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($faq->created_at)
                                {{ $faq->created_at->format("l, H:i:s") }}
                                {{ $faq->created_at->isoFormat("LL") }}
                                ({{ $faq->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($faq->updated_at)
                                {{ $faq->updated_at->format("l, H:i:s") }}
                                {{ $faq->updated_at->isoFormat("LL") }}
                                ({{ $faq->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($faq->deleted_at)
                                    {{ $faq->deleted_at->format("l, H:i:s") }}
                                    {{ $faq->deleted_at->isoFormat("LL") }}
                                    ({{ $faq->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
