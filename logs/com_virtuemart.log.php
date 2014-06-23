#
#<?php die("Forbidden."); ?>

2014-05-28 09:21:05 ERROR vmError: TableCustoms Тип отсутствует! Не удается сохранить запись без Тип.
2014-05-28 09:21:05 ERROR vmError: TableCustoms Тип отсутствует! Не удается сохранить запись без Тип.
2014-06-18 08:16:29 ERROR vmError: TableCustoms Тип отсутствует! Не удается сохранить запись без Тип.
2014-06-18 08:16:29 ERROR vmError: TableCustoms Тип отсутствует! Не удается сохранить запись без Тип.
2014-06-23 09:44:45 ERROR vmError: exeSortSearchListQuery Unknown column 'ciohg_virtuemart_product_categories.virtuemart_category_id' in 'where clause' SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `ciohg_virtuemart_product_categories`.`virtuemart_category_id` IN(2, 7, 8, 9, 10, 11)
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:44:53 ERROR vmError: exeSortSearchListQuery Unknown column 'ciohg_virtuemart_product_categories.virtuemart_category_id' in 'where clause' SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `ciohg_virtuemart_product_categories`.`virtuemart_category_id` IN(7)
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:44:57 ERROR vmError: exeSortSearchListQuery Unknown column 'ciohg_virtuemart_product_categories.virtuemart_category_id' in 'where clause' SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `ciohg_virtuemart_product_categories`.`virtuemart_category_id` IN(8)
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:45:01 ERROR vmError: exeSortSearchListQuery Unknown column 'ciohg_virtuemart_product_categories.virtuemart_category_id' in 'where clause' SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `ciohg_virtuemart_product_categories`.`virtuemart_category_id` IN(11)
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:50:58 ERROR vmError: exeSortSearchListQuery Unknown column 'ciohg_virtuemart_product_categories.virtuemart_category_id' in 'where clause' SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `ciohg_virtuemart_product_categories`.`virtuemart_category_id` IN(2, 7, 8, 9, 10, 11)
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:54:50 ERROR vmError: exeSortSearchListQuery You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20' at line 8 SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `ciohg_virtuemart_product_categories`.`virtuemart_category_id` IN(2, 7, 8, 9, 10, 11
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:54:55 ERROR vmError: exeSortSearchListQuery You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20' at line 8 SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `ciohg_virtuemart_product_categories`.`virtuemart_category_id` IN(8
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:56:01 ERROR vmError: exeSortSearchListQuery You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20' at line 8 SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `pc`.`virtuemart_category_id` IN (8
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:56:07 ERROR vmError: exeSortSearchListQuery You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20' at line 8 SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `pc`.`virtuemart_category_id` IN (8
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 09:56:13 ERROR vmError: exeSortSearchListQuery You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20' at line 8 SQL=SELECT SQL_CALC_FOUND_ROWS  p.`virtuemart_product_id` FROM `ciohg_virtuemart_products` as p  
 INNER JOIN `ciohg_virtuemart_products_ru_ru` as l using (`virtuemart_product_id`) 
 LEFT JOIN `ciohg_virtuemart_product_shoppergroups` as ps ON p.`virtuemart_product_id` = `ps`.`virtuemart_product_id`  
 LEFT JOIN `ciohg_virtuemart_product_categories` as pc ON p.`virtuemart_product_id` = `pc`.`virtuemart_product_id` 
 WHERE ( p.`published`="1" 
 AND  `pc`.`virtuemart_category_id` IN (2, 7, 8, 9, 10, 11
 AND  (   `ps`.`virtuemart_shoppergroup_id`= "1"  OR  `ps`.`virtuemart_shoppergroup_id` IS NULL  ) ) 
 group by p.`virtuemart_product_id` 
 ORDER BY `pc`.`ordering`  ASC LIMIT 0, 20
2014-06-23 14:26:16 ERROR vmError: The parameter <em>Merchant Email</em> is required for the payment <em>Без оплаты</em> (<em>  1</em>)
2014-06-23 14:26:16 ERROR vmError: The parameter <em>Merchant Email</em> is required for the payment <em>Без оплаты</em> (<em>  1</em>)
2014-06-23 14:36:09 ERROR vmError: Vendor image given image is not complete images/stories/virtuemart/vendor/.
2014-06-23 14:36:39 ERROR vmError: Vendor image given image is not complete images/stories/virtuemart/vendor/.