<!DOCTYPE html>
<html dir="ltr" lang="en-US" ng-app="app">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Bootstrap 3 Website Template" />

    <!-- Stylesheets
    ============================================= -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
	<link href="http://fonts.googleapis.com/css?family=PT+Sans:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="/js/plugins/validation/validate.css" type="text/css" />

    <link rel="stylesheet" href="/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
    	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/plugins/validation/jquery.validate.js"></script>
	<script type="text/javascript" src="/js/underscore.js"></script>
	<script type="text/javascript" src="/js/plugins.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="/include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="/include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- ANGULAR -->
    <script type="text/javascript" src="/js/plugins/angular/angular.js"></script>
    <script type="text/javascript" src="/js/plugins/ui-bootstrap-tpls-0.11.0.min.js"></script>
    <script type="text/javascript" src="/js/plugins/angular-pagination/dirPagination.js"></script>
    <script type="text/javascript" src="/js/plugins/angular/angular.sanitize.js"></script>
    <script type="text/javascript" src="/js/plugins/angular/config.angular.js"></script>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="/include/rs-plugin/css/settings.css" media="screen" />

    <script>
        var BASE_URL = "<?php echo url(); ?>";
    </script>
    <!-- Document Title
    ============================================= -->
	<title>UpEventos</title>

    <style>

        .revo-slider-emphasis-text {
            font-size: 70px;
            font-weight: 700;
            letter-spacing: 0px;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 26px;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 30px;
            font-weight: 400;
        }

		.tparrows.preview2 .tp-arr-titleholder {
			text-transform: uppercase;
			font-weight:bold;
		}

    </style>

