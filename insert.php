<?php
include('server.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $image = '';
  if($_FILES["product_img"]["name"] != '')
  {
   $image = upload_image();
  }
  $statement = $connection->prepare("
   INSERT INTO product (product_name, product_price, product_details, product_img) 
   VALUES (:product_name, :product_price, :product_details, :product_img)
  ");
  $result = $statement->execute(
   array(
    ':product_name' => $_POST["product_name"],
    ':product_price' => $_POST["product_price"],
    ':product_details' => $_POST["product_details"],
    ':product_img'  => $image
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  $image = '';
  if($_FILES["product_img"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  $statement = $connection->prepare(
   "UPDATE product 
   SET product_name = :product_name, product_price = :product_price, product_details = :product_details, product_img = :product_img
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':product_name' => $_POST["product_name"],
    ':product_price' => $_POST["product_price"],
    ':product_details' => $_POST["product_details"],
    ':product_img'  => $image,
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
