<?php
include 'main.php';
include_once 'upload.php';


// Default input account values
$catProducts = array(
    'product_name' => '',
    'product_description' => '',
    'product_price' => '',
    'product_image' => '',
    'product_inStock' => '',
    'product_status' => '',
    'product_update_date' => '',
    'product_paypal' => ''
    
);

if (isset($_GET['id'])) {
    // Get the account from the database
    $stmt = $pdo->prepare('SELECT * FROM wdv341_corgiproductscats WHERE id = ?');
    $stmt->execute([ $_GET['id'] ]);
    $catProducts = $stmt->fetch(PDO::FETCH_ASSOC);
    // ID param exists, edit an existing account
    $page = 'Edit';
    if (isset($_POST['submit'])) {
        // Update the account
        $stmt = $pdo->prepare('UPDATE wdv341_corgiproductscats SET product_name = ?, product_description = ?, product_price = ?, product_image = ?, product_inStock = ?, product_status = ?, product_update_date = ?, product_paypal = ? WHERE id = ?');
        $stmt->execute([ $_POST['product_name'], $_POST['product_description'], $_POST['product_price'], $_POST['product_image'], $_POST['product_inStock'], $_POST['product_status'], $_POST['product_update_date'], $_POST['product_paypal'], $_GET['id'] ]);
        header('Location: cat-index.php');
        exit;
    }
    if (isset($_POST['delete'])) {
        // Delete the account
        $stmt = $pdo->prepare('DELETE FROM wdv341_corgiproductscats WHERE id = ?');
        $stmt->execute([ $_GET['id'] ]);
        header('Location: cat-index.php');
      
        exit;
    }
} else {
    // Create a new account
    $page = 'Create';
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare('INSERT IGNORE INTO wdv341_corgiproductscats (product_name,product_description,product_price,product_image,product_inStock,product_status,product_update_date,product_paypal) VALUES (?,?,?,?,?,?,?,?)');
        $stmt->execute([ $_POST['product_name'], $_POST['product_description'], $_POST['product_price'], $_POST['product_image'], $_POST['product_inStock'], $_POST['product_status'], $_POST['product_update_date'], $_POST['product_paypal'] ]);
        header('Location: cat-index.php');
        exit;
    }
}
?>



<?=template_admin_header($page . ' Account')?>

<h2><?=$page?> cat Product</h2>

<div class="content-block">

    <form action="" method="POST" class="form responsive-width-100" enctype="multipart/form-data">
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="product_name" placeholder="Product Name" value="<?=$catProducts['product_name']?>" required>
        <label for="product_description">Product Description</label>
        <input type="text" id="product_description" name="product_description" placeholder="Product Description" value="<?=$catProducts['product_description']?>" required>
        <label for="product_price">product Price (e.g. 11.99)</label>
        <input type="text" id="product_price" name="product_price" placeholder="product Price" value="<?=$catProducts['product_price']?>" required>
        <label for="product_image">product Image</label>
        <input type="file"  id="product_image" name="product_image" placeholder="product Image" value="<?=$catProducts['product_image']?>">
        <label for="product_image">product Image name (Must be the same as uploaded image e.g. image.jpg)</label>
        <input type="text"  id="product_image" name="product_image" placeholder="product Image" value="<?=$catProducts['product_image'] ?>">
        <label for="product_inStock">product Instock</label>
        <input type="text" id="product_inStock" name="product_inStock" placeholder="product Instock" value="<?=$catProducts['product_inStock']?>">
        <label for="product_status">product Status</label>
        <input type="text" id="product_status" name="product_status" placeholder="product Status" value="<?=$catProducts['product_status']?>">
        <label for="product_update_date">product Update Date</label>
        <input type="date" id="product_update_date" name="product_update_date" placeholder="product Update Date" value="<?=$catProducts['product_update_date']?>">
        <!-- <div>
        <label for="product_paypal">Product Paypal</label>
        <input type="text" id="product_paypal"  name="product_update_date" placeholder="Paste Paypal button info here"  value="<?=$catProducts['product_paypal']?>">
        </div> -->
        <div class="submit-btns">
            <input type="submit" name="submit" value="Submit">
            <?php if ($page == 'Edit'): ?>
            <input type="submit" name="delete" value="Delete" class="delete">
            <?php endif; ?>
        </div>
    </form>
</div>

<?=template_admin_footer()?>
