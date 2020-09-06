<?php
header("Content-type: application/json");
require "../Modal/Data.php";

$get_condition=$_GET['get_condition'] ?? null;

    if ($get_condition) {
        $jsonData = file_get_contents("../restaurant.json");
        $dataList = json_decode($jsonData, true)['menu_items'];
    try {
        $product = new Item_list($dataList);} 

    catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }

   switch($get_condition)
    {
        case 'name' : echo $product->itemNames();
        break;
        case 'details' : echo $product->itemDetails($_GET['id']);
        break;
        default:echo json_encode(['Invalid Request']);
    } }
?>