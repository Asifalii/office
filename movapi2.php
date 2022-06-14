<?php

require_once('./v5/connect.php');

$base_url = 'https://content2.mcqstudy.com/ss/';
if(! $conn ){
     die('Could not connects : ' . mysqli_error());
}

$q = addslashes($_GET['q']);
    $array = array();
    $movdict_query = mysqli_query($conn,"select dict_word_list.word, subtitle.end_time, subtitle.text, subtitle.mname, subtitle.mtitle from dict_word_list left join subtitle on dict_word_list.sid=subtitle.id where dict_word_list.word='".$q."' order by rand() limit 5") or die('query error : ' . mysqli_error($conn));
        
    if(mysqli_num_rows($movdict_query)>0){
        while($movdict_row=mysqli_fetch_assoc($movdict_query)){
            $movdict_img_list = $base_url.'movdicts/ss/'.$movdict_row['mname'].'-'.str_replace(',','.',$movdict_row['end_time']).'.jpeg';
            $movdict_sub_text = str_replace('\N','<br />',str_replace($q,'<b>'.strtoupper($q).'</b>',$movdict_row['text']));
            $movdict_mname = $movdict_row['mtitle'];
            $array[] = array('img_url'=>$movdict_img_list, 'text'=>$movdict_sub_text, 'title'=>$movdict_mname);
            // echo "<div class=\"card\">
            // <img src='".$movdict_img_list."' title=\"".addslashes($movdict_row['text'])."\"' alt=\"".addslashes($movdict_row['text'])."\" style=\"width:100%\">
            // <div class=\"movdict_container\">
            //     <p style='margin-bottom:-30px;'>".$movdict_sub_text."</p> 
            //     <h4 style='background: #f8f8f8; padding: 10px 16px; width: 100%; position: relative;top: 23px; left: -16px;'><b>".$movdict_mname."</b></h4> 
            // </div>
            // </div><br />";
        }
        // echo "<pre>";
        // print_r($array);
        echo json_encode($array);
    }
?>