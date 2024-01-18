<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    //

    public function contato(){

        //dd($request);
        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */

        /*
        if(!(empty($request->all()))){
            $contato = new SiteContato();
            $contato->create($request->all());
        }
        */
        
        //$contato->fill($request->all());
        //$contato->save();
        //print_r($contato->getAttributes());

        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        
        //dd($request);
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ]);
        SiteContato::create($request->all());
        return view('site.contato');
    }
}
