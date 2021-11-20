<?php
include '../db.php';
$pdo = pdo_connect_mysql();

$sts='Pending';
$stmt = $pdo->prepare('select * from Service_Request where Status=?;');
$stmt->execute([$sts]);
$rqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Service Requests')?>

<div >
	<h2>Service Requests</h2>
	<a href="create.php">Add service Requests</a>
	<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Request Id</th>
                <th scope="col">Requester Id</th>
                <th scope="col">Area Id</th>
                <th scope="col">Service</th>
                <th scope="col">Date of request</th>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rqs as $rq): ?>
            <tr>
                <td><?=$rq['Rq_Id']?></td>
                <td><?=$rq['Rqr_Id']?></td>
                <td><?=$rq['Area_Id']?></td>
                <td><?=$rq['Service']?></td>
                <td><?=$rq['Rqr_Date']?></td>
                <td class="actions">
                <?php if ($sts=='Pending'): ?>
                    <button class="btn btn-success" onclick=>APPROVE</button>
                    <span>/</span>
                    <button class="btn btn-danger">REJECT</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=template_footer()?>

