<div>
    <div class="row">
        <div class="col-6 col-sm-auto mb-3">
            <a draggable="false" class="btn btn-primary w-100" href="{{ route("{$subDomain}.{$pageCategorySlug}.index") }}">
                <i class="fas fa-id-card me-1"></i>
                {{ trans("index.profile") }}
            </a>
        </div>
        <div class="col-6 col-sm-auto mb-3">
            <a draggable="false" class="btn btn-info text-white w-100" href="{{ route("{$subDomain}.{$pageCategorySlug}.activity-log") }}">
                <i class="fas fa-user-clock me-1"></i>
                {{ trans("index.activity_log") }}
            </a>
        </div>
        <div class="col-sm-auto mb-3">
            <a draggable="false" class="btn btn-success w-100" href="{{ route("{$subDomain}.{$pageCategorySlug}.edit-profile") }}">
                <i class="fas fa-user-edit me-1"></i>
                {{ trans("index.edit_profile") }}
            </a>
        </div>
        <div class="col-sm-auto mb-3">
            <a draggable="false" class="btn btn-warning text-white text-white w-100" href="{{ route("{$subDomain}.{$pageCategorySlug}.change-password") }}">
                <i class="fas fa-user-lock me-1"></i>
                {{ trans("index.change_password") }}
            </a>
        </div>
        <div class="col-sm-auto mb-3">
            <a draggable="false" class="btn btn-danger w-100" href="{{ route("{$subDomain}.logout.index") }}">
                <i class="fas fa-sign-out-alt me-1"></i>
                {{ trans("index.logout") }}
            </a>
        </div>
    </div>
</div>
