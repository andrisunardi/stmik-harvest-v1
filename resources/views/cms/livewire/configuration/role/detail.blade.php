<div>
    <tr id="detail-{{ $role->id }}" class="collapse {{ !empty($detail[$role->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.permission") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.configuration.permission.index") . "?role_id={$role->id}" }}" target="_blank">
                                {{ $role->permissions->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.user") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?role_id={$role->id}" }}" target="_blank">
                                {{ $role->users->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($role->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$role->createdBy->id}" }}" target="_blank">
                                    {{ $role->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($role->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$role->updatedBy->id}" }}" target="_blank">
                                    {{ $role->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($role->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$role->deletedBy->id}" }}" target="_blank">
                                    {{ $role->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($role->created_at)
                                {{ $role->created_at->format("l, H:i:s") }}
                                {{ $role->created_at->isoFormat("LL") }}
                                ({{ $role->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($role->updated_at)
                                {{ $role->updated_at->format("l, H:i:s") }}
                                {{ $role->updated_at->isoFormat("LL") }}
                                ({{ $role->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($role->deleted_at)
                                    {{ $role->deleted_at->format("l, H:i:s") }}
                                    {{ $role->deleted_at->isoFormat("LL") }}
                                    ({{ $role->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
