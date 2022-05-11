<aside class="col-lg-3" id="sidebar">
    <div id="filters_col">
        <a draggable="false" data-bs-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">{{ trans("general.Filters") }}</a>
        <div class="collapse show" id="collapseFilters">
            <div class="filter_type">
                <h6>{{ trans("general.Subject") }}</h6>
                <ul>
                    <li>
                        <label>
                            <input type="checkbox" class="icheck" wire:model="all_subjects" checked>
                            {{ trans("general.All") }}
                            <small>({{ $total_repository }})</small>
                        </label>
                    </li>
                    @foreach ($data_repository_subject_sidebar as $repository_subject_sidebar)
                        <li>
                            <label>
                                <input type="checkbox" class="icheck" wire:model="subjects">
                                {{ $repository_subject_sidebar->name }}
                                <small>({{ $repository_subject_sidebar->data_repository->count() }})</small>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="filter_type">
                <h6>{{ trans("general.Year") }}</h6>
                <ul>
                    @for ($year = now()->subYears(5)->format("Y"); $year < now()->format("Y"); $year++)
                        @php $total_repository_year = App\Models\Repository::where("year", $year)->cursor()->count() @endphp
                        <li>
                            <label>
                                <input type="checkbox" class="icheck" wire:model="years">
                                <span class="rating">
                                    <small>{{ $year }}</small>
                                    <small>({{ $total_repository_year }})</small>
                                </span>
                            </label>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</aside>
