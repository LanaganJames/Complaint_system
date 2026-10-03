<?php
require_once(__DIR__.'/model/product_db.php');
require_once(__DIR__.'/model/complaint_type_db.php');
$products=ProductsDB::getAll(); $types=ComplaintTypesDB::getAll();
?>
<!DOCTYPE html><html><head><title>Database Test</title></head><body>
<h1>Products</h1><?php foreach($products as $p): ?><p><?php echo htmlspecialchars($p['product_name']); ?> - <?php echo htmlspecialchars($p['description']); ?></p><?php endforeach; ?>
<h1>Complaint Types</h1><?php foreach($types as $t): ?><p><?php echo htmlspecialchars($t['type_name']); ?> - <?php echo htmlspecialchars($t['description']); ?></p><?php endforeach; ?>
</body></html>
