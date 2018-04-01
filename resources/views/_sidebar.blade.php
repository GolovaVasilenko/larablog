<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">
        <aside class="widget news-letter">
            <h3 class="widget-title text-uppercase text-center">Get Newsletter</h3>

            <form action="#">
                <input type="email" placeholder="Your email address">
                <input type="submit" value="Subscribe Now"
                       class="text-uppercase text-center btn btn-subscribe">
            </form>

        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
                @foreach($listCategories as $cat)
                    <li>
                        <a href="{{ route('posts.category', $cat->slug) }}">{{ $cat->title }}</a>
                        <span class="post-count pull-right"> ({{ $cat->posts->count() }})</span>
                    </li>
                @endforeach
            </ul>
        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
            @foreach($popularPosts as $pp)
            <div class="popular-post">


                <a href="{{ route('post.show', $pp->slug) }}" class="popular-img"><img src="{{ $pp->getImage() }}" alt="">

                    <div class="p-overlay"></div>
                </a>

                <div class="p-content">
                    <a href="{{ route('post.show', $pp->slug) }}" class="text-uppercase">{{ $pp->title }}</a>
                    <span class="p-date">{{ $pp->created_att }}</span>

                </div>
            </div>
            @endforeach
        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
            @foreach($lastPosts as $lp)
            <div class="thumb-latest-posts">

                <div class="media">
                    <div class="media-left">
                        <a href="{{ route('post.show', $lp->slug) }}" class="popular-img"><img src="{{ $lp->getImage() }}" alt="">

                            <div class="p-overlay"></div>
                        </a>
                    </div>
                    <div class="p-content">
                        <a href="{{ route('post.show', $lp->slug) }}" class="text-uppercase">{{ $lp->title }}</a>
                        <span class="p-date">{{ $lp->created_att }}</span>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </aside>

        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Follow@Instagram</h3>

            <div class="instragram-follow">
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>
                <a href="#">
                    <img src="/img/ins-flow.jpg" alt="">
                </a>

            </div>

        </aside>
    </div>
</div>