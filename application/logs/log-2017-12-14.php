<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-12-14 06:26:52 --> 404 Page Not Found: Products/1
ERROR - 2017-12-14 06:27:17 --> 404 Page Not Found: Products/1
ERROR - 2017-12-14 06:27:19 --> 404 Page Not Found: Products/2
ERROR - 2017-12-14 06:27:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\app\ci\src\application\models\product_model.php 121
ERROR - 2017-12-14 06:27:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\app\ci\src\application\models\product_model.php 121
ERROR - 2017-12-14 06:28:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\app\ci\src\application\models\product_model.php 121
ERROR - 2017-12-14 06:28:17 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\app\ci\src\application\models\product_model.php 121
ERROR - 2017-12-14 06:32:27 --> Query error: Column 'id' in field list is ambiguous - Invalid query: SELECT `id`
FROM `products`
JOIN `categories_products` ON `categories_products`.`products_id` = `products`.`id`
WHERE `categories_products`.`categories_id` = '4'
ERROR - 2017-12-14 06:32:27 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp\htdocs\app\ci\src\application\models\product_model.php 124
