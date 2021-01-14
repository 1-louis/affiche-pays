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

      $search = $_GET['search'];
      if(isset($_POST["login"]))  { 
        $num=  $search;
        $statement = $connect->query('SELECT * FROM `villes` WHERE `id`  ');
        $categories = $statement->fetchAll();
      }
               
     }  
 catch(PDOException $error) {  
      $message = $error->getMessage();  
 } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form class="well-home span6 form-horizontal" name="ajax-demo" id="ajax-demo">
<div class="control-group">
            <select name="search" id="" >
            <label class="control-label" for="book">Pays</label>

               <?php foreach ($state as $key) :?> 
                    <option type="text" value='<?= $key['id'] ?>'  id="book" onKeyUp="book_suggestion()"><?= $key['id'].":".$key['pays']  ?></option>
                <?php endforeach;?>
            </select>
            <textarea id="suggestion">     </textarea>

 </div>
 <div class="control-group">
              <div class="controls">
                <button type="submit" name="login" class="btn btn-success">Ajouter</button>
              </div>
 </div>
</form>




<script>
function book_suggestion()
{
var book = document.getElementById("book").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "search=" + book;
     xhr.open("POST", "index.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       //alert(xhr.responseText);	   
	  document.getElementById("suggestion").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
	}
}
</script>
    
</body>
</html>