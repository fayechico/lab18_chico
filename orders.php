<?php
$title ='Orders';
?>
<!doctype html>
<html lang="en">
  <?php include 'components/head.php'; ?>
  <body>

  <?php include 'components/nav-bar.php'; ?>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar Menu -->
    <?php include 'components/side-bar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Orders</h1>        
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Invoice #</th>
              <th>Customer Name</th>
              <th>Date</th>
              <th>Sub Total</th>
              <th>Tax</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>

          <?php
            include 'functions/orders.php';
            $orders = getAllOrders(); // FIXED
          ?>

          <tbody>
          <?php foreach($orders as $order){ ?>
            <tr>
              <td><?= $order['inv_number']; ?></td>

              <td>
                <?= $order['cus_fname'] . ' ' . $order['cus_lname']; ?>
              </td>

              <td>
                <?= date("d M Y", strtotime($order['inv_date'])); ?>
              </td>

              <td><?= number_format($order['inv_subtotal'], 2); ?></td>
              <td><?= number_format($order['inv_tax'], 2); ?></td>
              <td><?= number_format($order['inv_total'], 2); ?></td>

              <td>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                  
                  <label class="btn btn-primary btn-sm">
                    <a href="" class="text-white"><i class="fas fa-pen"></i></a>
                  </label>
                  <form method="post">
                    <input type="hidden" name="pcode" value="<?=$order['inv_number']?>">
                    <button class="btn btn-danger btn-sm" name="delete">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
            </tr>
          <?php } ?>           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="js/dashboard.js"></script>

  </body>
</html>
