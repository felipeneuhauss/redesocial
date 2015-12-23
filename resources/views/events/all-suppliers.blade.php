@extends('layouts.layout')
@section('content')
 <!-- Page Title
        ============================================= -->
        <section id="page-title" class="page-title-parallax page-title-dark" style="height:127px ; background-color: #4E4E4E; padding: 30px 0px;" data-stellar-background-ratio="0.3">

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
                                                    '/uploads/brands/'.$vo->brand_image : 'http://placehold.it/300x225' }}" alt="..." width="300px" >
                                            {{--<div class="entry-date">08<span>Jan</span></div>--}}
                                        </a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h2><a href="#">{{$vo->fantasy_name}}</a></h2>
                                        </div>
                                        <ul class="entry-meta clearfix">
                                            <li>
                                            @foreach($vo->categories() as $category)
                                                <a href="#">{{$category->name}}</a>
                                            @endforeach
                                            </li>
                                        </ul>

                                        <div class="entry-content">
                                            <?php echo generate_stars(5, $vo->grade, $vo->rating_quantity); ?>
                                            <a href="#"><i class="icon-map-marker2"></i> {{$vo->city}}, {{$vo->state}}</a>
                                        </div>
                                        <div class="entry-content">
                                            <p>{{$vo->description}}</p>
                                            <a href="/suppliers/detail/{{$vo->id}}" class="btn button-light button-small">Entrar</a>
                                            <a href="#" data-toggle="modal" class="btn button button-small" data-target="#myModal{{$vo->id}}">Contato</a>
                                        </div>
                                    </div>
                                </div>
                                 <!-- Modal -->
                                  <div class="modal fade" id="myModal{{$vo->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                       <div class="modal-dialog" role="document">
                                         <div class="modal-content">
                                           <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             <h4 class="modal-title" id="myModalLabel">Entre em contato com {{$vo->fantasy_name}}</h4>
                                           </div>
                                           <form id="quick-contact-form-{{$vo->id}}" name="quick-contact-form" action="/suppliers/contact" method="post" class="quick-contact-form nobottommargin">
                                           <div class="modal-body">
                                               <div id="quick-contact-form-result-{{$vo->id}}" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Mensagem enviada com sucesso!"></div>
                                                   <div role="alert" class="alert alert-info processing" style="display: none;">
                                                         <strong><img src="/images/site/ajax-loader.gif" /> Aguarde!</strong> Sua mensagem está sendo enviada...
                                                       </div>
                                                    <div role="alert" class="alert alert-success message-sended" style="display: none;">
                                                         <strong>Yes!</strong> Sua mensagem foi enviada com sucesso!
                                                       </div>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{$vo->id}}">
                                                    <div class="form-group">
                                                        <input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="name" value="" placeholder="Nome completo" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="email" value="" placeholder="Seu e-mail" />
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="message" rows="4" cols="30" placeholder="Mensagem"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
                                                    </div>
                                                   <script type="text/javascript">
                                                       // TODO: Desenvolver o envio do contato ao fornecedor
                                                        $("#quick-contact-form-{{$vo->id}}").validate();

                                                        $("#quick-contact-form-{{$vo->id}}").submit(function(){
                                                           $(this).ajaxSubmit({
                                                              target: '#quick-contact-form-result-{{$vo->id}}',
                                                              beforeSubmit: function(arr, $form, options) {
                                                                  $("#quick-contact-form-{{$vo->id}}").find('.processing').fadeIn();
                                                                  return $("#quick-contact-form-{{$vo->id}}").valid();
                                                              },
                                                              success: function() {
                                                                  $("#quick-contact-form-{{$vo->id}}").find('.processing').fadeOut();
                                                                  $("#quick-contact-form-{{$vo->id}}").find('.message-sended').fadeIn();
                                                                  $("#quick-contact-form-{{$vo->id}}").find('.sm-form-control').val('');
                                                                  $('#quick-contact-form-result-{{$vo->id}}').attr('data-notify-msg', $('#quick-contact-form-result-{{$vo->id}}').html()).html('');
                                                                  IGNITE.widget.notifications($('#quick-contact-form-result-{{$vo->id}}'));
                                                              }
                                                          });
                                                          return false;
                                                      });
                                                   </script>
                                           </div>
                                           <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                             <button type="submit" class="btn btn-primary" id="quick-contact-form-submit-{{$vo->id}}" >Enviar</button>
                                           </div>
                                           </form>
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
                                <h4>Top 10</h4>
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

        </section><!-- #content end -->
@stop
