@extends('layouts.layout')
@section('content')
 <!-- Page Title
        ============================================= -->
        <section id="page-title" class="page-title-parallax page-title-dark" style="height:127px ; background: url('/images/site/supplier.jpg'); padding: 35px 0px;" data-stellar-background-ratio="0.3">

            <div class="container clearfix">
                <h1>Fornecedor</h1>
                <span>{{$vo->fantasy_name}}</span>
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
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                 <img src="<?php echo $vo->brand_image != "" ?
                                        '/uploads/brands/'.$vo->brand_image : 'http://placehold.it/100x100';?>" alt="..." class="">
                            </div>
                            <div class="col-md-8">
                                {{$vo->fantasy_name}} <br />
                                <i class="icon-location"></i> {{$vo->city}}-{{$vo->state}}
                            </div>
                        </div>
                        <hr />
                        <div class="single-event">
                            <div class="col-md-8">
                                <div class="col_full">
                                    <div class="entry-image nobottommargin">
                                         <div class="fslider" data-arrows="false">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    @foreach($vo->galleries as $gallery)
                                                        <div class="slide"><img src="<?php echo $gallery->name != "" ?
                                                                 '/uploads/galleries/'.md5($vo->id).'/'.$gallery->name : 'http://placehold.it/400x250';?>" alt=""></div>
                                                    @endforeach
                                                    {{--<div class="slide"><img src="http://placehold.it/400x250" alt=""></div>--}}
                                                    {{--<div class="slide"><img src="http://placehold.it/400x250" alt=""></div>--}}
                                                    {{--<div class="slide"><img src="http://placehold.it/400x250" alt=""></div>--}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clear"></div>

                                <div class="col_full">
                                    <h3>{{$vo->fantasy_name}}</h3>
                                    <p>
                                        {{$vo->description}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h4>O que oferecemos</h4>
                                <ul class="list-unstyled">
                                    @foreach($vo->categories() as $category)
                                        <li><a href="#">::</a> {{$category}}</li>
                                    @endforeach
                                </ul><!-- #portfolio-filter end -->
                                <h4>Nossos contatos</h4>
                                <p>
                                   <address>
                                     <strong>{{$vo->address}}, {{$vo->number}}</strong><br>
                                     {{$vo->district}}, {{$vo->city}}, {{$vo->state}}<br>
                                     CEP: {{$vo->zip_code}}<br>
                                     <abbr title="Phone">T:</abbr> {{$vo->phone_one}}/{{$vo->phone_two}} <br />
                                     <abbr title="Website">Site:</abbr> <a href="{{$vo->site}}">{{$vo->site}}</a><br />
                                     <abbr title="E-mail">E-mail:</abbr> <a href="mailto:{{$vo->email}}">{{$vo->email}}</a>
                                   </address>
                                </p>
                                <h4>Estamos conectados</h4>
                                <div class=" noborder notoppadding">
                                    <a href="{{$vo->facebook}}" class="social-icon si-light si-small si-facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i></a>
                                    <a href="{{$vo->twitter}}" class="social-icon si-light si-small si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i></a>
                                    <a href="{{$vo->linkedin}}" class="social-icon si-light si-small si-linkedin">
                                        <i class="icon-linkedin"></i>
                                        <i class="icon-linkedin"></i></a>
                                    <a href="{{$vo->youtube}}" class="social-icon si-light si-small si-youtube">
                                        <i class="icon-youtube"></i>
                                        <i class="icon-youtube"></i></a>
                                    <a href="{{$vo->instagram}}" class="social-icon si-light si-small si-instagram">
                                        <i class="icon-instagram"></i>
                                        <i class="icon-instagram"></i></a>
                                    <a href="mailto:{{$vo->email}}" class="social-icon si-light si-small si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget clearfix">

                                <h4>Conheça outras empresas</h4>
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
                            <div class="widget quick-contact-widget clearfix">
                                    <h4>Entrar em contato</h4>
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