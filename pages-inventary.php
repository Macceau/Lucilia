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

  <title>LuciliaFinder / Inventary</title>
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
          <li class="breadcrumb-item active">Inventary </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="avis">
              Oups! Please choose an option in the first top List and continue write your search in the search textfield.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <!-- Large Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                 Add Item To Inventary
              </button>
              <button type="button" id="downloadinv" class="btn btn-success"> <i class="bi bi-download"></i> Export Inventary File</button>
              
              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Item To Inventary</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>
                      <form action="" method="post" class=""  id="addinventary" >
                                        <div class="row form-group">
                                            <div class="col col-md-12">
                                                <label for="nf-email" class=" form-control-label">Item Number Filter</label>
                                                <input type="text" name="itemfilter" id="itemfilter" placeholder="Search..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="nf-email" class=" form-control-label">Item Number</label>
                                                <select name="itemnumbers" id="itemnumbers" class="form-control"></select>
                                                <input type="text" name="iditems" id="iditems" class="form-control" hidden>
                                            </div>
                                            <div class="col col-md-6">
                                                <label for="nf-email" class=" form-control-label">Item Description</label>
                                                <input type="text" name="itemdescs" id="itemdescs" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="nf-email" class=" form-control-label">Part Description</label>
                                                <input type="text" name="partdescs" id="partdescs"  class="form-control">
                                            </div>
                                            <div class="col col-md-6">
                                                <label for="nf-email" class=" form-control-label">Quantity</label>
                                                <input type="text" name="quantity" id="quantity"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="nf-email" class=" form-control-label">Sub-Inventary</label>
                                                <select name="subinventary" id="subinventary" class="form-control">
                                                </select>
                                            </div>
                                            <div class="col col-md-6">
                                                <label for="nf-email" class=" form-control-label">UOM</label>
                                                <select name="sigle" id="sigle" class="form-control">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="nf-email" class=" form-control-label">locator</label>
                                                <select name="locator" id="locator" class="form-control">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </form>
                      </p>
                    </div>
                    <div class="modal-footer">
                    <input type="text" id="inputIsValidinventary" class="is-valid form-control-success form-control" value="Information as been saved with success.">
                                <input type="text" id="inputIsInvalidinventary" class="is-invalid form-control" value="Oups! a problem as occured at saving the  information.">
                                <button type="button" class="btn btn-warning" id="refreshmodal">Refresh Item Number List</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" name="addItemToInventary" id="addItemToInventary">Add Item</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->
              
              <!-- Large Modal -->
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
              </div><!-- End Large Modal-->
               
              <!-- Large Modal -->
              <div class="modal fade" id="mediumModals" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Quantity</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <p>
                            <form action="" method="post" class=""  id="updateinventaryfrm" >
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="nf-email" class=" form-control-label">Action</label>
                                        <select name="action" id="action" class="form-control">
                                            <option value="">Select an Option...</option>
                                            <option value="Add Quantity">Add Quantity</option>
                                            <option value="Reduce Quantity">Reduce Quantity</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="nf-email" class=" form-control-label">Item Number</label>
                                        <input type="text" name="itemnum" id="itemnum" class="form-control" readonly>
                                        <input type="text" name="itemid" id="itemid" class="form-control" hidden>
                                    </div>
                                    <div class="col col-md-6">
                                        <label for="nf-email" class=" form-control-label">Item Description</label>
                                        <input type="text" name="itemdes" id="itemdes" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="nf-email" class=" form-control-label">Actual Quantity</label>
                                        <input type="text" name="actual" id="actual"  class="form-control" readonly>
                                        <input type="text" name="actualqty" id="actualqty"  class="form-control" hidden>
                                    </div>
                                    <div class="col col-md-6">
                                        <div id="showlabel"></div>
                                        <input type="text" name="newquantity" id="newquantity"  class="form-control" placeholder="0">
                                    </div>
                                </div>
                            </form>
                        </p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" name="updateinventary" id="updateinventary">Update</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ITEMS #</th>
                    <th scope="col">ITEMS DESC</th>
                    <th scope="col">MACHINES</th>
                    <th scope="col">SUB-INV</th>
                    <th scope="col">UOM</th>
                    <th scope="col">LOCATOR</th>
                    <th scope="col">QUANTITY</th>
                    <th width="120"></th>
                  </tr>
                </thead>
                <tbody id="viewinventary">
                 
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