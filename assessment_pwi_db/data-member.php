<?php 

// koneksi ke function link untuk konek ke database
require "functions.php";

$member = query("SELECT * FROM member");


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'data-member.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan!!!!!');
        document.location.href = 'data-member.php';
        </script>
        ";
    }

}


// cek apakah sudah berhasil dihapus atau belum
if(isset($_POST["hapus"])){
    
    if (hapus($_POST) > 0) {
        echo "
            <script>
            alert('Data berhasil dihapus');
            document.location.href = 'data-member.php';
            </script>
            ";
    } else {
        echo "
        <script>
        alert('Data gagal dihapus!!!!!');
        document.location.href = 'data-member.php';
        </script>
        ";
    }
}


// cek apakah sudah terubah atau belum
if (isset($_POST["ubah"])){
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diedit');
        document.location.href = 'data-member.php';
        </script>
        ";
    } else {

        echo ("Error description: " . $link->error);
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SG Learn Center</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <!--! awal Navbar-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Study Group 2022</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>

        <ul class="navbar-nav ml-auto mr-md-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <!--! akhir Navbar-->


    <div id="layoutSidenav">
        <!--! awal side bar  -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Information</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Activity</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Mainclass
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="history-website.html">History Website</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="data-member.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Member
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Copyright &copy; Muhammad Taufiq Shidiq 2022</div>
                </div>
            </nav>
        </div>
        <!--! akhir side bar  -->

        <!-- ! awal table -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Member</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- ? button modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Member
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Semester</th>
                                            <th>No.Whatsapp</th>
                                            <th>Profile</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Semester</th>
                                            <th>No.Whatsapp</th>
                                            <th>Profile</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($member as $row) : ?>
                                        
                                        <tr>
                                            <td><?= $row["NIM"]; ?></td>
                                            <td><?= $row["NAMA"]; ?></td>
                                            <td><?= $row["KELAS"]; ?></td>
                                            <td><?= $row["SEMESTER"]; ?></td>
                                            <td><?= $row["NO_WA"]; ?></td>
                                            
                                            <td>
                                                <!-- awal button for showing modal image  -->
                                                <div class="btn-group ">
                                                    <button type="button" class="btn btn-outline-primary rounded-btn"
                                                        data-toggle="modal"
                                                        data-target="#foto<?= $row["NIM"]; ?>">Image</button>
                                                </div>
                                                <!-- akhir button for showing modal image  -->

                                                <!-- awal Modal -->
                                                <div class="modal fade" id="foto<?= $row["NIM"]; ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLongTitle1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle1">
                                                                    Profile</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                            <?= '<img src="data:image;base64,'.base64_encode( $row["FOTO"] ).'" height=100% width=100% />';?>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- akhir Modal -->
                                            </td>
                                            <td><button type="button" class="btn btn-outline-warning rounded-btn"
                                                        data-toggle="modal"
                                                        data-target="#edit<?= $row["NIM"]; ?>">Edit</button> <button type="button" class="btn btn-outline-danger rounded-btn" data-toggle="modal"
                                                        data-target="#hapus<?= $row["NIM"]; ?>">Delete</button> 
                                                    </td>
                                        </tr>

                <!-- awal modal edit -->
                <div class="modal fade" id="edit<?= $row["NIM"]; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Form edit member</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <!-- chard awal -->
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">

                                                    <!-- awal form -->
                                                    <form action="data-member.php" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control rounded" name="nama" id="nama"
                                                                value="<?= $row["NAMA"]; ?>" required>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-7">
                                                                <label for="nim">NIM</label>
                                                                <input type="text" class="form-control datepicker" name="nim" id="nim"
                                                                    value="<?= $row["NIM"]; ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-5">
                                                                <label for="semester">Semester</label>
                                                                <select id="semester" name="semester" class="form-control">
                                                                    <option selected=""><?= $row["SEMESTER"]; ?></option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-7">
                                                                <label for="kelas">Kelas</label>
                                                                <input type="text" class="form-control" name="kelas" id="kelas"
                                                                    value="<?= $row["KELAS"]; ?>" required>
                                                            </div>

                                                            <div class="form-grup col-md-5">
                                                                <label for="image">Image</label>
                                                                <label class="file">
                                                                    <input type="file" name="image" id="image"
                                                                        aria-label="File browser example" style="width: 180px;"
                                                                        >
                                                                    <span class="file-custom"></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">

                                                            <div class="form-group col-md-7">
                                                                <label for="nomor">Nomor Whatsapp</label>
                                                                <input type="text" class="form-control rounded" name="nomor" id="nomor"
                                                                    value="<?= $row["NO_WA"]; ?>" required>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label for="classid">CLASS_ID</label>
                                                                <input type="text" class="form-control rounded" name="classid" id="classid"
                                                                    value="<?= $row["CLASS_ID"]; ?>" required>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submt" name="ubah" class="btn btn-primary btn-block" >Edit</button>
                                                        </div>
                                                    </form>
                                                    <!-- awal form -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--* akhiir poopup awal baru -->
                            </div>
                            <!-- ? akhir body -->

                        </div>
                    </div>
                </div>
                <!-- akhir modal edit -->

<!-- delete modal -->
<div class="modal fade" id="hapus<?= $row["NIM"]; ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <!-- <h4 class="modal-title">Menghapus data member</h4> -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="" method="post">
                <div class="modal-body">
                    <h4>apakah anda yakin ingin menghapus data?</h4>
                    <input type="hidden" name="nim" value="<?= $row["NIM"]; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="hapus" class="btn btn-danger">Yakin</button>
                    <button type="submit" class="btn btn-success" data-dismiss="modal">Gak dulu</button>

                </div>
            </form>
            <!-- ? akhir body -->
        </div>
    </div>
</div>

                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- ! akhir table -->

        <!--? awal modal tambah member -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Form Tambah member</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <!-- chard awal -->
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- awal form -->
                                            <form action="data-member.php" method="post">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control rounded" name="nama" id="nama"
                                                        placeholder="Nama member" required>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-7">
                                                        <label for="nim">NIM</label>
                                                        <input type="text" class="form-control datepicker" name="nim" id="nim"
                                                            placeholder="Nomor induk mahasiswa" required>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="semester">Semester</label>
                                                        <select id="semester" name="semester" class="form-control">
                                                            <option selected="">1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-7">
                                                        <label for="kelas">Kelas</label>
                                                        <input type="text" class="form-control" name="kelas" id="kelas"
                                                            placeholder="D4SM-  -  " required>
                                                    </div>

                                                    <div class="form-grup col-md-5">
                                                        <label for="image">Image</label>
                                                        <label class="file">
                                                            <input type="file" name="image" id="image"
                                                                aria-label="File browser example" style="width: 180px;"
                                                                required>
                                                            <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-7">
                                                        <label for="nomor">Nomor Whatsapp</label>
                                                        <input type="text" class="form-control rounded" name="nomor" id="nomor"
                                                            placeholder="081234567890" required>
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="classid">CLASS_ID</label>
                                                        <input type="text" class="form-control rounded" name="classid" id="classid"
                                                            placeholder="WP1" required>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Input</button>
                                                </div>
                                            </form>
                                            <!-- awal form -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--* akhiir poopup awal baru -->
                    </div>
                    <!-- ? akhir body -->

                    <!-- Modal footer -->
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div> -->

                </div>
            </div>
        </div>
        <!--? akhir modal tambah member -->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>