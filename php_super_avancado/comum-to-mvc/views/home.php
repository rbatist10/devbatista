<h1>Noticias</h1>
<br>
<?php foreach($posts as $post): ?>

	<h3><?php echo $post['titulo']; ?></h3>
	<?php echo $post['corpo']; ?>
	<hr>

<?php endforeach; ?>