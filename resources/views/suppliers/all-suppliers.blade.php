@extends('layouts.layout')
@section('content')
 <!-- Page Title
        ============================================= -->
        <section id="page-title" class="page-title-parallax page-title-dark" style="height:127px ; background: url('/images/site/supplier.jpg'); padding: 35px 0px;" data-stellar-background-ratio="0.3">

            <div class="container clearfix">
                <h1>Fornecedores</h1>
                <span>Encontre o fornecedor ideal pra você</span>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Fornecedores</li>
                </ol>
            </div>

      	</section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap bgcolor-grey-light">

                <div class="container clearfix">

                    <div class="postcontent nobottommargin">

                        <div id="posts" class="events small-thumbs">
                            @foreach($data as $vo)
                                @if (!$vo->deleted_at)
                                <div class="entry clearfix">
                                    <div class="entry-image">
                                        <a href="#">
                                            <img src="{{ $vo->brand_image != "" ?
                                                                        '/uploads/brands/'.$vo->brand_image : 'http://placehold.it/400x300' }}" alt="..." width="100px" >
                                            {{--<div class="entry-date">08<span>Jan</span></div>--}}
                                        </a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h2><a href="#">{{$vo->fantasy_name}}</a></h2>
                                        </div>
                                        <ul class="entry-meta clearfix">
                                            <li><a href="#">{{implode('-',$vo->categories())}}</li>
                                            <li><a href="#"><i class="icon-map-marker2"></i> {{$vo->city}},{{$vo->state}}</a></li>
                                        </ul>
                                        <div class="entry-content">
                                            @foreach($vo->products as $product)
                                                <p>{{str_limit($product->description, 70)}}</p>
                                            @endforeach
                                            <a href="/suppliers/detail/{{$vo->id}}" class="btn button-light button-small">Entrar</a> <a href="#" class="btn button button-small">Contato</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach

                        </div>

                        <!-- Pagination
                        ============================================= -->
                        {{--<ul class="pager nomargin">--}}
                            {{--<li class="previous"><a href="#">&larr; Older</a></li>--}}
                            {{--<li class="next"><a href="#">Newer &rarr;</a></li>--}}
                        {{--</ul><!-- .pager end -->--}}
                        <div class="row center">
                                {!! $data->render() !!}
                            </div>

                    </div>

                    <div class="sidebar nobottommargin col_last clearfix">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget clearfix">

                                <h4>Top 5</h4>
                                <div id="post-list-footer">

                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">NYC Restaurant Week</a></h4>
                                                <p class="nobottommargin">Lorem ipsum dolor sit amet consectetur adipis...</p>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>17th Dec 2015</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Kids Food Fest</a></h4>
                                                <p class="nobottommargin">Lorem ipsum dolor sit amet consectetur adipis...</p>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>8th June 2015</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Taste of the Old World</a></h4>
                                                <p class="nobottommargin">Lorem ipsum dolor sit amet consectetur adipis...</p>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>22nd Sept 2015</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="widget clearfix">

                                <h4>Media Gallery</h4>
                                <div id="oc-portfolio-sidebar" class="owl-carousel portfolio-5">

                                    <div class="oc-item">
                                        <div class="iportfolio">
                                            <div class="portfolio-image">
                                                <a href="#">
                                                    <img src="http://placehold.it/400x300" alt="">
                                                </a>
                                                <div class="portfolio-overlay">
                                                    <a href="http://vimeo.com/16270111" class="center-icon" data-lightbox="iframe"><i class="icon-play"></i></a>
                                                </div>
                                            </div>
                                            <div class="portfolio-desc center nobottompadding">
                                                <h3><a href="portfolio-single-video.html">Specialties</a></h3>
                                                <span><a href="#">Wines, Beer</a></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="oc-item">
                                        <div class="iportfolio">
                                            <div class="portfolio-image">
                                                <a href="portfolio-single.html">
                                                    <img src="http://placehold.it/400x300" alt="">
                                                </a>
                                                <div class="portfolio-overlay">
                                                    <a href="http://placehold.it/1000x667" class="center-icon" data-lightbox="image"><i class="icon-picture"></i></a>
                                                </div>
                                            </div>
                                            <div class="portfolio-desc center nobottompadding">
                                                <h3><a href="portfolio-single.html">Gatronomy</a></h3>
                                                <span><a href="#">Soups, Salads</a></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <script type="text/javascript">

                                    jQuery(document).ready(function($) {

                                        var ocClients = $("#oc-portfolio-sidebar");

                                        ocClients.owlCarousel({
                                            items: 1,
                                            margin: 10,
                                            loop: true,
                                            nav: false,
                                            autoplay: true,
                                            dots: true,
                                            autoplayHoverPause: true
                                        });

                                    });

                                </script>

                            </div>

                            <div class="widget quick-contact-widget clearfix">

                                <h4>Quick Contact</h4>
                                <div id="quick-contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>
                                <form id="quick-contact-form" name="quick-contact-form" action="include/quickcontact.php" method="post" class="quick-contact-form nobottommargin">
                                    <div class="form-process"></div>

                                    <input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />
                                    <input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />
                                    <textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Message"></textarea>
                                    <input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
                                    <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="btn button button-small nomargin" value="submit">Send Email</button>
                                </form>

                                <script type="text/javascript">

                                    $("#quick-contact-form").validate({
                                        submitHandler: function(form) {
                                            $(form).find('.form-process').fadeIn();
                                            $(form).ajaxSubmit({
                                                target: '#quick-contact-form-result',
                                                success: function() {
                                                    $(form).find('.form-process').fadeOut();
                                                    $(form).find('.sm-form-control').val('');
                                                    $('#quick-contact-form-result').attr('data-notify-msg', $('#quick-contact-form-result').html()).html('');
                                                    IGNITE.widget.notifications($('#quick-contact-form-result'));
                                                }
                                            });
                                        }
                                    });

                                </script>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- #content end -->
@stop