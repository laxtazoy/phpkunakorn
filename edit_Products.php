<?php
include "navbar.php";
include "connect.php";
$proid = $_GET['pro_id'];
$sql = "SELECT * FROM  products WHERE pro_id='$proid'";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['submit'])) { // เช็คว่ามีปุ่มหรือยัง
    $proname = $_POST['pro_name'];
    $proprice = $_POST['pro_price'];
    $proamount = $_POST['pro_amount'];
    $prostatus = $_POST['pro_status'];
    if ($proname == '' || $proprice == '' || $proamount == '' || $prostatus == ''){
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง')</script>";
    } else {
        $sql = "UPDATE products SET  pro_name='$proname',pro_price='$proprice',pro_amount='$proamount',pro_status='$prostatus' WHERE pro_id='$proid'";
        $result = $con->query($sql);
        if (!$result) {
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
        } else {
            header('location:products.php');
        }
    } //ปิดเช็คค่าว่าง
} //ปิดเช็คการกดปุ่ม
?>

<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-primary text-white">แก้ไขข้อมูล Product
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label class="form-col-label">ชื่อสินค้า</label>
                    <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name'] ?>" >
                </div>
                <div class="mb-3">
                    <label class="form-col-label">ราคาสินค้า</label>
                    <input type="text" name="pro_price" class="form-control" value="<?php echo $row['pro_price'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-col-label">จำนวนสินค้า</label>
                    <input type="text" name="pro_amount" class="form-control" value="<?php echo $row['pro_amount'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-col-label">สถานะสินค้า</label>
                    <input type="text" name="pro_status" class="form-control" value="<?php echo $row['pro_status'] ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>