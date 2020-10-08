<?php

namespace App\Http\Controllers;

use App\Financeiro;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class FinanceiroController extends Controller
{
    public $downloadWord;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $financeiro = DB::table('financeiros')
            ->join('contratos', 'contratos.id', '=', 'financeiros.id_contrato')
            ->join('pessoas', 'contratos.id_pessoa', '=', 'pessoas.id')
            ->join('imovels', 'contratos.id_imovel', '=', 'imovels.id')
            ->select('financeiros.id', 'imovels.name as imovel', 'pessoas.name as pessoa', 'imovels.valor', 'financeiros.data', 'financeiros.pago')
            ->get();

        return view('financeiro.index', ['financeiros' => $financeiro]);
    }

    public function recibo($id)
    {
        $financeiro = Financeiro::where('id', $id)->update(['pago' => true]);

        return redirect()->route('financeiroWord', [$id]);
    }

   public function gerarWord($id, Request $request)
    {
        $financeiro = DB::table('financeiros')
            ->join('contratos', 'contratos.id', '=', 'financeiros.id_contrato')
            ->join('pessoas', 'contratos.id_pessoa', '=', 'pessoas.id')
            ->join('imovels', 'contratos.id_imovel', '=', 'imovels.id')
            ->select(
                'financeiros.id',
                 'imovels.*',
                'pessoas.name as pessoa',
                'pessoas.cpf',
                'financeiros.data',
                'financeiros.pago'
            )
            ->where('financeiros.id', '=', $id)
            ->first();

        $user = Auth::user();
        $date = date('d/m/Y', strtotime($financeiro->data));

        $templateProcessor = new TemplateProcessor('word-template/recibo.docx');
        $templateProcessor->setValue('pessoaNome', $financeiro->pessoa);
        $templateProcessor->setValue('pessoaCpf', $financeiro->cpf);
        $templateProcessor->setValue('userNome', $user->name);
        $templateProcessor->setValue('userCpf', $user->cpf);
        $templateProcessor->setValue('valor', $financeiro->valor);
        $templateProcessor->setValue('data', $date);
        $templateProcessor->setValue('logradouro', $financeiro->logradouro);
        $templateProcessor->setValue('numero', $financeiro->numero);
        if ($financeiro->complemento != "")
            $templateProcessor->setValue('complemento', ", " . $financeiro->complemento);
        else
            $templateProcessor->setValue('complemento', "");

        $fileName = $financeiro->pessoa;
        $fileName = $fileName . '.docx';

        $templateProcessor->saveAs($fileName);

        // $phpWord = new PhpWord();
        Settings::setPdfRendererPath('vendor/dompdf');
        Settings::setPdfRendererName('DomPDF');

        $pdfWord = IOFactory::load($fileName);
        $pdf = IOFactory::createWriter($pdfWord, 'PDF');
        $pdf->save('test.pdf');

        return response()
            ->download($fileName)
            ->deleteFileAfterSend(true);
    }
}
