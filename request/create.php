<?php
include '../db.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $rqrId = isset($_POST['rqrId']) ? $_POST['rqrId'] : '';
    $areaId = isset($_POST['areaId']) ? $_POST['areaId'] : '';
    $srv = isset($_POST['srv']) ? $_POST['srv'] : '';

    $stmt = $pdo->prepare('insert into Service_Request values (0,?,?,?,curdate(),"Pending")');
    $stmt->execute([$rqrId, $areaId, $srv]);

    $msg = 'Created Successfully!';
}
?>

<?=template_header('Add employee')?>
<h2 style="text-align:center;">Add Service Request</h2>
<div class="row">
    <div class="col"></div>
    <div class="col">
    <form action="create.php" method="post">
    <div class="mb-3">
        <label class="form-label" for="rqrId">Requester ID</label>
        <input class="form-control" type="text" name="rqrId" id="rqrId">
        </div>
    <div class="mb-3">
        <label class="form-label" for="areaId">Area Id</label>
        <input class="form-control" type="text" name="areaId" id="areaId">
        </div>
    <div class="mb-3">
        <label class="form-label" for="srv">Request Description</label>
        <input class="form-control" type="text" name="srv" id="srv">
</div>
        <input class="btn btn-primary" type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
<div class="col"></div>
<div>
<?=template_footer()?>
