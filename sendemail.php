<?php
    $msg = "";
  use PHPMailer\PHPMailer\PHPMailer;
  include_once "PHPMailer/PHPMailer.php";
  include_once "PHPMailer/Exception.php";
  include_once "PHPMailer/SMTP.php";

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
      $file = "attachment/" . basename($_FILES['attachment']['name']);
      move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
    } else
      $file = "";

    $mail = new PHPMailer();

    //if we want to send via SMTP
    $mail->Host = "smtp.gmail.com";
    //$mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "senaidbacinovic@gmail.com";
    $mail->Password = "5C1bcnPkDI4Wd%#";
    $mail->SMTPSecure = "ssl"; //TLS
    $mail->Port = 465; //587

    $mail->addAddress('info@sbmozmedia.com');
    $mail->name = $name;
    $mail->setFrom($email, $name);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->addAttachment($file);

    if ($mail->send())
        $msg = "Your email has been sent, thank you!";
    else
        $msg = "Please try again!";

    unlink($file);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Google verification - Indixing website-->
    <meta name="google-site-verification" content="vAXOM-C5EUGGIwrxTNowJclsNz2vX4n1x9oochtq--s" />
    <title>SB-MOZMEDIA | Contact</title>
    <meta name="description" content="SBmozmedia is a Web Development Agency based in Mozambique. We make affordable websites. We provide custom designs, development, maintenance and more. Call +258 321 2622">
    <meta name="keywords" content="Web Development Mozambique, Digital Marketing Mozambique, Affordable Websites Mozambique, Virtual Shop Mozambique, Domain Registration Mozambique, IT Consulting Mozambique, Website Quotes Mozambique, Development Agency Mozambique">
    <link rel="canonical" href="https://www.sbmozmedia.com/">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.sbmozmedia.com/">
    <meta property="og:site_name" content="SBmozmedia">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122993878-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-122993878-1');
      </script>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/png" href="img/assets/sb-logofinal.png"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/fa-light.min.css" rel="stylesheet"/>
    <link href="css/fontawesome-all.min.css" rel="stylesheet"/>
  </head>
  <body id="home">
    <!--Navigation menu-->
      <nav class="navbar fixed-top navbar-expand-lg navbar-light">
      <div class="container-fluid wild">
          <a class="navbar-brand" href="index.html"><img src="img/assets/sb-logofinal.png"><span class="sb"><span class="sbmoz">SB-moz</span>Media</span></a>
          <button class="navbar-toggler compressed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class=" nav-item dropdown dropbtn"><a class="nav-link" href="#">Services <i class="fal fa-angle-down"></i></a>
                  <div class="dropdown-content">
                    <a href="dev.html"> <img class="img-fluid serv-menu-img" src="img/services/coding.png"> Web Design &amp; Development</a>
                    <a href="ecommerce.html"> <img class="img-fluid serv-menu-img" src="img/services/ecommerce.png"> E-commerce Development</a>
                    <a href="digital.html"> <img class="img-fluid serv-menu-img" src="img/services/marketing.png"> Digital Marketing</a>
                    <a href="domain_hosting.html"><img class="img-fluid serv-menu-img" src="img/services/http.png"> Domain &amp; Web Hosting</a>
                    <a href="email.html"><img class="img-fluid serv-menu-img" src="img/services/email.png"> Professional Emails</a>
                    <a href="maintenance.html"><img class="img-fluid serv-menu-img" src="img/services/website.png">Website Maintenance</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="portfolio.html">portfolio</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="blog.html">Blog</a>
                </li> 
                <li class="nav-item active">
                   <a class="nav-link get_touch" href="sendemail.php">contacts</a>
                </li> 
             </ul>      
            </div>
          </div>
        </nav>
      <!--hero section-->
      <section id="maintanance_horo">
        <div class="container-fluid wild">
          <div class="row">
            <div class="col-12">
              <div class="hero-caption">
                  <h1><span class="making-cont">Ready to </span> talk?</span></h1>
                  <p class="dev-wrapper">contact us today!</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!--contact form-->
      <section class="contactForm section-space text-center">
        <div class="container-fluid wild">
          <div class="row justify-content-center">
            <div class="col-md-9">
              <h2>Let's Do Magic Together!</h2>
              <p>We would love to take on your next project...</p>

                      <?php if ($msg != "") echo "$msg<br><br>"; ?>

              <div class="contact_form">
                <form method="post" action="sendemail.php" enctype="multipart/form-data">
                <input class="form-control" name="name" placeholder="Full Name..."><br>
                <input class="form-control" name="subject" placeholder="Subject..."><br>
                <input class="form-control" name="email" type="email" placeholder="Email..."><br>
                <textarea placeholder="Message..." class="form-control" name="message"></textarea><br>
                <input id="sendBtn" class="btn contact-btn" name="submit" type="submit" value="Send Email">
              </form>
              </div>
            </div>
          </div>
        </div>
      </section>
       <!--call to action two--->
       <section class="call2 upb_row_bg">
        <div class="container-fluid wild">
          <div class="row">
            <div class="col-md-12">
              <div class="call-caption">
                <h3>Get a proposal for your project!</h3>
                <span class="call_text">Web Design and Development, E-commerce Development, Web Maintenance, Digital Marketing, Professional Email, Custom Domain &amp; Web Hosting</span>
                 <a class="btn call2_btn" href="#">request proposal</a>
              </div>
            </div>
          </div>
        </div>
      </section>
   <!--footer-->
      <section class=" services footer footer-right section-space">
        <div class="container-fluid wild">
          <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 col-sm-12">
             <h2 class="footer-h2">CONTACT US</h2>
             <h2 class="number">+258 84 321 2622</h2>
             <ul class="list-unstyled">
               <li><i class="fal fa-envelope"></i> info@sbmozmedia.com</li>
               <li><i class="fal fa-globe"></i> www.sbmozmedia.com</li> 
               <li><i class="fal fa-clock"></i> Mon. to Fri.: 08:00 - 12:00 | 14:00 - 17:00</li>
              <li><i class="fal fa-clock"></i> Sat. and Sun.: Closed</li>
             </ul>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 footer-left">
             <ul class="list-unstyled social">
                <a href="https://www.linkedin.com/company/sbmozmedia/" target="_blank"><li><i class="fab fa-linkedin-in"></i></li></a>
                 <a href="https://www.instagram.com/sbmozmedia/" target="_blank"><li><i class="fab fa-instagram"></i></li></a>
                 <a href="https://web.facebook.com/SBmozmedia-1213522845455533/" target="_blank"><li><i class="fab fa-facebook-f"></i></li></a>
                 <a href="https://twitter.com/sbmozmedia" target="_blank"><li><i class="fab fa-twitter"></i></li></a>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="footerline">
        <div class="container-fluid wild">
          <div class="row">
            <div class="col-12">
              <p>2019 &copy; SB-MOZMEDIA - Full service Creative, Digital Marketing, Development & Web Design Agency - Maputo - Mozambique <a href="#home" title="Move_UP"> <i class="fal fa-angle-up"></i></a></p>
            </div>
          </div>
        </div>
      </section>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/main.js"></script> 
    
    
    
  </body>
</html>