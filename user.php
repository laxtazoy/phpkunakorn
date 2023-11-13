<?php 
include_once "navbar.php";
include_once "connect.php";
$sql = "SELECT * FROM user";
$result = $con->query($sql);

?> 
<div class="container mt-5">
    <div class="card">
        <div class="card-header"> <h1>Info User</h1></div>
        <div class="card-body">
            <a href = "add_user.php" class="btn btn-outline-danger mb-3"><i class="bi bi-person-plus-fill"></i> Insert Username</a>
            <table class="table table-striped">
                <tr>
                    <th class="bg-Warning text-dark" >Number</th>
                    <th class="bg-Warning text-dark">Username</th>   
                    <th class="bg-Warning text-dark">Fullname</th>
                    <th class="bg-Warning text-dark">Email</th>
                    <th class="bg-Warning text-dark">Action</th>
                    
                </tr>
                <?php 
                    $i=1;
                    while ($row = mysqli_fetch_assoc($result)){?>
                
                <tr>
                    <th><?php echo$i;$i++?></th>
                    <th><?php echo $row['username']?></th>   
                    <th><?php echo $row['fullname']?></th>   
                    <th><?php echo $row['email']?></th>  
                    <td>
                        <a href="edit_user.php?username=<?php echo $row['username']?>">แก้ไข</a>
                        <a href="del_user.php">ลบ</a>
                    </td> 
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>