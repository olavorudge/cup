<?php

namespace App\Http\Controllers;

use App\Produto;
use App\EspecificacaoTecnica;
use App\AreaConhecimento;
use App\AnoEscolar;
use App\NivelEnsino;
use App\Observacao;
use App\EstruturaProduto;
use App\Origem;
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
  /*
  Função para exibir todos os produtos cadastrados
  */
  public function ListarTodasEstruturas()
  {
    $estruturas = array();
    $estruturas = EstruturaProduto::distinct('idEstrutura')->get();
    $ids = [];
    foreach ($estruturas as $estrutura) {
      $ids[] = $estrutura->idEstrutura;
    }
    $produtos = Produto::find($ids);


    $produtos = json_encode($produtos);
    return $produtos;
  }
  /*
  Função para exibir todos os produtos cadastrados
  */
  public function ListarProduto($id)
  {
    $produto = array();
    $produto = Produto::where('idProduto', $id)->first();

    $anoEscolar = AnoEscolar::where('idAnoEscolar', $produto->idAnoEscolar)->first();

    $data = [
      'titulo' => $produto->titulo,
      'titulo_obra' => $produto->tituloObra,
      'ano_uso' => $produto->anoUso,
      'ano_lancamento' => $produto->anoLancamento,
      'ano_ciclo' => $produto->anoCicloVida,
      'area_conhec' => $produto->idAreaConhecimento,
      'nivel_ensino' => $anoEscolar->idNivel,
      'serie' => $produto->idAnoEscolar,
      'volume' => $produto->volume,
      'num_edicao' => $produto->numEdicao,
      'origem' => $produto->idOrigem,
      'idioma' => $produto->idioma,
      'peg_la' => $produto->peg_la,
      'peg_lp' => $produto->peg_lp,
      'isbn_la' => $produto->isbn_la,
      'isbn_lp' => $produto->isbn_lp,
      'nome_contrato' => $produto->nomeContrato,
      'nome_capa' => $produto->nomeCapa,
      'pseudonimo' => $produto->pseudonimo,
      'num_contrato' => $produto->numContrato,
      'data_assinatura' => $produto->dataAssinatura,
      'validade_contrato' => $produto->validadeContrato
    ];

    $produtos = json_encode($data);
    return $produtos;
  }
  /*
  Função para exibir todos os produtos cadastrados
  */
  public function ListarProdutoGeral($id)
  {
    $produto = array();
    $produto = Produto::where('idProduto', $id)->first();
    $especificacoes = EspecificacaoTecnica::where('idProduto', $id)->where('bolAnulado', 0)->orderBy('idTipoEspecificacao', 'ASC')->get();

    $anoEscolar = AnoEscolar::where('idAnoEscolar', $produto->idAnoEscolar)->first();
    $nivel = NivelEnsino::where('idNivel', $anoEscolar->idNivel)->first();
    $areaConhecimento = AreaConhecimento::where('idAreaConhecimento', $produto->idAreaConhecimento)->first();
    $origem = Origem::where('idOrigem', $produto->idOrigem)->first();

    $dadosGerais = [
      'titulo' => $produto->titulo,
      'titulo_obra' => $produto->tituloObra,
      'ano_uso' => $produto->anoUso,
      'ano_lancamento' => $produto->anoLancamento,
      'ano_ciclo' => $produto->anoCicloVida,
      'area_conhec' => $areaConhecimento->nomeAreaConhecimento,
      'nivel_ensino' => $nivel->nomeNivel,
      'serie' => $anoEscolar->nomeAnoEscolar,
      'volume' => $produto->volume,
      'num_edicao' => $produto->numEdicao,
      'origem' => $origem->nomeOrigem,
      'idioma' => $produto->idioma,
      'peg_la' => $produto->peg_la,
      'peg_lp' => $produto->peg_lp,
      'isbn_la' => $produto->isbn_la,
      'isbn_lp' => $produto->isbn_lp,
      'nome_contrato' => $produto->nomeContrato,
      'nome_capa' => $produto->nomeCapa,
      'pseudonimo' => $produto->pseudonimo,
      'num_contrato' => $produto->numContrato,
      'data_assinatura' => $produto->dataAssinatura,
      'validade_contrato' => $produto->validadeContrato
    ];

    $data = [
      'dadosGerais' => $dadosGerais,
      'especificacoes' => $especificacoes
    ];



    $produtos = json_encode($data);
    return $produtos;
  }
  /*
  Listar produtos com pendências
  */
    public function ListarPendencias(){
      $produtos = array();
      $produtos = Produto::select("SELECT * FROM produto
        WHERE
          peg_la is null
          OR peg_lp is null
          OR isbn_la is null
          OR isbn_lp is null
          OR nomeContrato is null
          OR nomeCapa is null
          OR pseudonimo is null
          OR numContrato is null
          OR dataAssinatura is null
          OR validadeContrato is null
        ");

        $produtos = json_encode($produtos);
        return $produtos;
    }

    /*
    Listar especificacao ID
    */
    public function ListarEspecificacao($id)
    {
      $produtos = array();
      $produtos = EspecificacaoTecnica::where('idEspecificacao', $id)->first();

      $produtos = json_encode($produtos);
      return $produtos;
    }

    /*
    Listar as especificações do produto X
    */
    public function ListarEspecificacoes($id)
    {
      $produtos = array();
      $produtos = EspecificacaoTecnica::where('idProduto', $id)->where('bolAnulado', 0)->get();

      $produtos = json_encode($produtos);
      return $produtos;
    }

    /*
    Listar as estruturas do produto X
    */
    public function ListarEstruturas($id)
    {
      $produtos = array();
      $produtos = EstruturaProduto::where('idEstrutura', $id)->get();
      $ids = [];
      foreach ($produtos as $produto) {
        $ids[] = $produto->idProduto;
      }
      $produtos = Produto::find($ids);


      $produtos = json_encode($produtos);
      return $produtos;
    }
    /*
    Listar as observacoes do produto X
    */

    public function ListarObservacoes($id)
    {
      $produtos = array();
      $produtos = Observacao::where('idProduto', $id)->get();
      $data = [];
      foreach ($produtos as $prod) {
        $data[] = [
          'created_at' => $prod->created_at->format('d/m/Y'),
          'observacao' => $prod->observacao,
          'idUsuario' => $prod->idUsuario
        ];
      }
      $data = json_encode($data);
      return $data;
    }
    /*
    Listar as especificações do produto X
    */

    public function ListarProdutosEstruturas($id)
    {
      $produtos = array();
      $produtos = EstruturaProduto::where('idEstrutura', $id)->get();
      $ids = [];
      foreach ($produtos as $produto) {
        $ids[] = $produto->idProduto;
      }
      $prodEstr = Produto::whereNotIn('idProduto', $ids)->where('bolAnulado', 0)->where('arquivado', 0)->get();


      $prodEstr = json_encode($prodEstr);
      return $prodEstr;
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
        'idioma' => 'required'
      ];

      if ($this->validate($request, $rules)) {

        $anoEscolar = AnoEscolar::where('idAnoEscolar', $request->serie)->first();

        $data = [
          'idAreaConhecimento'    => $anoEscolar->idNivel,
          'idAnoEscolar'          => $request->serie,
          'idOrigem'              => $request->origem,
          'titulo'                => $request->titulo,
          'tituloObra'            => $request->titulo_obra,
          'anoUso'                => $request->ano_uso,
          'anoLancamento'         => $request->ano_lancamento,
          'anoCicloVida'          => $request->ano_ciclo,
          'volume'                => $request->volume,
          'numEdicao'             => $request->num_edicao,
          'idioma'                => $request->idioma,
          'peg_la'                 => $request->peg_la,
          'peg_lp'                 => $request->peg_lp,
          'isbn_la'               => $request->isbn_la,
          'isbn_lp'               => $request->isbn_lp,
          'nomeContrato'          => $request->nome_contrato,
          'nomeCapa'              => $request->nome_capa,
          'pseudonimo'           => $request->pseudonimo,
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
        'num_paginas'   => 'numeric',
        'peso'   => 'numeric'
      ];

      if ($this->validate($request, $rules)) {

        $data = [
          'idProduto'             => $request->idProduto,
          'idTipoEspecificacao'   => 1,
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
    Função para cadastrar observacoes de produtos
    */
    public function CadastrarObservacao(Request $request)
    {

      $rules = [
        'observacao'   => 'required',
      ];

      if ($this->validate($request, $rules)) {

        $data = [
          'idProduto'       => $request->idProduto,
          'idUsuario'       => 1,
          'observacao'      => $request->observacao
        ];

        $create = Observacao::create($data);
        if($create) {
          return response()->json(['success'=>1, 'msg'=>trans('app.observacao_cadastrada')]);
        }
      }
    }
    /*
    Função para cadastrar estruturas de produtos
    */
    public function CadastrarEstrutura(Request $request)
    {
      if($request->selectedItems == null){
        return response()->json(['error'=>1, 'msg'=>trans('app.produto_vazio')]);
      }
      foreach ($request->selectedItems as $item) {
        $data = [
          'idEstrutura'     => $request->idProduto,
          'idProduto'       => $item
        ];

        $create = EstruturaProduto::create($data);
      }
      return response()->json(['success'=>1, 'msg'=>trans('app.produto_cadastrado')]);
    }
    /*
    FUNÇÃO PARA EDITAR PRODUTOS
    */
    public function EditarProduto(Request $request){

      if ($request->idProduto){
        $produto = Produto::find($request->idProduto);
        if ($produto){

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
            'idioma' => 'required'
          ];

          if ($this->validate($request, $rules)) {
            $anoEscolar = AnoEscolar::where('idAnoEscolar', $request->serie)->first();

            $data = [
              'idAreaConhecimento'    => $anoEscolar->idNivel,
              'idAnoEscolar'          => $request->serie,
              'idOrigem'              => $request->origem,
              'titulo'                => $request->titulo,
              'tituloObra'            => $request->titulo_obra,
              'anoUso'                => $request->ano_uso,
              'anoLancamento'         => $request->ano_lancamento,
              'anoCicloVida'          => $request->ano_ciclo,
              'volume'                => $request->volume,
              'numEdicao'             => $request->num_edicao,
              'idioma'                => $request->idioma,
              'peg_la'                 => $request->peg_la,
              'peg_lp'                 => $request->peg_lp,
              'isbn_la'               => $request->isbn_la,
              'isbn_lp'               => $request->isbn_lp,
              'nomeContrato'          => $request->nome_contrato,
              'nomeCapa'              => $request->nome_capa,
              'pseudonimo'           => $request->pseudonimo,
              'numContrato'           => $request->num_contrato,
              'dataAssinatura'        => $request->data_assinatura,
              'validadeContrato'      => $request->validade_contrato
            ];
            $produto->update($data);

            return response()->json(['success'=>1, 'msg'=>trans('app.produto_alterado')]);
          }
        }
      }
    }
    /*
    * EDITAR ESPECIFICAÇÃO
    */
    public function EditarEspecificacao(Request $request)
    {


      $especificacao = EspecificacaoTecnica::find($request->idEspecificacao);
      $rules = [
        'componente'   => 'required',
        'numPagina'   => 'numeric',
        'peso'   => 'numeric'
      ];

      if ($this->validate($request, $rules)) {

        $data = [
          'idProduto'             => $request->idProduto,
          'idTipoEspecificacao'   => $request->idTipoEspecificacao,
          'componente'            => $request->componente,
          'formatoAberto'         => $request->formatoAberto,
          'formatoFechado'        => $request->formatoFechado,
          'numPagina'             => $request->numPagina,
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
          'medLombada'           => $request->medLombada,
          'bolAnulado'            => 0
        ];


        $update = $especificacao->update($data);
        if($update) {
          return response()->json(['success'=>1, 'msg'=>trans('app.especificacao_editada')]);
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
    FUNÇÃO PARA DELETAR PRODUTOS
    */
    public function DeletarEstrutura(Request $request){
      $idProduto = $request->idProduto;
      $idEstrutura = $request->idEstrutura;
      $estrutura = EstruturaProduto::where('idProduto', $idProduto)->where('idEstrutura', $idEstrutura)->delete();

      return response()->json(['success'=>1, 'msg'=>trans('app.produto_deletado')]);

    }
    /*
    DELETAR ESPECIFICACAO
    */
    public function DeletarEspecificacao($id){
      if ($id){
        $produto = EspecificacaoTecnica::find($id);
        if ($produto){
          $produto->bolAnulado = 1;
          $produto->save();

          return response()->json(['success'=>1, 'msg'=>trans('app.especificacao_deletada')]);
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
