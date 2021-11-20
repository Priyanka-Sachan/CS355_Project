<?php
include '../db.php';
$pdo = pdo_connect_mysql();
$msg='';
if (!empty($_POST)) {
    $eqId = isset($_POST['id']) ? $_POST['id'] : '';
    $sts = isset($_POST['sts']) ? $_POST['sts'] : '';
    $stmt = $pdo->prepare('update Equipment set Status=? where Eq_Id=?');
    $stmt->execute([$sts,$eqId]); 
}
$eqId = isset($_GET['id']) ? $_GET['id'] : '';
$stmt = $pdo->prepare('select * from Equipment where Eq_Id=?');
$stmt->execute([$eqId]);
$eq = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$eq){
    exit('Equipment doesn\'t exist with that ID!');
}else{
    $stmt = $pdo->prepare('select * from Eq_Maintenance where Eq_Id=?;');
    $stmt->execute([$eqId]);
    $eqms = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!$eqms){
        $msg='No maintanence history';
    } 
}
?>

<?=template_header('Landscape Equipments')?>

<div class="row">
    <div class="col"></div>
    <div class="col">
	<h2>Landscape Equipments</h2>
    <div>Id: <?=$eq['Eq_Id']?></div>
    <div>Name: <?=$eq['Eq_Name']?></div>
    <div>Status: <?=$eq['Status']?></div>
<hr>
    <h3>Maintenance History</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Sent Date</th>
                <th scope="col">Return Date</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eqms as $eqm): ?>
            <tr>
                <td><?=$eqm['Eqm_Id']?></td>
                <td><?=$eqm['Sent_Date']?></td>
                <td><?=$eqm['Return_Date']?></td>
                <td><?=$eqm['Amount']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div  class="text-muted"><?=$msg?></div>
            <hr>
    <form action="read.php?id=<?=$eq['Eq_Id']?>" method="post">
    <input class="btn btn-success" type="submit" value="In use" name="sts">
    <input class="btn btn-warning" type="submit" value="In repair" name="sts">
    <input class="btn btn-danger" type="submit" value="Out of use" name="sts">
    </form>
</div>
<div class="col"></div>
</div>

<?=template_footer()?>

