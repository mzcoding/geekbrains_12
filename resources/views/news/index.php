<?php foreach($newsList as $news): ?>
  <div>
	  <h2>
		  <a href="<?=route('news.show', ['id' => intval($news['id'])])?>">
			  <?=$news['title']?>
		  </a>
	  </h2>
	  <p>Автор: <?=$news['author']?></p>
	  <p><?=$news['description']?></p>
  </div>
<?php endforeach; ?>
