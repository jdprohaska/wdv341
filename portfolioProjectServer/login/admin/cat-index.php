<?php
include 'main.php';
$stmt = $pdo->prepare('SELECT * FROM wdv341_corgiproductscats');
$stmt->execute();
$catProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?=template_admin_header('Accounts')?>

<h2>Cat Products</h2>

<div class="links">
    <a href="catProducts.php">Create Product</a>
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
                <?php if (empty($catProducts)): ?>
                <tr>
                    <td colspan="8" style="text-align:center;">There are no Products</td>
                </tr>
                <?php else: ?>
                <?php foreach ($catProducts as $catProduct): ?>
                <tr class="details" onclick="location.href='catProducts.php?id=<?=$catProduct['id']?>'">
                    <td><?=$catProduct['id']?>:</td>
                    <td><?=$catProduct['product_name']?></td>
                    <td><?=$catProduct['product_description']?></td>
                    <td class="responsive-hidden"><?=$catProduct['product_price']?></td>
                    <td class="responsive-hidden"><?=$catProduct['product_image']?></td>
                    <td class="responsive-hidden"><?=$catProduct['product_inStock']?></td>
                    <td class="responsive-hidden"><?=$catProduct['product_status']?></td>
                    <td class="responsive-hidden"><?=$catProduct['product_update_date']?></td>
                    <!-- <td class="responsive-hidden"><?=$catProduct['product_paypal']?></td> -->
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?=template_admin_footer()?>
