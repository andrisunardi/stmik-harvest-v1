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
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($role->created_at)
                                {{ $role->created_at->isoFormat("LLLL") }}
                                ({{ $role->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($role->updated_at)
                                {{ $role->updated_at->isoFormat("LLLL") }}
                                ({{ $role->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</div>
