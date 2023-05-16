<?php
session_start();
require_once '../koneksi.php';

$id = $_SESSION['id_user_employee'];

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
            <div class="navbar-button">
                <i data-feather="menu" class="feather-32"></i>
            </div>
            <div class="sidebar">
                <div class="sidebar-header">
                    <div class="d-flex button-close">
                        <h1>
                            HRIS
                        </h1>
                        <div class="button-close-i">
                            <i data-feather="chevrons-left" class="feather-32"></i>
                        </div>
                    </div>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Notifikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $sql_code = mysqli_query(
                        $koneksi,
                        "SELECT hr_status.status, hr_pesan.alasan_form, hr_insert_dokumen.tanggal_insert 
                    FROM hrm_user 
                    left JOIN employee ON hrm_user.id_employee = employee.id
                    left JOIN hr_pesan ON hr_pesan.id_user = hrm_user.id 
                    left JOIN hr_status ON hr_status.id_status = hrm_user.id_status
                    LEFT JOIN hr_insert_dokumen ON hr_insert_dokumen.id_user = hrm_user.id
                    WHERE hrm_user.id_employee = $id ORDER BY hr_insert_dokumen.tanggal_insert DESC"
                    );
                    while ($data_notif = mysqli_fetch_array($sql_code)) {
                    ?>
                        <?php
                        if ($data_notif['status'] == "Rejected Form" || $data_notif['status'] == "Document Rejected") {
                            $bg_notif = '#EFBFBF';
                            $h1_color = '#DB3333';
                            $p_color = '#5B5B5B';
                            // $p_color = '#fff';
                            $p_info = 'block';
                            $img = 'rejected.png';
                        } else if ($data_notif['status'] == "Pending Form") {
                            $bg_notif = '#FFEB9D';
                            $h1_color = '#5E4900';
                            $p_color = '#5E4900';
                            $p_info = 'none';
                            $img = 'warning.png';
                        } else if ($data_notif['status'] == "Half Approved Form") {
                            $bg_notif = '#ccfac0';
                            $h1_color = '#2a8b61';
                            $p_info = 'none';
                            $img = 'verified.png';
                        } else if ($data_notif['status'] == "Approved Form" || $data_notif['status'] == "Document Approved") {
                            $bg_notif = '#ccfac0';
                            $h1_color = '#2a8b61';
                            $p_info = 'none';
                            $img = 'verified.png';
                        }
                        ?>
                        <?php
                        $tanggal = $data_notif['tanggal_insert'];
                        $tanggal_insert = date('d-m-Y', strtotime($tanggal));
                        ?>
                        <div class="notif-box mb-3" style="background-color: <?php echo $bg_notif ?>;">
                            <div class="d-flex">
                                <h4 style="color: <?php echo $h1_color ?>;">
                                    <?php echo $data_notif['status'] ?> | <?php echo $tanggal_insert ?>
                                </h4>
                                <img src="../<?php echo $img ?>" alt="">
                            </div>
                            <h5 class="mt-3" style="color: <?php echo $p_color ?>; display: <?php echo $p_info ?>;">
                                <?php echo $data_notif['alasan_form'] ?>
                            </h5>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const toggleButton = document.querySelector('.navbar-button');
        const toggleButtonClose = document.querySelector('.button-close-i');
        const sidebar = document.querySelector('.sidebar');

        toggleButton.addEventListener('click', function() {
            if (!sidebar.classList.contains('active')) {
                sidebar.classList.add('active');
            } else {
                sidebar.classList.remove('close');
            }
        });

        toggleButtonClose.addEventListener('click', function() {
            if (!sidebar.classList.contains('close')) {
                sidebar.classList.add('close');
            } else {
                sidebar.classList.remove('active');
            }
        })
    </script>
    <script>
        feather.replace()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>