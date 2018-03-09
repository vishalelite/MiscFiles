<?php
$host='localhost';
$user='root';
$password='';
$database='newdb';
$link=  mysqli_connect($host, $user, $password, $database);
$qry="SELECT b.entity_id,b.customer_id, b.customer_email, b.customer_firstname, b.customer_lastname, b.created_at, a.amount_ordered AS price FROM sales_flat_order_payment a, sales_flat_order b WHERE a.amount_paid IS NULL AND a.parent_id = b.entity_id";
$result=  mysqli_query($link, $qry);
$total=  mysqli_num_rows($result);
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>	
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>	
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>	
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js"></script>	
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.dataTables.min.css"/>
<div class="page-title">
    <center><b><?php echo 'Out-Standing Invoices'; ?></b></center>
    </div>
<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Order Date</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>    
    <?php
if($total > 0){
    ?>

            <?php
                while ($row=  mysqli_fetch_assoc($result)){
                    if($row['customer_id'] == NULL){
                        
                    }  else {
                        echo '<tr><td>'.$row['entity_id'].'</td><td><center>'.$row['customer_firstname'].' '. $row['customer_firstname'] .'</center></td><td><center>'.$row['customer_email'].'</center></td><td><center>'.$row['created_at'].'</center></td><td><center>'.$row['price'].'</center></td><td><input type="button" value="Pay Now" /></td></tr>';                        
                    }
                    
                }            
            ?>  
<?php    
   
}  else {
    echo '<tr><td colspan="6"><center>Data Not available</center></td></tr>';
}
?>
        </tbody>
    </table>
<script>
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );    
</script>  