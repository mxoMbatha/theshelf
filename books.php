<?php
require_once 'common.php';
?>
<head>
<title><?php $appname ?>:Books</title>
</head>
<body class="dflex flex flex-column h-100" >
<main class="main">
<h1 class="">eLibrary</h1>
<div class="booksmain">
<aside class="bd-aside border-left">
   <div class="flex-shrink-0 p-3 bg-white">
   <p class="d-flex align-items-centre mb-3 pb-3 border-bottom">|Filter|</p>
   <ul class="list-unstyled ps-0">
    <li class="mb-1">
  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
        category
        </button>
        <div class="collapse show" id="home-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#"  class="link-dark rounded" id="fiction" >Fiction</a></li>
            <li><a href="#" id="webdevBooks" class="link-dark rounded">Web Development</a></li>
            <li><a href="#" id="biography" class="link-dark rounded">biography</a></li>
          </ul>
        </div>
        </li>
  </ul>
  </div>
</aside>
<div class="allbooks flex-shrink-0 p-3 bg-white">
<p class="d-flex align-items-centre mb-3 pb-3 border-bottom">
<a href="#" id="allbooks">|All Books|</a></p>
  <div class="display-books" id="display-books">
      <script>
   $('#allbooks').click(function(e){ 
     e.preventDefault();
     $.get('allbooks.php', function(data){
        $('#display-books').html(data);
      })
    })
    $('#webdevBooks').click(function(e){
      e.preventDefault();
      $.get('webdevelopment.php',function(data){
        $('#display-books').html(data);
      })
    })
      </script>
  </div>
</div>
</div>
</main>  
<div class="p-5 newsletter">
       <div class="container">
           <div class="d-md-flex justify-content-betwen align-items-center">
            <p class="mb-3 mb-md-0">Subscribe to our newsletter</p>
            <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter email">
          <button class="btn btn-lg btn-dark subscribe" id="#subscribe" type="submit">Send Email</button>
        </div>
            </div>
           </div>
</div>

<footer class=" py-3 p-5 position-relative" >
<div class="container-xl">
<div class="row mb-3">
    <div class="col-md-8 themed-grid-col">

       <div class="pb-3 social">
            <h3>Connect with <?php echo "<a class='logolink' href='index.php'> $appname </a>"?></h3>
        <ul>
          <li><a href="#email">email</a></li>
          <li><a href="#facebook">facebook</a></li>
          <li><a href="#instagram">instagram</a></li>
          <li><a href="#twitter">twitter</a></li>
        </ul> 
        </div>
    <div class="row">
          

            <div class="col-md-6 themed-grid-col foot">
            <p>Copyright &copy; <span id="yearnow"></span>
             <span><a class='logolink' href="index.php"><?php echo $appname ?></a> </span>
                All Right Reserved.  |  
             <span> <a href="Trems">Terms & Conditions</a> |  <a href="Privacy"> Privacy</a></span> </p>
            </div>
    </div>
</div>
     <div class="col-md-4 themed-grid-column  left-footer"> 
        <div class="logo"><h4><a  class='logolink' href="index.php"><?php echo $appname ?></a></h4></div>
        <p>Read books</p>
               <div class="links">
      <ul >
          <li><a class="" href="#eLibrary">eLibrary</a></li>
          <li><a href="#About">About</a></li>
          <li><a href="#support">Support</a></li>
          <li><a href="#contact">Contact</a></li>
      </ul>
        </div>
    </div>   
</div>
</div>
</div>
</footer>
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
 </body>
 </html>

