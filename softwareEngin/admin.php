<?php include_once "config.php"?>
<?php include_once "header.php"?>
<?php include_once "top_nav.php"?>
<div class="pannel">
    <div class="pannelFont">
        <?php include_once "nav.php"?>
        <?php if (isset($_POST["submit"])) {
            $name = $_POST['name'];
            $pass= $_POST['pass'];
            $sql = "SELECT * FROM admintb WHERE `userName`='$name' AND `password`='$pass'";
            $result = mysqli_query($conn,$sql) or die("query faill");
            if (mysqli_num_rows($result)>0) {
                while($row = mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION['username']=$row['username'];
                    header("location:dashboard.php");
                    echo" log in";
                }
            }
        }?>
        <form action="" method="post">
            <div class="phone">
                <!-- <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone" id="" class="PhoneNumber"
                    placeholder="Enter Phone Number" /> -->
                    <input type="text" name="name" id="" class="PhoneNumber" placeholder="Enter Name" />
                    <input type="password" name="pass" id="" class="PhoneNumber" placeholder="Enter Password" />
                </div>
    </div>
    <div class="pannelFont">
        <button type="submit" class="button" name="submit">Submit</button>
    </div>
    </form>
</div>