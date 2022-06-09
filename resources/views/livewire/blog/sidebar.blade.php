<div class="col-lg-3 sm-mt-40 xs-mt-40">
    <div class="htc__blog__right__sidebar">
        <div class="htc__blog__courses">
            <h2 class="title__style--2">All Courses</h2>
            <ul class="blog__courses">
                @foreach ($data_blog_category as $blog_category)
                    <li><a draggable="false" href="{{ route("{$menu_name}.index") . "?category={$blog}" }}">{{ $blog_category->translate_name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="blog__recent__courses">
            <h2 class="title__style--2">Recent COURSES</h2>
            <div class="recent__courses__inner">
                <!-- Start Single POst -->
                <div class="single__courses">
                    <div class="recent__post__thumb">
                        <a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">
                            <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                        </a>
                    </div>
                    <div class="recent__post__details">
                        <h2><a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">Mathematics and Statistics</a></h2>
                        <span class="post__price">$60.00</span>
                    </div>
                </div>
                <!-- End Single POst -->
                <!-- Start Single POst -->
                <div class="single__courses">
                    <div class="recent__post__thumb">
                        <a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">
                            <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                        </a>
                    </div>
                    <div class="recent__post__details">
                        <h2><a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">Mathematics and Statistics</a></h2>
                        <span class="post__price">$60.00</span>
                    </div>
                </div>
                <!-- End Single POst -->
                <!-- Start Single POst -->
                <div class="single__courses">
                    <div class="recent__post__thumb">
                        <a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">
                            <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                        </a>
                    </div>
                    <div class="recent__post__details">
                        <h2><a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">Mathematics and Statistics</a></h2>
                        <span class="post__price">$60.00</span>
                    </div>
                </div>
                <!-- End Single POst -->
                <!-- Start Single POst -->
                <div class="single__courses">
                    <div class="recent__post__thumb">
                        <a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">
                            <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                        </a>
                    </div>
                    <div class="recent__post__details">
                        <h2><a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">Mathematics and Statistics</a></h2>
                        <span class="post__price">$60.00</span>
                    </div>
                </div>
                <!-- End Single POst -->
            </div>
        </div>

        {{-- <div class="blog__discount__area bg--8">
            <div class="blog__discount__inner">
                <h4>NEW SCHOOLYEAR</h4>
                <h2>GET 70% OFF</h2>
            </div>
        </div> --}}

        <div class="blog__tag mt--50">
            <h2 class="title__style--2">Tags</h2>
            <ul class="tag__list">
                @if ($data_popular_tags?->data_tags())
                    @foreach ($data_popular_tags->data_tags() as $popular_tags)
                        <li><a draggable="false" href="{{ route("{$menu_slug}.index") . "?search=" . Str::slug($popular_tags) }}">{{ $popular_tags }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
