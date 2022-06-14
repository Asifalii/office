    var $hostname = window.location.hostname;
    var $domainurl = 'https://'+$hostname+'/'

    var lang_domain_main_array = [];
    lang_domain_main_array["www.bdword.com"] = "bengali", lang_domain_main_array["www.english-gujarati.com"] = "gujarati", lang_domain_main_array["www.english-hindi.net"] = "hindi", lang_domain_main_array["www.english-kannada.com"] = "kannada", lang_domain_main_array["www.english-marathi.net"] = "marathi", lang_domain_main_array["www.english-nepali.com"] = "nepali", lang_domain_main_array["www.english-punjabi.net"] = "punjabi", lang_domain_main_array["www.english-tamil.net"] = "tamil", lang_domain_main_array["www.english-telugu.net"] = "telugu", lang_domain_main_array["www.english-arabic.org"] = "arabic", lang_domain_main_array["www.english-malay.net"] = "malay", lang_domain_main_array["www.english-thai.net"] = "thai", lang_domain_main_array["www.english-welsh.net"] = "welsh";

    
    var $langname  = 'bengali';

    if(lang_domain_main_array[$hostname]){
        $langname = lang_domain_main_array[$hostname];
    }else{
        $langname = $hostname.replace('.english-dictionary.help','');
    }
    
    $langname = $langname.toLowerCase();

    function show_history(){document.getElementById("q").value="";var e=JSON.parse(localStorage.getItem("search_history"));if(Object.keys(e).forEach(t=>!e[t]&&void 0!==e[t]&&delete e[t]),e.reverse(),e.length>0){var t=document.getElementById("myInputautocomplete-list");for(var n in t.innerHTML="",e)if(e.hasOwnProperty(n)){if(n>4)break;var o=document.createElement("DIV");o.innerHTML=e[n],o.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById("myInputautocomplete-list").appendChild(o)}}if(e.length>5){document.getElementById("myInputautocomplete-list");t.innerHTML1="";var r=document.createElement("DIV");r.innerHTML='<a href="'+$domainurl+'english-to-'+$langname+'-dictionary-search-history" style="display: block"> See More...</a>',document.getElementById("myInputautocomplete-list").appendChild(r)}}function onlyUnique1(e,t,n){return n.indexOf(e)===t}
    
    function redirectUrl(){
        t = [];
        var word = document.getElementById("q").value;
        null != localStorage.getItem("search_history") && (t = JSON.parse(localStorage.getItem("search_history"))), t.indexOf(word) !== -1 && t.splice(t.indexOf(word), 1), t.push(word), localStorage.setItem("search_history", JSON.stringify(t.filter(onlyUnique1)));
        var redirect_url=$domainurl+"english-to-"+$langname+"-meaning-"+word.toLowerCase();
        window.location.href = redirect_url;
        return false;
    }

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    function calFavs(a, e) {
        var t = [];
        null != localStorage.getItem("favs") && (t = JSON.parse(localStorage.getItem("favs"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1);
        localStorage.setItem("favs", JSON.stringify(t.filter(onlyUnique)));
        alert("'" + a + "'" + " has been added to the Favorite List.");
    }

    function getUniqueValuesWithCase(arr, caseSensitive) {
        let temp = [];
        return [...new Set(caseSensitive ? arr : arr.filter(x => {
            let _x = typeof x === 'string' ? x.toLowerCase() : x;
            if (temp.indexOf(_x) === -1) {
                temp.push(_x)
                return x;
            }
        }))];
    }

    function showAllStorageData(a) {
        var e = "";
        e = '';
        var t = JSON.parse(localStorage.getItem(a));

        if (t != null) {
            t = getUniqueValuesWithCase(t, false);
            var t = t.filter(function (el) {
                return el != null;
            });

            for (i = 0; i < t.length; i++) {

                if (i > 9) break;

                if (t[i] != 0 && t[i] != null)
                    e += '<span style="padding:5px 0px; overflow:hidden; display:block;">', e += '<div style="float:left" class="label_font"><a href="' + $domainurl + "english-to-" + $langname + "-meaning-" + t[i] + '">' + capitalizeFirstLetter(t[i]) + "</a></div>", e += '</span>';
            }
        }


        if (a == 'word_history')
            e += "<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2'><a href='"+ $domainurl+ "english-to-"+ $langname +"-dictionary-search-history'>SEE ALL</a></button>";

        if (a == 'favs') {

            if (t && t.length > 10) {
                e += "<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2'><a href='"+ $domainurl+ "english-to-"+ $langname +"-dictionary-favourite-words'>SEE ALL</a></button>";
            }

            if (t && t.length == 0) {
                e += "<div class='clear_fixdiv'>Please click on the heart icon to add words in your favorite list</div>"
            }

        }

        if (a == 'search_history') {

            if (t && t.length > 10) {
                e += "<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2'><a href='"+ $domainurl+ "english-to-"+ $langname +"-dictionary-search-history'>SEE ALL</a></button>";
            }

            if (t && t.length == 0) {
                e += "<div class='clear_fixdiv'>You have no word in search history!</div>"
            }

        }

        return e;

    }


    // document.getElementById("load_history").innerHTML = showAllStorageData('word_history');
    document.getElementById("load_favourite").innerHTML = showAllStorageData('favs');
    document.getElementById("load_search").innerHTML = showAllStorageData('search_history');

    //Header Nav Collapse JS
    function showHideMenu() {
        var x = document.getElementById("menu");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    //Accordion JS
    function showHideAccordion() {
        var x = document.getElementById("accordion");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion2() {
        var x = document.getElementById("accordion2");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion3() {
        var x = document.getElementById("accordion3");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion4() {
        var x = document.getElementById("accordion4");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion5() {
        var x = document.getElementById("accordion5");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion6() {
        var x = document.getElementById("accordion6");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion7() {
        var x = document.getElementById("accordion7");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    //Show Hide JS
    function show() {
        document.getElementById("opener").style.display = "none";
        document.getElementById("closer").style.display = "inline";
    }

    function hide() {
        document.getElementById("closer").style.display = "none";
        document.getElementById("opener").style.display = "inline";
    }
	
	function edValueKeyPress(){
		function edValueKeyPress(){var e=document.getElementById("q"),t=e.value,n=t.slice(0,2),r=t.length;e.value.length<2&&(document.getElementById("myInputautocomplete-list").innerHTML=""),e.value.length>2&&load("https://server2.mcqstudy.com/searchApi.php?q="+n,t,function(e){var n=document.getElementById("myInputautocomplete-list");n.innerHTML="";var i=JSON.parse(e.responseText);if(void 0===i||0==i.length)load("<?= $apiurl ?>wrong_word.php?q="+t,t,function(e){var r=JSON.parse(e.responseText);if(void 0===r||0==r.length);else{var i=r.filter((e,t,n)=>n.indexOf(e)===t);for(var l in n.innerHTML="",i)if(i.hasOwnProperty(l)&&i[l].length==t.length){var o=document.createElement("DIV");o.innerHTML=capitalizeFirstLetter(i[l]),o.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById("myInputautocomplete-list").appendChild(o)}}});else{var l=0;for(var o in i)if (i.hasOwnProperty(o) && (i[o].indexOf(t.toLowerCase()) != -1)) {if(l<11){var a=document.createElement("DIV");a.innerHTML=capitalizeFirstLetter(i[o]),a.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById("myInputautocomplete-list").appendChild(a)}l++}}})}
	}

    function load(url, search_value, callback) {
        var xhr;


        var params = "q=" + search_value;

        if (typeof XMLHttpRequest !== 'undefined') xhr = new XMLHttpRequest();
        else {
            var versions = ["MSXML2.XmlHttp.5.0",
                "MSXML2.XmlHttp.4.0",
                "MSXML2.XmlHttp.3.0",
                "MSXML2.XmlHttp.2.0",
                "Microsoft.XmlHttp"]

            for (var i = 0, len = versions.length; i < len; i++) {
                try {
                    xhr = new ActiveXObject(versions[i]);
                    break;
                } catch (e) {
                }
            } // end for
        }

        xhr.onreadystatechange = ensureReadiness;

        function ensureReadiness() {
            if (xhr.readyState < 4) {
                return;
            }

            if (xhr.status !== 200) {
                return;
            }

            if (xhr.readyState === 4) {
                callback(xhr);
            }
        }

        xhr.open('POST', url, true);
        xhr.send(params);
    }
	
	$('#qb').on('keyup', function () {

            var search_term = $('#qb').val();
			var searchWord = search_term.slice(0, 2);
			var searchLength = search_term.length;
            var firstChar = search_term.charAt(0).toLowerCase();
           
            if (searchLength > 2) {
                $.ajax({
                    type: 'post',
                    data: {q: searchWord, lang: '<?=$lang?>'},
                    url: 'https://server2.mcqstudy.com/searchLangApi.php',
                    success: function (data) {
					

                        $('.suggested_list').html('');
                        if (data != '' && data != null) {
							var array = data.filter(onlyUnique);
							var step = 0;
							$.each(array, function (i, val) {
								if (val.slice(0, searchLength) == search_term && step < 16) {
									$('.suggested_list').append('<div onclick="submit_search_local(\'' + val + '\')">' + val + '</div>');
									step++;
								}
							 
                            });
                        }

                    }
                });
            } else {
                $('.suggested_list').html('');
            }

        });