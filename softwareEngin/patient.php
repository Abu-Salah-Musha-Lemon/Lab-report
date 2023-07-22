<?php include_once "header.php"?>
<?php include_once "top_nav.php"?>
<div class="pannel">
        <div class="pannelFont">
<?php include_once "nav.php"?>
            <div class="phone">
                <input type="txt" name="fName" id="" class="PhoneNumber" placeholder="Enter first Name" />
                <input type="txt" name="lName" id="" class="PhoneNumber" placeholder="Enter last Name" />
                </div>
            <div class="phone">
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="" id="" class="PhoneNumber" placeholder="Enter Phone Number" />
                <input type="Email" name="email" id="" class="PhoneNumber" placeholder="Enter Email" />
            </div>
            <div class="phone">
                <input type="password" name="" id="" placeholder="Password" class="PhoneNumber">
                <input type="password" name="" id="" placeholder="Confirm Password" class="PhoneNumber">
            </div>
        </div>
        <div class="pannelFont">
            <button type="submit" class="button" style="margin-top:100px;margin-left:-500px">Submit</button>
            <a href="admin.php">Already have a account?</a>
        </div>
    </div>