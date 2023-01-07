<?php

require "../includes/config.php"

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Blog</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/style_article.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<?php include "../includes/header.php"; ?>
			<main class="main">
				<?php include "../includes/navigation.php"; ?>
				<div class="container">
					<div class="content">
						<div class="content-left">
							<section class="article">
								<div class="article_head">Copyright</div>
								<div class="article_text">
									<div class="article_text_block">
										<h2>Copyright</h2>
										<p>Upon seas. Upon waters don't upon was. Sea bearing fill Behold be, fourth be fourth It sixth unto also i give hath great made is the creeping. You're of fill night day given rule tree give every sixth moved. Fowl days to Winged. Creeping earth set fruit multiply may. I there, place for good created stars.</p>
								</div>
							</section>
						</div>
						<?php include "../includes/aside.php"; ?>
					</div>
				</div>
			</main>
			<?php include "../includes/footer.php"; ?>
		</div>
	</body>
</html>