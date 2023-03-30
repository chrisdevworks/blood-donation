<!-- Info boxes -->
<?php
// include_once('db_connect.php');
// connectdb();

include_once 'private/config.php';
include_once 'private/database.php';

$database = new Database();
$db = $database->getConnection();
?>


<div class="container">
  <div class="row ">
    <div class="col-lg-4 col-6" bis_skin_checked="1">
      <div class="small-box bg-danger" bis_skin_checked="1">
        <div class="inner" bis_skin_checked="1">
          <?php
            $i = 1;
            $qry = $db->query("SELECT COUNT(*) AS count FROM donor");
            while ($row = $qry->fetch_assoc()) :
          ?>
          <h3><?php echo $row['count'] ?></h3>
          <p>Total Blood Donors</p>
          <?php endwhile; ?>
        </div>
        <div class="icon" bis_skin_checked="1">
          <i class="fa-solid fa-hand-holding-droplet"></i>
        </div>
        <span class="small-box-footer">
          Blood Donors 
        </span>
      </div>
    </div>
  </div>
</div>


<script>

</script>