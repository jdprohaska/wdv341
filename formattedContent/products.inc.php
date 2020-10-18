<?php
class Products extends Dbh {
    public function getAllProducts() {
        $stmt = $this->connect()->query("SELECT * FROM wdv341_events");
        while ($row = $stmt->fetch()) {
            $productId =$row['product_id'];

            return $productId;
        }
    }
}
?>