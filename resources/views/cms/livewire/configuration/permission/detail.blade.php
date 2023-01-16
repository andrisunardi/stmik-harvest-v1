<div>
    <tr id="detail-{{ $permission->id }}" class="collapse {{ !empty($detail[$permission->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.role") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.configuration.role.index") . "?permission_id={$permission->id}" }}" target="_blank">
                                {{ $permission->roles->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.user") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?permission_id={$permission->id}" }}" target="_blank">
                                {{ $permission->users->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($permission->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$permission->createdBy->id}" }}" target="_blank">
                                    {{ $permission->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($permission->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$permission->updatedBy->id}" }}" target="_blank">
                                    {{ $permission->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($permission->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$permission->deletedBy->id}" }}" target="_blank">
                                    {{ $permission->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($permission->created_at)
                                {{ $permission->created_at->format("l, H:i:s") }}
                                {{ $permission->created_at->isoFormat("LL") }}
                                ({{ $permission->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($permission->updated_at)
                                {{ $permission->updated_at->format("l, H:i:s") }}
                                {{ $permission->updated_at->isoFormat("LL") }}
                                ({{ $permission->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($permission->deleted_at)
                                    {{ $permission->deleted_at->format("l, H:i:s") }}
                                    {{ $permission->deleted_at->isoFormat("LL") }}
                                    ({{ $permission->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
