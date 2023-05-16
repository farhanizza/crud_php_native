<?php
require_once 'koneksi.php';
session_start();
// Cek apakah sudah login
if (!isset($_SESSION['username_admin']) || $_SESSION['level'] !== '0') {
    echo
    "<script>
    alert('Login first');
    window.location.href = 'login.php';
    </script>";
} else {
    // 20 * 60 = 1200 detik (20 menit) untuk durasi waktu sesi
    if ((time() - $_SESSION['last_login_time']) > 1200) {
        header("location: logout.php");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Non Formal</title>
    <link rel="stylesheet" href="css/StylingNonFormal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <h1>List non formal education</h1>
                </div>
            </div>
        </div>
        <?php
        $sql = mysqli_query($koneksi, "SELECT hrm_user.id, hrm_user.nama_lengkap, hr_status.status FROM hrm_user 
        left join hr_status ON hr_status.id_status = hrm_user.id_status
        ORDER BY id DESC");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <div class="row">
                <div class="col">
                    <div class="sq-non-formal">
                        <div class="sq-non-formal-header">
                            <h4>
                                <?php echo $data['nama_lengkap'] ?>
                            </h4>
                            <?php
                            if ($data['status'] == "Rejected Form") {
                                $color_text = '#DB3333';
                            } else if ($data['status'] == "Approved Form") {
                                $color_text = '#2A8B61';
                            } else if ($data['status'] == "Half Approved Form") {
                                $color_text = '#2a8b61';
                            } else if ($data['status'] == "Document Approved") {
                                $color_text = '#2a8b61';
                            } else if ($data['status'] == "Pending Form") {
                                $color_text = '#FFCC00';
                            }
                            echo "<h5 style='color: $color_text;'>" . $data['status'] . "</h5>";
                            ?>
                        </div>
                        <div class="sq-non-formal-box">
                            <div class="sq-non-formal-button">
                                <a href="view_non_formal.php?id=<?php echo $data['id'] ?>">
                                    <button class="btn btn-primary" id="btn_view_non_formal">
                                        View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end sq-non-formal-back">
                    <a href="index.php">
                        <button class="btn btn-light">
                            Back
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</body>

</html>