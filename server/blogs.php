<?php
include('header.php');
$sql = "SELECT id,title,subject FROM blog_info WHERE lang = 'all' OR lang = '" . strtolower($ulang) . "'";
$query = mysqli_query($conn, $sql);

?>
    <style>
       .box_wrapper fieldset .fieldset_body span{float:none!important}.inner_details span{border-bottom:none!important}
    </style>
    <!--Specific Page Content-->
    <div class="box_wrapper">
        <?php

       //if ($no_index_status == false and $isMobile == true) {
        //    echo showAds($q, '300', $conn);
//
       // } elseif ($no_index_status == false and $isMobile == false) {
        //    echo showAds($q, 'body-top', $conn);
       // }
		echo $alladcodes['300'];
        ?>

        <fieldset>
            <legend>Blog List</legend>

            <div class="fieldset_body inner_details">
                <div class="topic_link">
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <a title="<?= str_replace("[lang]", str_replace("Bengali", "Bangla", $ulang), $row['title']) ?>"
                               href="<?= $base_url?>english-to-<?= $lang?>-dictionary-blog-<?= $row['id'] ?>"><img
                                        src="<?= $contentUrl ?>img/direction_arrow2.png" width="22" height="22"
                                        alt="icon"><span><?= str_replace("[lang]", str_replace("Bengali", "Bangla", $ulang), $row['title']) ?></span></a>
                        <?php }
                    } ?>

                </div>
            </div>

        </fieldset>
    </div>

    </div>

<?php include('right-content.php'); ?>

    </div>

<?php include('footer.php'); ?>