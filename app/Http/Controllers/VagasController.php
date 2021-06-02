<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Vagas;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function obterTodos() {
        $vagas = Vagas::all();

        return response()->json($vagas);
    }

    public function salvar(Request $request) {
        $vagas = new Vagas();
        $vagas->nome = $request->nome;
        $vagas->setor = $request->setor;
        $vagas->salario_maximo = $request->salario_maximo;
        $vagas->nivel = $request->nivel;

        $vagas->save();
        
        return response()->json("Vaga cadastrada com sucesso!");
    }

    public function editar(Request $request, $id ){
        $vagas = Vagas::find($id);
        $vagas->nome = $request->nome;
        $vagas->setor = $request->setor;
        $vagas->salario_maximo = $request->salario_maximo;
        $vagas->nivel = $request->nivel;

        $vagas->save();

        return response()->json('Vaga alterada com sucesso!');
    }

    public function obterPorId($id){
        $vaga = Vagas::find($id);

        if (! $vaga) {
            return response()->json(["error" => "Vaga não encontrada!"], 404);
         }

        return response()->json($vaga);
    }

    public function excluir($id){

        $vaga = Vagas::find($id);

        if (! $vaga) {
           return response()->json(["error" => "Vaga não encontrada!"], 404);
        }

        $vaga->delete();
        return response()->json('Vaga removida com sucesso!');
    }

}
