<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Patient List</title>
</head>

<body>
    <div class="container bg-gray my-2">
        <h2>Patient LIst</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">First</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">contact</th>
            </tr>
        </thead>
        <tbody>
            <?php include_once "config.php";
             $sql = "SELECT * FROM patreg";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)>0) {
                while($row = mysqli_fetch_assoc($result)){
                    ?>
            <tr>

                <td><?php echo $row["fname"]?></td>
                <td><?php echo $row["gender"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["contact"]?></td>

            </tr>
            <?php
                }
             }
            
            ?>
        </tbody>
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>