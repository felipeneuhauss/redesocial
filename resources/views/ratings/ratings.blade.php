@foreach($ratings as $rating)
    <div class="col-md-12">
        <div class="col-md-2">
            <div class="entry-image">
                <a href="#" class="nobg">
                <img src="{{ $rating->user->image != "" ? '/uploads/users/'.md5($rating->user->id).'/'.$rating->user->image :
                    'http://placehold.it/100x100' }}" alt="..." width="100px" >
                </a>
            </div>
        </div>
        <div class="col-md-10">
            <strong>{{$rating->user->name}}</strong> / {{$rating->user->city}}-{{$rating->user->state}} <br />
            <h4>{{$rating->title}}</h4>
            <p>
            {{$rating->description}}
            </p>
            <a href="javascript:void(0)" id="detail-link-{{$rating->id}}" >+ Detalhes</a>
            <div class="row" id="detail-{{$rating->id}}" style="margin-bottom: 40px;">
                <div class="col-md-2">
                    Serviço <br />
                    <?php echo generate_stars(5, $rating->service_quality_grade); ?>
                </div>
                <div class="col-md-2">
                    Custo <br />
                    <?php echo generate_stars(5, $rating->cost_benefit_grade); ?>
                </div>
                <div class="col-md-2">
                    Atendimento <br />
                    <?php echo generate_stars(5, $rating->contract_compliance_grade); ?>
                </div>
                <div class="col-md-6">
                    Cumprimento do contrato <br />
                    <?php echo generate_stars(5, $rating->treatment_grade); ?>
                </div>
            </div>
            <script>
                $('#detail-{{$rating->id}}').hide();
                $('#detail-link-{{$rating->id}}').on('click', function(){
                    $('#detail-{{$rating->id}}').toggle();
                });
            </script>
            <hr />
        </div>
    </div>
@endforeach