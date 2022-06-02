<?php
session_start();
if(!$_SESSION["login"]){
   header("location:login.php");
   die;
}
?>

<?php
  include_once 'venues_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="style.css" type="text/css" href="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff">

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
  <script src="script.js"></script>

  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Oswald);
      h4 {
      display: inline;
      letter-spacing: 0.3rem;
      font-family: 'Oswald', sans-serif;
      text-transform: uppercase;
    }
  </style>
</head>

<body>

  <header>
    <ul class="dropdown-content" id="user_dropdown">
      <!-- <li><a class="indigo-text" href="#!">Profile</a></li> -->
      <li><a class="indigo-text" href="logout.php">Logout</a></li>
    </ul>

    <nav class="indigo" role="navigation">
      <div class="nav-wrapper">
        <a href="index.php"><img style="margin-top: 10px; margin-left: 5px;" src="text2.gif" /></a>

        <ul class="right hide-on-med-and-down">
          <li>
            <a class='right' href='user.php'>User</a>
          </li>
          <li>
            <a class='right' href='venuee.php'>Venue</a>
          </li>
          <li>
            <a class='right' href='admin.php'>Admin</a>
          </li>
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
          </li>
          
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>

    <nav>
      <div class="nav-wrapper indigo darken-2">
        <a style="margin-left: 20px;" class="breadcrumb" href="index.php">Admin</a>
        <a class="breadcrumb" href="venuetable.php">Venue List</a>
        <a class="breadcrumb" href="editvenue.php">Edit Venue</a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

  <main>
    <div class="row">
      <div class="col s6 offset-s3">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <h4>EDIT VENUE</h4>
            </div>
            <form action="venuetable.php" method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
              <br><br><br>
                <div class="col-sm-9">
                  <input name="id" type="text" class="form-control" id="id" placeholder="ID" value="<?php if(isset($_GET['edit'])) echo $editrow['id']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9">
                  <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Full Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fullname']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9">
                  <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?php if(isset($_GET['edit'])) echo $editrow['email']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9">
                  <input name="place_area" type="text" class="form-control" id="place_area" placeholder="Place Area" value="<?php if(isset($_GET['edit'])) echo $editrow['place_area']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9">
                  <input name="venue_name" type="text" class="form-control" id="venue_name" placeholder="Venue Name" value="<?php if(isset($_GET['edit'])) echo $editrow['venue_name']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9">
                  <input name="venue_book_status" type="text" class="form-control" id="venue_book_status" placeholder="Booking Status" value="<?php if(isset($_GET['edit'])) echo $editrow['venue_book_status']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9">
                  <input name="venue_ratings" type="text" class="form-control" id="venue_ratings" placeholder="Ratings" value="<?php if(isset($_GET['edit'])) echo $editrow['venue_ratings']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9">
                  <input name="venue_latitude" type="text" class="form-control" id="venue_latitude" placeholder="Latitude" value="<?php if(isset($_GET['edit'])) echo $editrow['venue_latitude']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9">
                  <input name="venue_longitude" type="text" class="form-control" id="venue_longitude" placeholder="Longitude" value="<?php if(isset($_GET['edit'])) echo $editrow['venue_longitude']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <?php if (isset($_GET['edit'])) { ?>
                    <input type="hidden" name="oldid" value="<?php echo $editrow['id']; ?>">
                      <button class="btn btn-default" type="submit" name="update">Update</button>
                  <!-- <?php } else { ?>
                    <button class="btn btn-default" type="submit" name="create">Create</button> -->
                  <?php } ?>
                    <button class="btn btn-default" type="reset">Clear</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col s12">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <h4>LIST OF REGISTERED VENUE</h4>
            </div>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Applicant's Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Place Area</th>
                    <th scope="col">Venue Name</th>
                    <th scope="col">Booking Status</th>
                    <th scope="col">Ratings</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    
                  </tr>
                </thead>
                  <?php
                  // Read
                  $per_page = 5;
                  if (isset($_GET["page"]))
                    $page = $_GET["page"];
                  else
                    $page = 1;
                  $start_from = ($page-1) * $per_page;

                  try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $stmt = $conn->prepare("select * from venue_list LIMIT $start_from, $per_page");

                    $stmt->execute();
                    $result = $stmt->fetchAll();
                  }
                  catch(PDOException $e){
                        echo "Error: " . $e->getMessage();
                  }
                  foreach($result as $readrow) {
                  ?>   
                  <tbody>
                  <tr>
                    <td><?php echo $readrow['id']; ?></td>
                    <td><?php echo $readrow['fullname']; ?></td>
                    <td><?php echo $readrow['email']; ?></td>
                    <td><?php echo $readrow['place_area']; ?></td>
                    <td><?php echo $readrow['venue_name']; ?></td>
                    <td><?php echo $readrow['venue_book_status']; ?></td>
                    <td><?php echo $readrow['venue_ratings']; ?></td>
                    <td><?php echo $readrow['venue_latitude']; ?></td>
                    <td><?php echo $readrow['venue_longitude']; ?></td>
                    
                    <td>
                      <a href="venuetable.php?edit=<?php echo $readrow['id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                      <a href="venuetable.php?delete=<?php echo $readrow['id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>

                    </td>
                  </tr>
                  </tbody>
                  <?php
                  }
                  $conn = null;
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM venue_list");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="venuetable.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"venuetable.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"venuetable.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="venuetable.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </div>
    </div> -->
    </main>

<?php include('footer.php') ?>

</body>
</html>