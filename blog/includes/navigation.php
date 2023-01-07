<?php

$categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`");

$categories = array();

while ($cat = mysqli_fetch_assoc($categories_q)) {
	$categories[] = $cat;
}

$art_q = mysqli_query($connection, "SELECT * FROM `articles`");
$art_t = array();
while ($art_T = mysqli_fetch_assoc($art_q)) {
	$art_t[] = $art_T;
}

?>

<nav class="navigation">
	<div class="container">
		<ul class="nav_list">
			<?php 
			 foreach($categories as $cat) {
			 	?>
			 	<li><a href="./articles.php?categorie=<?php echo $cat['id']; ?>" class="nav_link"> <?php echo $cat['title']; ?> </a></li>
			 	<?php
			 }
			?>
		</ul>
	</div>
</nav>