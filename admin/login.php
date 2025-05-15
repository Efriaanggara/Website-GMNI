<?php
    session_start();
    require "../koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Desa Makartitama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"/>

    <style>
        .main{
            height: 100vh;
        }
        .login-box{
            width: 500px;
            height: 400px;
            box-sizing: border-box;
        }
        .btn-outline-warning:hover {
        color: white !important;
        }
        .btn-maroon {
        background-color: #800000;
        color: #fff;
        border: 1px solid #ffcccc;
        }
        .btn-maroon:hover {
        background-color: #990000;
        color: #fff;
        }
        .btn-grey {
        background-color: #1b0a07;
        color: #fff;
        }
        .btn-grey:hover {
        background-color: #60696b;
        color: #fff;
        }
        .text-maroon {
        color: #800000;
        }
        .bg-maroon {
        background-color: #800000;
        }
        .bg-grey {
        background-color: #1b0a07;
        }
    </style>

</head>

<body class="bg-maroon">
    <div class="main d-flex flex-column justify-content-center align-items-center">
            <div class="mt-2" style="width: 500px">
                <?php
                if (isset($_POST['loginbtn'])) {
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);

                    if ($countdata > 0) {
                        $data = mysqli_fetch_assoc($query);
                        $dbPassword = $data['password'];

                        // Coba verifikasi sebagai password hash
                        if (password_verify($password, $dbPassword) || $password === $dbPassword) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('Location: index.php');
                            exit;
                        } else {
                            echo '<div class="alert alert-danger text-center" role="alert">Password salah!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger text-center" role="alert">Akun tidak ditemukan!</div>';
                    }
                }
                ?>
            </div>
        <div class="login-box bg-grey rounded p-5 shadow">
            <form action="" method="post">
                <div class="text-maroon text-center" style=" text-shadow: 1px 1px 0 white, -1px -1px 0 white, 1px -1px 0 white, -1px 1px 0 white;;">
                    <h2>Login.</h2></div>
                    <div><p class="text-light text-center pb-3 small">Silahkan Masukan Username dan Password untuk Login!</p>
                </div>
                <div class="text-light">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="text-light">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btn btn-maroon text-light form-control mt-3" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"  integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
</script>
</body>
</html>