<div>
    <tr id="detail-{{ $slider->id }}" class="collapse {{ !empty($detail[$slider->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $slider->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td>{!! $slider->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.button_name") }}</td>
                        <td>{{ $slider->button_name }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.button_name_idn") }}</td>
                        <td>{{ $slider->button_name_idn }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.button_link") }}</td>
                        <td>
                            <a draggable="false" href="{{ $slider->button_link }}" target="_blank">
                                {{ $slider->button_link }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($slider->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $slider->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $slider->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($slider->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$slider->createdBy->id}" }}" target="_blank">
                                    {{ $slider->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($slider->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$slider->updatedBy->id}" }}" target="_blank">
                                    {{ $slider->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($slider->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$slider->deletedBy->id}" }}" target="_blank">
                                    {{ $slider->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($slider->created_at)
                                {{ $slider->created_at->format("l, H:i:s") }}
                                {{ $slider->created_at->isoFormat("LL") }}
                                ({{ $slider->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($slider->updated_at)
                                {{ $slider->updated_at->format("l, H:i:s") }}
                                {{ $slider->updated_at->isoFormat("LL") }}
                                ({{ $slider->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($slider->deleted_at)
                                    {{ $slider->deleted_at->format("l, H:i:s") }}
                                    {{ $slider->deleted_at->isoFormat("LL") }}
                                    ({{ $slider->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
