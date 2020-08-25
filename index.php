<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userpage.css">
    <title>Document</title>
</head>
<body>    
        <header>            
        
            <?php
            // get names from db to header
                    include ('conection.php');                             

                        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

                            if (mysqli_connect_error()) {
                                die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());                        
                            }
                                    $result = $mysqli->query("SELECT * from users");

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                        echo  '<a href="?id='.$row['id'].'"> ' . $row["Name"] . '</a>';
                                        }
                                    } else {
                                        echo "0 results";                  
                                        }
                                
                                        $mysqli->close();

                ?>

                                    
                 <a href="login.php" class="login" onclick="callFunction(this.href);return false;">Login</a> 
                                       
        </header>  
        
                <div class="content">
                    <?php
                //get content from db to home page
                        $get_id = '1';
                            if ( isset($_GET['id']) AND !empty($_GET['id'])) {
                                $get_id = $_GET['id'];
                            }

                                $mysqli1 = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

                                    if (mysqli_connect_error()) {
                                        die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());                            
                                    }

                                        $result1 = $mysqli1->query("SELECT * FROM users WHERE id =  $get_id");
                                        if ($result1->num_rows > 0) {
                                            $row1 = $result1->fetch_assoc(); 
                                            echo   $row1["Content"];                                            
                                                } else {
                                                    echo "0 results";                  
                                                }
                                            
                                                    $mysqli1->close();

                    ?>
                </div>
       <footer>
           <p>Mini cms</p>
       </footer>
</body>
</html>