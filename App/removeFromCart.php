<?php
require "connect.php";
$id = $_GET["product_id"];
$mysqli->query("DELETE FROM `carrinho` WHERE `id_produto`='$id'");
header("location: cart.php");