<?php
// Busca o config dentro da pasta config
require_once "config/config.php"; 

// Busca as funções dentro da pasta models
include_once "models/funcoes.php";

// Busca o cabeçalho dentro da pasta views
include "views/cabecalho.php";

echo "<center>";
echo "<h3>Lista de Contatos</h3>";
echo "<a href='views/cadastro_contato.php'><button type='button'>+ Adicionar Novo Contato</button></a><br><br>";

$lista = obterContatos($pdo);
exibirTabelaContatos($lista);
echo "</center>";

include "views/rodape.php";
?>