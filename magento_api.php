<?php
error_reporting(E_ERROR);
$servername = "";
$username = "dotitdir_db";
$password = "K8dOjv,9Rr]~";
$database = "dotitdir_magento";

$link = @mysqli_connect($servername, $username, $password, $database) or die("SQL connection failed, please check connection parameters. " . mysqli_connect_error());

if (isset($_GET["sku"])){

$sku = htmlspecialchars($_GET["sku"]);

$sql = 'SELECT sku,
case when value = 2 then "disabled" else "enabled" end as web
FROM catalog_product_entity as ce
join catalog_product_entity_int as ci
on ce.entity_id = ci.entity_id
where ci.attribute_id = 97 and ce.sku = "'.$sku.'";';

$data = mysqli_query($link, $sql);
$array = array();
$row = mysqli_fetch_assoc($data);
 $array[]=$row;
if (json_encode($array) == "[null]"){
    echo '[{"sku":"Null","web":"Null"}]';
}else{
    echo json_encode($array);
}

}
else{
    
}
if (isset($_GET["web"])){

$web = htmlspecialchars($_GET["web"]);

if($web == 1){
$sql = "SELECT sku as Sku,
case when value = 2 then 'disabled' else 'enabled' end as web
FROM catalog_product_entity as ce
left join magento.catalog_product_entity_int as ci
on ce.entity_id = ci.entity_id
where ci.attribute_id = 96 and ci.store_id = 1 and ci.value = 1;";
}
if($web == 2){
$sql = "SELECT sku as Sku,
case when value = 2 then 'disabled' else 'enabled' end as web
FROM catalog_product_entity as ce
left join catalog_product_entity_int as ci
on ce.entity_id = ci.entity_id
where ci.attribute_id = 96 and ci.store_id = 1 and ci.value = 2;";
}  
if($web == 3){
$sql = "SELECT sku as Sku,
case when value = 2 then 'disabled' else 'enabled' end as web
FROM catalog_product_entity as ce
left join catalog_product_entity_int as ci
on ce.entity_id = ci.entity_id
where ci.attribute_id = 96 and ci.store_id = 1;";
}
$data = mysqli_query($link, $sql);  
$array = array();
while($row = mysqli_fetch_assoc($data)){

    $array[]=$row;

}
if (json_encode($array) == "[]"){
    echo '[{"sku":"Null","web":"Null"}]';
}else{
    echo json_encode($array);
}
 }
else{
     
}
