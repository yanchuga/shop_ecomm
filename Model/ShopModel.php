<?php
require_once PROJECT_ROOT_PATH . "/Model/DataBase.php";
class ShopModel extends Database
{
    public function getGroups()
    {
        $query = "
            SELECT * FROM shop_groups ORDER BY id ASC
            ";
        return $this->select($query);
    }
    public function getGroup($cn_value)
    {
        $query = "
            SELECT * FROM shop_groups WHERE id = '".$cn_value."'
            ";
            return $this->select($query);
    }
    public function getProducts()
    {
        $query = "
            SELECT * FROM shop_products ORDER BY id ASC
            ";
        return $this->select($query);
    }
    public function getProduct($cn_value)
    {
        $query = "
            SELECT * FROM shop_products WHERE id = '".$cn_value."'
            ";
            return $this->select($query);
    }
}