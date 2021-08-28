<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Manger Page</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='css/all.css'>
        <script src='js/jqurey.js'></script>
        <script src='js/popper.min.js'></script>
        <script src='js/bootstrap.js'></script>
        <script src='js/all.js'></script>



        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    </head>
<body >
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <!-- Brand -->
        <a class="navbar-brand" href="#">School Mangment <i class="fa fa-school"></i> </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Advertisement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Activities</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="signin.html">Log in</a>
            </li>
          </ul>
        </div>
      </nav>










      <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="3"></li>
          <li data-target="#demo" data-slide-to="4"></li>
        </ul>
        <div class="carousel-inner">

          <div class="carousel-item active">

            <img src="img/wander-fleur-k45cNuVX_RE-unsplash.jpg" width="100%"  style="height: 80vh;">
            <div class="carousel-caption">
              <h3>school mangement</h3>
              <p>for good future </p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/tim-mossholder-WE_Kv_ZB1l0-unsplash.jpg"  width="100%" style="height: 80vh;" >

          </div>
          <div class="carousel-item">
            <img src="img/neonbrand-zFSo6bnZJTw-unsplash.jpg"  width="100%" style="height: 80vh;" >
            <div class="carousel-caption">

            </div>
          </div>

          <div class="carousel-item">
            <img src="img/ivan-aleksic-PDRFeeDniCk-unsplash.jpg"  width="100%" style="height: 80vh;" >

          </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>







       <!-- لمحة عن المدرسة -->


       <div class="text-right container mt-3 mb-3 p-3 border border-secondary " style="border-radius: 6px;border-top-left-radius:50px ;background: linear-gradient(to bottom  , white 0% ,whitesmoke 100%);direction: ltr;">
        <div class="h3 text-success">
         <span>School Name  </span>
        </div>
        <div class="mt-2 mb-2 h5 text-dark">
          The star of the Special Model School emerged in 2002 with the good efforts of a group of qualified people who collaborated with each other to build this great educational edifice.
          The first ship sailed in the midst of hard work and the savior, the rest of the captain was truly welcome to lead this ship, mr. Mahmoud Al-Sawas, may God save him
          This man deserves to take responsibility to the fullest, so the first school has reached the place we see today.
        </div>
      </div>



      <!-- الحفلات و الاعلانات  -->
      <div class="text-right container mt-3 mb-3 p-3 border border-secondary " style="border-radius: 6px;border-top-left-radius:50px ;background: linear-gradient(to bottom  , white 0% ,whitesmoke 100%);direction: rtl;">
        <div class="h3 text-success">
         <span>  Advertisements and honoring ceremonies<i class="fa fa-gifts"></i></span>
        </div>
        <div class="mt-2 mb-2 h5 ">
            <ul class="">
              <li><a href="#" class="text-dark">Excellence Ceremony 2018/2019</a> </li>
              <li><a href="#" class="text-dark">Excellence Ceremony 2017/2018</a> </li>
              <li><a href="#" class="text-dark">Excellence Ceremony 2016/2017</a> </li>
            </ul>
        </div>
        <button class="btn btn-outline-success">read more </button>
      </div>


      <!-- اخر النشاطات -->
      <div class="mt-3 mb-3 container p-3 text-right" style="direction: rtl;">
          <div class="h4 text-success mb-3 mr-4">
            Latest activities
          </div>
          <div class="row text-center">
            <div class="col-md mt-4">
              <img src="img/112.jpg" style="width: 100%;">
                <div class="text-success">
                  Transplant in school
                </div>
            </div>
            <div class="col-md mt-4">
                <img src="img/113.jpg" style="width: 100%;">
                <div class="text-success">
                  Arabic Calligraphy Drawing Class
                </div>
            </div>
            <div class="col-md mt-4">
              <img src="img/علوم1.jpg" style="width: 100%;">
                <div class="text-success">
                  Activating scientific laboratories
                </div>
            </div>
          </div>


          <button class="btn btn-outline-success mr-4 mt-4">read more </button>




      </div>
      <hr>

      <div class="mt-5   container-fluid text-center bg-dark text-white p-4 ">
        Copy Right© 2020 Emad
      </div>

</body>


<style>
  ::-webkit-scrollbar{
    width: 4px;

  }
  ::-webkit-scrollbar-track{
    background: white;


  }
  ::-webkit-scrollbar-thumb{
    background: linear-gradient(to bottom, rgba(65, 64, 64, 0.698) 0% ,grey 100%);
    border-radius: 10px;

  }
  ::-webkit-scrollbar-thumb:hover{

  }
</style>
</html>
