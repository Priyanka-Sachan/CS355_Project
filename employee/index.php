<?php
include '../db.php';
$pdo = pdo_connect_mysql();

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;
$stmt = $pdo->prepare('call view_gardeners();');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Employees')?>

<div >
	<h2>Employees</h2>
	<a href="create.php">Add new employee details.</a>
	<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Contact No</th>
                <th scope="col">Designation</th>
                <th scope="col">Zone</th>
                <th scope="col">Salary</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?=$employee['Emp_Id']?></td>
                <td><?=$employee['Emp_Name']?></td>
                <td><?=$employee['Contact_No']?></td>
                <td><?=$employee['Designation']?></td>
                <td><?=$employee['Zone']?></td>
                <td><?=$employee['Salary']?></td>
                <td class="actions">
                    <a href="read.php?empId=<?=$employee['Emp_Id']?>"><i class="fas fa-eye fa-xs"></i></a>
                    <a href="update.php?empId=<?=$employee['Emp_Id']?>"><i class="fas fa-pen fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="index.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < 20): ?>
		<a href="index.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>