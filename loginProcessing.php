<?php 

if(isset($_POST["submit"])) {
    require("sqlconnection.php");
    $stmt = $con->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); // check username
    $stmt->bindParam(":user", $_POST["username"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count == 1) {
        // username vergeben
        $row = $stmt->fetch();
        if(password_verify($_POST["password"], $row["PASSWORD"])) {
            session_start();
            $_SESSION["username"] = $row["USERNAME"];
            header("Location: index.php");
        } else {
            echo "Wrong password";
        }
    } else {
        echo "This error";
    }
}
?>