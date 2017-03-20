<?php require "includes/header.php"; ?>
  
<title>FERITOS Consulting</title>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FERITOS Consulting</a>
        </div>
       </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>FERITOS Consulting!</h1>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet . Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <form action = "includes/registracija.php" method ="post">
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control" name ="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control"name = "password">
            </div>
			<div class="form-group">
              <input type="text" placeholder="Ime i prezime" class="form-control"name = "name">
            </div>
			<div class="form-group">
              <input type="text" placeholder="Broj mobitela" class="form-control"name = "phone">
            </div>
            <button type="submit" class="btn btn-success">Registracija</button>
		   </form>
       </div>
      <hr>

      
<?php require "includes/footer.php" ?>
