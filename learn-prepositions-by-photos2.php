<?php 
include('header.php');

?>

<style>

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  width: auto;
  padding: 6px;
  margin-top: 0px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
  border:1px solid #000;
  background: #fff;
  top: 50;
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
  text-decoration: none;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  text-align: center;
  color: #000000;
  font-size: 15px;
  font-weight: 800;
}

/* Caption text */
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

img.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style>


    <!--Specific Page Content-->
    <div class="box_wrapper">
    
        <div><a href="<?=$base_url?>/learn-prepositions-by-photos.php" title="Learn Prepositions by Photos"><img src="<?=$base_url?>/banners/learn-prepositions-by-photos.jpg" alt="Learn Preppositions By Photos" style="width:100%" /></a></div>
<?php

if($no_index_status==false AND $isMobile==true)
{
echo showAds($q, '300', $conn);	

}elseif($no_index_status==false AND $isMobile==false)
{
echo showAds($q, 'body-top', $conn);
}

?>


    
        <fieldset>
            <legend>Learn Prepositions by Photos</legend>
            
            <div class="fieldset_body inner_details">	
                

            <!-- Images used to open the lightbox -->
<div class="row">
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-different-types.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/preposition-usage.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-at-in-on.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-at-in-under-etc.jpg" onclick="openModal();currentSlide(4)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-at-on-in.jpg" onclick="openModal();currentSlide(5)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-common-mistakes.jpg" onclick="openModal();currentSlide(6)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-express-different.jpg" onclick="openModal();currentSlide(7)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-of-place-part-1.jpg" onclick="openModal();currentSlide(8)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-of-place-part-2.jpg" onclick="openModal();currentSlide(9)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-of-time-and-place.jpg" onclick="openModal();currentSlide(10)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-on-in-by-for-at.jpg" onclick="openModal();currentSlide(11)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-use-of-prepositions.jpg" onclick="openModal();currentSlide(12)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-to-too-two.jpg" onclick="openModal();currentSlide(13)" class="hover-shadow" style="width:100%;">
  </div>
  <div class="">
    <img src="<?=$base_url?>preposition_photos/prepositions-use-of-for.jpg" onclick="openModal();currentSlide(14)" class="hover-shadow" style="width:100%;">
  </div>
</div>

<!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()" style="color:#ffffff !important;font-size:18px;text-align:center;padding-top:13px;margin-left: 16px;">&times; Close</span>
  <div class="modal-content">
    
    <!-- Next/previous controls -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="mySlides">
      <div class="numbertext">1 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-different-types.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 14</div>
      <img src="<?=$base_url?>preposition_photos/preposition-usage.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-at-in-on.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-at-in-under-etc.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">5 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-at-on-in.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">6 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-common-mistakes.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">7 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-express-different.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">8 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-of-place-part-1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">9 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-of-place-part-2.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">10 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-of-time-and-place.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">11 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-on-in-by-for-at.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">12 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-use-of-prepositions.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">13 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-to-too-two.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">14 / 14</div>
      <img src="<?=$base_url?>preposition_photos/prepositions-use-of-for.jpg" style="width:100%">
    </div>

    <!-- Caption text -->
    <div class="caption-container">
      <p id="caption"></p>
    </div>

  </div>
</div>


            </div>	
            
        </fieldset>
    </div>

</div>


            
            <?php include('right-content.php');?>

        </div>

        <script>
// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
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

<?php include('footer.php');?>