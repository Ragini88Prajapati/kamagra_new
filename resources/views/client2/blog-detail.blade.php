@php
use App\BlogReview;
    
@endphp
@extends('layouts.client2')

@section('content')

<div class="bt-breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="{{route('home.index')}}"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="{{route('home.blog')}}">Blog</a>
                </li>
                <li><a href="javascript:void(0);">{{$blog->title}}</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- /.bt-breadcrumb -->
<div class="container">
    <div class="row">

        <div id="content" class="col-sm-12">
            <div class="boss_article-item boss_article-detail blog-detail-div">
                <div class="content_bg">
                    <div class="article-title"> <img src="{{asset('/assets/images/blogs/').'/'.$blog->image_name}}"
                            alt="Braid slipper dress dungaree " title="Braid slipper dress dungaree " />
                        <h1 class="article-title-boss">{{$blog->title}}</h1>
                        <div class="date-post">
                            <small class="time-stamp time-article">{{date('l, M d, Y', strtotime($blog->date))}} </small>
                            @php
                                $reviews=BlogReview::where('blog_id',$blog->id)->get()->count();
                            @endphp
                            <span class="comment-count"><span>{{$reviews}}</span> comment(s)</span>
                        </div>
                    </div>
                    <div class="article-content">
                        {{-- <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out. Rings
                            leather tote playsuit crop button up So-Cal Maison Martin Margiela center part la marinière.
                            Shoe print plaited knot ponytail vintage luxe chambray lilac black.</p>
                        <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano washed out. Rings
                            leather tote playsuit crop button up So-Cal Maison Martin Margiela center part la marinière.
                            Statement chunky sole cotton texture boots pastel navy blue Paris sneaker. Shoe print
                            plaited knot ponytail vintage luxe chambray lilac black.&nbsp; Dove grey cami metallic
                            bomber gold collar midi vintage Levi slipper minimal. Relaxed sandal Saint Laurent slip
                            dress bandeau Jil Sander Vasari Hermès. Denim shorts cuff skirt Lanvin braid seam leggings.
                            Tortoise-shell sunglasses silhouette round sunglasses razor pleats chignon tee grunge.
                            Plaited knitwear collarless denim Céline relaxed silhouette denim shorts. Lanvin floral
                            slipper cuff Furla. Chunky sole ecru A.P.C. oversized sweatshirt rings loafer leggings skirt
                            Hermès. Minimal Givenchy holographic ribbed seam crop Acne.</p>
                        <p>Texture sandal center part braid maxi powder blue. Pastel clutch Paris vintage chignon
                            metallic sneaker flats skinny jeans vintage Levi. Maison Martin Margiela shoe print razor
                            pleats dress Jil Sander Vasari cotton cami. Oxford leather envelope clutch navy blue round
                            sunglasses Cara D. slip dress. 90s bomber statement black button up spearmint gold collar
                            tucked t-shirt sports luxe tortoise-shell sunglasses. Tee bandeau Saint Laurent luxe street
                            style playsuit Prada Saffiano skort. Midi strong eyebrows white dungaree lilac chambray
                            white shirt. Cashmere washed out boots cable knit indigo dove grey grunge So-Cal.</p>
                        <p>Pastel spearmint holographic A.P.C. Hermès collarless washed out. Tee denim shorts collarless
                            chunky sole Jil Sander Vasari chambray skort. Maison Martin Margiela washed out clutch
                            cashmere Hermès playsuit. Cami sneaker dungaree grunge 90s shoe leggings skirt oversized
                            sweatshirt. Silhouette round sunglasses strong eyebrows neutral slip dress flats crop button
                            up skort Lanvin. Hermès braid center part vintage Levi chunky sole cashmere indigo white
                            shirt sports luxe. Cuff playsuit Furla denim shorts razor pleats dove grey tee grunge.
                            Sandal black relaxed Paris knitwear bomber. Clutch slipper maxi loafer Acne. Street style
                            dungaree oversized sweatshirt gold collar chambray metallic 90s collarless. Leather sneaker
                            ribbed Céline chignon boots luxe. Skinny jeans Saint Laurent statement cami tucked t-shirt
                            Jil Sander Vasari print So-Cal. ports luxe relaxed flats black Cara D. denim shorts. Paris
                            skirt sandal oversized sweatshirt envelope clutch center part. Gold collar knot ponytail
                            grunge lilac vintage boots cotton leggings braid cashmere.</p> --}}
                            <?php
                                echo $blog->description;
                            ?>
                    </div>
                    {{-- <div class="boss_article-action">
                        <div class="tags"><span>Tags: </span>
                            <ul>
                                <li class="item"><a href="#">deserunt</a>
                                </li>
                                <li class="item"><a href="#">moll</a>
                                </li>
                            </ul>
                        </div>
                        <div class="article-share">
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_default_style"><a class="addthis_button_compact">Share</a>
                                <a class="addthis_button_email"></a>
                                <a class="addthis_button_print"></a>
                                <a class="addthis_button_facebook"></a>
                                <a class="addthis_button_twitter"></a>
                            </div>

                            <!-- AddThis Button END -->
                        </div>
                    </div><!-- /.boss_article-action --> --}}
                </div><!-- /.content_bg -->
                <div class="article-related">
                    <h1 class="box-title">Related Articles: ({{$related_blog->count()}})</h1>
                    <div class="carousel-button">
                        <a id="prev_art_related" class="prev nav_thumb" href="javascript:void(0)"
                            style="display:inline-block;" title="prev"><i class="fa fa-angle-left"></i></a>
                        <a id="next_art_related" class="next nav_thumb" href="javascript:void(0)"
                            style="display:inline-block;" title="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="list_carousel responsive">
                        <ul id="article_related" class="content-articles blog-detail-relatedart">
                            @forelse ($related_blog as $value)
                            @php
                                $countData=BlogReview::where('blog_id',$value->id)->get()->count();
                            @endphp
                            <li>
                                <div class="relt-article">
                                    <div class="image">
                                        <a href="{{route('home.blog-detail',$value->url)}}"><img
                                                src="{{asset('/assets/images/blogs/').'/'.$value->image_name}}"
                                                alt="{{ isset($value->title) &&  !empty($value->title) ? $value->title  :  '' }}"
                                                title="{{ isset($value->title) &&  !empty($value->title) ? $value->title  :  '' }}" class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <div class="name"><a href="{{route('home.blog-detail',$value->url)}}">{{ isset($value->title) &&  !empty($value->title) ? $value->title  :  '' }}
                                            </a>
                                        </div>
                                        <div class="date-comments">
                                            <small class="time-stamp">{{date('l, M d, Y', strtotime($value->date))}} </small>
                                            <span class="comment-count"><a href="{{route('home.blog-detail',$value->url)}}">{{$countData}}
                                                    comment(s)</a></span>
                                        </div>
                                        <div class="title">
                                            <p>{{ isset($value->short_description) &&  !empty($value->short_description) ? $value->short_description  :  '' }}</p>
                                        </div> <a class="btn-readmore" href="{{route('home.blog-detail',$value->url)}}">Read More</a>
                                    </div>
                                </div>
                            </li>
                            @empty
                                
                            @endforelse
                            

                            {{-- <li>
                                <div class="relt-article">
                                    <div class="image">
                                        <a href="/blog-detail"><img
                                                src="{{asset('/assets/client2/images/blog/b5-875x625.jpg')}}"
                                                alt="Clutch leather tote tucked" title="Clutch leather tote tucked"
                                                class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <div class="name"><a href="/blog-detail">Clutch leather tote tucked</a>
                                        </div>
                                        <div class="date-comments">
                                            <small class="time-stamp">Dec 22, 2014</small>
                                            <span class="comment-count"><a href="/blog-detail">0
                                                    comment(s)</a></span>
                                        </div>
                                        <div class="title">
                                            <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano
                                                washed out. Rings leather tote playsuit crop button up So-Cal Maison
                                                Martin Margiela center part la marinière. Shoe print plaited knot
                                                ponytail vintage luxe chambray lilac black.</p>
                                        </div> <a class="btn-readmore" href="/blog-detail">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="relt-article">
                                    <div class="image">
                                        <a href="/blog-detail"><img
                                                src="{{asset('/assets/client2/images/blog/b3-875x625.jpg')}}"
                                                alt="Playsuit black razor pleats" title="Playsuit black razor pleats"
                                                class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <div class="name"><a href="/blog-detail">Playsuit black razor pleats</a>
                                        </div>
                                        <div class="date-comments">
                                            <small class="time-stamp">Dec 22, 2014</small>
                                            <span class="comment-count"><a href="/blog-detail">0
                                                    comment(s)</a></span>
                                        </div>
                                        <div class="title">
                                            <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano
                                                washed out. Rings leather tote playsuit crop button up So-Cal Maison
                                                Martin Margiela center part la marinière. Shoe print plaited knot
                                                ponytail vintage luxe chambray lilac black.</p>
                                        </div> <a class="btn-readmore" href="/blog-detail">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="relt-article">
                                    <div class="image">
                                        <a href="/blog-detail"><img
                                                src="{{asset('/assets/client2/images/blog/b1-875x625.jpg')}}"
                                                alt="Givenchy playsuit" title="Givenchy playsuit"
                                                class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <div class="name"><a href="/blog-detail">Givenchy playsuit</a>
                                        </div>
                                        <div class="date-comments">
                                            <small class="time-stamp">Dec 22, 2014</small>
                                            <span class="comment-count"><a href="/blog-detail">0
                                                    comment(s)</a></span>
                                        </div>
                                        <div class="title">
                                            <p>Spearmint ecru denim cashmere clutch holographic indigo Prada Saffiano
                                                washed out. Rings leather tote playsuit crop button up So-Cal Maison
                                                Martin Margiela center part la marinière. Shoe print plaited knot
                                                ponytail vintage luxe chambray lilac black.</p>
                                        </div> <a class="btn-readmore" href="/blog-detail">Read More</a>
                                    </div>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div><!-- /.article-related -->

                <div class="box bt-recent-comments article-related comment-list-div">
                    <div class="box-heading block-title">
                        <h1>Blog Recent Comment</h1>
                    </div>
                    <div class="box-content">
                        <ol>
                            @forelse ($review as $value)
                            
                            <li class="item recent-comment-item">
                                {{-- <div class="user-comment-img">
                                    <img src="{{asset('/assets/client2/images/userpic (1).jpg')}}" alt=" " title="" />
                                </div> --}}
                                <div class="user-comment-content">
                                    <div>
                                        <a class="article-title" href="javascript:void(0);">{{$value->name}}</a>
                                    </div>
                                    <small class="time-stamp">{{date('l, M d, Y', strtotime($value->created_at))}}</small>
                                    <div class="item-content"> {{$value->description}}
                                    </div>
                                    {{-- <span class="comment-by">Admin</span> --}}
                                </div>

                            </li>
                            @empty
                            Sei der erste der kommentiert
                            @endforelse
                            
                            {{-- <li class="item recent-comment-item">
                                <div class="user-comment-img">
                                    <img src="{{asset('/assets/client2/images/userpic (1).jpg')}}" alt=" " title="" />
                                </div>
                                <div class="user-comment-content">
                                    <div>
                                        <a class="article-title" href="/blog-detail">Givenchy playsuit</a>
                                    </div>
                                    <small class="time-stamp">Tuesday, Jan 20, 2015</small>
                                    <div class="item-content">Nullam at semper mauris. Lorem ipsum dolor sit ame...
                                    </div>
                                    <span class="comment-by">Navida</span>
                                </div>

                            </li> --}}

                        </ol>
                    </div>
                </div><!-- /.bt-recent-comments -->
                <div class="row comment_row">
                    <div class="comments">
                        <div id="article-comments"></div>
                        <div class="form-comment-container">
                            <div id="new">
                                <h1>Leave Your Comment </h1>
                            </div>
                            <form action="{{route('home.blog-review-save')}}" id="blog_form" method="post">
                                @csrf
                                <div id="0_comment_box" class="form-comment content_bg">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="field" id="username">
                                            <label class="" for="name">Your Name<em>*</em>
                                            </label>
                                            <div class="input-box">
                                                <input type="text" class="form-control required-entry" value="" title="Name"
                                                    id="name" name="username" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="field" id="email">
                                            <label class="" for="email">Your Email<em>*</em>
                                            </label>
                                            <div class="input-box">
                                                <input type="text" class="form-control required-entry validate-email"
                                                    value="" title="Email" name="email_blog" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-box-comment">
                                            <label class="tt_input" for="comment">Comment<em>*</em>
                                            </label>
                                            <textarea rows="2" cols="10" class="required-entry form-control"
                                                style="height:200px" title="Comment" id="comment"
                                                name="comment_content" required></textarea>
                                        </div>
                                        <div class="submit-button">
                                            <div class="left">
                                                <button type="submit" id="button-comment" class="btn btn-submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="blog_data" value="{{$blog->id}}">
                            </form>
                        </div>
                    </div><!-- /.comments -->
                </div>


            </div><!-- /.boss_article-item -->
            <div class="bt-facecomments">
                <div class="row">
                    <div class="col-sm-12">
                        <!--<div class="fb-comments" data-href="#" data-colorscheme="light" data-numposts="5" data-order-by="reverse_time"></div>-->
                    </div>
                </div>
                <div id="fb-root"></div>
            </div><!-- /.bt-facecomments -->
        </div><!-- /#content -->
    </div><!-- /.row -->
</div><!-- /.container -->

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#blog_form").validate({
            ignore: [],
            rules: {
    
                username: {
                    required: true,
                },
                email_blog: {
                    required: true,
                },
                comment_content: {
                    required: true,
                },
    
    
            },
            messages: {
                username: {
                    required: "Please Insert Name",
                },
                email_blog: {
                    required: "Please Insert Email",
                },
                comment_content: {
                    required: "Please Insert Comment",
                },
    
            }
        });
        $.validator.addMethod("pwcheck",
            function(value, element) {
                return /^[A-Za-z0-9]+$/.test(value);
            });
    });
    </script>
@endsection