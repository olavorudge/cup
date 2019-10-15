import $ from "jquery";
import "popper.js";
import "bootstrap";
import "bootstrap-datepicker";

import App from "@/js/views/App.vue";
import Vue from "vue";
import router from "@/js/router";

Vue.config.devtools = true;

new Vue({
    el: '#app',
    router,
    render: h => h(App)
});

//import "./bootstrap"

$(".datepicker").datepicker();

$(".btn-adicionar-componente").on("click", function() {
    // $(".table-componentes").hide();
    // $(".form-cadastrar-componente").show();
    $("#modal-adicionar-componente").modal()
});

$(".form-cadastrar-componente .btn-cancelar").on("click", function(event) {
    event.preventDefault();
    $(".form-cadastrar-componente").hide();
    $(".table-componentes").show();
});

$(".btn-opcoes-filtrar-produtos").on("click", function() {
    $(".form-exportar-produtos").hide();
    $(".form-filtrar-produtos").toggle(400);
});

$(".btn-opcoes-exportar-produtos").on("click", function() {
    $(".form-filtrar-produtos").hide();
    $(".form-exportar-produtos").toggle(400);
});

$(".btn-mostrar-pendencias").on("click", function() {
    $(this)
        .parents("tr")
        .after(
            '<tr><td colspan="7">Lista dos campos pendentes. Campo 1, campo 2, ...</td></tr>'
        );
});

$(".product-line-card").on("click", function() {
    $(this)
        .parents(".row")
        .children(".order-2")
        .hide();
    $(this)
        .parent()
        .next()
        .show(400);
});

$(".btn-adicionar-observacao").on("click", function() {
    $("#modal-adicionar-observacao").modal()

    // let observacao = $("textarea[name='observacao']").val();
    // $("#table-observacoes tbody").append(
    //     "<tr><td>26/09/2019 14:33</td><td>" + observacao + "</td></tr>"
    // );
    // $("textarea[name='observacao']").val("");
});

$(".btn-salvar-produto").on("click", function(event) {
    event.preventDefault();
    $("#modal-adicionar-descricao").modal("show");
});

$(".form-cadastrar-componente .btn-salvar-componente").on("click", function(event) {
    event.preventDefault();
    $(".form-cadastrar-componente").hide();
    $(".table-componentes tbody").append(
        "<tr><td>Nome do componente A</td><td>30</td><td><span data-toggle='tooltip' class='material-icons'>delete</span></td></tr>"
    );
    $(".table-componentes").show();
});