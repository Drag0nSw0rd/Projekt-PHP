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
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<?php include "./includes/header.php"; ?>
			<main class="main">
				<?php include "./includes/navigation.php"; ?>
				<div class="container">
					<div class="content">
						<div class="content-left">
							<section class="new">
								<div class="new_text">
									<h2>
										<?php
											if (isset($_GET['categorie'])) {
												$name_q = mysqli_query($connection, "SELECT * FROM `articles_categories` WHERE `id` = " . $_GET['categorie']);
												$name = mysqli_fetch_assoc($name_q);
												echo $name['title'];
											}
											else {
												echo 'Все статьи';
											}
										?>
									</h2>
								</div>
								<div class="content1_posts">
									<?php
										$per_page = 4;
										$page = 1;
										$total_count = 0;

										if (isset($_GET['page'])) {
											$page = (int) $_GET['page'];
										}

										if (isset($_GET['categorie'])) {
											$total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles` WHERE `categorie_id` = " . $_GET['categorie']);

											$total_count = mysqli_fetch_assoc($total_count_q);
											$total_count = $total_count['total_count'];

											$total_pages = ceil($total_count / $per_page);

											if ($page <= 1 or $page > $total_pages) {
												$page = 1;
											}

											$offset = ($per_page * $page) - $per_page;

											$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = " . $_GET['categorie'] . " ORDER BY `id` LIMIT $offset,$per_page");

											$total_count = $total_pages;
										}
										else {
											$total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles`");

											$total_count = mysqli_fetch_assoc($total_count_q);
											$total_count = $total_count['total_count'];

											$total_pages = ceil($total_count / $per_page);

											if ($page <= 1 or $page > $total_pages) {
												$page = 1;
											}

											$offset = ($per_page * $page) - $per_page;

											$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` LIMIT $offset,$per_page");

											$total_count = $total_pages;
										}

										$articles_exist = true;
										if (mysqli_num_rows($articles) <= 0) {
											echo 'No one topics finded';
											$articles_exist = false;
										}
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
													<small class="content1_body_small"> Category: <a href="./articles.php?categorie=<?php echo $art_cat['id']; ?>" class="content1_body_category"><?php echo $art_cat['title']; ?></a></small>
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

										if ($articles_exist) {
											if (isset($_GET['categorie'])) {
												if ($page == 1 and $total_count > 1) {
													echo '<div class="paginator right"><a href="./articles.php?page='.($page+1).'&categorie=' . $_GET['categorie'] .'">Next topic</a></div>';
												}
												else if ($total_count > 1) {
													echo '<div class="paginator">';
													if ($page > 1) {
														echo '<a href="./articles.php?page='.($page-1).'&categorie=' . $_GET['categorie'] .'">Previous topic</a>';
													}
													if ($page < $total_pages) {
														echo '<a href="./articles.php?page='.($page+1).'&categorie=' . $_GET['categorie'] .'">Next topic</a>';
													}
													echo '</div>';
												}
											}
											else {
												if ($page == 1 and $total_count > 1) {
													echo '<div class="paginator right"><a href="./articles.php?page='.($page+1).'">Next topic</a></div>';
												}
												else if ($total_count > 1) {
													echo '<div class="paginator">';
													if ($page > 1) {
														echo '<a href="./articles.php?page='.($page-1).'">Previous topic</a>';
													}
													if ($page < $total_pages) {
														echo '<a href="./articles.php?page='.($page+1).'">Next topic</a>';
													}
													echo '</div>';
												}
											}
										}
									?>
								</div>
							</section>
						</div>
						<?php include "./includes/aside.php"; ?>
					</div>
				</div>
			</main>
			<?php include "./includes/footer.php"; ?>
		</div>
	</body>
</html>