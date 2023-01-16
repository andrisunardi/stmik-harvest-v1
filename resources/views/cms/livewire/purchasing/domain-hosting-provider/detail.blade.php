<div>
    <tr id="detail-{{ $domainHostingProvider->id }}" class="collapse {{ !empty($detail[$domainHostingProvider->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.buy_domain_hosting") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.buy-domain-hosting.index") . "?domain_hosting_provider_id={$domainHostingProvider->id}" }}" target="_blank">
                                {{ $domainHostingProvider->buyDomainHostings->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($domainHostingProvider->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$domainHostingProvider->createdBy->id}" }}" target="_blank">
                                    {{ $domainHostingProvider->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($domainHostingProvider->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$domainHostingProvider->updatedBy->id}" }}" target="_blank">
                                    {{ $domainHostingProvider->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($domainHostingProvider->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$domainHostingProvider->deletedBy->id}" }}" target="_blank">
                                    {{ $domainHostingProvider->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($domainHostingProvider->created_at)
                                {{ $domainHostingProvider->created_at->format("l, H:i:s") }}
                                {{ $domainHostingProvider->created_at->isoFormat("LL") }}
                                ({{ $domainHostingProvider->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($domainHostingProvider->updated_at)
                                {{ $domainHostingProvider->updated_at->format("l, H:i:s") }}
                                {{ $domainHostingProvider->updated_at->isoFormat("LL") }}
                                ({{ $domainHostingProvider->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($domainHostingProvider->deleted_at)
                                    {{ $domainHostingProvider->deleted_at->format("l, H:i:s") }}
                                    {{ $domainHostingProvider->deleted_at->isoFormat("LL") }}
                                    ({{ $domainHostingProvider->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
