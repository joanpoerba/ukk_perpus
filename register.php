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
  <title>Register ke perpustakaan digial</title>
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
                  <h3 class="text-center font-weight-light my-4">Register</h3>
                </div>
                <div class="card-body">
                  <?php
                  if (isset($_POST["register"])) {
                    $nama = $_POST["nama"];
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $noTelepon = $_POST["no_telepon"];
                    $alamat = $_POST["alamat"];
                    $password = md5($_POST["password"]);
                    $level = $_POST["level"];

                    if ($level == "peminjam") {
                      $level = "peminjam";
                    } elseif ($level == "petugas") {
                      $level = "petugas";
                    } elseif ($level == "admin") {
                      $level = "admin";
                    }

                    $insert = mysqli_query($koneksi, "INSERT INTO user(nama, username, password, email, alamat, no_telepon, level) VALUES('$nama', '$username', '$password', '$email', '$alamat', '$noTelepon', '$level')");

                    if ($insert) {
                      $user = mysqli_query($koneksi, "SELECT * FROM user");
                      $_SESSION["user"] = mysqli_fetch_array($user);
                      header('location:index.php');
                    }
                  }
                  ?>
                  <form method="post">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="namaLengkap" type="text" placeholder="masukkan nama lengkap" name="nama" autofocus required />
                      <label for="namaLengkap">Nama lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="username" type="text" placeholder="masukkan username" name="username" required />
                      <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="email" type="text" placeholder="masukkan email" name="email" required />
                      <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="noTelepon" type="text" placeholder="masukkan nomor telepon" name="no_telepon" required />
                      <label for="noTelepon">Nomor telepon</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input rows="5" class="form-control" id="alamat" type="text" placeholder="masukkan alamat" name="alamat" required />
                      <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="password" type="password" placeholder="masukkan password" name="password" required />
                      <label for="password">Password</label>
                    </div>
                    <div class="w-100 mb-3">
                      <label class="fst-italic text-danger" for="password">* login sebagai?</label>
                      <div class="w-100 d-flex flex-row justify-content-between mt-3">
                        <div class="d-flex flex-row align-items-center">
                          <input type="radio" value="peminjam" name="level">
                          <p class="m-0 ms-2">peminjam</p>
                        </div>
                        <div class="d-flex flex-row align-items-center" name="level">
                          <input type="radio" value="petugas">
                          <p class="m-0 ms-2">petugas</p>
                        </div>
                        <div class="d-flex flex-row align-items-center" name="level">
                          <input type="radio" value="admin">
                          <p class="m-0 ms-2">admin</p>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      <button class="w-100 btn btn-primary" type="submit" name="register">Register</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small">Sudah punya akun?<a href="login.php"> login!</a></div>
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