<?php
include '../db.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $areaId = isset($_POST['areaId']) && !empty($_POST['areaId']) ? $_POST['areaId'] : NULL;
    $areaName = isset($_POST['areaName']) ? $_POST['areaName'] : '';
    $loc = isset($_POST['loc']) ? $_POST['loc'] : '';
    $zn = isset($_POST['zn']) ? $_POST['zn'] : '';

    $stmt = $pdo->prepare('call insert_landscape_area(?,?,?,?);');
    $stmt->execute([$areaId, $areaName, $loc, $zn]);

    $msg = 'Created Successfully!';
}
?>

<?=template_header('Add employee')?>

<h2 style="text-align:center;">Add Landscape area details</h2>
<div class="row">
    <div class="col"></div>
    <div class="col">
    <form action="create.php" method="post">
    <div class="mb-3">
        <label class="form-label" for="areaId">Area ID</label>
        <input class="form-control" type="text" name="areaId" id="areaId">
        </div>
    <div class="mb-3">
        <label class="form-label" for="areaName">Name</label>
        <input class="form-control" type="text" name="areaName" id="areaName">
        </div>
    <div class="mb-3">
        <label class="form-label" for="loc">Location</label>
        <input class="form-control" type="text" name="loc" id="loc">
        </div>
    <div class="mb-3">
        <label class="form-label" for="zn">Zone</label>
        <input class="form-control" type="text" name="zn" id="zn">
</div>
        <input class="btn btn-primary" type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
<div class="col"></div>
</div>

<?=template_footer()?>
