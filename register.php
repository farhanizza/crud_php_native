<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingRegister.css">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col square-background">
            <div class="square-register">
                <div class="d-flex align-items-center justify-content-center square-height">
                    <div class="square-register-text">
                        <div class="d-flex flex-column">
                            <h1>
                                Digital platform for employee data.
                            </h1>
                            <p class="mt-3">
                                You can create, update, read, delete and more features. With all employee datas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mt-1">
            <?php
            require_once 'config/log_server.php';
            date_default_timezone_set('Asia/Jakarta');
            write_log_server($_SERVER['SERVER_NAME'], "User masuk ke halaman register", date('Y-m-d : H:i:s', $_SERVER['REQUEST_TIME']), '');
            ?>
            <div class="d-flex flex-column register-padding">
                <div class="register-hello">
                    <h3>Hi!, Welcome to our web</h3>
                    <p>Enter your information for the register</p>
                </div>
                <div class="register-form">
                    <form action="register_data.php" method="post">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" onkeydown="return /[a-z0-9@]/i.test(event.key)" required>

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" onkeydown="return /^\S+$/i.test(event.key)" required>

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" onkeydown="return /[a-z0-9@.]/i.test(event.key)" required autocomplete="off">

                        <button type="submit" class="btn btn-primary">Register</button>

                        <div class="d-flex justify-content-center register-account">
                            <p>
                                Have an account? <a href="login.php">Login here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>