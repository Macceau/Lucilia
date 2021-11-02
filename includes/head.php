<div class="d-flex align-items-center justify-content-between">
    <a href="pages-welcome.php" class="logo d-flex align-items-center">
      <img src="assets/img/logo1.png" alt="">
      <span class="d-none d-lg-block">LuciliaFinder</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <form class=" row g-3" method="POST" action="#">
    <div class="col-sm-3">
        <select class="form-select" aria-label="select a page" name="property" id="property">
            <option selected="selected" value="Please Select">Please Select</option>
            <option value="Errors">Errors</option>
            <option value="Inventary">Inventary</option>
            <option value="Items">Items</option>
          </select>
      </div>
      <div class="col-sm-4">
          <select class="form-select" aria-label="select a machine" name="printers" id="printers">
             
          </select>
      </div>
      <div class="col-sm-5">
      <input type="text" class="form-control" name="search"  id="search" placeholder="Search" title="Enter search keyword">
      </div>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown pe-3" id="fillheads">
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->