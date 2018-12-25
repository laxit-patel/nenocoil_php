<?php
require_once(dirname(__FILE__)."\..\database\database_mysqli.php");
if(isset($_POST['product_id']))
{
    $product_id = $_POST['product_id'];

    $conn = reconnect();

    if($conn)
    {
        $query = "select * from product where product_id = '$product_id' ";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            $product_data = mysqli_fetch_assoc($result);
            echo json_encode($product_data);
        }
        else
        {
            echo "<option> No Products Found </option>";
        }
    }
    else
    {
        echo "<option>Not connected</option>";
    }
}

?>