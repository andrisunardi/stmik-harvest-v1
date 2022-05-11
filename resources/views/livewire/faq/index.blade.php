@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div class="box_style_cat" id="faq_box">
                    <ul id="cat_nav">
                        @foreach ($data_faq_category as $faq_category)
                            <li><a draggable="false" href="#faq-category-{{ $faq_category->id }}" class="{{ $loop->first ? "active" : null }}">
                                <i class="icon_document_alt"></i> {{ $faq_category->translate_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            <div class="col-lg-9" id="faq">
                @foreach ($data_faq_category as $faq_category)
                    <h4 class="nomargin_top">{{ $faq_category->translate_name }}</h4>
                    <div role="tablist" class="add_bottom_45 accordion_2" id="faq-category-{{ $faq_category->id }}">
                        @foreach ($faq_category->data_faq as $faq)
                            <div class="card">
                                <div class="card-header" role="tab">
                                    <h5 class="mb-0">
                                        <a draggable="false" data-bs-toggle="collapse" href="#faq-{{ $faq->id }}" aria-expanded="{{ $loop->first ? "true" : "false" }}">
                                            <i class="indicator ti-{{ $loop->first ? "minus" : "plus" }}"></i> {{ $faq->translate_name }}
                                        </a>
                                    </h5>
                                </div>
                                <div id="faq-{{ $faq->id }}" class="collapse {{ $loop->first ? "show" : null }}" role="tabpanel" data-bs-parent="#faq-category-{{ $faq_category->id }}">
                                    <div class="card-body">
                                        <p>{!! html_entity_decode($faq->translate_description) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
