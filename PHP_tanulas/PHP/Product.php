<?php
class Product
{
    private $id;
    private $name;
    private $price;
    private $inventory;
    private $imagePath;

    public function __construct($id, $name, $price, $inventory, $imagePath)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->inventory = $inventory;
        $this->imagePath = $imagePath;
    }

    public static function getProductById($productId)
    {
        $productsFile = '../DAO/products.txt';
        $lines = file($productsFile, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            $productData = explode(',', $line);

            if ($productData[0] == $productId) {
                $id = $productData[0];
                $name = $productData[1];
                $price = $productData[2];
                $sQuantity = intval($productData[3]);
                $mQuantity = intval($productData[4]);
                $lQuantity = intval($productData[5]);
                $imagePath = $productData[6];

                $inventory = [
                    'S' => $sQuantity,
                    'M' => $mQuantity,
                    'L' => $lQuantity
                ];

                return new Product($id, $name, $price, $inventory, $imagePath);
            }
        }

        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }
}
?>
