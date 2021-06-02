<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
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
        $funcionarios = Funcionario::all();

        return response()->json($funcionarios);
    }

    public function salvar(Request $request) {
        $funcionario = new Funcionario();
        $funcionario->nome = $request->nome;
        $funcionario->cargo = $request->cargo;
        $funcionario->cpf = $request->cpf;
        $funcionario->salario = $request->salario;

        $funcionario->save();
        
        return response()->json("Funcionario cadastrado com sucesso!");
    }

    public function editar(Request $request, $id ){
        $funcionario = Funcionario::find($id);
        $funcionario->nome = $request->nome;
        $funcionario->cargo = $request->cargo;
        $funcionario->cpf = $request->cpf;
        $funcionario->salario = $request->salario;

        $funcionario->save();

        return response()->json('Funcionario alterado com sucesso!');
    }

    public function obterPorId($id){
        $funcionario  = Funcionario::find($id);
        return response()->json($funcionario);
    }

    public function excluir($id){
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        
        return response()->json('Funcionario removido com sucesso!');
    }


}
