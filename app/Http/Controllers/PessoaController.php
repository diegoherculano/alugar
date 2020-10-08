<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use PessoaSeeder;

class PessoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoa.index', ['pessoas' => $pessoas]);
    }

    public function register()
    {
        return view('pessoa.register');
    }

    protected function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'unique:pessoas,cpf', 'string', 'min:11', 'max:11'],
            'rg' => ['required'],
            'nacionalidade' => ['required'],
            'estadoCivil' => ['required'],
            'profissao' => ['required'],
            'logradouro' => ['required'],
            'numero' => ['required'],
            'bairro' => ['required'],
            'cep' => ['required'],
            'cidade' => ['required'],
            'estado' => ['required'],
        ]);

        $pessoa = Pessoa::create([
            'name' => $request->input('name'),
            'cpf' => $request->input('cpf'),
            'rg' => $request->input('rg'),
            'nacionalidade' => $request->input('nacionalidade'),
            'estadoCivil' => $request->input('estadoCivil'),
            'profissao' => $request->input('profissao'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'bairro' => $request->input('bairro'),
            'cep' => $request->input('cep'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'telefone' => $request->input('phone')
        ]);

        session()->flash('status', "Register Successfully");

        return redirect()->route('pessoaRegister');
    }

    protected function delete($id)
    {
        $delete = Pessoa::where('id', $id)->delete();

        session()->flash('status', "Register Successfully");

        return redirect()->route('pessoa');
    }
}
