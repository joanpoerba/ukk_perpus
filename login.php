<?php
require_once "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login ke perpustakaan digial</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                  <?php
                  if (isset($_POST["login"])) {
                    $username = $_POST["username"];
                    $password = md5($_POST["password"]);

                    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
                    $cek = mysqli_num_rows($data);

                    if ($cek > 0) {
                      $_SESSION["user"] = mysqli_fetch_array($data);
                      header('location:index.php');
                    } else {
                      echo "<script>alert('Username atau password salah')</script>";
                    }
                  }
                  ?>
                  <form method="post">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="username" name="username" type="text" placeholder="masukkan username" autofocus />
                      <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="password" name="password" type="password" placeholder="masukkan password" />
                      <label for="password">Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      <button class="w-100 btn btn-primary" type="submit" name="login">Login</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small">Belum punya akun?<a href="register.php"> register!</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
</body>

</html>