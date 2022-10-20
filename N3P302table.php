<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');

// make sure you're using the right database
mysqli_select_db($db,'moviesite') or die(mysql_error($db));
?>
<div style="text-align: center;">
 <h2>Movie Review Database</h2>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto;">
  <tr>
   <th>Movie Title</th>
   <th>Year of Release</th>
   <th>Movie Director</th>
   <th>Movie Lead Actor</th>
   <th>Movie Type</th>
  </tr>
 </table>
</div>
