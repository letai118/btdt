<?php
require_once("../config/database.php");
class OrderModel {
    private $pdo;
    public function __construct(){
        $this->pdo = Database::connect();
    }

    // Create order and insert order items inside transaction
    public function createOrder($customer, $total, $items){
        try{
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare("INSERT INTO orders (customer_name, customer_email, customer_phone, customer_address, note, total) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $customer['name'],
                $customer['email'] ?? null,
                $customer['phone'] ?? null,
                $customer['address'] ?? null,
                $customer['note'] ?? null,
                $total
            ]);
            $orderId = $this->pdo->lastInsertId();

            $stmtItem = $this->pdo->prepare("INSERT INTO order_items (order_id, product_id, product_name, price, quantity) VALUES (?, ?, ?, ?, ?)");
            foreach($items as $it){
                $stmtItem->execute([
                    $orderId,
                    $it['id'],
                    $it['name'],
                    $it['price'],
                    $it['quantity']
                ]);
            }

            $this->pdo->commit();
            return $orderId;
        } catch (Exception $e){
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function findById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$order) return null;
        $stmt = $this->pdo->prepare("SELECT * FROM order_items WHERE order_id = ?");
        $stmt->execute([$id]);
        $order['items'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $order;
    }
}
