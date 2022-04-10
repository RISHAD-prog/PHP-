<?php
require_once 'connection_database.php';
function addData($data)
{
    $conn = Connection_db();
    $sql = "INSERT INTO products(House_Type,Buying_Price,Selling_Price) values(:product_type,:buying_price,:selling_price)";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [
                ':product_type' => $data['product_type'],
                ':buying_price' => $data['buying_price'],
                ':selling_price' => $data['selling_price']
            ]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function showallData()
{
    $conn = Connection_db();
    $sql = "SELECT * FROM products";
    try {
        $stmt = $conn->query($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function editData($id)
{
    $conn = Connection_db();
    $selectQuery = "SELECT * FROM products where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}
function updateData($id, $data)
{
    $conn = Connection_db();
    $selectQuery = "UPDATE products SET House_Type = ?, Buying_Price = ?, Selling_Price = ? where ID = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['product_type'], $data['buying_price'], $data['selling_price'], $id
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}
function deleteData($id)
{
    $conn = Connection_db();
    $selectQuery = "DELETE FROM products WHERE ID = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}
function searchData($Type)
{
    $conn = Connection_db();
    $selectQuery = "SELECT * FROM products WHERE House_Type LIKE '%$Type%'";


    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
