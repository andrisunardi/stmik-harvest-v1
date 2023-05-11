<div>
    <tr id="detail-{{ $admissionCalendar->id }}" class="collapse {{ !empty($detail[$admissionCalendar->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $admissionCalendar->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td>{!! $admissionCalendar->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($admissionCalendar->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$admissionCalendar->createdBy->id}" }}" target="_blank">
                                    {{ $admissionCalendar->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($admissionCalendar->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$admissionCalendar->updatedBy->id}" }}" target="_blank">
                                    {{ $admissionCalendar->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($admissionCalendar->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$admissionCalendar->deletedBy->id}" }}" target="_blank">
                                    {{ $admissionCalendar->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($admissionCalendar->created_at)
                                {{ $admissionCalendar->created_at->isoFormat("LLLL") }}
                                ({{ $admissionCalendar->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($admissionCalendar->updated_at)
                                {{ $admissionCalendar->updated_at->isoFormat("LLLL") }}
                                ({{ $admissionCalendar->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($admissionCalendar->deleted_at)
                                    {{ $admissionCalendar->deleted_at->isoFormat("LLLL") }}
                                    ({{ $admissionCalendar->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
