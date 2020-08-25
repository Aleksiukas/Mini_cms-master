<?php
session_start();
if(isset($_SESSION['log']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
<style>
body{

background-color:rgba(211, 211, 211, 0.014);
margin: 0;
}        

    header{

        background-color: black;
        color:white;
        padding: 25px 40px;
    }

        a{
            color: black;
            text-decoration: none;
            padding-left: 20px;
            font-weight:bolder ;
        }

            .logout {
                float: right;
                margin-right: 80px;
                color: white;
                margin-bottom: 10px;
            }
                table{
                    background-color:rgba(211, 211, 211, 0.014);
                    color: black;
                    text-align: center;
                    width: 100%;
                    
                }

                    .tablehead {
                        color: black;
                        background-color: rgba(128, 128, 128, 0.384);
                        text-align: center;
                        width: 100%;
                        padding: 5px 0;
                    }
                        #title{
                            padding: 5px 0;
                        }
                        
                            p {
                                display: inline-block;
                                margin-left: 50px;
                            }
                            #html{
                                width: 80%;
                                height: 300px;
                                margin-left: 50px;
                            }
                                .btn{
                                    margin-left: 50px;
                                    color: white;
                                    background-color: black;
                                }
                                    #aha{
                                        color: white;
                                        background-color: black;
                                    }
                                        #delete{
                                            background-color: black;
                                            color: white;
                                            user-select: none;
                                            white-space: pre;
                                            align-items: flex-start;
                                            text-align: center;
                                            cursor: default;
                                            color: -internal-light-dark(buttontext, rgb(170, 170, 170));
                                            background-color: -internal-light-dark(rgb(239, 239, 239), rgb(74, 74, 74));
                                            box-sizing: border-box;
                                            padding: 1px 6px;
                                            border-width: 2px;
                                            border-style: outset;
                                            border-color: -internal-light-dark(rgb(118, 118, 118), rgb(195, 195, 195));
                                            border-image: initial;
                                            font-weight: 100;
                                        }
</style>    
</head>
<body>
    
    <header><b>Admin page</b><a href="index.php" class="logout">Logout</a> </header>

        <table  border="1px solid">
    
            <thead class="tablehead">
                <th id="title">Title</th>

            </thead>
            
                <tbody>     
                    <?php
            
                // cet content into table
                        include ('conection.php');                             

                        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

                                if (mysqli_connect_error()) {
                                    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());                        
                                }
                                        $result = $mysqli->query("SELECT * from users");

                                        
                                        
                                            
                                         if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                
                                            echo  '<tr><td class="oneRow"><a href="?id='.$row['id'].'"> ' . $row["Name"] . '</a></td></tr>';
                                           
                                            
                                            }
                                        } else {
                                            echo "0 results";                  
                                            }
                                    
                                            $mysqli->close();
                                                                                                           
                                                     ?>                     
                </tbody> 
        </table>

        <?php

         // update field conections                
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
                $html = $row1["Content"]; 
                $nav =  $row1["Name"];                                         
                    } else {
                        echo "0 results";                  
                    }
                
                        $mysqli1->close();

                    // check is variable not empty
                            if(!empty($html)){
                                $html=$html;
                            }else {
                                $html = '';
                            }

                                if(!empty($nav)){
                                    $nav=$nav;
                                }else {
                                    $nav = '';
                                }
                                //create update form

        ?>
        <br><br><br><form action="insert.php" method="post">
           <p>page:</p><input type="text"  name="nav" value="<?php echo $nav;?>"><br>
            <textarea name="html" id="html">
            <?php echo $html; ?>
            </textarea><br><br>
            <input type="submit" value="update" name="Update" class="btn">
            <a id="delete" href="delete.php?id=<?php echo $row1['id']; ?>">Delete</a>
        </form>
        
        
</body>
</html>


<?php
//if session doesn`t log 
}
else
{
	echo "please fill proper details";
	header("refresh:2;url=index.php");
}
?>

