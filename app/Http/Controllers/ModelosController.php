<?php

namespace App\Http\Controllers;

use App\Modelo;
use App\Http\Controllers\Controller;
use App\Models\ViewModels\LinhaProdutoViewModel;
use App\Models\ViewModels\ProdutoViewModel;
use App\Models\ViewModels\UsuarioViewModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class ModelosController extends Controller
{
  public function ListarModelos(){
    $modelos = array();
    $modelos = Modelo::all()->where('bolAnulado', 0);

    $modelos = json_encode($modelos);
    return $modelos;
  }

  public function CadastrarModelo(){

    $rules = [
      'nomeModelo'   => 'required',
      'compartilhamento'    => 'required'
    ];

    if ($this->validate($request, $rules)) {

      $data = [
        'idUsuario'          => 2,
        'nomeModelo'         => 1,
        'autor'              => 'Usuario teste',
        'compartilhamento'   => 1,
      ];

      $create = Produto::create($data);
      if($create) {
        return response()->json(['success'=>1, 'msg'=>trans('app.produto_cadastrado')]);
      }
    }
  }

  public function SelecionarModelo($id){
    $modelos = array();
    $modelos = Modelo::where('idModelo', $id)->first();

    $modelos = json_encode($modelos);
    return $modelos;
  }

  public function DeletarModelo($id){
    if ($id){
      $modelo = Modelo::where('idModelo', $id)->first();
      if ($modelo){
        $modelo->bolAnulado = 1;
        $modelo->save();

        return response()->json(['success'=>1, 'msg'=>trans('app.modelo_deletado')]);
      }
    }
  }


}