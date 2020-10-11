<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final da Compra</title>
</head>

<body>
    <?php
    require "cardapio.php";
    $cardapio = Cardapio::getInstance();
    ?>

    <ul>
        <h1>Itens Escolhidos</h1>
        <?php foreach ($_POST['pedido'] as $item) : ?>
            <li><?= $cardapio->getName($item); ?></li>
        <?php endforeach ?>
    </ul>

    <p>Tipo de Entrega: <?= $cardapio->getName($_POST['entrega']); ?></p>
    <p>Valor Final: <?= $cardapio->calcularValorFinal(); ?></p>
</body>

</html>