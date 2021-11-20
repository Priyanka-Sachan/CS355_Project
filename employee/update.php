<?php
include '../db.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['empId'])) {
    $empId = isset($_GET['empId']) ? $_GET['empId'] : '';
    if (!empty($_POST)) {
        $ctNo = isset($_POST['ctNo']) ? $_POST['ctNo'] : '';
        $dsg = isset($_POST['dsg']) ? $_POST['dsg'] : '';
        $zn = isset($_POST['zn']) ? $_POST['zn'] : '';
        $sal = isset($_POST['sal']) ? $_POST['sal'] : 0;

        $stmt = $pdo->prepare('call edit_gardener(?,?,?,?,?);');
        $stmt->execute([$empId, $ctNo, $dsg, $zn, $sal]);

        $msg = 'Created Successfully!';
    }
    $stmt = $pdo->prepare('call view_gardener_by_id(?);');
    $stmt->execute([$empId]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$employee){
        exit('Employee doesn\'t exist with that ID!');
    }
}else {
    exit('No ID specified!');
}
?>

<?=template_header('Update employee')?>

<h2 style="text-align:center;" >Update Employee Details</h2>
<div class="row">
<div class="col"></div>
    <div class="col">
    <form action="update.php?empId=<?=$employee['Emp_Id']?>" method="post">
    <div class="mb-3">
        <label class="form-label" for="empId">Employee ID</label>
        <input class="form-control" type="text" name="empId" id="empId" value="<?=$employee['Emp_Id']?>" disabled>
        </div>
    <div class="mb-3">
        <label class="form-label" for="empName">Name</label>
        <input class="form-control" type="text" name="empName" id="empName" value="<?=$employee['Emp_Name']?>"disabled>
        </div>
    <div class="mb-3">
        <label class="form-label" for="ctNo">Contact No</label>
        <input class="form-control" type="text" name="ctNo" id="ctNo" value="<?=$employee['Contact_No']?>">
        </div>
    <div class="mb-3">
        <label class="form-label" for="dsg">Designation</label>
        <input class="form-control" type="text" name="dsg" id="dsg" value="<?=$employee['Designation']?>">
        </div>
    <div class="mb-3">
        <label class="form-label" for="zn">Zone</label>
        <input class="form-control" type="text" name="zn" id="zn" value="<?=$employee['Zone']?>">
        </div>
    <div class="mb-3">
        <label class="form-label" for="sal">Salary</label>
        <input class="form-control" type="number" name="sal" id="sal" value="<?=$employee['Salary']?>">
    </div>
        <input class="btn btn-primary" type="submit" value="Update">
    </form>
</div>
<div class="col"></div>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
