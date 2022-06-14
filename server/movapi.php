<?php

require_once('./v5/connect.php');

$base_url = 'https://www.bdword.com/';
if(! $conn ){
     die('Could not connects : ' . mysqli_error());
}

$ss_url = 'https://content2.mcqstudy.com/ss/';

$q = addslashes($_GET['q']);
    $array = array();
    $movdict_query = mysqli_query($conn,"select dict_word_list.word, subtitle.end_time, subtitle.text, subtitle.mname, subtitle.mtitle from dict_word_list left join subtitle on dict_word_list.sid=subtitle.id where dict_word_list.word='".$q."' order by rand() limit 5") or die('query error : ' . mysqli_error($conn));
        
    if(mysqli_num_rows($movdict_query)>0){
        while($movdict_row=mysqli_fetch_assoc($movdict_query)){
            $movdict_img_list = $ss_url.$movdict_row['mname'].'-'.str_replace(',','.',$movdict_row['end_time']).'.jpeg';
            $movdict_sub_text = str_replace('\N','<br />',str_replace($q,'<b>'.strtoupper($q).'</b>',$movdict_row['text']));
            $movdict_mname = $movdict_row['mtitle'];
            $array[] = array('img_url'=>$movdict_img_list, 'text'=>$movdict_sub_text, 'title'=>$movdict_mname);
        }
        echo json_encode($array);
    }
?>