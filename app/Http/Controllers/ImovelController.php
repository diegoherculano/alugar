<?php

namespace App\Http\Controllers;

use App\imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $imovel = imovel::all();
        return view('imovel.index', ['imovels' => $imovel]);
    }

    public function register()
    {
        return view('imovel.register');
    }

    protected function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'integer'],
            'complemento' => ['string', 'max:255'],
            'valor' => ['required', 'integer'],
            'bairro' => ['required'],
            'cep' => ['required'],
            'cidade' => ['required'],
            'estado' => ['required'],
        ]);

        $imovel = Imovel::create([
            'name' => $request->input('name'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'valor' => $request->input('valor'),
            'bairro' => $request->input('bairro'),
            'cep' => $request->input('cep'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado')
        ]);

        session()->flash('status', "Register Successfully");

        return redirect()->route('imovelRegister');
    }
    protected function delete($id)
    {
        $delete = imovel::where('id', $id)->delete();

        session()->flash('status', "Register Successfully");

        return redirect()->route('imovel');
    }

}
