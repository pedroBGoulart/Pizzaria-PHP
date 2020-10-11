<?php
class Cardapio
{
    public static $instance;
    public $pizzas = [
        '0001' => ["nome" => "Calabresa", "preco" => 29.99],
        '0002' => ["nome" => "Quatro Queijos Marcianos  ", "preco" => 399.50],
        '0003' => ["nome" => "Brigadeiro Vegano", "preco" => 25.80],
        '0004' => ["nome" => "Peixe Mofado", "preco" => 150.00],
        '0005' => ["nome" => "Barata Radiotiva", "preco" => 580.65],
        '0006' => ["nome" => "Chocolate com Jujuba", "preco" => 340.65],
        '0007' => ["nome" => "Chucrute com Pepino Siberiano", "preco" => 2030.15],
        '0008' => ["nome" => "Fígado com Brócolis", "preco" => 1058.25],
        '0009' => ["nome" => "Jiló com Marschmalow", "preco" => 200.35],
        '0010' => ["nome" => "Biscoito Maizena Velho (Com Molho)", "preco" => 100.05],
        '0011' => ["nome" => "Baiana do Acre", "preco" => 99.46],
    ];

    public $bebidas = [
        '1001' => ["nome" => "Nuka Cola", "preco" => 4.99],
        '1002' => ["nome" => "Coca Cola sabor leite", "preco" => 2.99],
        '1003' => ["nome" => "Pepsi sabor Banana", "preco" => 1.40],
        '1004' => ["nome" => "Cachaça Estragada", "preco" => 3.80],
    ];

    public $entregas = [
        "2001" => ["nome" => "normal", "preco" => 5.00],
        "2002" => ["nome" => "devagar, quase parando", "preco" => 0.05],
        "2003" => ["nome" => "propositalmente lenta", "preco" => 0.99],
        "2004" => ["nome" => "lenta", "preco" => 20.00],
        "2005" => ["nome" => "hyperdrive", "preco" => 500.00],
    ];

    # verifica se uma instância da classe já foi criada e a retorna
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    # printa os itens do cardápio
    public function render(array $arrayToRender)
    {
        foreach ($arrayToRender as $key => $item) {
            echo "<input type=checkbox name=pedido[] value=" . $key . ">" . $item['nome'] . "<br>";
        };
    }

    # retorna o array de um item baseado em sua chave
    private function getCategory(string $itemKey)
    {
        $categories = [
            "0" => $this->pizzas,
            "1" => $this->bebidas,
            "2" => $this->entregas,
        ];
        return $categories[$itemKey[0]];
    }

    # retorna o preço de um item
    public function getPrice(string $itemKey)
    {
        $itemArray = $this->getCategory($itemKey);
        return $itemArray[$itemKey]['preco'];
    }

    # retorna o nome de um item
    public function getName(string $itemKey)
    {
        $itemArray = $this->getCategory($itemKey);
        return $itemArray[$itemKey]['nome'];
    }

    # calcula o total dos valores dos itens no pedido
    public function calcularValorFinal()
    {
        $valorFinal = 0;
        foreach ($_POST['pedido'] as $item) {
            $valorFinal += $this->getPrice($item);
        }
        return $valorFinal + $this->getPrice($_POST['entrega']);
    }
}
