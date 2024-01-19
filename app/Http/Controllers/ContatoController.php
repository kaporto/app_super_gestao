<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
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

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        
        //dd($request);
        $request->validate(
            [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
            ],
            [
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres.',
                'required' => 'O campo :attribute deve ser preenchido.'
            ]
    );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
