<?php

function upload_image()
{
 if(isset($_FILES["product_img"]))
 {
  $extension = explode('.', $_FILES['product_img']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = 'https://github.com/oatzaa123/webbackend/upload/' . $new_name;
  move_uploaded_file($_FILES['product_img']['tmp_name'], $destination);
  return $new_name;
 }
}

function get_image_name($user_id)
{
 include('db.php');
 $statement = $connection->prepare("SELECT product_img FROM product WHERE id = '$user_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["product_img"];
 }
}

function get_total_all_records()
{
 include('db.php');
 $statement = $connection->prepare("SELECT * FROM product");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

?>
