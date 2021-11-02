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

  <title>Pages / Help</title>
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
      <h1>Frequently Asked Questions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pages-welcome.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Help</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section faq">
      <div class="row">
        <div class="col-lg-6">

          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Basic Questions</h5>

              <div>
                <h6>1. How to Create an item, error and an inventary?</h6>
                <p></p>
              </div>

              <div class="pt-2">
                <h6>2. How to Edit an item, error and an inventary?</h6>
                <p></p>
              </div>

              <div class="pt-2">
                <h6>3. How to Delete an item and error?</h6>
                <p></p>
              </div>
              <div class="pt-2">
                <h6>4. How to Export an item, error and an inventary as a excel file?</h6>
                <p></p>
              </div>
              <div class="pt-2">
                <h6>5. How to Search an item, error and an inventary?</h6>
                <p></p>
              </div>
              <div class="pt-2">
                <h6>6. How to Update Quantity of Item at Inventary?</h6>
                <p></p>
              </div>

            </div>
          </div>

          <!-- F.A.Q Group 1 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Machines Items</h5>

              <div class="accordion accordion-flush" id="faq-group-1">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-1" type="button" data-bs-toggle="collapse">
                      How to Create an Item?
                    </button>
                  </h2>
                  <div id="faqsOne-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Click Machines Items on the left menu, the item page will be shown with two top button blue and green. the blue button is for create a new item and the green is for export these items as an excel file.
                      Click on the Create a New Item buttom a modal will be shown to create a new item.
                      In the picture field, if you will be save more than one item with the same image, you have to choose this image in the first item inserted and then the system will take the picture automatically in the others insert.
                       <br>
                      Note: Only the price field who can be empty after the condition of the image field. 
                      <br>
                      After created an item it will be listed in a table list in the principal item page, this table has 4 repeated buttons in each row:
                      <br>
                      1- View Picture Button: To show an image of this item<br>
                      2- Edit Item Button:  To edit the informations of this item<br>
                      3- Delete Item button: To Delete an Item<br>
                      4- Add Item at Inventary Button: To add directly an item at inventary<br>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-2" type="button" data-bs-toggle="collapse">
                      How to Edit an Item?
                    </button>
                  </h2>
                  <div id="faqsOne-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                     In the item table list click on the second button of the information requiere, 
                     the same inserted modal will be shown with all the field completed except the image 
                     field who can be left empty if you do not will update the image.<br>
                     <br>
                     Then if you want to update the machine list you have to click on the yellow button (Refresh Machine List) 
                     in the bottom of the modal.<br>
                     <br>
                     After all click on the Create Item button, the information edited will be update in the table list with success.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                      How to Delete an Item?
                    </button>
                  </h2>
                  <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                        In the item table list click on the third button of the information require, 
                        a notification will be shown to confirm your action as ask you if really you want to delete this information. <br><br>
                        If you choose OK the information will be deleted with success else if you choose cancel the information will do not deleted.<br><br>
                        And automativally the item table list will be update.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-4" type="button" data-bs-toggle="collapse">
                      How to Export an Item?
                    </button>
                  </h2>
                  <div id="faqsOne-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                       On clicking on the Export Items File button on the top of principal item page, 
                       the system will download automatically all existent item on the table as an excel file.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-5" type="button" data-bs-toggle="collapse">
                      How to Search an Item?
                    </button>
                  </h2>
                  <div id="faqsOne-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                    To search an item three field are necessary in this action. <br>
                    There are three textfield in the top menu bar, first you have to choose an option in the 
                    first combo list before you type your search in the tird textfield. <br><br>
                    The second combo list is optional, you can use it if you want to search an item for a specific machine.<br><br>
                    If you choosen't an option in the first combo list when you type your search a warning message will 
                    be shown on the top of the principal item page like this: 
                    "Oups! Please choose an option in the first top List and continue write your search in the search textfield."<br><br>
                    For this reason the search will not return values. the informations require will not show in the item table list .
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 1 -->

        </div>

        <div class="col-lg-6">

          <!-- F.A.Q Group 2 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Machines Errors</h5>

              <div class="accordion accordion-flush" id="faq-group-2">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1" type="button" data-bs-toggle="collapse">
                      How to Create an Error?
                    </button>
                  </h2>
                  <div id="faqsTwo-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Click Machines Errors on the left menu, the error page will be shown with two top button blue and green. the blue button is for add a new error and the green is for export these Errors as an excel file.
                      Click on the Add Error buttom a modal will be shown to add a new error.
                       <br>
                      Note: Only the video field who can be empty if you don't have any video of this error to upload. 
                      <br>
                      After added an error it will be listed in a table list in the principal error page, this table has 3 repeated buttons in each row:
                      <br>
                      1- Play Video Button: To play a video who can show you how can you fix this problem.<br>
                      2- Edit Error Button:  To edit the informations of this error<br>
                      3- Delete Error button: To Delete an Error<br>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2" type="button" data-bs-toggle="collapse">
                      How to Edit an Error?
                    </button>
                  </h2>
                  <div id="faqsTwo-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                     In the error table list click on the second button of the information requiere, 
                     the same inserted modal will be shown with all the field completed except the video 
                     field who can be left empty if you do not will update the video.<br>
                     <br>
                     Then if you want to update the machine list you have to click on the yellow button (Refresh Machine List) 
                     in the bottom of the modal.<br>
                     <br>
                     After all click on the Add Error button, the information edited will be update in the table list with success.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-3" type="button" data-bs-toggle="collapse">
                      How to Delete an Error?
                    </button>
                  </h2>
                  <div id="faqsTwo-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                        In the error table list click on the third button of the information require, 
                        a notification will be shown to confirm your action as ask you if really you want to delete this information. <br><br>
                        If you choose OK the information will be deleted with success else if you choose cancel the information will do not deleted.<br><br>
                        And automativally the error table list will be update.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-4" type="button" data-bs-toggle="collapse">
                      How to Exprot an Error?
                    </button>
                  </h2>
                  <div id="faqsTwo-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                       On clicking on the Export Errors File button on the top of principal error page, 
                       the system will download automatically all existent error on the table as an excel file.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-5" type="button" data-bs-toggle="collapse">
                      How to Search an Error?
                    </button>
                  </h2>
                  <div id="faqsTwo-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                    To search an error three field are necessary in this action. <br>
                    There are three textfield in the top menu bar, first you have to choose an option in the 
                    first combo list before you type your search in the tird textfield. <br><br>
                    The second combo list is optional, you can use it if you want to search an error for a specific machine.<br><br>
                    If you choosen't an option in the first combo list when you type your search a warning message will 
                    be shown on the top of the principal error page like this: 
                    "Oups! Please choose an option in the first top List and continue write your search in the search textfield."<br><br>
                    For this reason the search will not return values. the informations require will not show in the error table list .
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 2 -->

          <!-- F.A.Q Group 3 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Items Inventary</h5>

              <div class="accordion accordion-flush" id="faq-group-3">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-1" type="button" data-bs-toggle="collapse">
                      How to Add an Item at Inventary?
                    </button>
                  </h2>
                  <div id="faqsThree-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      Click Items Inventary on the left menu, the Inventary page will be shown with two top button blue and green. the blue button is for add a new item at the inventary and the green is for export the inventary as an excel file.
                      Click on the Add item to Inventary buttom a modal will be shown to add a new error. <br>
                      A Item Number Filter exist to search quickly a item number because in the Item Number list there are all items so for that
                      the Item Number Filter is necesary to help us find quickly the item number.
                       <br><br>
                      After added an item to the inventary it will be listed in a table list in the principal inventary page, this table has 3 repeated buttons in each row:
                      <br>
                      1- View Picture Button: To show an image of this item<br>
                      2- Edit Item Button:  To edit the informations of this item<br>
                      3- Update Quantity button: To uptdate the quantity of this item<br>
                      We can add Item to the inventary in the principal item page by clicking on the fourth blue button, the information require 
                      will be added to the inventary directly.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-2" type="button" data-bs-toggle="collapse">
                      How To Edit an Item at the Inventary?
                    </button>
                  </h2>
                  <div id="faqsThree-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                     In the inventary table list click on the second button of the information requiere, 
                     the same inserted modal will be shown with all the field completed except the Item Number Filter
                     who can be left empty if you already select your item numbre int the Item Number textfield.<br>
                     <br>
                     Then if you want to update the item number list you have to click on the yellow button (Refresh item Number List) 
                     in the bottom of the modal.<br>
                     <br>
                     After all click on the Add Item button, the information edited will be update in the table list with success.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-3" type="button" data-bs-toggle="collapse">
                      How to Update Quantity of an Item to the Inventary?
                    </button>
                  </h2>
                  <div id="faqsThree-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                       In the inventary table list click on the third button of the information require, 
                        a modal will be shown with all the field completed except the last textfield. <br><br>
                         The last textfield is a dynamic textfield because it works according to action textfields.
                         If we want to reduce the quantity of an item we only have to choose Reduce Quantity 
                         in the action textfield then the last textfield will be formatted to reduce the quantity 
                         even if we want to increase the quantity we only have to choose Add Quantity. 
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-4" type="button" data-bs-toggle="collapse">
                      How to Export The Inventary File?
                    </button>
                  </h2>
                  <div id="faqsThree-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                       On clicking on the Export Inventary File button on the top of principal Inventary page, 
                       the system will download automatically all existent item on the table as an excel file.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-5" type="button" data-bs-toggle="collapse">
                      How to Search an Item in The Inventary?
                    </button>
                  </h2>
                  <div id="faqsThree-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                    To search an an item at the inventary three field are necessary in this action. <br>
                    There are three textfield in the top menu bar, first you have to choose an option in the 
                    first combo list before you type your search in the tird textfield. <br><br>
                    The second combo list is optional, you can use it if you want to search an item for a specific machine.<br><br>
                    If you choosen't an option in the first combo list when you type your search a warning message will 
                    be shown on the top of the principal error page like this: 
                    "Oups! Please choose an option in the first top List and continue write your search in the search textfield."<br><br>
                    For this reason the search will not return values. the informations require will not show in the inventary table list .
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 3 -->

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