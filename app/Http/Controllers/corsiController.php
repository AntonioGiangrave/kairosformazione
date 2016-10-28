<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class corsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['corsi'] = \App\corsi::with('proprietario')->get();

        return view('corsi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $albi_professionali = \App\albi_professionali::lists('nome', 'id')->all();

        return view('corsi.new')->with('albi_professionali',$albi_professionali);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titolo' => 'required'

        ], [
            'titolo.required' => 'Il titolo è obbligatorio'
        ]);

        $data = new \App\corsi;
        $data->titolo = $request->input('titolo');
        $data->durata = $request->input('durata');

        $data->aula = $request->input('aula');
        $data->fad= $request->input('fad');
        $data->info_aula= $request->input('info_aula');
        $data->info_fad= $request->input('info_fad');
        $data->cfp= $request->input('info_cfp');
        $data->validita= $request->input('validita');
        $data->programma= $request->input('programma');



        $data->save();

        return redirect('corsi/'.$data->id.'/edit')->with('ok_message', 'Dati inseriti');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['datiRecuperati'] = \App\corsi::with('proprietario')->find($id);
        $data['albi_professionali'] = \App\albi_professionali::lists('nome' , 'id');
        return view('corsi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titolo' => 'required'

        ], [
            'titolo.required' => 'Il titolo è obbligatorio'
        ]);

        $data = \App\corsi::find($id);
        $data->titolo = $request->input('titolo');
        $data->durata = $request->input('durata');

        $data->aula = $request->input('aula');
        $data->fad= $request->input('fad');
        $data->info_aula= $request->input('info_aula');
        $data->info_fad= $request->input('info_fad');
        $data->cfp= $request->input('info_cfp');
        $data->validita= $request->input('validita');
        $data->programma= $request->input('programma');



        $data->save();

        return redirect('corsi/'.$data->id.'/edit')->with('ok_message', 'Dati aggiornati');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
