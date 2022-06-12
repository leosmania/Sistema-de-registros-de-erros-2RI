<?php
include("../config/config.php");

$sql = "SELECT * FROM registros WHERE setor = 'Atendimento'";

$res = $conn->query($sql);

$qtd_atendimento = $res->num_rows;

$sql = "SELECT * FROM registros WHERE setor = 'Centrais'";

$res = $conn->query($sql);

$qtd_centrais = $res->num_rows;

$sql = "SELECT * FROM registros WHERE setor = 'Registro'";

$res = $conn->query($sql);

$qtd_registro = $res->num_rows;

$sql = "SELECT * FROM registros WHERE setor = 'Analise'";

$res = $conn->query($sql);

$qtd_analise = $res->num_rows;

$sql = "SELECT * FROM registros WHERE setor = 'Conferência'";

$res = $conn->query($sql);

$qtd_conferencia = $res->num_rows;

$sql = "SELECT * FROM registros WHERE setor = 'Finalização'";

$res = $conn->query($sql);

$qtd_finalizacao = $res->num_rows;

// requisição da classe PHPlot
include('../plugins/graf/phplot.php');

$grafico->SetTitle("Gráfico de exemplo");
$grafico->SetXTitle("Eixo X");
$grafico->SetYTitle("Eixo Y");
$data = array(
    array('Atendimento', $qtd_atendimento),
    array('Centrais', $qtd_centrais),
    array('Registro', $qtd_registro),
    array('Analise', $qtd_registro),
    array('Conferência', $qtd_conferencia),
    array('Finalização', $qtd_finalizacao),
);

$grafico->SetDataValues($dados);

#Neste caso, usariamos o gráfico em barras
$grafico->SetPlotType("bars");

#Exibimos o gráfico
$grafico->DrawGraph();
?>