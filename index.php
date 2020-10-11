<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria</title>
</head>

<body>


    <form method="POST" action="./finalCompra.php">
        <h1>Cardápio</h1>
        <?php
        require "./cardapio.php";
        $cardapio = Cardapio::getInstance();

        echo '<h3>Pizzas</h3>';
        $cardapio->render($cardapio->pizzas);

        echo '<h3>Bebidas</h3>';
        $cardapio->render($cardapio->bebidas);

        ?>

        <input type="submit">
        <br><br>
        <label for="entrega">Tipo de Entrega</label>
        <select name="entrega">
            <option value="2001">Normal - R$ 5</option>
            <option value="2002">Devagar, quase parando - R$ 0.05</option>
            <option value="2003">Propositalmente Lenta - R$ 0.99</option>
            <option value="2004">Rápida - R$ 20</option>
            <option value="2005">Hyperdrive - R$ 500</option>
        </select>
    </form>

</body>

</html>