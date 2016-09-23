    @extends('cache.index')

    @section('page_heading','Utenti')
    @section('body')

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            @if(count($errors->all()) > 0)
                <div class="alert alert-danger" role="alert">
                    <p><b>OOOPS!</b></p>
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{
            Form::model($datiRecuperati,
            ['method' => 'put', 'url' =>'users/'. $datiRecuperati['id']])
            }}

            <div class="row">

                <div class="col-md-4">



                    <div class="form-group">
                        {{ Form::label('nome', 'Il tuo nome:') }}
                        {{ Form::text('nome', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('cognome', 'Il tuo cognome:') }}
                        {{ Form::text('cognome', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'La tua email:') }}

                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>


                </div>



                <div class="col-md-4">


                    <div class="form-group">
                        {{ Form::label('societa_id', 'Società di appartenenza:') }}
                        {{ Form::select('societa_id', $societa, null, ['class' => 'form-control']) }}
                    </div>


                    <div class="form-group">
                        {{ Form::label('bloccato', 'Bloccato:') }}
                        {{ Form::select('bloccato', array(0 => 'No' , 1=> 'Si'),null ,['class' => 'form-control' ]) }}
                    </div>



                </div>


                <div class="col-md-4">

                    @if(Auth::user()->hasAnyGroups('Admin'))
                        {{ Form::label('Autorizzazioni', 'Gruppi:') }}
                        <div class='form-group'>
                            @foreach ($usergroups as $key => $val)
                                <br>
                                {{ Form::checkbox('groups[]', $key) }}
                                {{ Form::label('groups', $val) }}
                            @endforeach
                        </div>
                    @endif

                </div>


            </div>




            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('data_nascita', 'Data di nascita:') }}
                        {{ Form::text('data_nascita', $datiRecuperati->user_profiles->data_nascita, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('citta_nascita', 'Città di nascita:') }}
                        {{ Form::text('citta_nascita',  $datiRecuperati->user_profiles->citta_nascita, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        {{ Form::label('sesso', 'Sesso:') }}
                        {{ Form::select('sesso', array(['F', 'M']), $datiRecuperati->user_profiles->sesso ,['class' => 'form-control' ]) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('codicefiscale', 'Codicefiscale:') }}
                        {{ Form::text('citta_nascita',  $datiRecuperati->user_profiles->codicefiscale, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>



            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('nazione_residenza', 'Nazione residenza:') }}
                        {{ Form::text('nazione_residenza', $datiRecuperati->user_profiles->nazione_residenza, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('citta_residenza', 'Città residenza:') }}
                        {{ Form::text('citta_residenza',  $datiRecuperati->user_profiles->citta_residenza, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        {{ Form::label('cap_residenza', 'Cap residenza:') }}
                        {{ Form::text('cap_residenza',  $datiRecuperati->user_profiles->cap_residenza ,['class' => 'form-control' ]) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('telefono', 'Telefono:') }}
                        {{ Form::text('telefono',  $datiRecuperati->user_profiles->telefono, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>


            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('titolo_studio', 'Titolo studio:') }}
                        {{ Form::text('titolo_studio', $datiRecuperati->user_profiles->titolo_studio, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('status_id', 'Status:') }}
                        {{ Form::select('status_id',$status, $datiRecuperati->user_profiles->status_id, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        {{ Form::label('costo_orario_lordo', 'Costo orario lordo:') }}
                        {{ Form::text('costo_orario_lordo',  $datiRecuperati->user_profiles->costo_orario_lordo ,['class' => 'form-control' ]) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('inquadramento', 'Inquadramento:') }}
                        {{ Form::text('inquadramento',  $datiRecuperati->user_profiles->inquadramento, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('ccnl', 'CCNL:') }}
                        {{ Form::text('ccnl', $datiRecuperati->user_profiles->ccnl, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('mansione_ruolo', 'Mansione/Ruolo:') }}
                        {{ Form::select('mansione_ruolo',$status, $datiRecuperati->user_profiles->mansione_ruolo, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        {{ Form::label('divisione', 'Divisione:') }}
                        {{ Form::text('divisione',  $datiRecuperati->user_profiles->divisione ,['class' => 'form-control' ]) }}
                    </div>

                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('ordine_id', 'Ordine di:') }}
                        {{ Form::select('ordine_id', $ordini_professionali , $datiRecuperati->user_profiles->ordine_id, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">

                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        {{ Form::label('sicurezza', 'Incarichi di sicurezza:') }}
                        {{ Form::select('sicurezza',  array(0=>'NO' , 1=>'SI'),$datiRecuperati->user_profiles->sicurezza ,['class' => 'form-control' ]) }}
                    </div>

                    <div class="form-group">


                    </div>
                </div>
            </div>



            <hr>
            <div class="row">



                    <div class="pull-right">
                        {{ Form::submit('aggiorna', ['class' => 'btn btn-success btn-lg']) }}

                        {{ Form::close() }}

                    </div>
                    <div class="pull-right">
                        {{ Form::open([
                                           'method' => 'DELETE',
                                           'url' => ['users', $datiRecuperati['id']]
                                           ]) }}
                        {{ Form::submit('Cancella', ['class' => 'btn btn-danger btn-sm']) }}
                        {{ Form::close() }}
                    </div>

            </div>



        </div>





    @stop