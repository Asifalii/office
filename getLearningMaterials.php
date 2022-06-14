						<?php

							require('connect4.php');
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
							$learnurl = explode('/',trim($_GET['url'],'/'));
							
							$cat_cond = ($learnurl[1])?' and blogs.cat='.$learnurl[1]:' ';
							$rows_per_page = ($limit)?$limit:25;
							$page = ($learnurl[0])?$learnurl[0]:1;
							$lang = getLang();
							$url = base_url();
							$start = ($rows_per_page * $page) - $rows_per_page;
							$start = ($ref==true)?0:$start;
							$sql = "select blogs.id, blogs.title, blogs.date, blog_cats.cat_name, blog_cats.div, blog_cats.id as cat_id from blogs left join blog_cats on blogs.cat=blog_cats.id where blogs.lang='".$lang."' ".$cat_cond." order by blogs.id desc limit ".$start.", ".$rows_per_page;

							$get_blogs = mysqli_query($conn, $sql);

							if(mysqli_num_rows($get_blogs)==0){
								
								echo "<h4>No Post available.</h4>";
								
							}

							while($blog_row=mysqli_fetch_assoc($get_blogs)){
							$url_title = str_replace(' ','-',strtolower($blog_row['title']));
							?>
								<div class="article-section">
									<table class="article-table">
										<tr>
											<td class="article-thumb">
												<div class="box-blog <?=$blog_row['div']?> article-thumb-div"><?=$blog_row['cat_name'][0]?></div>
											</td>
											<td class="article-td">
												<h2 class="article-h2"><a class="article-a" title="<?=$blog_row['title']?>" href="<?=$url?>/post/<?=$blog_row['id']?>/<?=$blog_row['cat_id']?>/<?=$url_title?>"><?=$blog_row['title']?></a></h2>
												<div class="article-date"><?=date("jS F Y",strtotime($blog_row['date']));?></div>									
											</td>
										</tr>
									</table>
								</div>
							<?php
							}
							?>
							
							
							

								<div style="clear:both;"></div>
							</ul>