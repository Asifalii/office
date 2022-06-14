<?php

    require_once('connect.php');
 
    // $sql = mysqli_query($conn, 'select * from x_bengali ');
    $sql = mysqli_query($conn, 'select word,data from v3_word_frame');
    // $sql = mysqli_query($conn, 'SELECT data FROM v3_word_frame WHERE word LIKE '%run%';');

    while($result=mysqli_fetch_array($sql)){

          $row = mysqli_fetch_assoc($sql);   
         $value = json_decode($row['data'],true);

        // var_dump($value);
        // die;
      
      $insert = [];
      $insert['word'] = $row['word'];

      // $insert['trans'] =(!empty($value['trans']) && is_array($value['trans'])) ? $value['trans'] :$value['trans'];
      // $insert['examples'] =(!empty($value['examples']) && is_array($value['examples'])) ? $value['examples'] :($value['examples']);
      // $insert['anto'] =(!empty($value['anto']) && is_array($value['anto'])) ? $value['anto'] :$value['anto'];
      // $insert['phrase'] =(!empty($value['phrase']) && is_array($value['phrase'])) ? $value['phrase'] :$value['phrase'];
      $insert['eng'] =(!empty($value['eng']) && is_array($value['eng'])) ? $value['eng'] :$value['eng'];
      // $insert['syn'] =(!empty($value['syn']) && is_array($value['syn'])) ? $value['syn'] :$value['syn'];
      // $insert['variants'] =(!empty($value['variants']) && is_array($value['variants'])) ? $value['variants'] :$value['variants'];
      
      // $insert['mean'] =(!empty($value['mean']) && is_array($value['mean'])) ? $value['mean'] :$value['mean'];




      // $insert['eng'] =(!empty($value['eng']) && is_array($value['eng']['noun'])) ? implode($value['eng']['noun'])  :$value['eng']['noun'];
      // var_dump($insert['anto']);
      // die;




     
              foreach ($insert['eng'] as $key=>$data) {
                // var_dump($data);
                // die;
                foreach($data as $d){

                        // $sql1 = 'INSERT INTO variant (word,variants) VALUES ("'.$insert['word'].'","'.$data.'");';
                        $sql1 = 'INSERT IGNORE INTO e (word,attribute,eng) VALUES ("'.$insert['word'].'","'.$key.'","'.$d.'");';     
                        // var_dump($sql1);
                        // die;

                          if (mysqli_query($conn, $sql1)) {
                            echo "New record created successfully";
                          } else {
                            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                          } 

                      }

                    // $sql1 = 'INSERT INTO variant (word,variants) VALUES ("'.$insert['word'].'","'.$data.'");';     
                   
                  }

                
                          
}

?>