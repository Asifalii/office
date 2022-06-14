

<?php
if(getScriptName()=='index'){
?>
<script type="text/javascript">
[
  'https://code.jquery.com/jquery-1.10.2.min.js',
  '<?=$url?>/js/main.full.js',
  '<?=$url?>/js/responsivejs.js'
].forEach(function(src) {
  var script = document.createElement('script');
  script.src = src;
  script.async = false; 
  document.head.appendChild(script);
});
</script>
<?php }else{ ?>

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?=$url?>/js/main.full.js"></script>

<?php } ?>


<script async src="<?=$url?>/js/responsivejs.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	if(localStorage.getItem('download_box')==null){
		$('.download_box').css({'display':'table'});
	}
	$('.download_box_remove').on('click',function(){
		$('.download_box').hide();
		localStorage.setItem('download_box', '1');
	});
});

  WebFontConfig = {
    google: { families: [ 'Roboto:300,400,500,700' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>