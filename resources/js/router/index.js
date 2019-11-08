import Vue from "vue";
import Router from "vue-router";

import Home from "@/js/views/Home";
import Produto from "@/js/views/Produto";
import Produtos from "@/js/views/Produtos";
import Pendencias from "@/js/views/Pendencias";
import Modelo from "@/js/views/Modelo";
import Modelos from "@/js/views/Modelos";
import Usuarios from "@/js/views/Usuarios";

Vue.use(Router);

let router = new Router({
    mode: "hash",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/itens",
            name: "itens",
            component: Produtos,
            meta: {
                title: "Produtos"
            }
        },
        {
            path: "/itens/produtos",
            name: "produtos",
            component: Produtos,
            meta: {
                title: "Produtos"
            }
        },
        {
            path: "/itens/estruturas",
            name: "estruturas",
            component: Produtos,
            meta: {
                title: "Estruturas"
            }
        },
        {
            path: "/produto",
            name: "cadastrarProduto",
            component: Produto,
            meta: {
                title: "Cadastrar Produto"
            }
        },
        {
            path: "/produto/:id",
            name: "editarProduto",
            component: Produto,
            meta: {
                title: "Editar Produto"
            }
        },
        {
            path: "/pendencias",
            name: "pendencias",
            component: Pendencias,
            meta: {
                title: "Pendências"
            }
        },
        {
            path: "/pendencias/gerais",
            name: "pendenciasGeral",
            component: Pendencias,
            meta: {
                title: "Pendências nos Dados Gerais"
            }
        },
        {
            path: "/pendencias/especificacoes",
            name: "pendenciasEspecificacoes",
            component: Pendencias,
            meta: {
                title: "Pendências nas Especificações"
            }
        },
        {
            path: "/usuarios",
            name: "usuarios",
            component: Usuarios,
            meta: {
                title: "Usuários"
            }
        },
        {
            path: "/usuario",
            name: "cadastrarUsuario",
            component: Usuarios,
            meta: {
                title: "Cadastrar Usuário"
            }
        },
        {
            path: "/usuario/:id",
            name: "editarUsuario",
            component: Usuarios,
            meta: {
                title: "Editar Usuário"
            }
        },
        {
            path: "/modelos",
            name: "modelos",
            component: Modelos,
            meta: {
                title: "Modelos"
            }
        },
        {
            path: "/modelo",
            name: "cadastrarModelo",
            component: Modelo,
            meta: {
                title: "Cadastrar Modelo"
            }
        },
        {
            path: "/modelo/:id",
            name: "editarModelo",
            component: Modelo,
            meta: {
                title: "Editar Modelo"
            }
        },
        {
            path: "/login",
            name: "login",

        },
        {
            path: "/recover-password",
            name: "recoverPassword"
        }
    ]
});

export default router;
