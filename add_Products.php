<?php
include_once "navbar.php";
if(isset($_POST['submit'])){
    include_once 'connect.php';
    $proname = $_POST['pro_name'];
    $proprice = $_POST['pro_price'];
    $proamount = $_POST['pro_amount'];
    $prostatus = $_POST['pro_status'];

    if($proname == '' || $proprice =='' || $proamount == '' || $prostatus == ''){
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกข้อ');history.back();</script>";
    }else{
    $num = mysqli_fetch_array($con->query("SELECT pro_name  FROM products WHERE pro_name='$proname'"));
    if($num == 1){
        echo "<script>alert('สินค้านี้มีอยู่เเล้วมีอยู่เเล้วเปลี่ยนซะ')</script>";
    }else{
    $sql = "INSERT INTO products (pro_name,pro_price,pro_amount,pro_status) VALUES('$proname','$proprice','$proamount','$prostatus')";
    $result = $con->query($sql);
    if(!$result){
        echo "<script>alert('Error:ไม่สามารถเพิ่มข้อมูลได้');history.back();</script>";
    }else{
        header('location:products.php');
    }
  }//เช็ค username ซ้ำ
 }//เช็คค่าว่าง
}//if_isset เช็คการกดปุ่ม
?>



<div class="container w-50 mt-3">
    <div class="card">
        <div class="card-header bg-danger text-white mb-3">
            เพิ่มข้อมูล Products
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>"method="POST">
            <div class="mb-3">
                <label class="form-label">ชื่อสินค้า</label>
                <input type="text" name="pro_name" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">ราคาสินค้า</label>
                <input type="text" name="pro_price" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">จำนวนสินค้า</label>
                <input type="text" name="pro_amount" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">สถานะสินค้า</label>
                <select name="pro_status" class="form-select">
                    <option value="1">สินค้าพร้อมจำหน่าย</option>
                    <option value="2">สินค้าหมด</option>
                    <option value="3">สินค้ายกเลิกจำหน่าย</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
        </form>
        </div>
    </div>
</div>
