<?php
require_once "config.php";
include "session_checker.php";
$sql = "SELECT * FROM tblattendance";
$result = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accounts Management</title>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- Datatables CSS-->
    <link href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" />
</head>

<body>
    <div class="main-container d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-success" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <span class="text-white fs-4">Payroll</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                        class="fal fa-stream"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class=""><a href="dashboard.php" class="text-decoration-none px-3 py-2 d-block">
                        <i class="fal fa-home"></i> Dashboard
                    </a></li>
                <li class=""><a href="employees-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-users">
                        </i>
                        Employees</a></li>
                <li class=""><a href="leave-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-arrow-circle-left"> </i> Leave</a></li>
                <li class=""><a href="attendance-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-clock"></i>
                        Attendance</a></li>
                <li class="active"><a href="accounts-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-users"></i>
                        Accounts</a></li>
                <li class=""><a href="deductions-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-minus"></i>
                        Deductions</a></li>
                <li class=""><a href="branches-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-building"></i>
                        Branches</a></li>
                <li class=""><a href="payslips-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-file"></i>
                        Payslips</a></li>
                <li class=""><a href="logout.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-sign-out"></i>
                        Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
                        <a class="navbar-brand fs-4" href="#"><span
                                class="rounded px-2 py-0 text-black">Payroll</span></a>
                    </div>
                    <a class="navbar-brand" href="#">Accounts Management</a>
                </div>
            </nav>





            <!-- Table -->
            <div class="table-responsive m-3">
                <table class="table table-bordered table-striped text-center p-1" id="table">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>Attendance ID</th>
                            <th>Employee ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Action</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['attendance_id'] . "</td>";
                            echo "<td>" . $row['employee_id'] . "</td>";
                            echo "<td>" . $row['attendance_date'] . "</td>";
                            echo "<td>" . $row['attendance_time'] . "</td>";
                            echo "<td>" . $row['action'] . "</td>";
                            echo "<td>" . $row['comment'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatables Scripts-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $("#table").DataTable();

        });
    </script>

    <script defer src="sidebar.js">
    </script>
</body>

</html>