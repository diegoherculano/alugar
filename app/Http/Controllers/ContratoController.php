<?php

namespace App\Http\Controllers;

use App\imovel;
use App\Pessoa;
use App\Contrato;
use App\Financeiro;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;

class ContratoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contratos = DB::table('contratos')
            ->join('imovels', 'contratos.id_imovel', '=', 'imovels.id')
            ->join('pessoas', 'contratos.id_pessoa', '=', 'pessoas.id')
            ->select('contratos.id', 'imovels.name as imovel', 'pessoas.name as pessoa', 'imovels.valor', 'contratos.vencimento')
            ->get();

        return view('contrato.index', ['contratos' => $contratos]);
    }

    public function register()
    {
        $pessoas = Pessoa::all();
        $imovels = imovel::all();

        return view('contrato.register', ['pessoas' => $pessoas, 'imovels' => $imovels]);
    }

    protected function create(Request $request)
    {

        $request->validate([
            'id_imovel' => ['required', 'integer'],
            'id_pessoa' => ['required', 'integer'],
            'vencimento' => ['required'],
            'prazo' => ['required', 'integer'],
        ]);

        $contrato = Contrato::create([
            'id_imovel' => $request->input('id_imovel'),
            'id_pessoa' => $request->input('id_pessoa'),
            'vencimento' => $request->input('vencimento'),
            'prazo' => $request->input('prazo'),
        ]);

        $imovel = imovel::where('id', '=', $request->input('id_imovel'))->first();

        $date = date("Y-m-d", strtotime($request->input('vencimento')));

        $prazo = $request->input('prazo');

        for ($i = 1; $i <= $prazo; $i++) {
            Financeiro::create([
                'id_contrato' => $contrato->id,
                'valor' => $imovel->valor,
                'data' => $date
            ]);
            $date = date("Y-m-d", strtotime("$date +1 Month"));
        }

        session()->flash('status', "Register Successfully");

        return redirect()->route('contratoRegister');
    }

    public function gerarWord($id, Request $request)
    {
        $contrato = DB::table('contratos')
            ->join('financeiros', 'contratos.id', '=', 'financeiros.id_contrato')
            ->join('pessoas', 'contratos.id_pessoa', '=', 'pessoas.id')
            ->join('imovels', 'contratos.id_imovel', '=', 'imovels.id')
            ->select(
                'imovels.name as imovelNome',
                'imovels.logradouro as imovelLogradouro',
                'imovels.numero as imovelNumero',
                'imovels.complemento as imovelComplemento',
                'imovels.valor as imovelValor',
                'imovels.bairro as imovelBairro',
                'imovels.cep as imovelCep',
                'imovels.cidade as imovelCidade',
                'imovels.estado as imovelEstado',
                'pessoas.name as pessoaName',
                'pessoas.cpf as pessoaCpf',
                'pessoas.rg as pessoaRG',
                'pessoas.nacionalidade as pessoaNacionalidade',
                'pessoas.estadoCivil as pessoaEstadoCivil',
                'pessoas.profissao as pessoaProfissao',
                'pessoas.logradouro as pessoaLogradouro',
                'pessoas.numero as pessoaNumero',
                'pessoas.bairro as pessoaBairro',
                'pessoas.cep as pessoaCep',
                'pessoas.cidade as pessoaCidade',
                'pessoas.estado as pessoaEstado',
                'pessoas.telefone as pessoaTelefone',
                'contratos.vencimento as contratoVencimento',
                'contratos.prazo as contratoPrazo',
                'financeiros.data as financeiroData',
            )
            ->where('contratos.id', '=', $id)
            ->orderByDesc('financeiroData')
            ->first();

        $user = Auth::user();

        $contratoVencimento = date('d/m/Y', strtotime($contrato->contratoVencimento));
        $financeiroData = date('d/m/Y', strtotime($contrato->financeiroData));

        $prazoNumExtenso = $this->converter($contrato->contratoPrazo);
        $imovelValorExtenso = $this->converter($contrato->imovelValor, true);

        $templateProcessor = new TemplateProcessor('word-template/contrato.docx');
        $templateProcessor->setValue('imovelNome', $contrato->imovelNome);
        $templateProcessor->setValue('imovelLogradouro', $contrato->imovelLogradouro);
        $templateProcessor->setValue('imovelNumero', $contrato->imovelNumero);
        $templateProcessor->setValue('imovelComplemento', $contrato->imovelComplemento);
        $templateProcessor->setValue('imovelValorExtenso', $imovelValorExtenso);
        $templateProcessor->setValue('imovelValor', $contrato->imovelValor);
        $templateProcessor->setValue('imovelBairro', $contrato->imovelBairro);
        $templateProcessor->setValue('imovelCep', $contrato->imovelCep);
        $templateProcessor->setValue('imovelCidade', $contrato->imovelCidade);
        $templateProcessor->setValue('imovelEstado', $contrato->imovelEstado);
        $templateProcessor->setValue('pessoaName', $contrato->pessoaName);
        $templateProcessor->setValue('pessoaCpf', $contrato->pessoaCpf);
        $templateProcessor->setValue('pessoaRG', $contrato->pessoaRG);
        $templateProcessor->setValue('pessoaNacionalidade', $contrato->pessoaNacionalidade);
        $templateProcessor->setValue('pessoaEstadoCivil', $contrato->pessoaEstadoCivil);
        $templateProcessor->setValue('pessoaProfissao', $contrato->pessoaProfissao);
        $templateProcessor->setValue('pessoaLogradouro', $contrato->pessoaLogradouro);
        $templateProcessor->setValue('pessoaNumero', $contrato->pessoaNumero);
        $templateProcessor->setValue('pessoaBairro', $contrato->pessoaBairro);
        $templateProcessor->setValue('pessoaCep', $contrato->pessoaCep);
        $templateProcessor->setValue('pessoaCidade', $contrato->pessoaCidade);
        $templateProcessor->setValue('pessoaEstado', $contrato->pessoaEstado);
        $templateProcessor->setValue('pessoaTelefone', $contrato->pessoaTelefone);
        $templateProcessor->setValue('contratoVencimento', $contratoVencimento);
        $templateProcessor->setValue('contratoPrazo', $contrato->contratoPrazo);
        $templateProcessor->setValue('contratoPrazoExtenso', $prazoNumExtenso);
        $templateProcessor->setValue('userName', $user->name);
        $templateProcessor->setValue('userEmail', $user->email  );
        $templateProcessor->setValue('userCpf', $user->cpf);
        $templateProcessor->setValue('userNacionalidade', $user->nacionalidade);
        $templateProcessor->setValue('userEstadoCivil', $user->estadoCivil);
        $templateProcessor->setValue('userProfissao', $user->profissao);
        $templateProcessor->setValue('userLogradouro', $user->logradouro);
        $templateProcessor->setValue('userNumero', $user->numero);
        $templateProcessor->setValue('userBairro', $user->bairro);
        $templateProcessor->setValue('userCep', $user->cep);
        $templateProcessor->setValue('userCidade', $user->cidade);
        $templateProcessor->setValue('userEstado', $user->estado);
        $templateProcessor->setValue('financeiroData', $financeiroData);

        $fileName = $contrato->pessoaName;
        $fileName = $fileName . '.docx';

        $templateProcessor->saveAs($fileName);

        Settings::setPdfRendererPath('vendor/dompdf');
        Settings::setPdfRendererName('DomPDF');

        $pdfWord = IOFactory::load($fileName);
        $pdf = IOFactory::createWriter($pdfWord, 'PDF');
        $pdf->save('test.pdf');

        return response()
            ->download($fileName)
            ->deleteFileAfterSend(true);
    }

    protected function delete($id)
    {
        Financeiro::where('id_contrato', $id)->delete();
        Contrato::where('id', $id)->delete();

        session()->flash('status', "Delete Successfully");

        return redirect()->route('contrato');
    }

    public function converter($numeral=null, $real = false) {
        if (is_null($numeral)) {
          return 'Informe um numeral.';
        }
        else if (!is_numeric($numeral) || $numeral <= 0) {
          return 'O numeral deve ser maior que zero.';
        }
        else {
          return $this->extenso($numeral, $real);
        }

      }

      private function extenso($valor = 0, $real) {
        if ($real) {
          $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
          $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        } else {
          $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
          $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }

        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

        $z = 0;
        $valor = number_format($valor, 2, ".", ".");
        $inteiro = explode(".", $valor);
        $count = count($inteiro);
        $rt = "";

        for ($i = 0; $i < $count; $i++) {
          for ($ii = strlen($inteiro[$i]); $ii < 3; $ii++) {
            $inteiro[$i] = "0" . $inteiro[$i];
          }
        }

        $fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);

        for ($i = 0; $i < count($inteiro); $i++) {
          $valor = $inteiro[$i];

          $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];

          $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];

          $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

          $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;

          $t = count($inteiro) - 1 - $i;

          $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";

          if ($valor == "000") {
            $z++;
          } elseif ($z > 0) {
            $z--;
          }

          if (($t == 1) && ($z > 0) && ($inteiro[0] > 0)) {
            $r .= (($z > 1) ? " de " : " ") . $plural[$t];
          }

          if ($r) {
            $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : "") . $r;
          }
        }

        return($rt ? $rt : "zero");
      }
}
