<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'ld_admin';
    $DATABASE_PASS = 'Password1!';
    $DATABASE_NAME = 'landscape_services';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/index.php">Landscape Services</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav container-fluid justify-content-end me-5">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="http://localhost/employee/index.php"><i class="fas fa-user"></i> Employees</a></li>
                        <li><a class="dropdown-item" href="http://localhost/landscape-area/index.php"><i class="fas fa-tree"></i> Landscape Area</a></li>
                        <li><a class="dropdown-item" href="http://localhost/equipment/index.php"><i class="fas fa-tools"></i> Equipments</a></li>
                        <li><a class="dropdown-item" href="http://localhost/request/index.php"><i class="fas fa-paper-plane"></i> Service Requests</a></li>
                        <li><a class="dropdown-item" href="http://localhost/assignment/index.php"><i class="fas fa-tree"></i> Assignments</a></li>
                        <li><a class="dropdown-item" href="http://localhost/duty-roster/index.php"><i class="fas fa-swatchbook"></i> Duty Roster</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
    EOT;
}

function template_footer() {
    echo <<<EOT
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </body>
    </html>
    EOT;
}
?>