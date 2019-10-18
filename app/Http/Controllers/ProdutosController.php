<?php

namespace App\Http\Controllers;

use App\Produto;
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
    $produtos = Produto::all()->where('bolAnulado', 0);

    $produtos = json_encode($produtos);
    return $produtos;
  }

  /*
  Função para cadastrar produtos
  */
  public function CadastrarProdutos(Request $request)
  {

    // $rules = [
    //     'category'            => 'required',
    // ];
    //
    // $this->validate($request, $rules);

    echo json_encode($request);

  }


}
