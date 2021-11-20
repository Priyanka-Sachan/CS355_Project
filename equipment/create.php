<?php
include '../db.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $eqId = isset($_POST['eqId']) && !empty($_POST['eqId']) ? $_POST['eqId'] : NULL;
    $eqName = isset($_POST['eqName']) ? $_POST['eqName'] : '';

    $stmt = $pdo->prepare('call insert_equipment(?,?);');
    $stmt->execute([$eqId, $eqName]);

    $msg = 'Created Successfully!';
}
?>

<?=template_header('Add equipment')?>
<h2 style="text-align:center;">Add Equipment Details</h2>
<div class="row">
    <div class="col"></div>
    <div class="col">
        <form action="create.php" method="post">
    <div class="mb-3">
            <label class="form-label" for="eqId">Equipment ID</label>
            <input class="form-control" type="text" name="eqId" id="eqId">
            </div>
    <div class="mb-3">
            <label class="form-label" for="eqName">Name</label>
            <input class="form-control" type="text" name="eqName" id="eqName">
    </div>
            <input class="btn btn-primary" type="submit" value="Create">
        </form>
    </div>
    <div class="col"></div>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>