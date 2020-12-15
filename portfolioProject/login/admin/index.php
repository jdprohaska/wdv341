<?php
include 'main.php';
$stmt = $pdo->prepare('SELECT * FROM accounts');
$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_admin_header('Accounts')?>

<h2>Accounts</h2>

<div class="links">
    <a href="account.php">Create Account</a>
</div>

<div class="content-block">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>#</td>
                    <td>Username</td>
                    <td class="responsive-hidden">Password</td>
                    <td class="responsive-hidden">Email</td>
                    <td class="responsive-hidden">Activation Code</td>
                    <td class="responsive-hidden">Role</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($accounts)): ?>
                <tr>
                    <td colspan="8" style="text-align:center;">There are no accounts</td>
                </tr>
                <?php else: ?>
                <?php foreach ($accounts as $account): ?>
                <tr class="details" onclick="location.href='account.php?id=<?=$account['id']?>'">
                    <td><?=$account['id']?></td>
                    <td><?=$account['username']?></td>
                    <td class="responsive-hidden" style="word-break:break-all;"><?=$account['password']?></td>
                    <td class="responsive-hidden"><?=$account['email']?></td>
                    <td class="responsive-hidden"><?=$account['activation_code']?></td>
                    <td class="responsive-hidden"><?=$account['role']?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?=template_admin_footer()?>
