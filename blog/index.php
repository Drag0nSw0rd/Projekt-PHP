<?php
	require "./includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Blog</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/style_index.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" type="text/css" href="./css/style_login.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<?php include "includes/header.php"; ?>
			<main class="main">
				<?php include "includes/navigation.php"; ?>
				<div class="container">
					<div class="content">
						<div class="content-left">
							<section class="new">
								<div class="new_text">
									<h2>New in blog</h2>
									<a href="./articles.php" class="allpost">All articles</a>
								</div>
								<div class="content1_posts">
									<?php
										$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 10");
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
											if ($i <= 1) {
											?>
											<div class="content1_body_left last">
												<img src="<?php echo 'static/' . $art['image']; ?>" alt="" class="content1_body_left_img">
												<div class="content1_text">
													<a href="./article.php?id=<?php echo $art['id']; ?>" class="content1_body_headText"> <?php echo $art['title']; ?> </a>
													<small class="content1_body_small"> Categories: <a href="./articles.php?categorie=<?php echo $art_cat['id']; ?>" class="content1_body_category"><?php echo $art_cat['title']; ?></a></small>
													<p>
														<?php echo mb_substr($art['text'], 0, 60, 'utf-8'); ?>
													</p>
												</div>
											</div>
											<?php
											}
											else {
											?>
											<div class="content1_body_left">
												<img src="<?php echo 'static/' . $art['image']; ?>" alt="" class="content1_body_left_img">
												<div class="content1_text">
													<a href="./article.php?id=<?php echo $art['id']; ?>" class="content1_body_headText"> <?php echo $art['title']; ?> </a>
													<small class="content1_body_small"> Category: <a href="./articles.php?categorie=<?php echo $art_cat['id']; ?>" class="content1_body_category"><?php echo $art_cat['title']; ?></a></small>
													<p>
														<?php echo mb_substr($art['text'], 0, 60, 'utf-8'); ?>
													</p>
												</div>
											</div>		
												<?php
												}
											$i--;
										}
									?>
								</div>
							</section>
							<section class="security">
								<div class="security_text">
									<h2>Security [New]</h2>
									<a href="./articles.php?categorie=4" class="allpost">All topics</a>
								</div>
								<div class="content1_posts">

									<?php
										$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 4 ORDER BY `id` DESC LIMIT 10");
									?>

									<?php
										$i = mysqli_num_rows($articles) - 1;
										while ($art = $art = mysqli_fetch_assoc($articles)) {
											$art_cat = false;
											foreach($categories as $cat) {
												if ($cat['id'] == $art['categorie_id']) {
													$art_cat = $cat;
													break;
												}
											}
											if ($i <= 1) {
												?>
													<div class="content1_body_left last">
														<img src="<?php echo 'static/' . $art['image']; ?>" alt="" class="content1_body_left_img">
														<div class="content1_text">
															<a href="./article.php?id=<?php echo $art['id']; ?>" class="content1_body_headText"><?php echo $art['title']; ?></a>
															<small class="content1_body_small"> Category: <a href="./articles.php?categorie=<?php echo $art['categorie_id']; ?>" class="content1_body_category"><?php echo $art_cat['title']; ?></a></small>
															<p> <?php echo mb_substr($art['text'], 0, 60, 'utf-8'); ?> </p>
														</div>
													</div>
												<?php
											}
											else {
												?>
													<div class="content1_body_left">
														<img src="<?php echo 'static/' . $art['image']; ?>" alt="" class="content1_body_left_img">
														<div class="content1_text">
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
							<section class="programming">
								<div class="programming_text">
									<h2>Programming [New]</h2>
									<a href="./articles.php?categorie=3" class="allpost">All topics</a>
								</div>
								<div class="content1_posts">
									<?php
										$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 3 ORDER BY `id` DESC LIMIT 10");
									?>

									<?php
										$i = mysqli_num_rows($articles) - 1;
										while ($art = $art = mysqli_fetch_assoc($articles)) {
											$art_cat = false;
											foreach($categories as $cat) {
												if ($cat['id'] == $art['categorie_id']) {
													$art_cat = $cat;
													break;
												}
											}
											if ($i <= 1) {
												?>
													<div class="content1_body_left last">
														<img src="<?php echo 'static/' . $art['image']; ?>" alt="" class="content1_body_left_img">
														<div class="content1_text">
															<a href="./article.php?id=<?php echo $art['id']; ?>" class="content1_body_headText"><?php echo $art['title']; ?></a>
															<small class="content1_body_small"> Category: <a href="./articles.php?categorie=<?php echo $art['categorie_id']; ?>" class="content1_body_category"><?php echo $art_cat['title']; ?></a></small>
															<p> <?php echo mb_substr($art['text'], 0, 60, 'utf-8'); ?> </p>
														</div>
													</div>
												<?php
											}
											else {
												?>
													<div class="content1_body_left">
														<img src="<?php echo 'static/' . $art['image']; ?>" alt="" class="content1_body_left_img">
														<div class="content1_text">
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
						</div>
						<?php include "includes/aside.php"; ?>
					</div>
				</div>
			</main>
			<?php include "includes/footer.php"; ?>
		</div>
	</body>
</html>