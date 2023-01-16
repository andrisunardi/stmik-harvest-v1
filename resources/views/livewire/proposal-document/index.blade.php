@section("title", trans("index.proposal_document"))
@section("icon", "fas fa-file-text-alt")
@section("proposal-document-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                Our Proposal For Your Project
            @else
                Proposal Kami Untuk Proyek Anda
            @endif
        </h6>
    </div>

    @if ($proposalDocument)
        <div class="section mt-2 mb-2">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $proposalDocument->translate_name }}</h2>
                    <p>{{ $proposalDocument->translate_description }}</p>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                            <a draggable="false" href="#proposal-document" data-bs-toggle="modal" data-bs-target="#proposal-document">
                                <img draggable="false" src="{{ $proposalDocument->assetImage() }}" class="card border w-100" alt="{{ $proposalDocument->altImage() }}">
                            </a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-sm-auto">
                            <a draggable="false" class="btn btn-primary btn-block" href="{{ $proposalDocument->assetFile() }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.view_file") }} {{ trans("index.pdf") }}"><ion-icon name="eye-outline"></ion-icon> {{ trans("index.view") }}</a>
                        </div>
                        <div class="col-6 col-sm-auto">
                            <a draggable="false" class="btn btn-danger btn-block" href="{{ $proposalDocument->assetFile() }}" download data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.download_file") }} {{ trans("index.pdf") }}"><ion-icon name="download-outline"></ion-icon> {{ trans("index.download") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modalbox" id="proposal-document" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@yield("title")</h5>
                        <a draggable="false" href="javascript:;" data-bs-dismiss="modal">{{ trans("index.close") }}</a>
                    </div>
                    <div class="modal-body">
                        <img draggable="false" src="{{ $proposalDocument->assetImage() }}" class="card border w-100" alt="{{ $proposalDocument->altImage() }}">
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
