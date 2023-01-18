@if (Route::is("cms.*"))
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4 py-2">
            {{ Breadcrumbs::render() }}
        </ol>
    </nav>
@else
    <div class="ht__bradcaump__area" data--black__overlay="4"
        style="background: rgba(0, 0, 0, 0) url({{ $banner?->assetImage() }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">
                                {{-- @yield("name") --}}
                                {{ $banner?->translate_name }}
                                @if ($banner?->description && $banner?->description_id)
                                    <p class="my-3">{{ $banner->translate_description }}</p>
                                @endif
                            </h2>
                            <nav class="bradcaump-inner">
                                <h3>{{ Breadcrumbs::render() }}</h3>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
