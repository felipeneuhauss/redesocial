<footer id="footer" class="footer">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_two_third">

                        <div class="widget clearfix">

                            <h3>Entre em contato com a UPevento <span>(061)3226-0215</span></h3>
                            <p>Somos uma rede social dedicada ao mundo dos eventos corporativos.</p>

                            <div class="line" style="margin: 30px 0;"></div>

                            <div class="col_half">
                                <div class="widget subscribe-widget clearfix">
                                    <h5>Cadastre-se em nossa newsletter e receba informações, dicas, promoções e muito mais.</h5>
                                    <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                                    <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                        <div class="input-group divcenter">
                                            <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
                                            class="form-control required email" placeholder="Informe seu e-mail">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit">Inscrever</button>
                                            </span>                                        </div>
                                    </form>
                                    <script type="text/javascript">
                                        jQuery(function(){
                                            $("#widget-subscribe-form").validate({
                                                submitHandler: function(form) {
                                                    $(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                                    $(form).ajaxSubmit({
                                                        target: '#widget-subscribe-form-result',
                                                        success: function() {
                                                            $(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                                            $('#widget-subscribe-form').find('.form-control').val('');
                                                            $('#widget-subscribe-form-result').attr('data-notify-msg', $('#widget-subscribe-form-result').html()).html('');
                                                            IGNITE.widget.notifications($('#widget-subscribe-form-result'));
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="col_half col_last">
                                <div class="widget clearfix">

                                    <div class="hidden-xs hidden-sm"><div class="clear" style="padding-top: 10px;"></div></div>

                                    <div class="col-md-6 bottommargin-sm">

                            			<div class="widget_links clearfix">
                                			<ul>
                                    			<li><a href="/#"><div>Eventos</div></a></li>
                                    			<li><a href="/#"><div>Serviços</div></a></li>
                                    			<li><a href="/#"><div>Blog</div></a></li>
                                    			<li><a href="/#"><div>O que é a UPeventos</div></a></li>
                                                <li><a href="/#"><div>Contatos</div></a></li>
                                			</ul>
                            			</div>
                                    </div>

                                    <div class="col-md-6 bottommargin-sm col_last">

                            			<div class="widget_links clearfix">
                                			<ul>
                                    			<li><a href="/#"><div>Fornecedores</div></a></li>
                                    			<li><a href="/#"><div>Top 10</div></a></li>
                                    			<li><a href="/#"><div>Política de uso</div></a></li>
                                    			{{--<li><a href="/#"><div>Gift Card</div></a></li>--}}
                                                {{--<li><a href="/#"><div>Specials</div></a></li>--}}
                                			</ul>
                            			</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix">
                        <div class="fancy-title title-border">
                            <h4>Nossos contatos</h4>
                        </div>

                        <p>Entre em contato com nossa equipe de atendimentos. Segunda a sexta: Horário comercial</p>

                        <ul class="nobottommargin nobullets">
                            {{--<li><strong>Monday-Friday:</strong> 10AM to 7PM</li>--}}
                            {{--<li><strong>Saturday &amp; Sunday:</strong> 11AM to 3PM</li>--}}
                            {{--<li><strong>Happy Hour:</strong> 3PM to 6PM</li>--}}
                        </ul>
                        </div>

                        <div class="widget clearfix">
                        <div class="fancy-title title-border">
                            <h4>Endereço</h4>
                        </div>

                        <ul class="nobottommargin nobullets">
                            <li>QE 24 - Bloco A - Loja 11 - Comércio Local</li>
                            <li>Guará II - Brasília-DF, CEP: 71060-610</li>
                        </ul>
                        </div>
                    </div>
                </div>
              <!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        <img src="/images/logo/footer-logo.png" alt="" class="footer-logo standard-logo">
                        <img src="/images/logo/footer-logo-large.png" alt="" class="footer-logo retina-logo">
                        UpEvento &copy; <?php echo date('Y') ?>. Todos os direitos reservados.
                    </div>

                    <div class="col_half col_last tright">
                        <div class="copyrights-menu copyright-links fright clearfix">
                            <a href="/">Eventos</a>
                            <a href="/suppliers/all-suppliers">Fornecedores</a>
                            <a href="/#">O que é a UPEvento</a>
                            <a href="/contact">Contato</a>
                            @if (Auth::guest())
                                <a href="/auth/register">Cadastre-se</a>
                                <a href="/auth/login">Login</a>
                            @else
                            <a href="/#">{{Auth::user()->name}}</a>
                            @endif

                        </div>
                        <div class="fright clearfix">
                            <a href="/#" class="social-icon si-small si-borderless nobottommargin si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="/#" class="social-icon si-small si-borderless nobottommargin si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="/#" class="social-icon si-small si-borderless nobottommargin si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a href="/#" class="social-icon si-small si-borderless nobottommargin si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>

                            <a href="/#" class="social-icon si-small si-borderless nobottommargin si-vimeo">
                                <i class="icon-vimeo"></i>
                                <i class="icon-vimeo"></i>
                            </a>

                            <a href="/#" class="social-icon si-small si-borderless nobottommargin si-github">
                                <i class="icon-github"></i>
                                <i class="icon-github"></i>
                            </a>

                            <a href="/#" class="social-icon si-small si-borderless nobottommargin si-yahoo">
                                <i class="icon-yahoo"></i>
                                <i class="icon-yahoo"></i>
                            </a>

                            <a href="/#" class="social-icon si-small si-borderless nobottommargin si-linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->