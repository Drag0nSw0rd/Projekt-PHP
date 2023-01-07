<div class="content-right">
	<section class="top_read">
		<h2 class="top_read_text">Top of topics</h2>
		<div class="content2_posts">
			<?php
				$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");
			?>
			
			<?php
				$i = mysqli_num_rows($articles) - 1;
				while ($art = mysqli_fetch_assoc($articles)) {
					$art_cat = false;
					foreach($categories as $cat) {
						if ($cat['id'] == $art['categorie_id']) {
							$art_cat = $cat;
							break;
						}
					}
				if ($i == 0) {
					?>
					<div class="content2_body_left last">
						<img src="<?php echo 'static/' . $art['image']; ?>" alt="" class="content2_body_left_img">
						<div class="content2_text">
							<a href="./article.php?id=<?php echo $art['id']; ?>" class="content1_body_headText"><?php echo $art['title']; ?></a>
							<small class="content1_body_small"> Category: <a href="./articles.php?categorie=<?php echo $art['categorie_id']; ?>" class="content1_body_category"><?php echo $art_cat['title']; ?></a></small>
							<p> <?php echo mb_substr($art['text'], 0, 60, 'utf-8'); ?> </p>
						</div>
					</div>
					<?php
				}
				else {
					?>
					<div class="content2_body_left">
						<img src="<?php echo 'static/' . $art['image']; ?>" alt="" class="content2_body_left_img">
						<div class="content2_text">
							<a href="./article.php?id=<?php echo $art['id']; ?>" class="content1_body_headText"><?php echo $art['title']; ?></a>
							<small class="content1_body_small"> Category: <a href="./articles.php?categorie=<?php echo $art['categorie_id']; ?>" class="content1_body_category"><?php echo $art_cat['title']; ?></a></small>
							<p> <?php echo mb_substr($art['text'], 0, 60, 'utf-8'); ?> </p>
						</div>
					</div>
					<?php
				}
				$i--;
			}
			?>
		</div>
	</section>
	<section class="comment">
		<h2 class="comment_text">Comments</h2>
		<div class="content2_posts">
			<?php
				$comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5");
			?>

			<?php
				$i = mysqli_num_rows($comments) - 1;
				while ($comment = mysqli_fetch_assoc($comments)) {
					$com = false;
					foreach($art_t as $ar) {
						if ($comment['articles_id'] == $ar['id']) {
							$com = $ar;
							break;
						}
					}

					if ($i == 0) {
						?>
						<div class="content2_body_left last">
							<img src="https://www.gravatar.com/avatar/<?php echo md5($comment['email']) ?>" alt="" class="content2_body_left_img">
							<div class="content2_text">
								<h4><?php echo $comment['author']; ?></h4>
								<small class="content1_body_small"> Topic: <a href="./article.php?id=<?php echo $com['id']; ?>" class="content1_body_category"><?php echo $com['title']; ?></a></small>
								<p> <?php echo mb_substr($comment['text'], 0, 100, 'utf-8'); ?> </p>
							</div>
						</div>
						<?php
					}
					else {
						?>
						<div class="content2_body_left">
							<img src="https://www.gravatar.com/avatar/<?php echo md5($comment['email']) ?>" alt="" class="content2_body_left_img">
							<div class="content2_text">
								<h4><?php echo $comment['author']; ?></h4>
								<small class="content1_body_small"> Topic: <a href="./article.php?id=<?php echo $com['id']; ?>" class="content1_body_category"><?php echo $com['title']; ?></a></small>
								<p> <?php echo mb_substr($comment['text'], 0, 100, 'utf-8'); ?> </p>
							</div>
						</div>
						<?php
					}
					$i--;
				}
			?>
		</div>
	</section>
</div>