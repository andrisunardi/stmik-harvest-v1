<div>
    <tr id="detail-{{ $newsCategory->id }}" class="collapse {{ !empty($detail[$newsCategory->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $newsCategory->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td>{!! $newsCategory->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.slug") }}</td>
                        <td>{{ $newsCategory->slug }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.news") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.marketing.news.index") . "?news_category_id={$newsCategory->id}" }}" target="_blank">
                                {{ $newsCategory->newss->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($newsCategory->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$newsCategory->createdBy->id}" }}" target="_blank">
                                    {{ $newsCategory->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($newsCategory->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$newsCategory->updatedBy->id}" }}" target="_blank">
                                    {{ $newsCategory->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($newsCategory->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$newsCategory->deletedBy->id}" }}" target="_blank">
                                    {{ $newsCategory->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($newsCategory->created_at)
                                {{ $newsCategory->created_at->format("l, H:i:s") }}
                                {{ $newsCategory->created_at->isoFormat("LL") }}
                                ({{ $newsCategory->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($newsCategory->updated_at)
                                {{ $newsCategory->updated_at->format("l, H:i:s") }}
                                {{ $newsCategory->updated_at->isoFormat("LL") }}
                                ({{ $newsCategory->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($newsCategory->deleted_at)
                                    {{ $newsCategory->deleted_at->format("l, H:i:s") }}
                                    {{ $newsCategory->deleted_at->isoFormat("LL") }}
                                    ({{ $newsCategory->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
