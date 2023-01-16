<div>
    <tr id="detail-{{ $portfolioCategory->id }}" class="collapse {{ !empty($detail[$portfolioCategory->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $portfolioCategory->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td>{!! $portfolioCategory->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.portfolio") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.development.portfolio.index") . "?portfolio_category_id={$portfolioCategory->id}" }}" target="_blank">
                                {{ $portfolioCategory->portfolios->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($portfolioCategory->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$portfolioCategory->createdBy->id}" }}" target="_blank">
                                    {{ $portfolioCategory->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($portfolioCategory->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$portfolioCategory->updatedBy->id}" }}" target="_blank">
                                    {{ $portfolioCategory->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($portfolioCategory->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$portfolioCategory->deletedBy->id}" }}" target="_blank">
                                    {{ $portfolioCategory->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($portfolioCategory->created_at)
                                {{ $portfolioCategory->created_at->format("l, H:i:s") }}
                                {{ $portfolioCategory->created_at->isoFormat("LL") }}
                                ({{ $portfolioCategory->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($portfolioCategory->updated_at)
                                {{ $portfolioCategory->updated_at->format("l, H:i:s") }}
                                {{ $portfolioCategory->updated_at->isoFormat("LL") }}
                                ({{ $portfolioCategory->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($portfolioCategory->deleted_at)
                                    {{ $portfolioCategory->deleted_at->format("l, H:i:s") }}
                                    {{ $portfolioCategory->deleted_at->isoFormat("LL") }}
                                    ({{ $portfolioCategory->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
