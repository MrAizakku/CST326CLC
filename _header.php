<?php require_once 'Autoloader.php'; ?>
<html>
<head>
  <title>TripPlanner</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="js/popper-lite.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CST-326</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto form-inline">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a> 
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tripPlanner.php">Plan a trip</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-4">
        <div class="input-group">
          <div class="d-flex">
            <form action="lookupHandler.php" method="GET" class="d-flex" style="margin-bottom:0">
              <input type="text" id="input" name="input" class="form-control" placeholder="Lookup Trip..." required>
              <span class="input-group-btn">
                <input class="btn btn-outline-success" type="submit">
              </span>
            </form>
          </div>
        </div>  
      </div>    
    </div>
  </nav>