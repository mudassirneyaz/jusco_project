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
  <form action="output.php" method="POST">
    <div class="form-group ">
       From Date:<input type="Date" class="form-control" id="" placeholder="Search here " name="date_search1">
       To Date:<input type="Date" class="form-control" id="" placeholder="Search here " name="date_search2">
       Media Type:<input type="text" name="media_search"class="form-control" id="" placeholder="Search here " >
       Tone:<input type="text" name="tone_search"class="form-control" id="" placeholder="Search here " >
        Publication:<input type="text" name="publication_search"class="form-control" id="" placeholder="Search here " >
       Placement:<input type="text" name="placement_search"class="form-control" id="" placeholder="Search here " >
    </div>
  
    <button type="submit" name="search" class="btn btn-primary">Search</button>
    <br> <br>
  </form>
  <?php
    require_once('dbconfig.php');
if(isset($_POST['search'])){
   
  $date_search1=$_POST['date_search1'];
  $date_search2=$_POST['date_search2'];
  $media_search=$_POST['media_search'];
  $tone_search=$_POST['tone_search'];
  $publication_search=$_POST['publication_search'];
  $placement_search=$_POST['placement_search'];
  $qry1="SELECT * FROM input WHERE print_media LIKE '%$media_search%' and (date>='$date_search1' and date<='$date_search2') or tone=' $tone_search' or publication='$publication_search' or placement='$placement_search' ";

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

<?php
require_once('footer.php');

if(isset($_POST['submit'])){
  $printmedia = $_POST['printmedia'];
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