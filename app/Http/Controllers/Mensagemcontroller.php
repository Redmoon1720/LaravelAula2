<?php

namespace App\Http\Controllers;

use App\mensagem;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;

class Mensagemcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listamensagens = mensagem::all();
        return view('mensagem.list',['mensagens' => $listamensagens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('mensagem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            'title.required' => 'É obrigatório um título para a mensagem',
            'texto.required' => 'É obrigatório uma descrição para a mensagem',
            'autor.required' => 'É obrigatório um autor para a mensagem',
        );
        $regras = array(
            'title' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required',
        );
        $validador = Validator::make($request->all(), $regras, $messages);
        if ($validador->fails()) {
            return redirect('mensagem/create')
            ->withErrors($validador)
            ->withImput($request->all);
        }
        $obj_Atividade = new mensagem();
        $obj_Atividade->title = $request['title'];
        $obj_Atividade->texto = $request['texto'];
        $obj_Atividade->autor = $request['autor'];
        $obj_Atividade->save();

        return redirect('/mensagem')->with('success','Mensagem criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensagem = mensagem::find($id);
        return view('mensagem.show',['mensagem' => $mensagem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj_Atividade = mensagem::find($id);
        return view ('mensagem.edit',['mensagem'=> $obj_Atividade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'title.required' => 'É obrigatório um título para a mensagem',
            'texto.required' => 'É obrigatória uma descrição para a mensagem',
            'autor.required' => 'É obrigatório um autor para a mensagem',
        );
        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect("mensagem/$id/edit")
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_atividade = mensagem::findOrFail($id);
        $obj_atividade->title =       $request['title'];
        $obj_atividade->texto = $request['texto'];
        $obj_atividade->autor = $request['autor'];
        $obj_atividade->save();
        return redirect('/mensagem')->with('success', 'Mensagem alterada com sucesso!!');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $obj_Atividade = mensagem::find($id);
        return view('mensagem.delete',['mensagem' => $obj_Atividade]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_atividade = mensagem::findOrFail($id);
        $obj_atividade->delete($id);
        return redirect('/mensagem')->with('sucess','Mensagem excluída com Sucesso!!');
    }
}
