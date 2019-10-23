<?php

namespace App\Http\Controllers;

use App\Produto;
use App\AreaConhecimento;
use App\Http\Controllers\Controller;
use App\Models\ViewModels\LinhaProdutoViewModel;
use App\Models\ViewModels\ProdutoViewModel;
use App\Models\ViewModels\UsuarioViewModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class ProdutosController extends Controller
{

  /*
  Função para exibir todos os produtos cadastrados
  */
  public function ListarProdutos(Request $request)
  {
    $produtos = array();
    $produtos = Produto::where('bolAnulado', 0)->get();

    $produtos = json_encode($produtos);
    return $produtos;
  }

  /*
  Função para cadastrar produtos
  */
  public function CadastrarProdutos(Request $request)
  {

    $rules = [
      'titulo'   => 'required',
      'titulo_obra'    => 'required',
      'ano_uso'      => 'required',
      'ano_lancamento'      => 'required',
      'ano_ciclo'      => 'required',
      'area_conhec'      => 'required',
      'nivel_ensino'      => 'required',
      'serie' => 'required',
      'volume' => 'required',
      'num_edicao' => 'required',
      'origem' => 'required',
      'idioma' => 'required',
      'data_assinatura' => 'date',
      'validade_contrato' => 'date',
    ];
    if ($this->validate($request, $rules)) {

      $data = [
        'idAreaConhecimento'    => 1,
        'idAnoEscolar'          => 2,
        'idOrigem'              => 1,
        'titulo'                => $request->titulo,
        'tituloObra'            => $request->titulo_obra,
        'anoUso'                => $request->ano_uso,
        'anoLancamento'         => $request->ano_lancamento,
        'anoCicloVida'          => $request->ano_ciclo,
        'volume'                => $request->volume,
        'numEdicao'            => $request->num_edicao,
        'pegLA'                 => $request->peg_la,
        'pegLP'                 => $request->peg_lp,
        'ISBN_LA'               => $request->isbn_la,
        'ISBN_LP'               => $request->isbn_lp,
        'nomeContrato'          => $request->nome_contrato,
        'nomeCapa'              => $request->nome_capa,
        'pseudonomio'           => $request->pseudonomio,
        'numContrato'           => $request->num_contrato,
        'dataAssinatura'        => $request->data_assinatura,
        'validadeContrato'      => $request->validade_contrato,
        'arquivado'             => 0,
        'bolAnulado'            => 0
      ];

      $create = Produto::create($data);


      if($create) {
        return response()->json(['success'=>1, 'msg'=>trans('app.produto_cadastrado')]);

      }
    }
  }
/*
  FUNÇÃO PARA DELETAR PRODUTOS
*/
  public function DeletarProduto($id){
    if ($id){
      $produto = Produto::where('idProduto', $id)->first();
      if ($produto){
        $produto->bolAnulado = 1;
        $produto->save();

        return response()->json(['success'=>1, 'msg'=>trans('app.produto_deletado')]);
      }
    }
  }

/*
  FUNÇÃO PARA PREENCHER SELECTS DA VIEW CadastrarProdutos
*/
public function getAreaConhecimento()
{
  $areaConhec = array();
  $areaConhec = AreaConhecimento::all();

  $areaConhec = json_encode($areaConhec);
  return $areaConhec;
}







}
