<?php
require_once "config.php";
include "session_checker.php";
$sql = "SELECT * FROM tblbranches";
$result = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Management</title>
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
                <li class=""><a href="accounts-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-users"></i>
                        Accounts</a></li>
                <li class=""><a href="deductions-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-minus"></i>
                        Deductions</a></li>
                <li class="active"><a href="branches-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-building"></i>
                        Branches</a></li>
                <li class=""><a href="payslips-management.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-file"></i>
                        Payslips</a></li>
                <li class=""><a href="logout.php" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-sign-out"></i>
                        Logout</a></li>
            </ul>
            <!-- 
             <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-bars"></i>Settings</a></li>
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-bell"></i>Notifications</a></li>
            </ul>
            -->
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
                    <a class="navbar-brand" href="#">Branches Management</a>
                </div>
            </nav>

            <!--Notification-->
            <?php
            if (isset($_SESSION['executionStatus'])) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>" . $_SESSION['executionStatus'] . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                unset($_SESSION['executionStatus']);
            }
            ?>


            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="branch-add.php" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addModalLabel">Add New Branch</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                if (isset($_SESSION['executionStatuss'])) {
                                    echo "<script>$('#addModal').modal('show');</script>";
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" . $_SESSION['executionStatuss'] . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                                    unset($_SESSION['executionStatuss']);
                                    echo "<script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Get the modal element
                                            var modal = document.getElementById('addModal');
                                            // Create a new Bootstrap modal instance
                                            var modalInstance = new bootstrap.Modal(modal);
                                            // Show the modal
                                            modalInstance.show();
                                        });
                                        </script>";
                                }
                                ?>
                                <p>Fill up this form and submit to create a new branch details.</p>
                                Branch Name: <input type="text" name="txtbranchname" required><br><br>
                                Address: <input type="text" name="txtaddress" required><br><br>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="btnAdd" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="branch-edit.php" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel">Edit Branch Details</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                if (isset($_SESSION['executionStatuss'])) {
                                    echo "<script>$('#editModal').modal('show');</script>";
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" . $_SESSION['executionStatuss'] . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                                    unset($_SESSION['executionStatuss']);
                                    echo "<script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Get the modal element
                                            var modal = document.getElementById('editModal');
                                            // Create a new Bootstrap modal instance
                                            var modalInstance = new bootstrap.Modal(modal);
                                            // Show the modal
                                            modalInstance.show();
                                        });
                                        </script>";
                                }
                                ?>
                                <p>Fill up this form and submit to edit branch details.</p>
                                <?php
                                echo "Branch Name: <input type='text' name='edittxtbranchname' required readonly id='edittxtbranchname'><br><br>"
                                    ?>
                                Address: <input type="text" name="edittxtaddress" id="edittxtaddress" required><br><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="btnEdit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <form action="branch-delete.php" method="POST">
                <div class="modal" id="deleteModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Branch Details Confirmation</h5>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this branch details?</p>
                                <input type="hidden" name="deletetxtbranchname" id="deletetxtbranchname" readonly><br>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btnDelete">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- ADD NEW BUTTON -->
            <button type="button" class="btn btn-primary btn-sm rounded-pill ms-4 mt-5 mb-2" data-bs-toggle="modal"
                data-bs-target="#addModal">Add New Branch
            </button>
            <!-- Table -->
            <div class="table-responsive m-3">
                <table class="table table-bordered table-striped text-center p-1" id="table">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>Branch Name</th>
                            <th>Address</th>
                            <th>Created By</th>
                            <th>Date Created</th>
                            <th>Action</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['branchname'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['createdby'] . "</td>";
                            echo "<td>" . $row['datecreated'] . "</td>";
                            echo "<td>";
                            echo "<a class='btn btn-small btn-warning editbtn'>Update</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a class='btn btn-small btn-danger deletebtn'>Delete</a>";
                            echo "</td>";
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

            // Event delegation for edit button
            $(document).on("click", ".editbtn", function () {
                // Find the closest row of the clicked button
                const $row = $(this).closest("tr");

                // Extract data from the row
                const branchname = $row.find("td:eq(0)").text();
                const address = $row.find("td:eq(1)").text();

                // Populate the modal fields
                $("#edittxtbranchname").val(branchname);
                $("#edittxtaddress").val(address);

                // Show the modal
                $("#editModal").modal("show");
            });

            // Event delegation for delete button
            $(document).on("click", ".deletebtn", function () {
                // Find the closest row of the clicked button
                const $row = $(this).closest("tr");

                // Extract the employee ID from the row
                const branchname = $row.find("td:eq(0)").text();

                // Populate the modal field
                $("#deletetxtbranchname").val(branchname);

                // Show the modal
                $("#deleteModal").modal("show");
            });
        });

    </script>
    <script defer src="sidebar.js">
    </script>
</body>

</html>