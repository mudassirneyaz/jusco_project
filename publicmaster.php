<?php
require_once('header.php');
?>

</ul>
</nav>

<h1 style="background-color: #46110d;height: 30px;text-align: center;
font-size: 20px;
line-height: 30px;
margin-top: 10px;
color: white;">Publication Master</h1>
<div class="container box">
  <h2>Search</h2>
  <form action="publicmaster.php" method="POST">
    <div class="form-group">
      <label for="">Publication Type:</label>
      <input type="text" class="form-control" id="" placeholder="Search here " name="publication_search">
    </div>
    <button type="submit" name="search" class="btn btn-primary">Search</button>
    <br> <br>
  </form>

    <?php
    require_once('dbconfig.php');
if(isset($_POST['search'])){
   
  $publication_search=$_POST['publication_search'];

  $qry1="SELECT * FROM input WHERE publication LIKE '%$publication_search%'";

  $run1 =mysqli_query($con,$qry1);
    if(mysqli_num_rows($run1) > 0){
      ?>
        <table class="table-bordered text-center" style="width: 100%;margin: 10px;padding: 10px;">
          <?php
            echo "<tr>";
                echo "<th>Print Media</th>";
                echo "<th>Tone</th>";
                echo "<th>Placement</th>";
                echo "<th>Publication</th>";
                echo "<th>Date</th>";
                echo "<th>Article Heading</th>";
                echo "<th>News</th>";
                echo "<th>Reported By</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($run1)){
            echo "<tr>";
                echo "<td>" . $row['print_media'] . "</td>";
                echo "<td>" . $row['tone'] . "</td>";
                echo "<td>" . $row['placement'] . "</td>";
                echo "<td>" . $row['publication'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['article_heading'] . "</td>";
                echo "<td>" . $row['news'] . "</td>";
                echo "<td>" . $row['reported_by'] . "</td>";
            echo "</tr>";
        }
        ?>
        </table>
        <?php
      }
       else{
        echo "No records matching your query or your spelling is incorrect.";
    }
    }
    
  ?>

</div>
<div class="container box">
	<h1 style="background-color: #46110d;height: 30px;text-align: center;
font-size: 20px;
line-height: 30px;
margin-top: 10px;
color: white;">Type</h1>
<code>National:</code>



<h2>Record Details</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="" required>Publication :</label>
      <input type="text" class="form-control" id="" placeholder="Enter here " name="public">
    </div>
    <button type="submit" name="save" class="btn btn-primary">Save</button>
    <br> <br>
  </form>
</div>
<?php
require_once('footer.php');
?>
<?php

if(isset($_POST['save']))
{
  $db = mysqli_connect("localhost","root","","mts");

 $public_name = $_POST['public'];

 $sql = "INSERT INTO publication(publication_name) VALUES('$public_name')";
 $row = mysqli_query($db,$sql);

if($row){
  echo "Publication name inserted";
}
}
?>