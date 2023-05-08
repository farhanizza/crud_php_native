<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['hr_name'] !== 'HRIT_group') {
    echo
    "<script>
    alert('Login first');
    window.location.href = '../login.php';
    </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/icon/feather.css">
    <link rel="stylesheet" href="../css/hrit/StylingHris.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="row">
        <div class="col">
            <div class="sidebar">
                <div class="sidebar-header">
                    <h1>
                        HRIS
                    </h1>
                </div>
                <div class="sidebar-content">
                    <ul>
                        <li>
                            <a href="../non_formal_education.php">
                                <i data-feather="book-open"></i>
                                <p>
                                    Non-formal education
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#notification">
                                <i data-feather="bell"></i>
                                <p>
                                    Notifikasi
                                </p>
                            </a>
                        </li>
                        <li>
                            <div class="sidebar-content-logout">
                                <a href="../logout.php">
                                    <i data-feather="log-out"></i>
                                    <p>
                                        logout
                                    </p>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="notification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="notificationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Notification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="notif-box">
                        <h4>
                            Sistem membuktikan dokumen asli
                        </h4>
                        <img src="../verified.png" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        feather.replace()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>