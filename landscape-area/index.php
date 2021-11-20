<?php
include '../db.php';
$pdo = pdo_connect_mysql();

$stmt = $pdo->prepare('call view_landscape_areas();');
$stmt->execute();
$ldas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Landscape Area')?>

<div >
	<h2>Landscape Area</h2>
	<a href="create.php">Add landscape area</a>
	<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Area Id</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">Zone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ldas as $lda): ?>
            <tr>
                <td><?=$lda['Area_Id']?></td>
                <td><?=$lda['Area_Name']?>
                    <a href="update.php?id=<?=$lda['Area_Id']?>"><i class="fas fa-pen fa-xs"></i></a></td>
                <td><iframe src="<?=$lda['Location']?>" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></td>
                <td><?=$lda['Zone']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=template_footer()?>

