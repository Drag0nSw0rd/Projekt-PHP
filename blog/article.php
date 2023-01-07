<?php
session_start();

require "./includes/config.php";

$done = $_GET['done'];

if (isset($_POST['do_post'])) {
	$errors = array();

	if ($_POST['comment'] == '') {
		$errors[] = 'Enter comment';
	}

	if (empty($errors)) {

	   if (isset($_SESSION['username'])){
		// Add comment
		mysqli_query($connection, "INSERT INTO `comments` (`text`, `pubdate`, `articles_id`) VALUES('".$_POST['comment']."', NOW(), '".$_GET['id']."')");
		header('Location: article.php?id=' . $_GET['id'] . '&done=1#');
	   }
	   if ($_POST['username'] == ''){
		$done = 0;
		$errors[] = 'Log in to left the comment';
	}

	}
	else {
		// Display errors
		$done = 0;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Blog</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/style_article.css">
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
				<?php
					$article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);

					if (mysqli_num_rows($article) <= 0) {
						?>
						<section class="article">
							<div class="article_head">
								<h2>Topic don't finded!</h2>
							</div>
							<div class="article_text">
								<div class="article_text_block last">
									<p>Requested topic doesn't exist</p>
								</div>
							</div>
						</section>
						<?php	
					}
					else {
						$art = mysqli_fetch_assoc($article);
						mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);
						?>
						<section class="article">
							<div class="article_head">
								<h2><?php echo $art['title']; ?></h2>
								<p><?php echo $art['views'] . ' views'; ?></p>
							</div>
							<div class="article_img">
								<img src="./static/<?php echo $art['image']; ?>" alt="">
							</div>
							<div class="article_text">
								<div class="article_text_block last">
									<p><?php echo $art['text']; ?></p>
								</div>
							</div>
						</section>
						<section class="comment_text_main">
							<div class="comment_main_body">
								<div class="comment_main_text_head">
									<h2>Comments under the topic</h2>
									<a href="#comment-add-form" class="add_your">Add a comment</a>
								</div>
							</div>
							<?php
								$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` = " . (int) $art['id'] . " ORDER BY `id` DESC");
								if (mysqli_num_rows($comments) <= 0) {
									?>
									<div class="comment_main_text_body">
										<div class="comment_main">
											<p>No one comment is posted fot this topic</p>
										</div>
									</div>
									<?php
								}
								while ($comment = mysqli_fetch_assoc($comments)) {
									?>
									<div class="comment_main_text_body">
										<img src="https://www.gravatar.com/avatar/<?php echo md5($comment['email']) ?>" alt="">
										<div class="comment_main">
											<div class="comment_main_name">
												<a href="#"><?php echo $comment['author']; ?></a>
											</div>
											<h4 class="time"><?php echo $comment['pubdate']; ?></h4>
											<p><?php echo $comment['text']; ?></p>
										</div>
									</div>
									<?php
								}
							?>
						</section>
						<div class="main_form" id="comment-add-form">
							<h2 class="add_comment">Add a comment</h2>
							<form class="form" method="POST" action="./article.php?id=<?php echo $art['id'] ?>&done=-1#comment-add-form">
								<?php
									if ($done == 0) {
										echo '<span style="color: red; font-weight: bold; font-size: 18px; display: block; margin-bottom:20px;">' . $errors['0'] .'</span>';
									}
									else if ($done == 1) {
										echo '<span style="color: green; font-weight: bold; font-size: 18px; display: block; margin-bottom:20px;"> Comment aded succesfully </span>';
									}
								?>
								<div class="form_textarea">
									<textarea name="comment" placeholder="Comment ..."><?php echo $_POST['comment']; ?></textarea>
								</div>
								<div class="form_button_main">
									<button type="submit" name="do_post" class="form_button">Add a comment</button>
								</div>
							</form>
						</div>
						<?php
							}
						?>
					</div>
						<?php include "./includes/aside.php"; ?>
					</div>
				</div>
			</main>
			<?php include "./includes/footer.php"; ?>
		</div>
	</body>
</html>