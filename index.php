<?php
include 'db.php';
// Your PHP code here.
?>

<?=template_header('Landscape Services')?>

<div>
    <table>
        <td>
        <img class="mx-auto d-block" src="https://cdn.dribbble.com/users/304823/screenshots/3978256/media/f0b592dc1cd50726f738096c8c76b8f6.png" width=800>
        </td>
        <td>
        <div><a href="./employee/index.php">Employees</a> </div>
        <div><a href="./landscape-area/index.php">Landscape Area</a> </div>
        <div><a href="./equipment/index.php">Equipments & Maintenance</a> </div>
        <div><a href="./request/index.php">Service Requests</a></div>
        <div><a href="./assignment/index.php">Landscape Assignment</a> </div>
        <div><a href="./duty-roster/index.php">Duty Roster</a></div>
        </td>
</div>

<?=template_footer()?>