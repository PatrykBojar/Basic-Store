<?php
$result = mysql_query("SELECT SPONSORED FROM PRODUCT");
$storeArray = Array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] =  $row['SPONSORED'];
}



 ?>
