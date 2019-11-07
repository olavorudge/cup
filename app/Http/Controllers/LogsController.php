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
use App\LogService;
use App\LogProduto;
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

class LogsController extends Controller
{

  /*
  Função para exibir todos os produtos cadastrados
  */
  public function ListarLogsProdutos($id)
  {
    $logs = array();
    $logs = LogProduto::where('idProduto', $id)->orderBy('idLogProduto', 'DESC')->get();

    foreach ($logs as $log) {
      $descricaoLog = json_decode($log->descricaoLog, true);
    }

    $logs = json_encode($logs);
    return $logs;
  }







}
