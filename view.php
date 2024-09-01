<?php 
    include('inc/header.php') ;
    include('lib/Employee.php') ;
?>

        
        <!-- card  -->
        <div class="card">
            <!-- card header -->
            <div class="card-header">
                <div class="card-title">
                    <a href="add_employee.php" class="btn btn-success">Add Employee</a>
                    <a href="index.php" class="btn btn-info float-end">Take Attendance</a>
                </div>
            </div>
            <!-- card-body  -->
            <div class="card-body">
                <form action="" method="POST">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Attendance Date</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $emp = new Employee();
                                $get_date = $emp->attendaceDateList();
                                if($get_date){
                                    $sln =1;
                                while($row = $get_date->fetch_assoc()){
                                 
                            ?>
                            <tr>
                                <td><?php echo $sln;?></td>
                                <td><?php echo $row['att_time'];?></td>
                                <td><a class="btn btn-success btn-sm" href="date_view.php?dt=<?php echo $row['att_time'] ?>">View All</a></td>
                                
                        
                            </tr>
                            <?php $sln++; }} ?>
                            
                        </tbody>
                    </table>
                </form>
            </div>
<?php include('inc/footer.php') ?>