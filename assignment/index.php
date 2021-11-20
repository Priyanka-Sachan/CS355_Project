<?php
include '../db.php';
$pdo = pdo_connect_mysql();

$stmt = $pdo->prepare('select * from Assignment where End_Date IS NULL;');
$stmt->execute();
$ags = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Landscape Assignments')?>

<div >
	<h2>Landscape Assignments</h2>
	<a href="create.php">Add Landscape Assignments</a>
	<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Assignment Id</th>
                <th scope="col">Area Id</th>
                <th scope="col">Service</th>
                <th scope="col">Start_Date</th>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ags as $ag): ?>
            <tr>
                <td><?=$ag['As_Id']?></td>
                <td><?=$ag['Area_Id']?></td>
                <td><?=$ag['Service']?></td>
                <td><?=$ag['Start_Date']?></td>
                <td class="actions">
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=template_footer()?>

