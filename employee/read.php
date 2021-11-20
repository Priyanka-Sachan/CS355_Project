<?php
include '../db.php';
$pdo = pdo_connect_mysql();

$empId = isset($_GET['empId']) ? $_GET['empId'] : '';

$stmt1 = $pdo->prepare('call view_gardener_by_id(?);');
$stmt1->execute([$empId]);
$employee = $stmt1->fetch(PDO::FETCH_ASSOC);
if (!$employee){
    exit('Employee doesn\'t exist with that ID!');
}
$stmt1 = $pdo->prepare('call calculate_monthly_attendance_by_gardener(?,curdate());');
$stmt1->execute([$empId]);
$atd = $stmt1->fetch(PDO::FETCH_ASSOC);
?>

<?=template_header('Employee Details')?>

    <h2 style="text-align:center;">Employee Details</h2>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <a  class="link-secondary" href="update.php?empId=<?=$employee['Emp_Id']?>"><i class="fas fa-pen fa-xs"></i> Edit Details</a>
            <div>Id: <?=$employee['Emp_Id']?></div>
            <div>Name: <?=$employee['Emp_Name']?></div>
            <div>Contact No: <?=$employee['Contact_No']?></div>
            <div>Designation: <?=$employee['Designation']?></div>
            <div>Zone: <?=$employee['Zone']?></div>
            <div>Salary: <?=$employee['Salary']?></div>
            <h3>Attendance Details</h3>
            <div>Month: <?=atd['month']?> Novembor</div>
            <div>Total days: <?=atd['total_days']?> 18</div>
            <div>Leave: <?=atd['leave_days']?> 13</div>
        </div>
    <div class="col"></div>
    </div>

<?=template_footer()?>