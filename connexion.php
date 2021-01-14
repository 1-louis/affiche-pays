<?php  
 session_start();  
 $host = "localhost";
 $database = "phpcrud";    
 $username = "root";  
 $password = "";  
 $message = ""; 
 

 try  {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

      $sql = $connect->query("SELECT * FROM `pays` ");
      $state = $sql->fetchAll();
        
   
               
     }  
 catch(PDOException $error) {  
      $message = $error->getMessage();  
 } 
?>

<!DOCTYPE html>
<html lang="fr
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <form action="" method="post" >
   
          <select name="search" id="search" >
               <?php foreach ($state as $key) :?> 
                         <option value="<?= $key['id']?>"><?= $key['id'].':'.$key['pays']?></option>
               <?php endforeach;?>
          </select>
          
          <input type="submit" value="submit" name='submit'>

     </form>     
          <ol name="" >
               <?php $search = $_POST['search'];
                    // var_dump($search);
                    // exit();
                    if(isset( $search) ){ 
                         $num=  $search;
                         $statement = $connect->query('SELECT * FROM `villes` WHERE id  ');
                         $categories = $statement->fetchAll();
                    //  var_dump($search);
                    // exit();
                         foreach ($categories as $category) {
                              if($category['id'] == $num ):?>
                                   <?=$category['villeP'];?>
                    <?php endif?>
               <?php
                         }
                    }
               ?>   
          </ol>
          
</body>
</html>

