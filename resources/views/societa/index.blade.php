@extends('cache.index')

@section('page_heading','Elenco societa')
@section('body')

<div class="row">
    <div class="col-sm-12">


        <table class="table table-striped">

            <thead>  <tr>  
                    <th>Ragione Sociale</th>
                    <th>Partita IVA</th>
                    <th>Email</th>
                    <th>Codice Ateco</th>

                    <th> </th>  
                </tr>  
            </thead> 
            <tbody>

            <?php $canedit = Auth::user()->hasAnyGroups('admin'); ?>

                @foreach($societa as $single)

                <tr> 
                    <td>{{ $single->ragione_sociale }}</td>
                    <td>{{ $single->piva }}</td>
                    <td>{{ $single->email }}</td>
                    <td>{{ $single->ateco->codice }}</td>
                    <td></td>
                    <td>
                        @if($canedit)
                            <a class="btn btn-warning btn-xs "   href="/societa/{{$single->id}}/edit">modifica</a>

                        @endif
                    </td>
                </tr>  

                @endforeach 

            </tbody> 


        </table>
    </div>
</div>




@stop