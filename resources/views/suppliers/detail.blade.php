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
            <div class="content-wrap ">
                <div class="container clearfix">
                    <div class="row bgcolor bgcolor-grey-light" style="padding:10px 0px !important;">
                        <div class="col-md-2">
                             <img src="<?php echo $vo->brand_image != "" ?
                                    '/uploads/brands/'.$vo->brand_image : 'http://placehold.it/150x150';?>" alt="..." class="" height="150px">
                        </div>
                        <div class="col-md-8">
                            <h3>{{$vo->fantasy_name}}</h3>
                            <?php echo generate_stars(5, $vo->grade, $vo->rating_quantity) . '<br />'; ?>
                            <i class="icon-map-marker" style="color:#EAAF22;"></i> {{$vo->city}}, {{$vo->state}}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
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
                                        <p>
                                            {{$vo->description}}
                                        </p>
                                        <hr />
                                         <div class="col-md-6">
                                            <h4>Nossos contatos</h4>
                                           <address>
                                             <strong>{{$vo->address}}, {{$vo->number}}</strong><br>
                                             {{$vo->district}}, {{$vo->city}}, {{$vo->state}}<br>
                                             CEP: {{$vo->zip_code}}<br>
                                             <abbr title="Phone">T:</abbr> {{$vo->phone_one}}/{{$vo->phone_two}} <br />
                                             <abbr title="Website">Site:</abbr> <a href="{{$vo->site}}">{{$vo->site}}</a><br />
                                             <abbr title="E-mail">E-mail:</abbr> <a href="mailto:{{$vo->email}}">{{$vo->email}}</a>
                                           </address>
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

                                            <div>
                                                <a href="/ratings/form/0/{{$vo->id}}" class="btn btn-warning">Avalie essa empresa</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="widget quick-contact-widget clearfix">
                                                <h4>Entrar em contato</h4>
                                                <div id="quick-contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>
                                                <form id="quick-contact-form" name="quick-contact-form" action="/suppliers/contact" method="post" class="quick-contact-form nobottommargin">
                                                    <div class="form-process"></div>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{$vo->id}}">
                                                    <input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="name" value="" placeholder="Nome completo" />
                                                    <input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="email" value="" placeholder="Seu e-mail" />
                                                    <textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="message" rows="4" cols="30" placeholder="Messagem"></textarea>
                                                    <input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
                                                    <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="btn button button-small nomargin" value="submit">Enviar e-mail</button>
                                                </form>

                                                <script type="text/javascript">
                                                    // TODO: Desenvolver o envio do contato ao fornecedor
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
                            <hr />
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 20px;">
                                    <strong>{{$vo->rating_quantity}} já avaliaram essa empresa</strong>
                                </div>
                                @foreach(array_reverse($starsRatingResume) as $ratingResume)
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <?php echo generate_stars(5, $ratingResume->stars); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="progress">
                                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{$ratingResume->quantity}}"
                                              aria-valuemin="0" aria-valuemax="{{$vo->rating_quantity}}" style="width: {{$ratingResume->quantity}}%">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 20px;">
                                    <strong>Todas as avaliações são feitas por usuários.</strong>
                                </div>
                                @include('ratings.ratings', array('ratings' => $vo->ratings, 'starsRatingResume' => $starsRatingResume))
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sidebar-widgets-wrap">
                                    @if (count($vo->products) > 1)
                                         <div class="widget clearfix">
                                            <h4>O que oferecemos</h4>
                                            <div id="post-list-footer">
                                                @foreach($vo->products as $product)
                                                    <hr />
                                                    <div class="spost clearfix">
                                                    @if ($product->subCategory)
                                                        <a href="/products/detail/{{$product->id}}" class="nobg">
                                                        <div class="entry-image">
                                                            <img src="<?php echo $product->subCategory->image != "" ?
                                                                  '/uploads/categories/'.$product->subCategory->image : 'http://placehold.it/50x50';?>"
                                                                  alt="..." height="50px" class="" style="height: 50px;">
                                                        </div>
                                                        <div class="entry-c">
                                                            <div class="entry-title">
                                                                <h4><a href="javascript:void(0);">{{$product->subCategory->name}}</a></h4>
                                                                <p class="nobottommargin"><a href="/products/detail/{{$product->id}}">
                                                                <?php echo generate_stars(5, $product->grade, $product->rating_quantity) . '<br />'; ?>
                                                                {{str_limit($product->description,150)}}</a></p>
                                                            </div>
                                                            {{--<ul class="entry-meta">--}}
                                                                {{--<li>17th Dec 2015</li>--}}
                                                            {{--</ul>--}}
                                                        </div>
                                                        </a>
                                                    @else
                                                        <a href="/products/detail/{{$product->id}}" class="nobg">
                                                          <div class="entry-image">
                                                                <img src="<?php echo $product->category->image != "" ?
                                                              '/uploads/categories/'.$product->category->image : 'http://placehold.it/50x50';?>"
                                                              alt="..." height="50px" class="" style="height: 50px;">
                                                          </div>
                                                          <div class="entry-c">
                                                              <div class="entry-title">
                                                                  <h4><a href="/products/detail/{{$product->id}}">{{$product->category->name}}</a></h4>
                                                                  <p class="nobottommargin"><a href="/products/detail/{{$product->id}}">
                                                                  {{str_limit($product->description,150)}}</a></p>
                                                              </div>
                                                              {{--<ul class="entry-meta">--}}
                                                                  {{--<li>17th Dec 2015</li>--}}
                                                              {{--</ul>--}}
                                                          </div>
                                                          </a>

                                                    @endif
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    @endif
                                    <div class="widget clearfix">
                                        <h4>Conheça outras empresas</h4>
                                        <div id="post-list-footer">
                                        @foreach ($topSuppliers as $topSupplier)
                                        <hr />
                                        <div class="spost clearfix">
                                            <div class="entry-image">
                                                <a href="#" class="nobg">
                                                <img src="{{ $topSupplier->brand_image != "" ? '/uploads/brands/'.$topSupplier->brand_image :
                                                    'http://placehold.it/100x100' }}" alt="..." width="100px" >
                                                </a>
                                            </div>
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h4><a href="/suppliers/detail/{{$topSupplier->id}}">{{$topSupplier->fantasy_name}}</a></h4>
                                                    <p class="nobottommargin">
                                                         <small>
                                                            <?php echo $topSupplier->categories(true); ?>
                                                         </small>
                                                         <br />
                                                         <?php echo str_limit($topSupplier->description,100); ?>
                                                         <br />
                                                        <?php echo generate_stars(5, $topSupplier->grade, $topSupplier->rating_quantity); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- #content end -->

@stop
