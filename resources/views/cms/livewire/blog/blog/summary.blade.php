<div>
    <h6 class="lead">{{ trans("index.data") }} @yield("title")</h6>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ trans("index.today") }}
                    <div class="small text-white">{{ now()->format("l") }}</div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    {{ isset($summary["todayCount"]) ? Str::thousand($summary["todayCount"]) : 0 }}
                    <div class="small text-white">
                        {{ isset($summary["todayCountPercentage"]) ? Str::percentage($summary["todayCountPercentage"]) : 0 }}%
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ trans("index.yesterday") }}
                    <div class="small text-white">
                        {{ isset($summary["yesterdayCount"]) ? Str::thousand($summary["yesterdayCount"]) : 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ trans("index.entire_month") }}
                    <div class="small text-white">{{ now()->format("F") }}</div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    {{ isset($summary["monthCount"]) ? Str::thousand($summary["monthCount"]) : 0 }}
                    <div class="small text-white">
                        {{ isset($summary["monthCountPercentage"]) ? Str::percentage($summary["monthCountPercentage"]) : 0 }}%
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ trans("index.last_month") }}
                    <div class="small text-white">
                        {{ isset($summary["lastMonthCount"]) ? Str::thousand($summary["lastMonthCount"]) : 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card bg-warning text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ trans("index.entire_year") }}
                    <div class="small text-white">{{ now()->format("Y") }}</div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    {{ isset($summary["yearCount"]) ? Str::thousand($summary["yearCount"]) : 0 }}
                    <div class="small text-white">
                        {{ isset($summary["yearCountPercentage"]) ? Str::percentage($summary["yearCountPercentage"]) : 0 }}%
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ trans("index.last_year") }}
                    <div class="small text-white">
                        {{ isset($summary["lastYearCount"]) ? Str::thousand($summary["lastYearCount"]) : 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ trans("index.all") }}
                    <div class="small text-white">{{ now()->parse(env("APP_DATE"))->diffForHumans() }}</div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    {{ isset($summary["allCount"]) ? Str::thousand($summary["allCount"]) : 0 }}
                    <div class="small text-white">
                        {{ isset($summary["allCountPercentage"]) ? Str::percentage($summary["allCountPercentage"]) : 0 }}%
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ trans("index.past_year") }}
                    <div class="small text-white">
                        {{ isset($summary["beforeThisYearCount"]) ? Str::thousand($summary["beforeThisYearCount"]) : 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h6 class="lead">{{ trans("index.amount") }} @yield("title")</h6>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card bg-info text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ trans("index.today") }}
                    <div class="small text-white">{{ now()->format("l") }}</div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    {{ isset($summary["todayAmount"]) ? Str::rupiah($summary["todayAmount"]) : 0 }}
                    <div class="small text-white">
                        {{ isset($summary["todayAmountPercentage"]) ? Str::percentage($summary["todayAmountPercentage"]) : 0 }}%
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ trans("index.yesterday") }}
                    <div class="small text-white">
                        {{ isset($summary["yesterdayAmount"]) ? Str::rupiah($summary["yesterdayAmount"]) : 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ trans("index.entire_month") }}
                    <div class="small text-white">{{ now()->format("F") }}</div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    {{ isset($summary["monthAmount"]) ? Str::rupiah($summary["monthAmount"]) : 0 }}
                    <div class="small text-white">
                        {{ isset($summary["monthAmountPercentage"]) ? Str::percentage($summary["monthAmountPercentage"]) : 0 }}%
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ trans("index.last_month") }}
                    <div class="small text-white">
                        {{ isset($summary["lastMonthAmount"]) ? Str::rupiah($summary["lastMonthAmount"]) : 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card bg-dark text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ trans("index.entire_year") }}
                    <div class="small text-white">{{ now()->format("Y") }}</div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    {{ isset($summary["yearAmount"]) ? Str::rupiah($summary["yearAmount"]) : 0 }}
                    <div class="small text-white">
                        {{ isset($summary["yearAmountPercentage"]) ? Str::percentage($summary["yearAmountPercentage"]) : 0 }}%
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ trans("index.last_year") }}
                    <div class="small text-white">
                        {{ isset($summary["lastYearAmount"]) ? Str::rupiah($summary["lastYearAmount"]) : 0 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card bg-light text-black mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ trans("index.all") }}
                    <div class="small text-black">{{ now()->parse(env("APP_DATE"))->diffForHumans() }}</div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    {{ isset($summary["allAmount"]) ? Str::rupiah($summary["allAmount"]) : 0 }}
                    <div class="small text-black">
                        {{ isset($summary["allAmountPercentage"]) ? Str::percentage($summary["allAmountPercentage"]) : 0 }}%
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ trans("index.past_year") }}
                    <div class="small text-black">
                        {{ isset($summary["beforeThisYearAmount"]) ? Str::rupiah($summary["beforeThisYearAmount"]) : 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
