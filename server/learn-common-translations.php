
<?php include('header.php');
if (!empty($argv[2])) {
    $_GET['page'] = $argv[2];
}

?>
<?php
echo $alladcodes['300'];
?>
                <!--Specific Page Content-->
                <div class="box_wrapper">
                    <fieldset>
                        <?php
												
						echo PageCreator($conn,30, 'common_translations', 'learn-common-translations.php', $lang, $base_url);
						
						?>
                    </fieldset>

                </div>

            </div>
            
            <?php include('right-content.php');?>

        </div>

<?php include('footer.php');?>