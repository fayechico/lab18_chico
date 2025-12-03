<?php
session_start();
$title ='Customers'; 
include 'functions/customers.php'; 


if(isset($_POST['delete'])){
  
  $cuscode = $_POST['cuscode']; 
  if(deleteCustomer($cuscode)){ 
    $_SESSION['action']='delete';
    $_SESSION['msg']='Customer deleted successfully!'; 
    header('location:customers.php'); 
    exit;
  }
}


if(isset($_POST['search'])){
  $search = $_POST['txtsearch'];
  
  $customers = findCustomers($search); 
}else{
  
  $customers = getAllCustomers(); 
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
        <h1 class="h2">Manage Customers</h1> 
      </div>
      
      
      <form method="post">
      <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-group">            
              
              <input type="text" class="form-control" name="txtsearch" placeholder="Enter name or last name">
            </div>
            <input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>
      </div>
      </form>
        
      
      <a href="customer-form.php" class="btn btn-success text-white mb-3 float-right"><i class="fas fa-plus-square"></i> New Customer</a> <!-- Changed link and text -->
      
      
      <?php
        if(isset($_SESSION['action'])){
      ?>
      <div class="alert alert-success mt-3 col-md-6">
        <?=$_SESSION['msg']?>
      </div>
      <?php
        unset($_SESSION['action']);
        }
      ?>
      
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Code</th>
              <th>Last Name</th> 
              <th>First Name</th> 
              <th>Phone</th>      
              <th>Balance</th>    
              <th>Actions</th>
            </tr>
          </thead>
          
          <tbody>
          <?php
          $i=0;
            
            foreach($customers as $customer){ 
              $i +=1;
          ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$customer['cus_code']?></td>
              <td><?=$customer['cus_lname']?></td> 
              <td><?=$customer['cus_fname']?></td> 
              <td><?=$customer['cus_phone']?></td> 
              <td><?=number_format($customer['cus_balance'], 2)?></td> 
              <td >
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                
                  
                  <label class="btn btn-primary btn-sm">
                    <a href="customer-edit.php?code=<?=$customer['cus_code']?>" class="text-white"><i class="fas fa-pen"></i></a>
                  </label>
                  
                  
                  <form method="post" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                    <input type="hidden" name="cuscode" value="<?=$customer['cus_code']?>"> <!-- Changed name to cuscode -->
                    <button class="btn btn-danger btn-sm" name="delete">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php } ?>          
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" xintegrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="js/dashboard.js"></script>
  </body>
</html>