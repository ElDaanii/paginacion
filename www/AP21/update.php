<?php
require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();

$id = $_GET['id'];

$sql = "SELECT * FROM investment WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$client = mysqli_fetch_assoc($result);

if (count($_POST) > 0){
    $id = $_POST['id'];
    $company = $_POST['company'];
    $investment = $_POST['investment'];
    $date = $_POST['date'];
    $active = $_POST['active'];
    
    $sql = "UPDATE investment SET company='$company', investment='$investment', date='$date', active='$active' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
    } else {
        echo "Error al actualizar datos: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion de datos</title>
</head>
<body>
    <h2>Modificacion de datos</h2>
        <form method="POST">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" value="<?php echo $client['id']; ?>" required><br>

            <label for="company">Company:</label><br>
            <input type="text" id="company" name="company" value="<?php echo $client['company']; ?>" required><br>
            
            <label for="investment">Investment:</label><br>
            <input type="text" id="investment" name="investment" value="<?php echo $client['investment']; ?>" required><br>
            
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" value="<?php echo $client['date']; ?>" required><br>
            
            <label for="active">Active:</label><br>
            <select id="active" name="active" required>
                <option value="1">True</option>
                <option value="0">False</option>
            </select><br><br>
            
            <input type="submit" value="Submit">


        </form>
    </body>
</html>



