@extends('layouts.layout')
@section('content')
<div class="content-wrap">

                <!-- Promo -->
                <div class="promo promo-light promo-full header-stick nobottommargin">
                    <div class="container clearfix">
                        <div class="col-md-10">

                            <h3>Cadastre-se e conheça as melhores empresas para seu evento <span class="color">empresarial</span></h3>
                            <span>Empresas qualificadas para que seu evento seja um sucesso!</span>
                        </div>
                        <div class="col-md-2">
                            <a href="/auth/register" class="button button-light bgcolor-grey-light button-rounded button-reveal button-large button-3d tright"><i class="icon-angle-right"></i><span>Cadastre-se</span></a>
                        </div>
                   </div>
       	  	  	</div><!-- End Promo -->

          		<div class="section bgcolor-grey-light notopmargin noborder nobottommargin">
                    <div class="container clearfix">
                        <div class="col_half nobottommargin center">
                            <a href="/suppliers/form"><img src="/images/site/be_a_supplier.jpg" alt="" data-animate="fadeInUp"></a>
                        </div>
                        <div class="col_half nobottommargin col_last grey">
                            <h3 data-animate="fadeInDown">Cliente</h3>
                            <span data-animate="fadeInUp">Conheça os melhores fornecedores para o seu evento corporativo</span>
                            <hr />
                            <form data-animate="fadeInUp" class="form-validate" role="form" method="POST" action="/auth/login">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="control-label">Login / Seu e-mail cadastrado</label>
                                    <input type="email" class="form-control required email" name="email" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Senha</label>
                                    <input type="password" class="form-control required" name="password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning">Entrar</button>
                                    <a class="btn btn-link" href="/password/email">Esqueceu sua senha?</a> |
                                    <a class="btn btn-link" href="/auth/register">Não tenho cadastro ainda</a>
                                </div>
                            </form>

        {{--<div class="heading-block" style="padding-top: 40px;">--}}
                            {{--</div>--}}
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet est sed tellus gravida tempus--}}
                            {{--quis malesuada nisi. Maecenas posuere tristique ipsum eget.</p>--}}
                            {{--<a href="#" class="button button-rounded button-reveal button-large button-3d topmargin-sm noleftmargin tright"--}}
                            {{--style="color:#FFF"><i class="icon-angle-right"></i><span>Read More</span></a>--}}
                        </div>
                    </div>
           	  </div>

                <!-- Portfolio Script
                ============================================= -->
                <script type="text/javascript">

                    jQuery(window).load(function(){

                        var $container = $('#portfolio');

                        $container.isotope({ transitionDuration: '0.65s' });

                        $(window).resize(function() {
                            $container.isotope('layout');
                        });

                    });

                </script><!-- Portfolio Script End -->

                <div class="clear"></div>

                {{--<a class="button button-light button-full button center tright nobottommargin">--}}
                    {{--<div class="container clearfix">--}}
                        {{--Responsive Bootstrap 3 Compatible Theme with Endless Customization Possibilities. <strong>View Our Gallery</strong>--}}
                        {{--<i class="icon-chevron-right" style="top:2px;"></i>--}}
                    {{--</div>--}}
           	  	{{--</a>--}}

			  	{{--<div class="section parallax notopmargin nobottommargin notopborder dark" style="background-image: url('http://placehold.it/2000x1333');--}}
              {{--padding: 220px 0;" data-stellar-background-ratio="0.3">--}}
                    {{--<div class="container vertical-middle center clearfix">--}}
                        {{--<div class="emphasis-title heading-block">--}}
                            {{--<h3 style="font-size: 36px;" data-animate="fadeInDown">See Our Complete Dinner & Breakfast Menu</h3>--}}
                            {{--<span>Chocolat is a Responsive Bootstrap 3 Compatible Theme with Endless Customization Possibilities</span>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="button button-medium button-reveal button-3d button-rounded tright nomargin" style="color:#FFF" data-animate="fadeInUp"><span>Full Menu</span> <i class="icon-angle-right"></i></a> <a href="#" class="button button-medium button-reveal button-3d button-rounded tright nomargin" style="color:#FFF" data-animate="fadeInUp"><span>Reservations</span> <i class="icon-angle-right"></i></a>--}}
                   {{--</div>--}}
              {{--</div>--}}

			  <div class="section nobottommargin notopmargin nobg">
                <div class="container clearfix">

                    <div class="col_one_fourth nobottommargin">

                        <div class="fancy-title title-border">
                            <h4>Menu de fornecedores</h4>
                        </div>

                        <p>Veja nossa lista de fornecedores cadastrados por categoria.</p>

                            <div class="widget_links clearfix">
                                <ul>
                                    <li><a href="#"><div>Transporte</div></a></li>
                                    <li><a href="#"><div>Locais para eventos</div></a></li>
                                    <li><a href="#"><div>Cerimonialistas</div></a></li>
                                    <li><a href="#"><div>Comunicação</div></a></li>
                                    <li><a href="#"><div>Alimentação</div></a></li>
                                    <li><a href="#"><div>Segurança</div></a></li>
                                    <li><a href="#"><div>Organização do evento</div></a></li>
                                </ul>
                            </div>
                    </div>

                    <div class="col_one_fourth nobottommargin">

                        <div class="fancy-title title-border">
                            <h4>Eventos</h4>
                        </div>

                                <div id="post-list-footer">

                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Lorem ipsum dolor sit amet</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>17th Jan 2015</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Donec sed sem at tellus lobortis</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>17th Jan 2015</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Nullam non ipsum bibendum</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>17th Jan 2015</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Nunc interdum eu tellus in porta</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>17th Jan 2015</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                    </div>

                    <div class="col_half nobottommargin col_last">

                        <div class="fancy-title title-border">
                            <h4>Top 10 - Avaliação dos clientes</h4>
                        </div>

                        <div id="posts">
                            <div class="entry last clearfix">
                                <div class="entry-image clearfix">
                                    <div class="portfolio-single-image masonry-thumbs col-5" data-big="2" data-lightbox="gallery">
                                        @foreach ($topSuppliers as $topSupplier)
                                           <a href="{{ $topSupplier->brand_image != "" ? '/uploads/brands/'.$topSupplier->brand_image :
                                                'http://placehold.it/2000x1333' }}" data-lightbox="gallery-item">
                                                <img class="image_fade" src="{{ $topSupplier->brand_image != ""
                                                ? '/uploads/brands/'.$topSupplier->brand_image : 'http://placehold.it/400x300' }}" alt=""></a>
                                        @endforeach
                                   </div>
                                </div>
                                <div class="entry-title">
                                    <h2><a href="blog-single-thumbs.html">Blog Post with Masonry Thumbnails</a></h2>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> 17th Jan 2015</li>
                                    <li><a href="blog-single-thumbs.html#comments"><i class="icon-comments"></i> 12</a></li>
                                    <li><a href="#"><i class="icon-picture"></i></a></li>
                                </ul>
                                <div class="entry-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac dapibus dolor. Donec varius laoreet nunc quis aliquam. Ut at odio ultrices dolor efficitur condimentum. Quisque lacus nulla, vestibulum et nisl in, cursus egestas nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc sollicitudin lectus felis, sit amet rhoncus mi mollis sed.</p>
                                </div>

                        	<div class="si-share clearfix"><span>Share:</span><div>
                                <a href="#" class="social-icon si-borderless si-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i></a>
                                <a href="#" class="social-icon si-borderless si-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i></a>
                                <a href="#" class="social-icon si-borderless si-pinterest" data-toggle="tooltip" data-placement="top" title="Pinterst">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i></a>
                                <a href="#" class="social-icon si-borderless si-gplus" data-toggle="tooltip" data-placement="top" title="Google Plus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i></a>
                                <a href="#" class="social-icon si-borderless si-rss" data-toggle="tooltip" data-placement="top" title="RSS">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i></a>
                                <a href="#" class="social-icon si-borderless si-email3" data-toggle="tooltip" data-placement="top" title="Email">
                                    <i class="icon-email3"></i>
                                    <i class="icon-email3"></i></a>
                             </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
           	  	</div>

          		<div class="section parallax noborder footer-stick notopmargin" style="background-image: url('/images/site/twitter.jpg');
                padding: 110px 0 110px 0;" data-stellar-background-ratio="0.3">
                    <div class="container clearfix">
                        <div class="col_full nobottommargin">

                        <div id="twitter-scroller" class="fslider testimonial-transparent-light twitter-scroll" data-animation="slide" data-arrows="false">
                            <i class="i-plain i-large color icon-twitter nobottommargin" style="margin-right: 40px;"></i>
                            <div class="flexslider" style="width: auto;">
                                <div class="slider-wrap">
                                    <div class="slide"></div>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">

                            jQuery(document).ready(function($){
                                $.getJSON('include/twitter/tweets.php?username=envato&count=3', function(tweets){
                                    $("#twitter-scroller .slider-wrap").html(sm_format_twitter3(tweets));
                                });
                            });

                        </script>

                        </div>
                    </div>
           	  	</div>

                {{--<div class="promo promo-light promo-full topmargin-lg footer-stick">--}}
                    {{--<div class="container clearfix">--}}
                        {{--<div class="col-md-10">--}}
                            {{--<h3>Call us today @ <span class="color">(341) 457 432678</span> or Email us <span class="color">info@chocolat.com</span></h3>--}}
                            {{--<span>Chocolat is a Responsive Bootstrap 3 Compatible Theme with Endless Customization Possibilities</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-2">--}}
                            {{--<a href="#" class="button button-rounded button-reveal button-large button-3d tright"><i class="icon-angle-right"></i><span>Reservations</span></a>                    </div>--}}
                        {{--</div>--}}
           	  {{--</div>--}}

            </div>
@stop
