<?php

namespace App;

use App\Log;
use App\LogProduto;
use Carbon\Carbon;

class LogService
{
  public function createLog($idUsuario, $idTipoLog, $descricaoLog, $observacao){
    $data = [
      'idTipoLog' => $idTipoLog,
      'idUsuario' => $idUsuario,
      'descricaoLog' => $descricaoLog,
      'observacao' => $observacao,
      'created_at' => Carbon::now(),

    ];

    $create = Log::create($data);
    if ($create) {
      return true;
    }
  }

  public function createLogProduto($idUsuario, $idTipoLog, $idProduto, $idEspecificacao, $descricaoLog, $observacao){
    $data = [
      'idTipoLog' => $idTipoLog,
      'idUsuario' => $idUsuario,
      'idProduto' => $idProduto,
      'idEspecificacao' => $idEspecificacao,
      'descricaoLog' => $descricaoLog,
      'observacao' => $observacao,
      'created_at' => Carbon::now(),

    ];

    $create = LogProduto::create($data);
    if ($create) {
      return true;
    }

  }

}
