function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }
		
		function myFunction(item, index) {
		document.getElementById("demo").innerHTML += "php local2.php "+'<?= $lang?>'+" '"+ item + "'#*9909#english-to-"+'<?= $lang?>'+"-dictionary-two-letter-"+item+"<br>"; 
		}
	
function hide(lang,row1){
	var dir = 'words/local/' + lang;
	
	
	 $.ajax({
                    type: 'get',
                    url: 'https://content2.mcqstudy.com/' + dir + '/' + row1 + '.txt',
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
}

function unloadAllJS() {
  var jsArray = new Array();
  jsArray = document.getElementsByTagName('script');
  for (i = 0; i < jsArray.length; i++){
    if (jsArray[i].id){
      unloadJS(jsArray[i].id)
    }else{
      jsArray[i].parentNode.removeChild(jsArray[i]);
    }
  }      
}	
	