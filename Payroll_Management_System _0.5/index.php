<?php
if (isset($_POST['btnlogin'])) {
    require_once "config.php";
    $sql = "SELECT * FROM tblaccounts WHERE username=? AND `userpass`=? AND userstatus='ACTIVE'";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $_POST['txtusername'], $_POST['txtpassword']);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                $account = mysqli_fetch_array($result, MYSQLI_ASSOC);
                session_start();
                $_SESSION['username'] = $_POST['txtusername'];
                $_SESSION['usertype'] = $account['usertype'];
                if ($_SESSION['usertype'] === "ADMINISTRATOR") {
                    header("location: employees-management.php");
                } else {
                    header("location: attendance-management-employee.php");
                }
                echo "<font color='green'>Login Successful</font>";
            } else {
                echo "<font color='red'>Incorrect login details or account is disabled/inactive</font>";
            }
        } else {
            echo "<font color='red'>Error on login statement</font>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            font-family: "Lexend", sans-serif;
            background-color: #f8f9fa;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logoicon {
            width: 25px;
            height: 25px;
            margin-right: 10px;
        }

        .header a {
            color: black;
            text-decoration: none;
            font-size: 22px;
            font-weight: bold;
        }

        /* Main Container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .login-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .welcome {
            font-size: 35px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .enter {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            text-align: left;
            display: block;
        }

        .txtusername,
        .txtpassword {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #B4B4B4;
        }

        .login {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            background-color: #0A112F;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 15px;
        }

        .leaf-container {
            position: absolute;
            bottom: 20px;
            right: 20px;
            z-index: -1;
            top: 100px; /* Moves the image down */
        }

        .leaf {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .leaf-container {
                bottom: 10px;
                right: 10px;
            }

            .leaf {
                width: 400px;
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
                padding: 50px 20px;
            }

            .login-card {
                width: 100%;
                max-width: 350px;
            }

            .welcome {
                font-size: 28px;
            }

            .enter {
                font-size: 16px;
            }

            .leaf-container {
                display: none;
            }

            .login {
                font-size: 16px;
                padding: 12px;
            }

            .txtusername,
            .txtpassword {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="hand-coins.png" alt="Logo" class="logoicon">
        <a href="#" class="logo">PAYROLL</a>
    </div>

    <div class="container">
        <div class="login-card">
            <h2 class="welcome">Welcome back!</h2>
            <p class="enter">Enter your credentials to access your account</p>
            <form method="post" action="index.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="txtusername form-control" placeholder="Username" name="txtusername" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="txtpassword form-control" placeholder="Password" name="txtpassword" id="password" />
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="showPassword" />
                        <label class="form-check-label" for="showPassword">Show Password</label>
                    </div>
                </div>
                <input type="submit" class="login" name="btnlogin" value="Login">
            </form>
        </div>
    </div>

    <div class="leaf-container">
        <img src="leaf.png" alt="Image" class="leaf">
    </div>

    <script>
        document.getElementById("showPassword").addEventListener("change", function () {
            const passwordField = document.getElementById("password");
            passwordField.type = this.checked ? "text" : "password";
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
