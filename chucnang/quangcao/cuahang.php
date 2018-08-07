<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  margin: 0;
}

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}
.mySlides img{
    width: 1170px;
    height: 500px;   
}
.column img{
    width: 250px;
    height: 100px;
}


/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}



/* Container for image text */
.caption-container {
  width: 1170px;
  height: 50px;
  background-color: #222;
  padding: 2px 16px;
  color: white;
  margin-bottom: 15px;
  font-size: 15px;
  font-style: italic;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
h2{
    color: #bf466a;
}
</style>
<body>

<h2 style="text-align:center">STORE LOCATOR</h2>

<div class="container">
  <div class="mySlides"> 
    <img src="images/st1.jpg" >
  </div>

  <div class="mySlides">  
    <img src="images/st2.jpg" >
  </div>

  <div class="mySlides">   
    <img src="images/st3.jpg" >
  </div>
    
  <div class="mySlides">  
    <img src="images/st4.jpg">
  </div>

  <div class="mySlides"> 
    <img src="images/st5.jpg">
  </div>
    
  <div class="mySlides">  
    <img src="images/st3.jpg">
  </div>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
        <img class="demo cursor" src="images/st1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Saigon Centre / L3-16, Saigon Centre,No 65, Le Loi Street, District 1, Ho Chi Minh City / Call Center: ‎02471061666">
    </div>
    <div class="column">
        <img class="demo cursor" src="images/st2.jpg" style="width:100%" onclick="currentSlide(2)" alt="AEON MALL Bình Tân / Lô F34, Tầng1, TTMS Aeon - Bình Tân, Số 1 đường số 17A, khu phố 11, phường Bình Trị Đông B, quận Bình Tân, TPHCM / Call Center: ‎02471061666">
    </div>
    <div class="column">
        <img class="demo cursor" src="images/st3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Crescent Mall / 3F-34A, 3rd Floor, Crescent Mall, No 101 Ton Dat Tien Street, District 7, Ho Chi Minh City / Call Center: ‎02471061666">
    </div>
    <div class="column">
        <img class="demo cursor" src="images/st4.jpg" style="width:100%" onclick="currentSlide(4)" alt="SC Vivo City / Unit 01-06 & 01-07, SC VivoCity, Nguyen Van Linh Street, District 7, Ho Chi Minh City / Call Center: ‎02471061666">
    </div>
    <div class="column">
        <img class="demo cursor" src="images/st5.jpg" style="width:100%" onclick="currentSlide(5)" alt="Lotte Center / Lotte  Department Store - 2 nd Floor, Lotte Mega Mall , 54  Lieu Giai Street, Ba Dinh  District, Ha Noi / Call Center: ‎02471061666">
    </div>    
    <div class="column">
        <img class="demo cursor" src="images/st3.jpg" style="width:100%" onclick="currentSlide(6)" alt="Saigon Centre (MEN)/ L2-K2, Saigon Centre, No 65, Le Loi Street, District 1, Ho Chi Minh City / Call Center: ‎02471061666">
    </div>
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
    
</body>
</html>
