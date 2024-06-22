<?php 
$database = "filmesonline";
$usuario = "root";
$senha = "";
$host = "localhost";

$mysqlConexao = new mysqli($host, $usuario, $senha, $database);

$queryFilmes = "SELECT * FROM filmes";
$conexaoFilmes = mysqli_query($mysqlConexao, $queryFilmes);

$queryFilmesRecentes = "SELECT * FROM filmes WHERE ano_lancamento > 2020";
$conexaoFilmesRecentes = mysqli_query($mysqlConexao, $queryFilmesRecentes);

$querySeries = "SELECT * FROM series";
$conexaoSeries = mysqli_query($mysqlConexao, $querySeries);

$queryContatos = "SELECT * FROM contatos";
$conexaoContatos = mysqli_query($mysqlConexao, $queryContatos);