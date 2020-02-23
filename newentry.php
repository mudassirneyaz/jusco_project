<?php
require_once('header.php');
?>


</ul>
</nav>

<h1 style="background-color: #46110d;height: 30px;text-align: center;
font-size: 20px;
line-height: 30px;
margin-top: 10px;
color: white;">New Entry Page</h1>
<div class="container box">
  <h2>Search</h2>
  <form action="newentry.php" method="POST">
    <div class="form-group">

      Print Media: 

       Date:<input type="Date" class="form-control" id="" placeholder="Search here " name="date_search">
    </div>
    <button type="submit" name="search" class="btn btn-primary">Search</button>
    <br> <br>
  </form>
  <?php
    require_once('dbconfig.php');
if(isset($_POST['search'])){
   
  $date_search=$_POST['date_search'];
  $qry1="SELECT * FROM input WHERE date='$date_search'";

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
        echo "No records matching your query were found.";
    }
    }
    
  ?>

</div>
<div class="container box">
	<h1 style="background-color: #46110d;height: 30px;text-align: center;
font-size: 20px;
line-height: 30px;
margin-top: 10px;
color: white;"><span style="float: left">MediaType <br><code>Positive/Negative:</code></span>
<span style="float: right;">PublicationType <br><code>National:</code></span>
</h1>
<br>




<h2>Details</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
   <!--    Print Media: <select>
        <option value="">--select--</option>
  <option value="prabhat_Khabar">Prabhat Khabar</option>
  <option value="hindustan">Hindustan</option>
</select><br>
Tone: <select>
  <option value="">--select--</option>
  <option value="positive">Positive</option>
  <option value="negative">Negative</option>
</select><br>
Placement: <select>
  <option value="">--select--</option>
  <option value="business">Business/Corporate Page</option>
  <option value="back">Back Page</option>
</select><br>

Publication Type <select >
  <option value="">--select--</option>
  <option value="national">National</option>
  <option value="international">International</option>
</select><br> -->
       <label for="" required>Print Media :</label>
     	
       <select name="media">
      	<?php 

      		$db = mysqli_connect("localhost","root","","mts");

      		$sql="SELECT * FROM media";
      		$row = mysqli_query($db,$sql);
      		while($result = mysqli_fetch_array($row))
      		{
      			echo "<option value=".$result['id'].">".$result['media_name']."</option>";
      		}




      	?>
      </select></br>

       <label for="" required>Tone :</label>
      <select name="tone">
        <?php 

          $db = mysqli_connect("localhost","root","","mts");

          $sql="SELECT * FROM tone";
          $row = mysqli_query($db,$sql);
          while($result = mysqli_fetch_array($row))
          {
            echo "<option value=".$result['id'].">".$result['tone_name']."</option>";
          }




        ?>
      </select></br>
       <label for="" required>Placement :</label>
      <select name="placement">
        <?php 

          $db = mysqli_connect("localhost","root","","mts");

          $sql="SELECT * FROM placement";
          $row = mysqli_query($db,$sql);
          while($result = mysqli_fetch_array($row))
          {
            echo "<option value=".$result['id'].">".$result['placement_name']."</option>";
          }




        ?>
      </select></br>
       <label for="" required>Publication :</label>
      <select name="publication">
        <?php 

          $db = mysqli_connect("localhost","root","","mts");

          $sql="SELECT * FROM publication";
          $row = mysqli_query($db,$sql);
          while($result = mysqli_fetch_array($row))
          {
            echo "<option value=".$result['id'].">".$result['publication_name']."</option>";
          }




        ?>
      </select></br>
      <label for="" required>Date :</label>
      <input type="Date" class="form-control" id="" placeholder="Enter here " name="date">
      <label for="" required>Article Heading :</label>
      <input type="text" class="form-control" id="" placeholder="Enter Heading here " name="articleheading">
      <label for="" required>News / Article :</label>
      <input type="text" class="form-control" id="" placeholder="Enter News " name="news">
      <label for="" required>Picture :</label>
      <input type="file" class="" name="pic" value="Upload">
      
 <label for="" required>Reported By :</label>
      <input type="text" class="form-control" id="" placeholder="Enter Reporter Name " name="reportedby"><br>
    <button type="submit" class="btn btn-primary" name="submit1">Save</button>
    <br> <br>
    </div>
    

  </form>
</div>
<?php
require_once('footer.php');

if(isset($_POST['submit1'])){
  $printmedia = $_POST['media'];
 $tone = $_POST['tone'];
  $placement = $_POST['placement'];
  $publication = $_POST['publication'];
  $date = $_POST['date'];
  $article = $_POST['articleheading'];
  $news = $_POST['news'];
  $reportedby = $_POST['reportedby']; 
  $qry = "INSERT INTO `input`(`print_media`, `tone`, `placement`, `publication`, `date`, `article_heading`, `news`, `reported_by`) VALUES ('$printmedia','$tone','$placement','$publication','$date','$article','$news','$reportedby')";;
  $run =mysqli_query($con,$qry);
  if($run==true){
    ?>
    <script>alert('Date Entry done Successfully! ');
    window.open('newentry.php','_self');
    </script>
    <?php
  }
}

?>