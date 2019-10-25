<?php

namespace App\Http\Controllers;

use App\Produto;
use App\EspecificacaoTecnica;
use App\AreaConhecimento;
use App\AnoEscolar;
use App\NivelEnsino;
use App\Http\Controllers\Controller;
use App\Models\ViewModels\LinhaProdutoViewModel;
use App\Models\ViewModels\ProdutoViewModel;
use App\Models\ViewModels\UsuarioViewModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Intervention\Image\Facades\Image as Image;

class ProdutosController extends Controller
{

  /*
  Função para exibir todos os produtos cadastrados
  */
  public function ListarProdutos()
  {
    $produtos = array();
    $produtos = Produto::where('bolAnulado', 0)->get();

    $produtos = json_encode($produtos);
    return $produtos;
  }

  public function ListarPendências(){
    $produtos = array();
    $produtos = Produto::where([
        ['volume', '=', ''],
        ['num_edicao', '=', ''],
        ['pegLA', '=', ''],
        ['pegLP', '=', ''],
        ['ISBN_LA', '=', ''],
        ['ISBN_LP', '=', ''],
        ['nomeContrato', '=', ''],
        ['nomeCapa', '=', ''],
        ['pseudonomio', '=', ''],
        ['numContrato', '=', ''],
        ['dataAssinatura', '=', ''],
        ['validadeContrato', '=', '']
    ])->get();

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
      'validade_contrato' => 'date'
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
        'numEdicao'             => $request->num_edicao,
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
  Função para cadastrar especificacoes
  */
  public function CadastrarEspecificacao(Request $request)
  {

    $rules = [
      'componente'   => 'required',
    ];

    if ($this->validate($request, $rules)) {

      $data = [
        'idProduto'             => 2,
        'idTipoEspecificacao'   => 2,
        'componente'            => $request->componente,
        'formatoAberto'         => $request->formato_aberto,
        'formatoFechado'        => $request->formato_fechado,
        'numPagina'             => $request->num_paginas,
        'papel'                 => $request->papel,
        'cores'                 => $request->cores,
        'acabamento'            => $request->acabamento,
        'observacoes'           => $request->observacoes,
        'espessura'             => $request->espessura,
        'peso'                  => $request->peso,
        'orientacao'            => $request->orientacao,
        'alvura'                => $request->alvura,
        'opacidade'             => $request->opacidade,
        'lombada'              => $request->lombada,
        'medLombada'           => $request->medida_lombada,
        'bolAnulado'            => 0
      ];

      $create = EspecificacaoTecnica::create($data);
      if($create) {
        return response()->json(['success'=>1, 'msg'=>trans('app.componente_cadastrado')]);
      }
    }
  }
/*
  FUNÇÃO PARA DELETAR PRODUTOS
*/
  public function DeletarProduto($id){
    if ($id){
      $produto = Produto::find($id);
      if ($produto){
        $produto->bolAnulado = 1;
        $produto->save();

        return response()->json(['success'=>1, 'msg'=>trans('app.produto_deletado')]);
      }
    }
  }
  /*
    FUNÇÃO PARA DUPLICAR PRODUTOS
  */
    public function DuplicarProduto($id){
      if ($id){
        $produto = Produto::find($id);
        if ($produto){
          $produto->replicate()->save();
          return response()->json(['success'=>1, 'msg'=>trans('app.produto_duplicado')]);
        }
      }
    }

/*
  Cadastro Especificacoes
*/
public function CadastrarEspecificacoes($id){

}
/*
  FUNÇÃO PARA PREENCHER SELECTS DA VIEW CadastrarProdutos
*/
public function getAreaConhecimento()
{
  $areaConhec = array();
  $areaConhec = AreaConhecimento::all();
  $data = [];
  foreach ($areaConhec as $area) {
      $data[] = [
        'value' => $area->idAreaConhecimento,
        'name' => $area->nomeAreaConhecimento
      ];
  }

  $areaConhec = json_encode($data);
  return $areaConhec;
}
/*
  FUNÇÃO PARA PREENCHER SELECTS DA VIEW CadastrarProdutos
*/
public function getNivelEnsino()
{
  $areaConhec = array();
  $nivelEnsino = NivelEnsino::all();
  $data = [];
  foreach ($nivelEnsino as $nivel) {
      $data[] = [
        'value' => $nivel->idNivel,
        'name' => $nivel->nomeNivel
      ];
  }

  $nivelEnsino = json_encode($data);
  return $nivelEnsino;
}
/*
  FUNÇÃO PARA PREENCHER SELECTS DA VIEW CadastrarProdutos
*/
public function getAnoEscolar()
{
  $anoEsc = array();
  $anoEsc = AnoEscolar::all();
  $data = [];
  foreach ($anoEsc as $ano) {
      $data[] = [
        'value' => $ano->idAnoEscolar,
        'name' => $ano->nomeAnoEscolar
      ];
  }

  $anoEsc = json_encode($data);
  return $anoEsc;
}







}
