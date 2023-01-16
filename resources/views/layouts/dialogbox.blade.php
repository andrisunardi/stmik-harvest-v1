@if (!trim($__env->yieldContent("code")))
    @if (session()->has("info"))
        <div class="modal fade dialogbox" id="toast" data-bs-backdrop="dynamic" data-bs-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon">
                        <ion-icon name="information-circle-outline"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans("index.information") }}</h5>
                    </div>
                    <div class="modal-body">
                        {{ session()->get("info") }}
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a draggable="false" href="javascript:;" class="btn" data-bs-dismiss="modal">
                                <ion-icon name="close-outline"></ion-icon>
                                {{ trans("index.close") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has("success"))
        <div class="modal fade dialogbox" id="toast" data-bs-backdrop="dynamic" data-bs-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-success">
                        <ion-icon name="checkmark-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans("index.success") }}</h5>
                    </div>
                    <div class="modal-body">
                        {{ session()->get("success") }}
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a draggable="false" href="javascript:;" class="btn" data-bs-dismiss="modal">
                                <ion-icon name="close-outline"></ion-icon>
                                {{ trans("index.close") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has("success_forgot_password"))
        <div class="modal fade dialogbox" id="toast" data-bs-backdrop="dynamic" data-bs-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-success">
                        <ion-icon name="checkmark-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans("index.success") }}</h5>
                    </div>
                    <div class="modal-body">
                        <p class="mb-5">{{ trans("index.your_new_password") }}</p>
                        <h2 id="new-password" style="letter-spacing: 1em; margin-left: 1em;">{{ session()->get("success_forgot_password") }}</h2>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a draggable="false" href="javascript:;" class="btn btn-text-secondary" data-bs-dismiss="modal"><ion-icon name="close-outline"></ion-icon>
                                <ion-icon name="close-outline"></ion-icon>
                                {{ trans("index.close") }}
                            </a>
                            <a draggable="false" href="javascript:;" class="btn btn-text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Copied Success" onclick="copy()"><ion-icon name="copy-outline"></ion-icon> {{ trans("index.copy") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function copy() {
                var range = document.createRange();
                range.selectNode(document.getElementById("new-password"));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand("copy");
                window.getSelection().removeAllRanges();
            }
        </script>
    @endif

    @if (session()->has("danger"))
        <div class="modal fade dialogbox" id="toast" data-bs-backdrop="dynamic" data-bs-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="alert-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans("index.error") }}</h5>
                    </div>
                    <div class="modal-body">
                        {{ session()->get("danger") }}
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a draggable="false" href="javascript:;" class="btn" data-bs-dismiss="modal">
                                <ion-icon name="close-outline"></ion-icon>
                                {{ trans("index.close") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="modal fade dialogbox" id="toast" data-bs-backdrop="dynamic" data-bs-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans("index.error") }}</h5>
                    </div>
                    <div class="modal-body">
                    @foreach ($errors->all() as $error)
                        {{ $error }} @if (!$loop->last)<br>@endif
                    @endforeach
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a draggable="false" href="javascript:;" class="btn" data-bs-dismiss="modal">
                                <ion-icon name="close-outline"></ion-icon>
                                {{ trans("index.close") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        $(function() {
            $("#toast").modal("show");
        });
    </script>

    {{--  @if (session()->has("success"))
        <div id="toast" class="toast-box toast-top">
            <div class="in">
                <div class="text">
                    {{ session()->get("success") }}
                </div>
            </div>
        </div>

        <script>
            $(function() {
                toastbox("toast", 5000);
            });
        </script>
    @endif  --}}
@endif
