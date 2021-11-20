<?php
include '../db.php';
$pdo = pdo_connect_mysql();

$dt='2021-11-09';
$stmt = $pdo->prepare('call view_monthly_attendance(?);');
$stmt->execute([$dt]);
$drs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Duty Roster')?>


<div class="row">
    <div class="col">
	<h2>Duty Roster</h2>
	<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Day</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($drs as $dr): ?>
            <tr>
                <td><?=$dr['day']?></td>
                <td><?=$dr['total']?></td>
                <td class="actions">
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
            <div class="col"></div>
</div>

<?=template_footer()?>

