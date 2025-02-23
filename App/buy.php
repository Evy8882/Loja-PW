<?php
require "connect.php";
$mysqli->query("DELETE FROM `carrinho`");

?>
<script>
    let win = open("cart.php", "_self");
    win.alert("Compra realizada com sucesso 👍")
</script>
