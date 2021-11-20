<?php
include '../db.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $empId = isset($_POST['empId']) && !empty($_POST['empId']) ? $_POST['empId'] : NULL;
    $empName = isset($_POST['empName']) ? $_POST['empName'] : '';
    $ctNo = isset($_POST['ctNo']) ? $_POST['ctNo'] : '';
    $dsg = isset($_POST['dsg']) ? $_POST['dsg'] : '';
    $zn = isset($_POST['zn']) ? $_POST['zn'] : '';
    $sal = isset($_POST['sal']) ? $_POST['sal'] : 0;

    $stmt = $pdo->prepare('call insert_gardener(?,?,?,?,?,?);');
    $stmt->execute([$empId, $empName, $ctNo, $dsg, $zn, $sal]);

    $msg = 'Created Successfully!';
}
?>

<?=template_header('Add employee')?>
<h2 style="text-align:center;" >Add Employee Details</h2>
<div class="row">
<div class="col"></div>
<div class="col">
    <form action="create.php" method="post">
    <div class="mb-3">
        <label class="form-label" for="empId">Employee ID</label>
        <input class="form-control" type="text" name="empId" id="empId">
        </div>
    <div class="mb-3">
        <label class="form-label" for="empName">Name</label>
        <input class="form-control" type="text" name="empName" id="empName">
        </div>
    <div class="mb-3">
        <label class="form-label" for="ctNo">Contact No</label>
        <input class="form-control" type="text" name="ctNo" id="ctNo">
        </div>
    <div class="mb-3">
        <label class="form-label" for="dsg">Designation</label>
        <input class="form-control" type="text" name="dsg" id="dsg">
        </div>
    <div class="mb-3">
        <label class="form-label" for="zn">Zone</label>
        <input class="form-control" type="text" name="zn" id="zn">
        </div>
    <div class="mb-3">
        <label class="form-label" for="sal">Salary</label>
        <input class="form-control" type="number" name="sal" id="sal">
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
