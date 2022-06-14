<div class="footer_wrapper">
            <span class="align_left">&copy; 2018-<?= date('Y') ?>
		| <a href="<?= $base_url ?>"><strong>English-<?= ucfirst(str_replace("bengali", "bangla", $lang)) ?> Dictionary</strong></a>
		| All Rights Reserved by <a href="https://www.bdword.com/"><strong>BD WORD</strong></a> </span>
            
            <span class="align_right">
            	<a href="<?php echo $base_url; ?>english-to-<?=$lang?>-dictionary-about-us">About Us</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>english-to-<?=$lang?>-dictionary-privacy">Privacy</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>english-to-<?=$lang?>-dictionary-disclaimer">Disclaimer</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>english-to-<?=$lang?>-dictionary-contact-us">Contact</a>
        	</span>
</div>
</div>
<script type="text/javascript" src="<?= $contentUrl ?>js/responsivejs.js"></script>

<script type="text/javascript">

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    function calFavs(a, e) {
        var t = [];
        null != localStorage.getItem("favs") && (t = JSON.parse(localStorage.getItem("favs"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1);
        localStorage.setItem("favs", JSON.stringify(t.filter(onlyUnique)));
        alert("'" + a + "'" + " has been added to the Favorite List.");
    }

     function lang(){ return '<?= $lang ?>'}

     function main_domain(){return '<?= $base_url ?>'}

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
                    e += '<span style="padding:5px 0px; overflow:hidden; display:block;">', e += '<div style="float:left" class="label_font"><a href="' + main_domain() + "english-to-" + lang() + "-meaning-" + t[i] + '">' + capitalizeFirstLetter(t[i]) + "</a></div>", e += '</span>';
            }
        }


        if (a == 'word_history')
            e += "<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2'><a href='"+ main_domain()+ "english-to-"+ lang() +"-dictionary-search-history'>SEE ALL</a></button>";

        if (a == 'favs') {

            if (t != null && t.length > 10) {
                e += "<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2'><a href='"+ main_domain()+ "english-to-"+ lang() +"-dictionary-favourite-words'>SEE ALL</a></button>";
            }

            if (t != null && t.length == 0) {
                e += "<div class='clear_fixdiv'>Please click on the heart icon to add words in your favorite list</div>"
            }

        }

        if (a == 'search_history') {

            if (t != null && t.length > 10) {
                e += "<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2'><a href='"+ main_domain()+ "english-to-"+ lang() +"-dictionary-search-history'>SEE ALL</a></button>";
            }

            if (t != null && t.length == 0) {
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
	
	function edValueKeyPress(){var e=document.getElementById("q"),t=e.value,n=t.slice(0,2),r=t.length;e.value.length<2&&(document.getElementById("myInputautocomplete-list").innerHTML=""),e.value.length>2&&load("<?= $apiurl ?>searchApi.php?q="+n,t,function(e){var n=document.getElementById("myInputautocomplete-list");n.innerHTML="";var i=JSON.parse(e.responseText);if(void 0===i||0==i.length)load("<?= $apiurl ?>wrong_word.php?q="+t,t,function(e){var r=JSON.parse(e.responseText);if(void 0===r||0==r.length);else{var i=r.filter((e,t,n)=>n.indexOf(e)===t);for(var l in n.innerHTML="",i)if(i.hasOwnProperty(l)&&i[l].length==t.length){var o=document.createElement("DIV");o.innerHTML=capitalizeFirstLetter(i[l]),o.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById("myInputautocomplete-list").appendChild(o)}}});else{var l=0;for(var o in i)if (i.hasOwnProperty(o) && (i[o].indexOf(t.toLowerCase()) != -1)) {if(l<11){var a=document.createElement("DIV");a.innerHTML=capitalizeFirstLetter(i[o]),a.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById("myInputautocomplete-list").appendChild(a)}l++}}})}

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

</script>


</body>

</html>