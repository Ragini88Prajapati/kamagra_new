@extends('layouts.client2')


@section('meta')

    <title> Bester Kamagra-Shop mit erschwinglichem Preis
    </title>
    <meta name="description"
        content=" Kamagra kaufen war jetzt viel einfacher, schneller zu kaufen, mit onlinekamagrastore haben wir das, was Sie brauchen, mit dem schnellsten und kostenlosen Versand.">
    <meta name="keywords" content="kamagra bestellen, Kamagra kaufen, Kamagra Deutschland, Kamagra schnell, kamagra">


@endsection

@section('content')

<div class="bt-breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="/blog">Bloggen</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- /.bt-breadcrumb -->
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <h1>Bloggen</h1>
            <div class="article-filter d-none">
                <div class="rss-feed">
                    <a href="#" title='RSS'><img src='{{asset('/assets/client2/images/rss.png')}}' alt='Rss' />
                    </a>
                </div>
                <div class="display hidden-xs">
                    <button type="button" id="list-view" class="btn-list" data-toggle="tooltip" title="List"><i
                            class="fa fa-th-list"></i>
                    </button>
                    <button type="button" id="grid-view" class="btn-grid" data-toggle="tooltip" title="Grid"><i
                            class="fa fa-th-large"></i>
                    </button>
                </div>
                <div class="limit-sort hidden-xs">
                    <div class="box_sort">
                        <label class="control-label" for="input-sort">Sort By:</label>
                        <label>
                            <select id="input-sort" class="form-control">
                                <option value="&amp;sort=ba.sort_order&amp;order=ASC" selected="selected">
                                    Default</option>
                                <option value="sort=bad.name&amp;order=ASC">Name (A - Z)</option>
                                <option value="sort=bad.name&amp;order=DESC">Name (Z - A)</option>
                                <option value="sort=ba.date_added&amp;order=ASC">Date Added (Old &gt; New)</option>
                                <option value="sort=ba.date_added&amp;order=DESC">Date Added (New &gt; Old)</option>
                                <option value="sort=comment&amp;order=DESC">Comment (Highest)</option>
                                <option value="sort=comment&amp;order=ASC">Comment (Lowest)</option>
                            </select>
                        </label>
                    </div>
                    <div class="box_limit">
                        <label class="control-label" for="input-limit">Show:</label>
                        <label>
                            <select id="input-limit" class="form-control">
                                <option value="limit=5" selected="selected">5</option>
                                <option value="limit=10">10</option>
                                <option value="limit=15">15</option>
                                <option value="limit=20">20</option>
                                <option value="limit=30">30</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div><!-- /.article-filter -->
            <div class="row blog-list-row">
                @forelse ($blogs as $value)
                <div class="article-layout article-list col-xs-12">
                    <div class="content-bg">
                        <div class="article-image">
                            <a href="{{route('home.blog-detail',$value->url)}}"><img
                                    src="{{asset('/assets/images/blogs/').'/'.$value->image_name}}"
                                    alt="{{ isset($value->title) &&  !empty($value->title) ? $value->title  :  '' }}"
                                    title="{{ isset($value->title) &&  !empty($value->title) ? $value->title  :  '' }}"
                                    class="img-responsive" />
                            </a>
                        </div>
                        <div class="article_dt">
                            <div class="article-name">
                                <h2><a
                                        href="{{route('home.blog-detail',$value->url)}}">{{ isset($value->title) &&  !empty($value->title) ? $value->title  :  '' }}</a>
                                </h2>
                            </div>
                            <div class="time-stamp">{{date('l, M d, Y', strtotime($value->date))}} </div>
                            <div class="article-title">
                                <p>{{ isset($value->short_description) &&  !empty($value->short_description) ? $value->short_description  :  '' }}
                                </p>
                            </div> <a class="btn-readmore"
                                href="{{route('home.blog-detail',$value->url)}}">Weiterlesen</a>
                        </div>
                    </div>
                </div><!-- /.article-layout -->

                @empty

                @endforelse

                {{-- <div class="article-layout article-list col-xs-12">
                    <div class="content-bg">
                        <div class="article-image">
                            <a href="/blog-detail"><img src="{{asset('/assets/client2/images/blog/b8-420x300.jpg')}}"
                alt="Chignon knot ponytail" title="Chignon knot ponytail" class="img-responsive" />
                </a>
            </div>
            <div class="article_dt">
                <div class="article-name">
                    <h2><a href="/blog-detail">Chignon knot ponytail</a></h2>
                </div>
                <div class="time-stamp"> Monday, Dec 22, 2014 </div>
                <div class="article-title">
                    <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out.
                        Rings leather tote playsuit crop button up So-Cal Maison Martin Margiela center part
                        la marinière. Shoe print plaited knot ponytail vintage luxe chambray lilac black.
                    </p>
                </div> <a class="btn-readmore" href="/blog-detail">Weiterlesen</a>
            </div>
        </div>
    </div><!-- /.article-layout -->
    <div class="article-layout article-list col-xs-12">
        <div class="content-bg">
            <div class="article-image">
                <a href="/blog-detail"><img src="{{asset('/assets/client2/images/blog/b5-420x300.jpg')}}"
                        alt="Clutch leather tote tucked" title="Clutch leather tote tucked" class="img-responsive" />
                </a>
            </div>
            <div class="article_dt">
                <div class="article-name">
                    <h2><a href="/blog-detail">Clutch leather tote tucked</a></h2>
                </div>
                <div class="time-stamp"> Monday, Dec 22, 2014 </div>
                <div class="article-title">
                    <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out.
                        Rings leather tote playsuit crop button up So-Cal Maison Martin Margiela center part
                        la marinière. Shoe print plaited knot ponytail vintage luxe chambray lilac black.
                    </p>
                </div> <a class="btn-readmore" href="/blog-detail">Weiterlesen</a>
            </div>
        </div>
    </div><!-- /.article-layout -->
    <div class="article-layout article-list col-xs-12">
        <div class="content-bg">
            <div class="article-image">
                <a href="/blog-detail"><img src="{{asset('/assets/client2/images/blog/b1-420x300.jpg')}}"
                        alt="Givenchy playsuit" title="Givenchy playsuit" class="img-responsive" />
                </a>
            </div>
            <div class="article_dt">
                <div class="article-name">
                    <h2><a href="/blog-detail">Givenchy playsuit</a></h2>
                </div>
                <div class="time-stamp"> Wednesday, Dec 31, 2014 </div>
                <div class="article-title">
                    <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out.
                        Rings leather tote playsuit crop button up So-Cal Maison Martin Margiela center part
                        la marinière. Shoe print plaited knot ponytail vintage luxe chambray lilac black.
                    </p>
                </div> <a class="btn-readmore" href="/blog-detail">Weiterlesen</a>
            </div>
        </div>
    </div><!-- /.article-layout -->
    <div class="article-layout article-list col-xs-12">
        <div class="content-bg">
            <div class="article-image">
                <a href="/blog-detail"><img src="{{asset('/assets/client2/images/blog/b6-420x300.jpg')}}"
                        alt="Indigo skirt skirt braid vintage" title="Indigo skirt skirt braid vintage"
                        class="img-responsive" />
                </a>
            </div>
            <div class="article_dt">
                <div class="article-name">
                    <h2><a href="/blog-detail">Indigo skirt skirt braid vintage</a></h2>
                </div>
                <div class="time-stamp"> Wednesday, Dec 31, 2014 </div>
                <div class="article-title">
                    <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out.
                        Rings leather tote playsuit crop button up So-Cal Maison Martin Margiela center part
                        la marinière. Shoe print plaited knot ponytail vintage luxe chambray lilac black.
                    </p>
                </div> <a class="btn-readmore" href="/blog-detail">Weiterlesen</a>
            </div>
        </div>
    </div><!-- /.article-layout -->
    <div class="article-layout article-list col-xs-12">
        <div class="content-bg">
            <div class="article-image">
                <a href="/blog-detail"><img src="{{asset('/assets/client2/images/blog/b5-420x300.jpg')}}"
                        alt="Indigo skirt skirt braid vintage" title="Indigo skirt skirt braid vintage"
                        class="img-responsive" />
                </a>
            </div>
            <div class="article_dt">
                <div class="article-name">
                    <h2><a href="/blog-detail">Indigo skirt skirt braid vintage</a></h2>
                </div>
                <div class="time-stamp"> Wednesday, Dec 31, 2014 </div>
                <div class="article-title">
                    <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out.
                        Rings leather tote playsuit crop button up So-Cal Maison Martin Margiela center part
                        la marinière. Shoe print plaited knot ponytail vintage luxe chambray lilac black.
                    </p>
                </div> <a class="btn-readmore" href="/blog-detail">Weiterlesen</a>
            </div>
        </div>
    </div><!-- /.article-layout -->
    <div class="article-layout article-list col-xs-12">
        <div class="content-bg">
            <div class="article-image">
                <a href="/blog-detail"><img src="{{asset('/assets/client2/images/blog/b2-420x300.jpg')}}"
                        alt="Indigo skirt skirt braid vintage" title="Indigo skirt skirt braid vintage"
                        class="img-responsive" />
                </a>
            </div>
            <div class="article_dt">
                <div class="article-name">
                    <h2><a href="/blog-detail">Indigo skirt skirt braid vintage</a></h2>
                </div>
                <div class="time-stamp"> Wednesday, Dec 31, 2014 </div>
                <div class="article-title">
                    <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out.
                        Rings leather tote playsuit crop button up So-Cal Maison Martin Margiela center part
                        la marinière. Shoe print plaited knot ponytail vintage luxe chambray lilac black.
                    </p>
                </div> <a class="btn-readmore" href="/blog-detail">Weiterlesen</a>
            </div>
        </div>
    </div><!-- /.article-layout -->
    <div class="article-layout article-list col-xs-12">
        <div class="content-bg">
            <div class="article-image">
                <a href="/blog-detail"><img src="{{asset('/assets/client2/images/blog/b1-420x300.jpg')}}"
                        alt="Indigo skirt skirt braid vintage" title="Indigo skirt skirt braid vintage"
                        class="img-responsive" />
                </a>
            </div>
            <div class="article_dt">
                <div class="article-name">
                    <h2><a href="/blog-detail">Indigo skirt skirt braid vintage</a></h2>
                </div>
                <div class="time-stamp"> Wednesday, Dec 31, 2014 </div>
                <div class="article-title">
                    <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out.
                        Rings leather tote playsuit crop button up So-Cal Maison Martin Margiela center part
                        la marinière. Shoe print plaited knot ponytail vintage luxe chambray lilac black.
                    </p>
                </div> <a class="btn-readmore" href="/blog-detail">Weiterlesen</a>
            </div>
        </div>
    </div><!-- /.article-layout -->
    <div class="article-layout article-list col-xs-12">
        <div class="content-bg">
            <div class="article-image">
                <a href="/blog-detail"><img src="{{asset('/assets/client2/images/blog/b6-420x300.jpg')}}"
                        alt="Indigo skirt skirt braid vintage" title="Indigo skirt skirt braid vintage"
                        class="img-responsive" />
                </a>
            </div>
            <div class="article_dt">
                <div class="article-name">
                    <h2><a href="/blog-detail">Indigo skirt skirt braid vintage</a></h2>
                </div>
                <div class="time-stamp"> Wednesday, Dec 31, 2014 </div>
                <div class="article-title">
                    <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out.
                        Rings leather tote playsuit crop button up So-Cal Maison Martin Margiela center part
                        la marinière. Shoe print plaited knot ponytail vintage luxe chambray lilac black.
                    </p>
                </div> <a class="btn-readmore" href="/blog-detail">Weiterlesen</a>
            </div>
        </div>
    </div><!-- /.article-layout --> --}}
