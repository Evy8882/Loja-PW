<?php
require "connect.php";
$id = $_GET["product_id"];
$mysqli->query("INSERT INTO `carrinho` (`fk_produto`) VALUES ($id)");
?>
<script>
    let win = open("index.php", "_self");
    win.alert("Item adicionado ao carrinho com sucesso :)")
</script>
