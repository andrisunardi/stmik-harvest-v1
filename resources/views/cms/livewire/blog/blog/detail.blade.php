<div>
    <tr id="detail-{{ $blog->id }}" class="collapse {{ !empty($detail[$blog->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.short_body") }}</td>
                        <td>{{ $blog->short_body }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.short_body_idn") }}</td>
                        <td>{{ $blog->short_body_idn }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.body") }}</td>
                        <td class="text-pre-wrap">{!! $blog->body !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.body_idn") }}</td>
                        <td class="text-pre-wrap">{!! $blog->body_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.date") }}</td>
                        <td>
                            @if ($blog->date)
                                {{ $blog->date->format("l,") }}
                                {{ $blog->date->isoFormat("LL") }}
                                ({{ $blog->date->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.tag") }}</td>
                        <td>{{ $blog->tag }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.tag_idn") }}</td>
                        <td>{{ $blog->tag_idn }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.slug") }}</td>
                        <td>{{ $blog->slug }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($blog->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blog->createdBy->id}" }}" target="_blank">
                                    {{ $blog->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($blog->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blog->updatedBy->id}" }}" target="_blank">
                                    {{ $blog->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($blog->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blog->deletedBy->id}" }}" target="_blank">
                                    {{ $blog->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($blog->created_at)
                                {{ $blog->created_at->format("l, H:i:s") }}
                                {{ $blog->created_at->isoFormat("LL") }}
                                ({{ $blog->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($blog->updated_at)
                                {{ $blog->updated_at->format("l, H:i:s") }}
                                {{ $blog->updated_at->isoFormat("LL") }}
                                ({{ $blog->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($blog->deleted_at)
                                    {{ $blog->deleted_at->format("l, H:i:s") }}
                                    {{ $blog->deleted_at->isoFormat("LL") }}
                                    ({{ $blog->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
