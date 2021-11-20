<?php
include '../db.php';
$pdo = pdo_connect_mysql();

$stmt = $pdo->prepare('call view_equipments();');
$stmt->execute();
$eqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Landscape Equipments')?>

	<h2>Landscape Equipments</h2>
	<a href="create.php">Add landscape equipments</a>

<div class="row">
    <div class="col">
	<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Equipment Id</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eqs as $eq): ?>
            <tr>
                <td><?=$eq['Eq_Id']?></td>
                <td><?=$eq['Eq_Name']?> <a href="read.php?id=<?=$eq['Eq_Id']?>"><i class="fas fa-eye fa-xs"></i></a></td>
                <td><?=$eq['Status']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="col"></div>
</div

<?=template_footer()?>

