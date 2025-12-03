<?php
session_start();
$title ='Customers'; 
include 'functions/customers.php'; 

if(isset($_POST['insert'])){
  
  $cus_code = $_POST['cus_code'];
  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  
  $initial = $_POST['initial']; 
  $areacode = $_POST['areacode'];
  $phone = $_POST['phone'];
  
  $balance = $_POST['balance'];

  
  if (empty($balance)) {
      $balance = 0;
  }
  
  
  if(addCustomer($cus_code, $lname, $fname, $initial, $areacode, $phone, $balance)){
    $_SESSION['action']='Add';
    $_SESSION['msg']='Customer added successfully!'; 
    header('location: customers.php'); 
  }
}
?>
<!doctype html>
<html lang="en">
  <?php
    include 'components/head.php';
  ?>
  <body>
  <?php
    include 'components/nav-bar.php';
  ?>

<div class="container-fluid">
  <div class="row">
    <?php
      include 'components/side-bar.php';
    ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Customer</h1> </div>
<div class="col-md-6">
        <form method="post">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="code">Customer Code</label>
              <input type="text" class="form-control" name="cus_code">
            </div>
          </div>
          
          <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" name="lname" placeholder=""> </div>

          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" name="fname" placeholder=""> </div>
          
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="initial">Initial</label>
              <input type="text" class="form-control" name="initial" maxlength="1"> </div>

            <div class="form-group col-md-3">
              <label for="areacode">Area Code</label>
              <input type="text" class="form-control" name="areacode"> </div>
          </div>

          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="phone" placeholder="e.g., 844-2573"> </div>

          <div class="form-group col-md-4 p-0">
            <label for="balance">Balance</label>
            <input type="text" class="form-control" name="balance"> </div>
          
          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary" name="insert" >Save Customer</button> </form>
      </div>
    </main>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="js/dashboard.js"></script>
  </body>
</html>