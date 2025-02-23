<?php
 require "connect.php";

 $result = $mysqli->query("SELECT * FROM `carrinho`");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Itens</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body>
    <header>
        <h2>Loja PW</h2>
        <nav>
            <a href="index.php">Comprar<i class="fas fa-shopping-bag"></i></a>
            <a href="cart.php">Carrinho<i class="fas fa-shopping-cart"></i></a>
        </nav>
    </header>
    <h2 style="text-align: center; margin-top: 32px;">Seu carrinho</h2>
    <h3 style="text-align: center;">Confira os produtos que você adicionou ao carrinho</h3>
    <section class="container">

        <?php
            $total = 0;
            while ($item = $result->fetch_assoc()){
                $id_produto = $item["fk_produto"];
                $res = $mysqli->query("SELECT * FROM `produtos` WHERE `id_produto` = '$id_produto'");
                $produto = $res->fetch_assoc();
                $total += $produto["preco"];
                ?>
                <div class="container__item">
                    <img src="<?php echo $produto["imagem"]; ?>" alt="">
                    <h3><?php echo $produto["nome"]; ?></h3>
                    <div><?php echo $produto["descricao"]; ?></div>
                    <div>R$ <?php echo number_format($produto["preco"], 2); ?></div>
                    <button class="cart-bar red" title="Remover do carrinho" onclick="addToCart(<?php echo $item['id_produto'] ?>)"><i class="fas fa-trash"></i></button>
                </div>
                <?php
            }
        ?>

    </section>
    <div class="line">
        <a href="index.php"><button class="back">Voltar</button></a>
        <?php
            echo "subtotal: R$" . number_format($total, 2);
        ?>
        <a href="buy.php"><button class="go">Continuar</button></a>
    </div>
    <form class="form" action="removeFromCart.php">
        <input type="hidden" name="product_id" class="product_id">
    </form>
    <script src="main.js"></script>
</body>
</html>