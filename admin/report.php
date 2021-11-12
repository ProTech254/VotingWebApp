<?php include('include/header.php');?>
      
      <script type="text/javascript">

function delet(id)
{
if(confirm("you want to delete ?"))
{
window.location.href='delete_property.php?x='+id;
}
}

</script>
<!-- Header -->

<section>
 
 <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
  <!-- #END# Left Sidebar -->
  <section class="content">
              <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                  <button class="btn btn-primary btn btn-info" onclick="printDiv()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Report</button>

                      <h2 style="text-align: center;">
                   
                    </li>
                       View Report  </h2>
                      <ul class="header-dropdown m-r--5">
                          <li class="dropdown">
                              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                              </a>
                              <ul class="dropdown-menu pull-right">
                                  <li>
                                   
                                  <li><a href="javascript:void(0);">Another action</a></li>
                                  <li><a href="javascript:void(0);">Something else here</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
                  <div class="body">
                      <div id="toPrint" class="table-responsive">
                      <b><h2> All Agents</h2></b>
                      <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                              <thead>
                                 <tr>
                                      <th>S.no</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Address</th>
                                      <th>Contact</th>  
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tfoot>


                                  <tr>
                                  <th>S.no</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Address</th>
                                      <th>Contact</th>  
                                      <th>Action</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                  <?php
                                  $i=1;
                                    include'include/conn.php';

                                    $query=mysqli_query($con,"select * from agents");
                                    while($res=mysqli_fetch_array($query))
                                    {
                                    $id=$res['agent_id'];
                                    ?>

                                  <tr>
                                      <td><?php echo $i++; ?></td>
                                      <td><?php echo $res['agent_name'];?></td>
                                      <td><?php echo $res['agent_email'];?></td>
                                      <td><?php echo $res['agent_address'];?></td>
                                      <td><?php echo $res['agent_contact'];?></td>
                                     
                                       <td>
                                        <a class='btn btn-info'   href="update_agent.php?&id=<?php echo $id;?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a class='btn btn-danger' onclick="delet(<?php echo $id;?>);" ><span class="glyphicon glyphicon-remove" style="color:white;"></span></a>

                                        <!-- <a class='btn btn-success' href="dashboard.php?page=c_info&id=<?php echo $id;?>"><span class="fa fa-eye"></span></a>-->

                                        </td>
                                  </tr>
                             <?php } ?>
                              </tbody>
                          </table>
                          <b><h2> All Payments</h2></b>
                          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                              <thead>
                                 <tr>
                                 <th>S.no</th>
                                      <th>Tenant Names</th>
                                      <th>Contact Info</th>
                                      <th>Amount (Ksh.)</th>
                                      <th>Transaction</th>  
                                  </tr>
                              </thead>
                              <tfoot>


                                  <tr>
                                  <th>S.no</th>
                                      <th>Tenant Names</th>
                                      <th>Contact Info</th>
                                      <th>Amount (Ksh.)</th>
                                      <th>Transaction</th>  

                                  </tr>
                              </tfoot>
                              <tbody>
                                  <?php
                                  $i=1;
                                    include'include/conn.php';

                                    $query = "select * from payment, tenants where payment.tenant_id = tenants.tenant_id";
                                    $result = mysqli_query($con, $query);

                                    while($res=mysqli_fetch_array($result))
                                    {
                                    $id=$res['id'];

                                    $tenant_name = $res['tenant_name'];
                                    $tenant_contact = $res['tenant_contact'];

                                    ?>

                                  <tr>
                                      <td><?php echo $i++; ?></td>
                                      <td><?php echo $res['tenant_name'];?></td>
                                      <td><?php echo $res['tenant_contact'];?></td>
                                      <td><?php echo $res['amount'];?></td>
                                      <td><?php echo $res['transaction_code'];?></td>
                                     

                                  </tr>
                             <?php } ?>
                              </tbody>
                          </table>
                          <b><h2> All Houses</h2></b>
                          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                       <tr>
                                            <th>S.no</th>
                                            <th>Title</th>
                                            <th>Bedroom</th>
                                            <th>Kitchen</th>
                                            <th>Hall</th>
                                            <th>Price</th>
                                              <th>Parking</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tfoot>


                                        <tr>
                                            <th>S.no</th>
                                            <th>Title</th>
                                            <th>Bedroom</th>
                                            <th>Kitchen</th>
                                            <th>Hall</th>
                                            <th>Price</th>
                                            <th>Parking</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $i=1;
include'include/conn.php';

$query=mysqli_query($con,"select * from properties");
while($res=mysqli_fetch_array($query))
{
$id=$res['property_id'];
$img=$res['property_img'];
?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $res['property_title'];?></td>
                                            <td><?php echo $res['bed_room'];?></td>
                                            <td><?php echo $res['kitchen'];?></td>
                                            <td><?php echo $res['liv_room'];?></td>
                                            <td><?php echo $res['price'];?></td>
                                            <td><?php echo $res['parking'];?></td>
                                            <td><?php echo $res['property_address'];?></td>
                                            <td><img src="../../<?php echo $img;?>" width="120"></td>
                                             <td>
    <a class='btn btn-info'   href="update_property.php?&id=<?php echo $id;?>"><span class="glyphicon glyphicon-pencil"></span></a>
    <a class='btn btn-danger' onclick="delet(<?php echo $id;?>);" ><span class="glyphicon glyphicon-remove" style="color:white;"></span></a>

   <!-- <a class='btn btn-success' href="dashboard.php?page=c_info&id=<?php echo $id;?>"><span class="fa fa-eye"></span></a>-->
  
    </td>
                                        </tr>
                                   <?php } ?>
                                    </tbody>
                                </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</section>
<script>
        function printDiv() {
            var divContents = document.getElementById("toPrint").innerHTML;
            var a = window.open('', '', 'height=1000, width=1500');
            a.document.write('<html>');
            a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
      <?php include'include/footer.php';?>


                          