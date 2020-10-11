<?php 
    echo 'Hi, you in <b style="color:blue;">Server B</b> now.<hr>';

    $host       = 'database';
    $user       = 'dockerUser';
    $pass       = 'dockerPass';
    $database   = 'dockerDB';
    
    $connection = new mysqli($host, $user, $pass, $database);
    if($connection->connect_error){
        echo 'Error Connection: '.$connection->connect_error."<br>";
    }

    // Create Table if Not Exist;
    $check = $connection->query('SELECT id FROM user');
    if(empty($check)){
        $connection->query('CREATE TABLE user (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(20) NOT NULL)');
        $connection->query("INSERT INTO user VALUES (0, 'Im Docker User')");
    }

    // SHOW FORM & DOING POST TO DATABASE
    echo 'Yeay, you are connected to Central Database | <form method="post" action=""> <input type="text" name="name" placeholder="Enter User Name" required> <input type="submit" value="Add User"> </form> <hr>';
    if(isset($_POST)){
        $name = $_POST["name"];
        $connection->query("INSERT INTO user VALUES (0, '$name')");
    }

    // SHOW DATA
    $result = $connection->query('SELECT * FROM user');
    if($result){
        while($row = $result->fetch_assoc()){
            echo $row['name']."<br>";
        }
    }

?>