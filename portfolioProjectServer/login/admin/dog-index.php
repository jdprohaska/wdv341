<?php
include 'main.php';
$stmt = $pdo->prepare('SELECT * FROM wdv341_corgiproducts');
$stmt->execute();
$dogProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?=template_admin_header('Accounts')?>

<h2>Dog Products</h2>

<div class="links">
    <a href="dogProducts.php">Create Product</a>
</div>

<div class="content-block">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>#</td>
                    <td>Product Name</td>
                    <td class="responsive-hidden">Product Description</td>
                    <td class="responsive-hidden">Product Price</td>
                    <td class="responsive-hidden">Product Image</td>
                    <td class="responsive-hidden">Product In Stock</td>
                    <td class="responsive-hidden">Product Status</td>
                    <td class="responsive-hidden">Product Update Date</td>
                    <!-- <td class="responsive-hidden">Product Paypal</td> -->
                </tr>
            </thead>
            <tbody>
                <?php if (empty($dogProducts)): ?>
                <tr>
                    <td colspan="8" style="text-align:center;">There are no Products</td>
                </tr>
                <?php else: ?>
                <?php foreach ($dogProducts as $dogProduct): ?>
                <tr class="details" onclick="location.href='dogProducts.php?id=<?=$dogProduct['id']?>'">
                    <td><?=$dogProduct['id']?>:</td>
                    <td><?=$dogProduct['product_name']?></td>
                    <td><?=$dogProduct['product_description']?></td>
                    <td class="responsive-hidden"><?=$dogProduct['product_price']?></td>
                    <td class="responsive-hidden"><?=$dogProduct['product_image']?></td>
                    <td class="responsive-hidden"><?=$dogProduct['product_inStock']?></td>
                    <td class="responsive-hidden"><?=$dogProduct['product_status']?></td>
                    <td class="responsive-hidden"><?=$dogProduct['product_update_date']?></td>
                    <!-- <td class="responsive-hidden"><?=$dogProduct['product_paypal']?></td> -->
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?=template_admin_footer()?>
