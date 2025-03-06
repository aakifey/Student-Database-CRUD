<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>STUDENT DATABASE</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">STUDENT DATABASE</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="btn btn-primary nav-link active" href="create.php">Add New</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        <table class="table">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>REGISTER_NO</th>
                    <th>DEPARTMENT</th>
                    <th>DATE_OF_BIRTH</th>
                    <th>GENDER</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                $sql = "select * from studentinfo";
                $result = $conn->query($sql);
                if(!$result){
                    die("Invalid query!");
                }
                while($row=$result->fetch_assoc()){
                    echo "
                        <tr>
                            <td>$row[Name]</td>
                            <td>$row[Email]</td>
                            <td>$row[Register_No]</td>
                            <td>$row[Department]</td>
                            <td>$row[Date_Of_Birth]</td>
                            <td>$row[Gender]</td>
                            <td>
                                <a class='btn btn-success' href='edit.php?id=$row[Register_No]'>Edit</a>
                                <button class='btn btn-danger' onclick='confirmDelete(\"delete.php?id=$row[Register_No]\")'>Delete</button>
                            </td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

        <!-- Back Button -->
        <a class="btn btn-primary" href="adminpg.php">Back</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JavaScript for Confirmation Dialog -->
    <script>
        function confirmDelete(url) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = url;
            }
        }
    </script>
</body>
</html>
