 <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
 
<?php 
$lang = $_GET['lang'];
echo '52.77.48.215/local.php?lang='. $lang.'<br>';
$array = [];
foreach(range('a','z') as $row){
	echo '52.77.48.215/local1.php?lang='.$lang.'&word='.$row.'<br>';
	$array = explode(',',file_get_contents('https://content2.mcqstudy.com/bw-static-files/ta-word-list/' . strtolower($row) . '.txt'));
	$array = array_unique(array_map(function($v) { return substr($v, 0, 2); }, $array));
	foreach($array as $value){
		echo '52.77.48.215/local2.php?lang='.$lang.'&word='.$value.'<br>';
	}
}

$other = file_get_contents('https://content2.mcqstudy.com/words/main/' . $lang . '.txt');
$other = explode(',', $other);
foreach($other as $row1){
	echo '52.77.48.215/local1.php?lang='.$lang.'&word='.$row1.'<br>';?>
	<script>
	
	 function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }
		
		function myFunction(item, index) {
  document.getElementById("demo").innerHTML += "52.77.48.215/local2.php?lang="+'<?= $lang?>'+"&word="+ item + "<br>"; 
}
		
	var dir = 'words/local/' + '<?= $lang?>';
	
	
	 $.ajax({
                    type: 'get',
                    url: 'https://content2.mcqstudy.com/' + dir + '/' + '<?= $row1?>' + '.txt',
                    success: function (data) {
				
				        var arr = [];

						if (data != '') {
							var dsplit = data.split(',');

							for (var i = 0; i < dsplit.length; i++) {
								arr.push(dsplit[i].charAt(0) + dsplit[i].charAt(1));
							}
						}

						var arr_uniq = arr.filter(onlyUnique);
						
						arr_uniq.forEach(myFunction);


				     },
                    error: function () {
                        console.log('error');
                    }
                });
	

	</script>
<?php }
?>

<p id="demo"></p>