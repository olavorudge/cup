<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ViewModels\LinhaProdutoViewModel;
use App\Models\ViewModels\ProdutoViewModel;
use App\Models\ViewModels\UsuarioViewModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        $cookie = \Cookie::forget( 'linha' );
        Cookie::queue( Cookie::make( 'linha', 0, -1 ) );

        $linhas = array();

        $linha = new LinhaProdutoViewModel();
        $linha->id = 1;
        $linha->nome = 'ABR - Aprende Brasil';
        array_push( $linha->subLinhas,
            [
                'nome' => 'ABR.EF - Ensino Fundamental',
                'id' => 1
            ],
            [
                'nome' => 'ABR.EI - Educação Infantil',
                'id' => 2
            ],
            [
                'nome' => 'ABR.EM - Ensino Médio',
                'id' => 3
            ]
        );
        array_push($linhas, $linha);

        $linha = new LinhaProdutoViewModel();
        $linha->id = 2;
        $linha->nome = 'DIC - Dicionário';
        array_push($linhas, $linha);

        $linha = new LinhaProdutoViewModel();
        $linha->id = 3;
        $linha->nome = 'LDT - Livro Didático';
        array_push( $linha->subLinhas,
            [
                'nome' => 'LDT.EF - Ensino Fundamental',
                'id' => 4
            ],
            [
                'nome' => 'LDT.EI - Educação Infantil',
                'id' => 5
            ],
            [
                'nome' => 'LDT.EM - Ensino Médio',
                'id' => 6
            ]
        );
        array_push($linhas, $linha);

        return view('home', [ 'linhas' => $linhas ]);
    }

    public function getLogIn()
    {
        return view( 'login' );
    }

    public function getRecuperarSenha()
    {
        return view( 'recuperar-senha' );
    }

    public function getLogOut()
    {
        return redirect( '/login' );
    }

    public function getLinhaProduto(Request $request)
    {
        Cookie::queue( Cookie::make('linha', $request->id, 60) );

        return redirect( '/produtos/todos' );
    }

    public function getCadastrarProduto()
    {
        $produto = new ProdutoViewModel();

        return view('cadastrar', [ 'produto' => $produto ]);
    }

    public function getEditarProduto(Request $request)
    {
        $produto = new ProdutoViewModel();
        $produto->id = 1;
        $produto->tituloColecao = 'Titulo maneiro da colecao';

        $produtoFilho = new ProdutoViewModel();
        $produtoFilho->nome = "prd filho";
        array_push( $produto->produtosFilhos, $produtoFilho );

        return view('cadastrar', [ 'produto' => $produto ]);
    }

    public function getListarProdutos(Request $request)
    {
        $produtos = array();

        $produto = new ProdutoViewModel();
        $produto->id = 1;
        $produto->identificador = "identificador 1";
        $produto->nome = "Nome do produto";
        $produto->peg = "peggggg";
        $produto->isbn = "isbnnnnnn";
        $produto->dataModificacao = "12/05/2019 11:33";
        $produto->tipo = "Produto";
        array_push($produtos, $produto);

        $produto = new ProdutoViewModel();
        $produto->id = 2;
        $produto->identificador = "identificador 2A";
        $produto->nome = "Nome do produto 2";
        $produto->peg = "peggggg12";
        $produto->isbn = "isbnnnnnn";
        $produto->dataModificacao = "04/03/2018 11:45";
        $produto->tipo = "Produto";
        array_push($produtos, $produto);

        $produto = new ProdutoViewModel();
        $produto->id = 3;
        $produto->identificador = "identificador 3";
        $produto->nome = "Nome da estrutura";
        $produto->peg = "peggggg12";
        $produto->isbn = "isbnnnnnn";
        $produto->dataModificacao = "04/03/2018 11:45";
        $produto->tipo = "Estrutura";
        array_push($produtos, $produto);

        $title = 'Listar produtos';
        if ( $request->route()->getName() == 'estruturas' )
        {
            $title = 'Listar estruturas';
        }

        return view('listar-produtos', [ 'produtos' => $produtos, 'title' => $title ]);
    }    

    public function getListarPendencias(Request $request)
    {
        $produtos = array();
        $produto = new ProdutoViewModel();
        $produto->id = 2;
        $produto->identificador = "identificador B";
        $produto->nome = "Nome do produto 2";
        $produto->peg = "peggggg12";
        $produto->isbn = "isbnnnnnn";
        $produto->dataModificacao = "04/03/2018 11:45";
        $produto->numeroPendencias = 13;
        array_push($produtos, $produto);

        $produto = new ProdutoViewModel();
        $produto->id = 1;
        $produto->identificador = "identificador X";
        $produto->nome = "Nome do produto";
        $produto->peg = "peggggg";
        $produto->isbn = "isbnnnnnn";
        $produto->dataModificacao = "04/03/2018 11:45";
        $produto->numeroPendencias = 1;
        array_push($produtos, $produto);

        $title = "Pendências";
        if ( $request->route()->getName() == 'pendencias-geral' )
        {
            $title = "Pendências no cadastro geral";
        }
        else if ( $request->route()->getName() == 'pendencias-especificacoes' )
        {
            $title = "Pendências nas especificações técnicas";
        }
        

        return view('listar-pendencias', [ 'produtos' => $produtos, 'title' => $title ]);
    }

    public function getAdicionarComponente()
    {
        $produtos = array();
        $produto = new ProdutoViewModel();
        $produto->id = 2;
        $produto->nome = "Nome do produto 2";
        $produto->peg = "peggggg12";
        $produto->isbn = "isbnnnnnn";
        array_push($produtos, $produto);

        return view('modals.buscar-produto', [ 'produtos' => $produtos ]);
    }

    public function getUsuarios()
    {
        $usuarios = array();

        $usuario = new UsuarioViewModel();
        $usuario->id = 1;
        $usuario->nome = 'Alexandre';
        $usuario->email = 'alexandre@positivo.com.br';
        array_push( $usuarios, $usuario );

        $usuario = new UsuarioViewModel();
        $usuario->id = 2;
        $usuario->nome = 'Grocholski';
        $usuario->email = 'grocholski@positivo.com.br';
        array_push( $usuarios, $usuario );

        return view( 'usuarios', [ 'usuarios' => $usuarios ] );
    }

    public function getCadastrarUsuario()
    {
        $usuario = new UsuarioViewModel();
        return view( 'cadastrar-usuario', [ 'usuario' => $usuario ] );
    }

    public function getEditarUsuario(Request $request)
    {
        $usuario = new UsuarioViewModel();
        $usuario->id = $request->id;
        $usuario->nome = 'Alexandre';
        $usuario->email = 'alexandre@positivo.com.br';

        return view( 'cadastrar-usuario', [ 'usuario' => $usuario ] );
    }

    public function postCadastrarProduto()
    {
        return '';
    }
}
