<!--       Footer section start             -->

<style>
	.fa {
		padding: 20px;
		font-size: 30px;
		width: 30px;
		text-align: center;
		text-decoration: none;
		margin: 5px 2px;
		border-radius: 50%;
	}

	.fa:hover {
		opacity: 0.7;
	}

	.fa-facebook {
		background: #3B5998;
		color: white;
	}

	.fa-twitter {
		background: #55ACEE;
		color: white;
	}

	.fa-linkedin {
		background: #007bb5;
		color: white;
	}

	.fa-youtube {
		background: #bb0000;
		color: white;
	}

	.fa-pinterest {
		background: #cb2027;
		color: white;
	}

	.fa-rss {
		background: #ff6600;
		color: white;
	}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="row" style="background-color: whitesmoke;padding: 0px">
	<div style="margin: auto;">
		<?php
		$actual_link = $this->config->item('site_url');
		?>
		<a class="social-icon facebook" href="http://www.facebook.com/sharer.php?u=<?= $actual_link ?>"
		   target="_blank" title="Facebook"><i class="fa fa-facebook"
											   style="font-size: 20px;padding-right: 30px"></i></a>

		<!-- Twitter -->
		<a class="social-icon twitter"
		   href="http://twitter.com/share?url=<?= $actual_link ?>&text=Simple Share Buttons&hashtags=simplesharebuttons"
		   target="_blank" title="Twitter"><i class="fa fa-twitter" style="font-size: 20px;padding-right: 35px"></i></a>

		<!-- LinkedIn -->
		<a class="social-icon linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?= $actual_link ?>"
		   target="_blank" title="Linkedin"><i class="fa fa-linkedin"
											   style="font-size: 20px;padding-right: 35px"></i></a>

		<!-- Email -->
		<a class="social-icon youtube"
		   href="mailto:?Subject=Baby Names 24&Body=I%20saw%20this%20and%20thought%20of%20you!%20<?= $actual_link ?>"
		   target="_blank" title="Mail"><i class="fa fa-envelope-square"
										   style="font-size: 20px;padding-right: 35px"></i></a>

		<a class="social-icon shr behance" target="_blank"
		   rel="nofollow"
		   href="https://www.addtoany.com/share?url=<?= $actual_link ?>%2F&amp;title=Baby%20Name%20"
		   onclick="return cpop(this.href,'Addthis')"><i class="fa fa-rss"
														 style="font-size: 20px;padding-right: 30px"></i></a>
	</div>


	<footer class="fotter-section">
		<div class="container">
			<div class="row" style="margin-top: 20px;">
				<div class="col-md-12 offset-md-1">

					<div class="footer-inner">
						<div class="row">

							<div class="col-md-5">
								<p>© <?= date('Y') ?> www.BabyNames24.com. All Rights Reserved.</p>
							</div>

							<div class="col-md-3">
								<p><a href="<?= $this->config->item('site_url') . 'privacy' ?>" style="color: white;">Privacy
										Policy</a>
									|
									<a href="<?= $this->config->item('site_url') . 'contact' ?>" style="color: white;">Contact
										us</a></p>
							</div>

							<div class="col-md-4">
								<div class="sosial-icon">
									<ul>
										<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
										<li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
										<li><a href=""><i class="fab fa-twitter"></i></a></li>
										<li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
										<li><a href=""><i class="fas fa-envelope-square"></i></a></li>
										<li><a href=""><i class="fas fa-share-alt-square"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</footer>

	<!--       Footer section end             -->


	<!--    Jquery link-->


	<script src="<?= $this->config->item('media_url') . 'js/jquery.min.js'; ?>"></script>
	<script src="<?= $this->config->item('media_url') . 'js/bootstrap.min.js'; ?>"></script>

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0"
			nonce="b41QvN0M"></script>

	</body>
	</html>

	<script type="text/javascript">
		function rate_name(param) {
			var str = param;
			var id = str.replace(/\//g, '_');

			var url = 'https://server2.mcqstudy.com/babynames/index.php/name_like';
			$.post(url, {param: param}, function (count) {

				var value = readCookie('xyz');

				if (value == null) {
					var array = [param];
					var json_str = JSON.stringify(array);
					createCookie('xyz', json_str);
				} else {
					var json_str = getCookie('xyz');
					var array = JSON.parse(json_str);
					array.push(param);
					var json_str = JSON.stringify(array);
					createCookie('xyz', json_str);
				}

				var favString = readCookie('xyz');
				var favArray = JSON.parse(favString);
				var uniqueArray = favArray.filter(onlyUnique);
				var number = uniqueArray.length;
				$("#fav_count").html('(' + number + ')');
				$('#' + id).html(count);

				location.reload(true);
			});


		}

		function remove_name(param) {
			var str = param;
			var id = str.replace(/\//g, '_');

			var url = 'https://server2.mcqstudy.com/babynames/index.php/name_dislike';
			$.post(url, {param: param}, function (count) {

				var response = str.split("/");
				var favString = readCookie('xyz');
				var favArray = JSON.parse(favString);

				var uniqueNames = [];
				$.each(favArray, function (i, el) {
					if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
				});

				var index = uniqueNames.indexOf(param);
				if (index > -1) {
					uniqueNames.splice(index, 1);
				}
				var json_str = JSON.stringify(uniqueNames);
				createCookie('xyz', json_str);

				var uniqueArray = uniqueNames.filter(onlyUnique);
				var number = uniqueArray.length;
				$("#fav_count").html('(' + number + ')');
				$('#' + id).html(count);

				location.reload(true);
			});


		}

		function onlyUnique(value, index, self) {
			return self.indexOf(value) === index;
		}

		function readCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') c = c.substring(1, c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
			}
			return null;
		}

		var createCookie = function (name, value, days) {
			var expires;
			var date = new Date();
			date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
			document.cookie = name + "=" + value + expires + "; path=/";
		}

		function getCookie(c_name) {
			if (document.cookie.length > 0) {
				c_start = document.cookie.indexOf(c_name + "=");
				if (c_start != -1) {
					c_start = c_start + c_name.length + 1;
					c_end = document.cookie.indexOf(";", c_start);
					if (c_end == -1) {
						c_end = document.cookie.length;
					}
					return unescape(document.cookie.substring(c_start, c_end));
				}
			}
			return "";
		}
	</script>
