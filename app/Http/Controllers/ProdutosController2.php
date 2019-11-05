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
use Illuminate\Support\Facades\DB;
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

    // QUERY ESPEC TECNICA
    $produtos = DB::select("SELECT
      prod.idProduto,
      prod.titulo,
      prod.isbn_la,
      prod.peg_la,
      prod.idEspecificacao,
      CASE WHEN prod.idEspecificacao IS NULL THEN '' ELSE CamposPendentesEspecificacao END as CamposEspecificacao,
      CASE WHEN prod.idEspecificacao IS NULL THEN 0 ELSE sumPendentesEspecificacoes END as PendentesEspecificacoes
      FROM (
        SELECT p.idProduto, p.titulo, p.isbn_la, p.peg_la, e.idEspecificacao,
        SUM(
          CASE WHEN e.componente IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.formatoAberto IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.formatoFechado IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.numPagina IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.papel IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.cores IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.acabamento IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.observacoes IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.espessura IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.peso IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.orientacao IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.alvura IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.opacidade IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.lombada IS NULL THEN 1 ELSE 0 END +
          CASE WHEN e.medLombada IS NULL THEN 1 ELSE 0 END
        ) as sumPendentesEspecificacoes,
        CONCAT(
          CASE WHEN e.componente IS NULL THEN 'Componente; ' ELSE '' END,
          CASE WHEN e.formatoAberto IS NULL THEN 'Formato Aberto; ' ELSE '' END,
          CASE WHEN e.formatoFechado IS NULL THEN 'Formato Fechado; ' ELSE '' END,
          CASE WHEN e.numPagina IS NULL THEN 'Número de páginas; ' ELSE '' END,
          CASE WHEN e.papel IS NULL THEN 'Papel; ' ELSE'' END,
          CASE WHEN e.cores IS NULL THEN 'Cores; ' ELSE '' END,
          CASE WHEN e.acabamento IS NULL THEN 'Acabamento; ' ELSE '' END,
          CASE WHEN e.observacoes IS NULL THEN 'Observações; ' ELSE '' END,
          CASE WHEN e.espessura IS NULL THEN 'Espessura; ' ELSE '' END,
          CASE WHEN e.peso IS NULL THEN 'Peso; ' ELSE '' END,
          CASE WHEN e.orientacao IS NULL THEN 'Orientação; ' ELSE '' END,
          CASE WHEN e.alvura IS NULL THEN 'Alvura; ' ELSE '' END,
          CASE WHEN e.opacidade IS NULL THEN 'Opacidade; ' ELSE '' END,
          CASE WHEN e.lombada IS NULL THEN 'Lombada; ' ELSE '' END,
          CASE WHEN e.medLombada IS NULL THEN 'Medida lombada; ' ELSE '' END
        ) as CamposPendentesEspecificacao
        FROM produto p
        LEFT JOIN especificacoes_tecnicas e ON e.idProduto = p.idProduto
        WHERE (
          e.componente is null
          OR e.formatoAberto is null
          OR e.formatoFechado is null
          OR e.numPagina is null
          OR e.papel is null
          OR e.cores is null
          OR e.acabamento is null
          OR e.observacoes is null
          OR e.espessura is null
          OR e.peso is NULL
          OR e.orientacao is NULL
          OR e.alvura is NULL
          OR e.opacidade is NULL
          OR e.lombada is NULL
          OR e.medLombada is NULL
        )
        AND e.bolAnulado = 0
        GROUP BY p.idProduto, e.idEspecificacao
      ) AS prod
      GROUP BY prod.idProduto, prod.idEspecificacao
      ");

      // QUERY CADASTRO geral
      $produtos = DB::select("SELECT
        prod.idProduto,
        prod.titulo,
        prod.isbn_la,
        prod.peg_la,
        sumPendentesProduto,
        CamposPendentes
        FROM (
          SELECT p.idProduto, p.titulo, p.isbn_la, p.peg_la,
          SUM(CASE WHEN p.peg_la IS NULL THEN 1 ELSE 0 END  +
            CASE WHEN p.peg_lp IS NULL THEN 1 ELSE 0 END  +
            CASE WHEN p.isbn_la IS NULL THEN 1 ELSE 0 END  +
            CASE WHEN p.isbn_lp IS NULL THEN 1 ELSE 0 END  +
            CASE WHEN p.nomeContrato IS NULL THEN 1 ELSE 0 END  +
            CASE WHEN p.nomeCapa IS NULL THEN 1 ELSE 0 END   +
            CASE WHEN p.pseudonimo IS NULL THEN 1 ELSE 0 END  +
            CASE WHEN p.numContrato IS NULL THEN 1 ELSE 0 END  +
            CASE WHEN p.dataAssinatura IS NULL THEN 1 ELSE 0 END  +
            CASE WHEN p.validadeContrato IS NULL THEN 1 ELSE 0 END ) as sumPendentesProduto,
            CONCAT(
              CASE WHEN p.peg_la IS NULL THEN 'PEG LA; ' ELSE '' END,
              CASE WHEN p.peg_lp IS NULL THEN 'PEG LP; ' ELSE '' END,
              CASE WHEN p.isbn_la IS NULL THEN 'ISBN LA; ' ELSE '' END,
              CASE WHEN p.isbn_lp IS NULL THEN 'ISBN LP; ' ELSE '' END,
              CASE WHEN p.nomeContrato IS NULL THEN 'Nome do Contrato; ' ELSE'' END,
              CASE WHEN p.nomeCapa IS NULL THEN 'Nome da Capa; ' ELSE '' END,
              CASE WHEN p.pseudonimo IS NULL THEN 'Pseudônimo; ' ELSE '' END,
              CASE WHEN p.numContrato IS NULL THEN 'Número do Contrato; ' ELSE '' END,
              CASE WHEN p.dataAssinatura IS NULL THEN 'Data de Assinatura; ' ELSE '' END,
              CASE WHEN p.validadeContrato IS NULL THEN 'Validade de Contrato; ' ELSE '' END
            ) as CamposPendentes
            FROM produto p
            WHERE (
              p.peg_la is null
              OR p.peg_lp is null
              OR p.isbn_la is null
              OR p.isbn_lp is null
              OR p.nomeContrato is null
              OR p.nomeCapa is null
              OR p.pseudonimo is null
              OR p.numContrato is null
              OR p.dataAssinatura is null
              OR p.validadeContrato is NULL )
              AND p.bolAnulado = 0
              AND p.arquivado = 0
              GROUP BY p.idProduto
            ) AS prod
            GROUP BY prod.idProduto
            ");

            // QUERY TODAS
            $produtos = DB::select("SELECT
              prod.idProduto,
              prod.titulo,
              prod.isbn_la,
              prod.peg_la,
              prod.idEspecificacao,
              sumPendentesProduto,
              CamposPendentes,
              CASE WHEN prod.idEspecificacao IS NULL THEN '' ELSE CamposPendentesEspecificacao END as CamposEspecificacao,
              CASE WHEN prod.idEspecificacao IS NULL THEN 0 ELSE sumPendentesEspecificacoes END as PendentesEspecificacoes
              FROM (
                SELECT p.idProduto, p.titulo, p.isbn_la, p.peg_la, e.idEspecificacao,
                SUM(CASE WHEN p.peg_la IS NULL THEN 1 ELSE 0 END  +
                  CASE WHEN p.peg_lp IS NULL THEN 1 ELSE 0 END  +
                  CASE WHEN p.isbn_la IS NULL THEN 1 ELSE 0 END  +
                  CASE WHEN p.isbn_lp IS NULL THEN 1 ELSE 0 END  +
                  CASE WHEN p.nomeContrato IS NULL THEN 1 ELSE 0 END  +
                  CASE WHEN p.nomeCapa IS NULL THEN 1 ELSE 0 END   +
                  CASE WHEN p.pseudonimo IS NULL THEN 1 ELSE 0 END  +
                  CASE WHEN p.numContrato IS NULL THEN 1 ELSE 0 END  +
                  CASE WHEN p.dataAssinatura IS NULL THEN 1 ELSE 0 END  +
                  CASE WHEN p.validadeContrato IS NULL THEN 1 ELSE 0 END ) as sumPendentesProduto,
                  SUM(
                    CASE WHEN e.componente IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.formatoAberto IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.formatoFechado IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.numPagina IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.papel IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.cores IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.acabamento IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.observacoes IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.espessura IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.peso IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.orientacao IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.alvura IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.opacidade IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.lombada IS NULL THEN 1 ELSE 0 END +
                    CASE WHEN e.medLombada IS NULL THEN 1 ELSE 0 END
                  ) as sumPendentesEspecificacoes,
                  CONCAT(
                    CASE WHEN p.peg_la IS NULL THEN 'PEG LA; ' ELSE '' END,
                    CASE WHEN p.peg_lp IS NULL THEN 'PEG LP; ' ELSE '' END,
                    CASE WHEN p.isbn_la IS NULL THEN 'ISBN LA; ' ELSE '' END,
                    CASE WHEN p.isbn_lp IS NULL THEN 'ISBN LP; ' ELSE '' END,
                    CASE WHEN p.nomeContrato IS NULL THEN 'Nome do Contrato; ' ELSE'' END,
                    CASE WHEN p.nomeCapa IS NULL THEN 'Nome da Capa; ' ELSE '' END,
                    CASE WHEN p.pseudonimo IS NULL THEN 'Pseudônimo; ' ELSE '' END,
                    CASE WHEN p.numContrato IS NULL THEN 'Número do Contrato; ' ELSE '' END,
                    CASE WHEN p.dataAssinatura IS NULL THEN 'Data de Assinatura; ' ELSE '' END,
                    CASE WHEN p.validadeContrato IS NULL THEN 'Validade de Contrato; ' ELSE '' END
                  ) as CamposPendentes,
                  CONCAT(
                    CASE WHEN e.componente IS NULL THEN 'Componente; ' ELSE '' END,
                    CASE WHEN e.formatoAberto IS NULL THEN 'Formato Aberto; ' ELSE '' END,
                    CASE WHEN e.formatoFechado IS NULL THEN 'Formato Fechado; ' ELSE '' END,
                    CASE WHEN e.numPagina IS NULL THEN 'Número de páginas; ' ELSE '' END,
                    CASE WHEN e.papel IS NULL THEN 'Papel; ' ELSE'' END,
                    CASE WHEN e.cores IS NULL THEN 'Cores; ' ELSE '' END,
                    CASE WHEN e.acabamento IS NULL THEN 'Acabamento; ' ELSE '' END,
                    CASE WHEN e.observacoes IS NULL THEN 'Observações; ' ELSE '' END,
                    CASE WHEN e.espessura IS NULL THEN 'Espessura; ' ELSE '' END,
                    CASE WHEN e.peso IS NULL THEN 'Peso; ' ELSE '' END,
                    CASE WHEN e.orientacao IS NULL THEN 'Orientação; ' ELSE '' END,
                    CASE WHEN e.alvura IS NULL THEN 'Alvura; ' ELSE '' END,
                    CASE WHEN e.opacidade IS NULL THEN 'Opacidade; ' ELSE '' END,
                    CASE WHEN e.lombada IS NULL THEN 'Lombada; ' ELSE '' END,
                    CASE WHEN e.medLombada IS NULL THEN 'Medida lombada; ' ELSE '' END
                  ) as CamposPendentesEspecificacao
                  FROM produto p
                  LEFT JOIN especificacoes_tecnicas e ON e.idProduto = p.idProduto
                  WHERE (
                    p.peg_la is null
                    OR p.peg_lp is null
                    OR p.isbn_la is null
                    OR p.isbn_lp is null
                    OR p.nomeContrato is null
                    OR p.nomeCapa is null
                    OR p.pseudonimo is null
                    OR p.numContrato is null
                    OR p.dataAssinatura is null
                    OR p.validadeContrato is NULL )
                    AND p.bolAnulado = 0
                    AND e.bolAnulado = 0
                    AND p.arquivado = 0
                    GROUP BY p.idProduto, e.idEspecificacao
                  ) AS prod
                  GROUP BY prod.idProduto, prod.idEspecificacao
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
