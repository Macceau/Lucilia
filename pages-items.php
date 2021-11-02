<?php
include('lib/Classe.php');
$link=DbConnect();
session_start();
$manage=$_SESSION['usuario'];
  if($manage==""){
      header("Location: index.php?ut=$manage");
      exit();
  }else{
    $sql="select * from users where username=ltrim(rtrim('$manage'))";
        $res=SendQuery($sql,$link);
        $row=BringRow($res);
        $unlock=Decrypt($row['password']);
        $id=$row['id'];
        $names=$row['fullname'];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LuciliaFinder / Items</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon1.png" rel="icon">
  <link href="assets/img/apple-touch-icon1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <?php require('includes/head.php');  ?>
    <input type="text" id="paramet" value="<?php echo $manage;?>" hidden>
    <input type="text" id="identity" value="<?php echo $id;?>" hidden>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
  <?php require('includes/leftside.php');  ?>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pages-welcome.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Items </li>
          <li id="countitem"> </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">

              <div class="alert alert-danger alert-dismissible fade show" role="alert" id="avis">
              Oups! Please choose an option in the first top List and continue write your search in the search textfield.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <div class="card-body">
               <!-- Basic Modal -->
               <button type="button" id="additemforedit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModalll">
                Create New Item
              </button>
              <button type="button" class="btn btn-success" id="exportitems"><i class="bi bi-download"></i> Export Items File</button> 

              <div class="modal fade" id="largeModalll" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Create New Item </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>
                    <form action="" method="post" class=""  id="additem" enctype="multipart/form-data">
                        <div class="row form-group">
                              <div class="col col-md-6">
                              <label for="nf-email" class=" form-control-label">Item Number</label>
                              <input type="text" name="itemnumber" id="itemnumber"  class="form-control">
                                <input type="hidden" name="hiddenparam" id="hiddenparam"  class="form-control">
                            </div>
                            <div class="col col-md-6">
                             <label for="nf-email" class=" form-control-label">Part Number</label>
                               <input type="text" name="partnumber" id="partnumber" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                          <div class="col col-md-6">
                             <label for="nf-email" class=" form-control-label">Part Description</label>
                              <input type="text" name="partdescription" id="partdescription"  class="form-control">
                           </div>
                           <div class="col col-md-6">
                            <label for="nf-email" class=" form-control-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="0.00" required>
                           </div>
                        </div>
                        <div class="row form-group">
                             <div class="col col-md-6">
                                <label for="nf-email" class=" form-control-label">Machines</label>
                                  <select name="printer" id="printer" class="form-control"></select>
                              </div>
                            <div class="col col-md-6">
                           <label for="nf-email" class=" form-control-label">Picture</label>
                            <input type="file" id="partimage" name="partimage" class="form-control">
                            </div>
                          </div>
                         <div class="row form-group">
                          <div class="col col-md-12">
                               <label for="nf-email" class=" form-control-label">Item Description</label>
                                <input type="text" name="itemdescription" id="itemdescription" class="form-control">
                                </div>
                             </div>
                          </form>
                          </p>
                    </div>
                    <div class="modal-footer">
                      <input type="text" id="inputIsValid" class="is-valid form-control-success form-control" value="Information as been saved with success.">
                      <input type="text" id="inputIsInvalid" class="is-invalid form-control" value="Oups! a problem as occured at saving the  information.">
                      <button type="button" name="refreshmachine" id="refreshmachine" class="btn btn-warning" >Refresh Machine List</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" name="addcreateItem" id="addcreateItem">Create Item</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
              <!-- Basic Modal -->
              <div class="modal fade" id="mediumModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Picture Viewer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div id="showedpicture"></div>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ITEMS #</th>
                    <th scope="col">ITEMS DESC</th>
                    <th scope="col">PRICE($US)</th>
                    <th scope="col">PARTS DESC</th>
                    <th scope="col">PARTS #</th>
                    <th scope="col">MACHINES</th>
                    <th width="150"></th>
                  </tr>
                </thead>
                <tbody id="showitems">
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  <?php require('includes/footer.php');  ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/push.min.js"></script>
  <script src="js/action.js"></script>

</body>

</html>