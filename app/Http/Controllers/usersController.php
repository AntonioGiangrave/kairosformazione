<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\societa;
use App\User;
use App\Usergroups;
use App\registro_formazione;
use Illuminate\Http\Request;

class usersController extends Controller {

    //
    public function index() {

        $data = User::with('societa')
            ->with('user_profiles')
            ->where('bloccato', 0)
            ->orderBy('cognome')->get();
        return view('users.index', compact('data'));
    }

    public function edit($id) {
        $data['datiRecuperati'] = User::with('user_profiles' , '_albi_professionali' , '_incarichi_sicurezza' , '_mansioni')->find($id);

        $data['societa'] = Societa::lists('ragione_sociale', 'id');

        $usergroups = new Usergroups();
        $data['usergroups'] = $usergroups->getTree();

        /******************************************************************
        DA COMPLETARE !!!!!!
         ******************************************************************/
        $data['status'] = array(
            1 => 'Disoccupato' ,
            2 => 'Occupato Senza datore',
            3 => 'Occupato tempo determinato'
        );

        $data['lista_albi'] =   \App\albi_professionali::orderBy('nome')->lists('nome' , 'id');
        $data['lista_incarichi_sicurezza'] =  \App\incarichi_sicurezza::orderBy('nome')->lists('nome' , 'id');
        $data['lista_mansioni'] =  \App\mansioni::orderBy('nome')->lists('nome' , 'id');


        return view('users.edit', $data);
    }

    public function formazione($id){

        $registro_formazione = new registro_formazione();

        $registro_formazione->sync_utente($id);

        $data['datiRecuperati'] = User::with('_registro_formazione', '_avanzamento_formazione' )->find($id);

        $data['totaleFormazione']=$data['datiRecuperati']->_registro_formazione->count();
        $data['avanzamentoFormazione']=$data['datiRecuperati']->_avanzamento_formazione()->count();
        $data['avanzamentoSicurezza']=$data['datiRecuperati']->_get_tot_avanzamento_formazione_sicurezza();
        $data['avanzamentoRuolo']=$data['datiRecuperati']->_get_tot_avanzamento_formazione_ruolo();

        return view('users.formazione', $data);

    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'nome' => 'required'
            , 'cognome' => 'required'
            , 'email' => 'required|email'
        ], [
            'nome.required' => 'Il nome è obbligatorio!'
            , 'cognome.required' => 'Per favore, anche il cognome'
            , 'email.required' => 'E l\'email è importante'
            , 'email.email' => 'L\'email non è in formato corretto'
        ]);

        $user = User::find($id);
        $user->nome = $request->input('nome');
        $user->cognome = $request->input('cognome');
        $user->email = $request->input('email');
        $user->bloccato= $request->input('bloccato');
        $user->referente_id= $request->input('referente_id');

        $user->save();

        $user->groups()->sync($request->get('groups'));

        $user->_albi_professionali()->sync( (array) $request->get('_albi_professionali'));

        $user->_incarichi_sicurezza()->sync( (array) $request->get('_incarichi_sicurezza'));

        $user->_mansioni()->sync( (array) $request->get('_mansioni'));

        $allinea = new registro_formazione();
        $allinea->sync_utente($id);

        return redirect('users')->with('ok_message', 'La tua rubrica è stata aggiornata');
    }



}
