<?php 
$site = 'http://www.allbanglanewspaperlist24.com/';
?>       
        <div class="footer_wrapper">
            <span class="align_left">&copy; 2018-<?= date('Y')?> <strong>AllBanglaNewspaperList24.com</strong> | All Rights Reserved</span>
            <span class="align_right">
            	<a href="<?= $site ?>about-us">About Us</a>
                &nbsp;|&nbsp;
                <a href="<?= $site ?>contact-us">Contact Us</a>
        	</span>
        </div>
    </div>

    <script>
        //Scrolling Nav JS
        function currentYPosition() {
            // Firefox, Chrome, Opera, Safari
            if (self.pageYOffset) return self.pageYOffset;
            // Internet Explorer 6 - standards mode
            if (document.documentElement && document.documentElement.scrollTop)
                return document.documentElement.scrollTop;
            // Internet Explorer 6, 7 and 8
            if (document.body.scrollTop) return document.body.scrollTop;
            return 0;
        }

        function elmYPosition(eID) {
            var elm = document.getElementById(eID);
            var y = elm.offsetTop;
            var node = elm;
            while (node.offsetParent && node.offsetParent != document.body) {
                node = node.offsetParent;
                y += node.offsetTop;
            } return y;
        }

        function smoothScroll(eID) {
            var startY = currentYPosition();
            var stopY = elmYPosition(eID) - 75;
            var distance = stopY > startY ? stopY - startY : startY - stopY;
            if (distance < 100) {
                scrollTo(0, stopY); return;
            }
            var speed = Math.round(distance / 100);
            if (speed >= 20) speed = 20;
            var step = Math.round(distance / 25);
            var leapY = stopY > startY ? startY + step : startY - step;
            var timer = 0;
            if (stopY > startY) {
                for ( var i=startY; i<stopY; i+=step ) {
                    setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
                    leapY += step; if (leapY > stopY) leapY = stopY; timer++;
                } return;
            }
            for ( var i=startY; i>stopY; i-=step ) {
                setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
                leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
            }
            
          return false;
        }

        function newspapers(){
            document.getElementById('sub_menu').classList.add("hidden");
        }
        
        //Hide Sub-Menus OnClick
        function dismiss(element){
            element.parentNode.classList.remove("hidden");
			console.log(document.getElementById('showMenu').style.display);
			if(screen.availWidth<900){
				document.getElementById('menu').style.display = 'none';
			}
			
        };
		
		function showMenu(){
			if(document.getElementById('menu').style.display=='block'){
				document.getElementById('menu').style.display = 'none';
			}else{
				document.getElementById('menu').style.display = 'block';
			}
			
		}
    </script>

</body>
    
</html>