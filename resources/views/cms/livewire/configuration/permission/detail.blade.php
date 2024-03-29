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
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($permission->created_at)
                                {{ $permission->created_at->isoFormat("LLLL") }}
                                ({{ $permission->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($permission->updated_at)
                                {{ $permission->updated_at->isoFormat("LLLL") }}
                                ({{ $permission->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</div>
