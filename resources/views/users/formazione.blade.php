@extends('cache.index')

@section('page_heading','Libretto formativo di
 <a href="/users/' . $datiRecuperati->id . '/edit">' . $datiRecuperati->cognome .' '.$datiRecuperati->nome . '</a>
 (<a href="/societa/' . $datiRecuperati->societa->id . '/edit">'.$datiRecuperati->societa->ragione_sociale.'</a>)'
 )
@section('body')

    <div class="row">
    <div class="col-sm-6">


        <h4>Sei al {{ round($avanzamentoFormazione/$totaleFormazione*100) . '%' }} della tua formazione</h4>
        <span>
            Hai ancora {{$totaleFormazione - $avanzamentoFormazione}} corsi da completare,
            indica per quali hai già conseguito un attestato e procedi a iscriverti agli altri.
        </span>


    </div>
    <div class="col-sm-6">



            <div class="progress progress-tall ">
                <div class="progress-bar progress-bar-success progress-bar-striped" style="width: {{ round($avanzamentoRuolo/$totaleFormazione*100) . '%' }}">
                    <span class="sr-only">35% Complete (success)</span>
                </div>
                <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: {{ round($avanzamentoSicurezza/$totaleFormazione*100) . '%' }}">
                    <span class="sr-only">20% Complete (warning)</span>
                </div>

            </div>

    </div>
</div>
<br>
    <hr>
    <div class="row">
        <div class="col-sm-12">


            <table class="table table-striped">

                <thead>  <tr>
                    <th></th>
                    <th>Corso</th>
                    <th align="center">Data conseguimento</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                @foreach($datiRecuperati->_registro_formazione as $corso)
                    <tr>
                        <td @if( $corso->data_superamento )class="success" @endif></td>
                        <td>{{ strtoupper($corso->_corsi->titolo) }}</td>
                        <td align="center">{{ $corso->data_superamento }}</td>
                        <td>
                            <a class="btn btn-warning btn-xs" @if($corso->data_superamento)disabled="disabled"@endif
                            href="usersformazione/{{$corso->corso_id}}"
                               title="riscatta corso">
                                <i class="fa fa-bookmark-o"></i></a>


                            <a class="btn btn-warning btn-xs" href="#" title="Dettaglio corso" onclick="showDetailCorso({{$corso->corso_id}})">
                                <i class="fa fa-eye"></i></a>


                        </td>
                    </tr>


                    <tr id="corso{{$corso->corso_id}}" class="dettagliocorso hide">
                        <td colspan="4">
                            <span  class="">
                                <dl class="dl-horizontal">
                                    <dt>Programma</dt>
                                    <dd>{{ Helper::view_dd_if($corso->_corsi->programma) }} </dd>

                                    <dt>Durata</dt>
                                    <dd>{{ Helper::view_dd_if($corso->_corsi->durata) }} ore </dd>

                                    <dt>Aula</dt>
                                    <dd>{{ Helper::view_dd_if($corso->_corsi->info_aula) }}
                                        <a class="btn btn-warning btn-xs" @if($corso->data_superamento)disabled="disabled"@endif
                                        href="usersformazione/{{$corso->corso_id}}" title="segui corso"> <i class="fa fa-mortar-board"></i> Iscriviti</a>
                                    </dd>

                                    <dt>Fad</dt>
                                    <dd>{{ Helper::view_dd_if($corso->_corsi->info_fad) }} </dd>

                                    <dt>Validita</dt>
                                    <dd>{{ Helper::view_dd_if($corso->_corsi->validita) }} </dd>
                                </dl>
                            </span>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@stop