</div><!-- /.row -->
<div class="result-pagination blog-pagination">
    {{-- <div class="results pull-left">Showing 1 to 5 of 7 (2 Pages)</div>
                <div class="links">
                    <ul class="pagination">
                        <li class="active"><span>1</span>
                        </li>
                        <li><a href="#page=2">2</a>
                        </li>
                        <li><a href="#page=2">&gt;</a>
                        </li>
                        <li><a href="#page=2">&gt;|</a>
                        </li>
                    </ul>
                </div> --}}
    {{ $blogs->links() }}
</div><!-- /.result-pagination -->
</div><!-- /#content -->
</div><!-- /.row -->
</div><!-- /.container -->

@endsection

@section('scripts')
<script>
jQuery(document).ready(function() {
    /* View Mode */
    // Article List
    $('#list-view').on('click', function() {
        $('#content .article-layout').attr('class', 'article-layout article-list col-xs-12');
        localStorage.setItem('display', 'list');
    });
    // Article Grid
    $('#grid-view').on('click', function() {
        // What a shame bootstrap does not take into account dynamically loaded columns
        cols = $('#column-right, #column-left').length;
        if (cols == 2) {
            $('#content .article-layout').attr('class',
                'article-layout article-grid col-md-6 col-xs-12');
        } else if (cols == 1) {
            $('#content .article-layout').attr('class',
                'article-layout article-grid col-md-4 col-sm-6 col-xs-12');
        } else {
            $('#content .article-layout').attr('class',
                'article-layout article-grid col-md-3 col-sm-4 col-xs-12');
        }
        localStorage.setItem('display', 'grid');
    });
    if (localStorage.getItem('display') == 'list') {
        $('#list-view').trigger('click');
    } else {
        $('#grid-view').trigger('click');
    }
});
</script>
@endsection