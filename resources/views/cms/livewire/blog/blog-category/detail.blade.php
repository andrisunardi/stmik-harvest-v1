<div>
    <tr id="detail-{{ $blogCategory->id }}" class="collapse {{ !empty($detail[$blogCategory->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td class="text-pre-wrap">{!! $blogCategory->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td class="text-pre-wrap">{!! $blogCategory->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.slug") }}</td>
                        <td>{{ $blogCategory->slug }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.blog") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.blog.index") . "?blog_category_id={$blogCategory->id}" }}" target="_blank">
                                {{ $blogCategory->blogs->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($blogCategory->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blogCategory->createdBy->id}" }}" target="_blank">
                                    {{ $blogCategory->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($blogCategory->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blogCategory->updatedBy->id}" }}" target="_blank">
                                    {{ $blogCategory->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($blogCategory->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blogCategory->deletedBy->id}" }}" target="_blank">
                                    {{ $blogCategory->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($blogCategory->created_at)
                                {{ $blogCategory->created_at->format("l, H:i:s") }}
                                {{ $blogCategory->created_at->isoFormat("LL") }}
                                ({{ $blogCategory->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($blogCategory->updated_at)
                                {{ $blogCategory->updated_at->format("l, H:i:s") }}
                                {{ $blogCategory->updated_at->isoFormat("LL") }}
                                ({{ $blogCategory->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($blogCategory->deleted_at)
                                    {{ $blogCategory->deleted_at->format("l, H:i:s") }}
                                    {{ $blogCategory->deleted_at->isoFormat("LL") }}
                                    ({{ $blogCategory->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
