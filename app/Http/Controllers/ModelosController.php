<?php

namespace App\Http\Controllers;

use App\Modelo;
use App\ModeloCampo;
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
    $modelos = Modelo::where('bolAnulado', 0)->get();

    $modelos = json_encode($modelos);
    return $modelos;
  }


  public function CadastrarModelo(Request $request){

    $rules = [
      'nome_modelo'   => 'required',
      'compartilhamento'    => 'required'
    ];

    if ($this->validate($request, $rules)) {

      $data = [
        'idUsuario'          => 2,
        'nomeModelo'         => $request->nome_modelo,
        'autor'              => 'Usuario teste',
        'compartilhamento'   => $request->compartilhamento,
      ];

      $create = Modelo::create($data);
      if($create) {

        try {
          foreach ($request->checkbox as $check) {

            $dataModeloCampo = [
              'idModelo' => $create->idModelo,
              'idCampo' => $check,
            ];

            $insert = ModeloCampo::create($dataModeloCampo);

          }
          return response()->json(['success'=>1, 'msg'=>trans('app.modelo_cadastrado')]);
        } catch (\Exception $e) {

          return response()->json(['error'=>1, 'msg'=>trans('app.falha_cadastro')]);
        }


      }
    }
  }

  public function SelecionarModelo($id){
    $modelos = array();
    $modelos = Modelo::where('idModelo', $id)->where('bolAnulado', 0)->first();
    $campos = ModeloCampo::where('idModelo', $id)->get();

    $arr = [];
    foreach ($campos as $campo) {
      $arr[] = $campo->idCampo;
    }
    $data = [
      'nomeModelo' => $modelos->nomeModelo,
      'compartilhamento' => $modelos->compartilhamento,
      'checkbox' => $arr
    ];
    $modelo = json_encode($data);
    return $modelo;
  }

  public function EditarModelo(Request $request){
    if ($request->idModelo){
      $modelo = Modelo::find($request->idModelo);
      if ($modelo){
        $data = [
          'nomeModelo' => $request->nome_modelo,
          'compartilhamento' => $request->compartilhamento
        ];
        $modelo->update($data);

        $campos = ModeloCampo::where('idModelo', $request->idModelo)->delete();
        foreach ($request->checkbox as $check) {

          $dataModeloCampo = [
            'idModelo' => $request->idModelo,
            'idCampo' => $check,
          ];

          $insert = ModeloCampo::create($dataModeloCampo);

        }

        return response()->json(['success'=>1, 'msg'=>trans('app.modelo_atualizado')]);
      }
    }
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
