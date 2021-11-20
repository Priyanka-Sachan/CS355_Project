<?php
include '../db.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    $areaId = isset($_GET['id']) ? $_GET['id'] : '';
    if (!empty($_POST)) {
        $areaName = isset($_POST['areaName']) ? $_POST['areaName'] : '';
        $loc = isset($_POST['loc']) ? $_POST['loc'] : '';
        $zn = isset($_POST['zn']) ? $_POST['zn'] : '';

        $stmt = $pdo->prepare('call edit_landscape_area(?,?,?,?);');
        $stmt->execute([$areaId, $areaName, $loc, $zn]);

        $msg = 'Created Successfully!';
    }
    $stmt = $pdo->prepare('call view_landscape_area_by_id(?);');
    $stmt->execute([$areaId]);
    $lda = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$lda){
        exit('Landscape area doesn\'t exist with that ID!');
    }
}else {
    exit('No ID specified!');
}
?>

<?=template_header('Update Landscape')?>

<h2 style="text-align:center;">Update Landscape area details</h2>
<div class="row">
    <div class="col"></div>
    <div class="col">
    <form action="update.php?id=<?=$lda['Area_Id']?>" method="post">
    <div class="mb-3">
        <label class="form-label" for="areaId">Area ID</label>
        <input class="form-control" type="text" name="areaId" id="areaId" value="<?=$lda['Area_Id']?>" disabled>
        </div>
    <div class="mb-3">
        <label class="form-label" for="areaName">Name</label>
        <input class="form-control"type="text" name="areaName" id="areaName" value="<?=$lda['Area_Name']?>">
        </div>
    <div class="mb-3">
        <label class="form-label" for="loc">Location</label>
        <input class="form-control" type="text" name="loc" id="loc" value="<?=$lda['Location']?>">
        </div>
    <div class="mb-3">
        <label class="form-label" for="zn">Zone</label>
        <input class="form-control" type="text" name="zn" id="zn" value="<?=$lda['Zone']?>">
</div>
        <input class="btn btn-primary" type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
<div class="col"></div>
    </div>

<?=template_footer()?>
