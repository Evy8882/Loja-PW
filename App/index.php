<?php
require "connect.php";
$query = $_GET["q"] ?? "";
$result = $mysqli->query("SELECT * FROM `produtos` WHERE `nome` LIKE '%$query%'");

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
    <h2 style="text-align: center; margin-top: 32px;">Principais produtos</h2>
    <h3 style="text-align: center;">Confira nossos produtos mais vendidos</h3>
    <form action="" class="search">
        <input type="text" id="search" class="search__input" name="q" placeholder="Pesquisar..." value="<?php echo $query ?>"><button>Pesquisar <i class="fas fa-search"></i>    </button>
    </form>
    <section class="container">

        <?php
        while ($item = $result->fetch_assoc()) {
        ?>
            <div class="container__item">
                <img src="<?php echo $item["imagem"]; ?>" alt="">
                <h3><?php echo $item["nome"]; ?></h3>
                <div><?php echo $item["descricao"]; ?></div>
                <div>R$ <?php echo number_format($item["preco"], 2); ?></div>
                <button class="cart-bar" title="Adicionar ao carrinho" onclick="addToCart(<?php echo $item['id_produto'] ?>)"><i class="fas fa-shopping-cart"></i></button>
            </div>
        <?php
        }
        ?>

    </section>
    <form class="form" action="addToCart.php">
        <input type="hidden" name="product_id" class="product_id">
    </form>
    <script src="main.js"></script>
</body>

</html>