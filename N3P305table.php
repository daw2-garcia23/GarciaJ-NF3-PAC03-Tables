<?php
//connect to mysqli
$db = mysqli_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');

// make sure you're using the right database
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

// retrieve information
$query = 'SELECT
        movie_name, movie_year, movie_director, movie_leadactor,
        movie_type
    FROM
        movie
    ORDER BY
        movie_name ASC,
        movie_year DESC';
$result = mysqli_query($db,$query) or die(mysqli_error($db));

// determine number of rows in returned result
$num_movies = mysqli_num_rows($result);

$table = <<<ENDHTML
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
ENDHTML;

// loop through the results
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);

    $table .= <<<ENDHTML
    <tr>
     <td>$movie_name</td>
     <td>$movie_year</td>
     <td>$movie_director</td>
     <td>$movie_leadactor</td>
     <td>$movie_type</td>
    </tr>
ENDHTML;
}

$table .= <<<ENDHTML
 </table>
<p>$num_movies Movies</p>
</div>
ENDHTML;

echo $table;
?>