</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="/" class="standard-logo" data-dark-logo="images/logo/logo-dark.png"><img src="/images/logo/logo.png" alt="Chocolat Logo"></a>
                        <a href="/" class="retina-logo" data-dark-logo="images/logo/logo-dark-large.png"><img src="/images/logo/logo-large.png" alt="Chocolat Logo"></a>                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">

                        <ul class="">
                            <li class="current"><a href="/#"><div>Home</div></a>
                                {{--<ul>--}}
                                    {{--<li><a href="/#"><div>Light</div></a>--}}
                                        {{--<ul>--}}
                                    		{{--<li><a href="/index.html"><div>Home 1</div></a></li>--}}
                                    		{{--<li><a href="/index-3.html"><div>Home 2</div></a></li>--}}
                                    		{{--<li><a href="/index-5.html"><div>Home 3</div></a></li>--}}
                                    		{{--<li><a href="/index-7.html"><div>Home 4</div></a></li>--}}
                                    		{{--<li><a href="/index-9.html"><div>Home 5</div></a></li>--}}
                                            {{--<li><a href="/index-11.html"><div>Home 6</div></a></li>--}}
                                         {{--</ul>--}}
                                     {{--</li>--}}
                                    {{--<li><a href="/#"><div>Dark</div></a>--}}
                                        {{--<ul>--}}
                                    		{{--<li><a href="/index-2.html"><div>Home 1</div></a></li>--}}
                                    		{{--<li><a href="/index-4.html"><div>Home 2</div></a></li>--}}
                                    		{{--<li><a href="/index-6.html"><div>Home 3</div></a></li>--}}
                                    		{{--<li><a href="/index-8.html"><div>Home 4</div></a></li>--}}
                                    		{{--<li><a href="/index-10.html"><div>Home 5</div></a></li>--}}
                                            {{--<li><a href="/index-12.html"><div>Home 6</div></a></li>--}}
                                         {{--</ul>--}}
                                     {{--</li>--}}
                                {{--</ul>--}}
                            </li>
                            <li><a href="/#"><div>Eventos</div></a>
                                {{--<ul>--}}
                                    {{--<li><a href="/#"><div>Sliders</div></a>--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="/slider-revolution.html"><div>Revolution Slider</div></a></li>--}}
                                            {{--<li><a href="/slider-chocolat.html"><div>Chocolat Slider</div></a></li>--}}
                                            {{--<li><a href="/slider-flex.html"><div>Flex Slider</div></a></li>--}}
                                            {{--<li><a href="/slider-video.html"><div>Video Slider</div></a></li>--}}
                                            {{--<li><a href="/slider-grid.html"><div>Grid Slider</div></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="/#"><div>Portfolios</div></a>--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="/portfolio-1.html"><div>Portoflio 1</div></a></li>--}}
                                            {{--<li><a href="/portfolio-2.html"><div>Portfolio 2</div></a></li>--}}
                                            {{--<li><a href="/portfolio-3.html"><div>Portfolio 3</div></a></li>--}}
                                            {{--<li><a href="/portfolio-single-1.html"><div>Portfolio Single 1</div></a></li>--}}
                                            {{--<li><a href="/portfolio-single-2.html"><div>Portfolio Single 2</div></a></li>--}}
                                            {{--<li><a href="/portfolio-single-video.html"><div>Portfolio Single Video</div></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="/#"><div>Blog</div></a>--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="/blog.html"><div>Blog</div></a></li>--}}
                                            {{--<li><a href="/blog-full-width.html"><div>Blog Full Width</div></a></li>--}}
                                            {{--<li><a href="/blog-masonry-2-left-sidebar.html"><div>Blog Masonry Left Sidebar</div></a></li>--}}
                                            {{--<li><a href="/blog-masonry-2-right-sidebar.html"><div>Blog Masonry Right Sidebar</div></a></li>--}}
                                            {{--<li><a href="/blog-single.html"><div>Blog Single</div></a></li>--}}
                                            {{--<li><a href="/blog-single-disqus.html"><div>Blog Single Disqus Comments</div></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="/#"><div>Headings</div></a>--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="/page-1.html"><div>Heading 1</div></a></li>--}}
                                            {{--<li><a href="/page-2.html"><div>Heading 2</div></a></li>--}}
                                            {{--<li><a href="/page-3.html"><div>Heading 3</div></a></li>--}}
                                            {{--<li><a href="/page-4.html"><div>Heading 4</div></a></li>--}}
                                            {{--<li><a href="/page-5.html"><div>Heading 5</div></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="/#"><div>Events</div></a>--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="/events-list.html"><div>Events List</div></a></li>--}}
                                            {{--<li><a href="/events-list-parallax.html"><div>Events Parallax</div></a></li>--}}
                                            {{--<li><a href="/events-single.html"><div>Events Single</div></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="/sub-page-dark.html"><div>Sub Page Dark</div></a></li>--}}
                                    {{--<li><a href="/faqs.html"><div>FAQs</div></a></li>--}}
                                    {{--<li><a href="/404.html"><div>404</div></a></li>--}}
                                    {{--<li><a href="/coming-soon.html"><div>Coming Soon</div></a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li><a href="/suppliers/all-suppliers"><div>Fornecedores</div></a>
                                {{--<ul>--}}
                                    {{--<li><a href="/portfolio-1.html"><div>Portfolio 1</div></a></li>--}}
                                    {{--<li><a href="/portfolio-2.html"><div>Portfolio 2</div></a></li>--}}
                                    {{--<li><a href="/portfolio-3.html"><div>Portfolio 3</div></a></li>--}}
                                    {{--<li><a href="/portfolio-single-1.html"><div>Portfolio Single 1</div></a></li>--}}
                                    {{--<li><a href="/portfolio-single-2.html"><div>Portfolio Single 2</div></a></li>--}}
                                    {{--<li><a href="/portfolio-single-video.html"><div>Portfolio Single Video</div></a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li><a href="/#"><div>O que é a UPEvento</div></a>
                                {{--<ul>--}}
                                	{{--<li><a href="/blog.html"><div>Blog</div></a></li>--}}
                                	{{--<li><a href="/blog-full-width.html"><div>Blog Full Width</div></a></li>--}}
                            		{{--<li><a href="/blog-masonry-2-left-sidebar.html"><div>Blog Masonry Left Sidebar</div></a></li>--}}
                                	{{--<li><a href="/blog-masonry-2-right-sidebar.html"><div>Blog Masonry Right Sidebar</div></a></li>--}}
                                	{{--<li><a href="/blog-single.html"><div>Blog Single</div></a></li>--}}
                                	{{--<li><a href="/blog-single-disqus.html"><div>Blog Single Disqus Comments</div></a></li>--}}
                                {{--</ul>--}}
                            </li>
                            {{--<li class="mega-menu"><a href="/#"><div>Menu</div></a>--}}
                                {{--<div class="mega-menu-content style-2 col-5 clearfix">--}}
                                    {{--<ul>--}}
                                        {{--<li class="mega-menu-title"><a href="/#"><div>Appetizers</div></a>--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="/menu-item.html"><div>Calamari</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Barbacued Shrimp</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Crabtini</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Shrimp Remoulade</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Stuffed Mushrooms</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Seared Ahi Tuna</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Sizzlin Blue Crab Cakes</div></a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--<ul>--}}
                                        {{--<li class="mega-menu-title"><a href="/#"><div>Salads &amp; Soups</div></a>--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="/menu-item.html"><div>Sliced Tomato &amp; Onion</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Steak House Salad</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Ceasar</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Chop Salad</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Harvest Salad</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Lettice Wedge</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Lobster Bisque</div></a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--<ul>--}}
                                        {{--<li class="mega-menu-title"><a href="/#"><div>Sides</div></a>--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="/menu-item.html"><div>Sauteed Mushrooms</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Tempura Onion Rings</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Broiled Tomatoes</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Spinach au Gratin</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Broccoli au Gratin</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Baked Potato</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Fresh Asparagus</div></a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--<ul>--}}
                                        {{--<li class="mega-menu-title"><a href="/#"><div>Specialty Entrees</div></a>--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="/menu-item.html"><div>Barbecued Shrimp</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Petite Filet &amp; Shrimp</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Lamb Chops</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Stuffed Chicken Breast</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Fresh Lobster</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Caribbean Lobster Tail</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Ribeye</div></a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--<ul>--}}
                                        {{--<li class="mega-menu-title"><a href="/#"><div>Desserts</div></a>--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="/menu-item.html"><div>Caramelized Cream Pie</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Cheesecake</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Bread Pudding</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Chocolate Sin Cake</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Creme Brulee</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Berries with Sweet Cream</div></a></li>--}}
                                                {{--<li><a href="/menu-item.html"><div>Ice Cream or Sorbet</div></a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            <li><a href="/contact"><div>Contato</div></a>
                                {{--<ul>--}}
                                	{{--<li><a href="/contact-1.html"><div>Contact 1</div></a></li>--}}
                                	{{--<li><a href="/contact-2.html"><div>Contact 2</div></a></li>--}}
                                {{--</ul>--}}
                            </li>
                            @if (Auth::guest())
                                <li><a href="/auth/register"><div>Cadastre-se</div></a>
                                <li><a href="/auth/login"><div>Login</div></a>
                            </li>
                            @else
                            <li><a href="/#"><div>{{Auth::user()->name}}</div></a>
                            <ul>
                                <li><a href="/suppliers/form"><div>Cadastrar empresa</div></a></li>
                                <li><a href="/suppliers"><div>Listar minhas empresas</div></a></li>
                                <li><a href="/products/form"><div>Cadastrar produto/serviço</div></a></li>
                                <li><a href="/products"><div>Listar meus produtos/serviços</div></a></li>
                                <li><a href="/auth/logout"><div>Sair</div></a></li>
                            </ul>
                            @endif
                        </ul>
                    </nav><!-- #primary-menu end -->
                </div>

          </div>

        </header><!-- #header end -->

        @if (isset($showSlides) && $showSlides)
            @include('layouts.slider')
        @endif

        <!-- Content
        ============================================= -->
        <section id="content bgcolor-grey-light">
            @yield('content')
        </section><!-- #content end -->

        <!-- Footer
        ============================================= -->
        @include('layouts.footer')

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="/js/functions.js"></script>
    <script type="text/javascript" src="/js/plugins/mask/jquery.maskmoney.js"></script>
    <script type="text/javascript" src="/js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="/js/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/js/plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js"></script>
    <script type="text/javascript" src="/js/plugins/momentjs/jquery.moment.js"></script>
    <script type="text/javascript" src="/js/util.js"></script>
    <script type="text/javascript" src="/js/laravel-util.js"></script>

</body>
</html>

