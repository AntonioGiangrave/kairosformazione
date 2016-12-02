@extends('cache.index')

@section('page_heading','Ateco: [' .  $datiRecuperati['codice'] . "] - ".  $datiRecuperati['descrizione'])
@section('body')

    {{
           Form::model($datiRecuperati,
           ['method' => 'put', 'url' =>'ateco/'. $datiRecuperati['id']])
    }}


    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    {{ Form::label('codice', 'Codice:') }}
                    {{ Form::text('codice', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('descrizione', 'Descrizione:') }}
                    {{ Form::text('descrizione',null,  ['class' => 'form-control']) }}

                </div>

                <div class="pull-right">
                    {{ Form::submit('Salva', ['class' => 'btn btn-success']) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div class="col-sm-7">
                <div class="form-group filterlist">
                    {{ Form::label('_corsi', 'Corsi:') }}
                    <div class="row">
                        <div class="col-sm-4">
                            {{ Form::text('txtSearch',null,  [ 'id'=> 'txtSearch', 'class' => 'form-control', 'placeholder' => 'Filtra']) }}
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <a class="btn btn-warning btn-xs" id="resetfilter" href="#">visualizza tutti</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-warning btn-xs" id="soloselezionati" href="#">visualizza selezionati</a>
                        </div>

                    </div>
                    <hr>
                    {{ Form::select('_corsi[]',$lista_corsi, $datiRecuperati->_corsi->lists('id')->toArray(),  ['class' => 'form-control, list-group', 'multiple']) }}

                </div>
            </div>
        </div>
    </div>


@stop
