<?php
use yii\easyii\modules\article\api\Article;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $article->seo('title', $article->model->title);
?>

<div class="container">
<div class="col clearfix">
	<div class="col--m8 col--l9 main-col">

		<article class="post-detail news-page-list">
			<div class="post-head">
				<h1 class="post-title"><?= $article->seo('h1', $article->title) ?></h1>
				<div class="post-meta">
					<span class="post-category"></span>
					<time class="post-time">22 Agustus 2016</time>
				</div>
			</div>
			<div class="post-content">
				<div class="full-100 merchandise-list__item hilite__item noml">
					<figure class="item-img">
						<a href="#">
							<?= Html::img($article->thumb(160, 120), ['width'=>'100%']) ?>
						</a>
					</figure>

					<div style="padding: 10px 20px 0 20px;" class="item-text">
						<h5 class="post-title">
							<a class="dis-href-text" href="#">
								<?= $article->seo('h1', $article->title) ?>
							</a>
						</h5>
					</div>
				</div>
			<p class="foze"><?= $article->text ?></p>

<?php if(count($article->photos)) : ?>
    <div>
        <h4>Photos</h4>
        <?php foreach($article->photos as $photo) : ?>
            <?= $photo->box(100, 100) ?>
        <?php endforeach;?>
        <?php Article::plugin() ?>
    </div>
    <br/>
<?php endif; ?>
<p>
    <?php foreach($article->tags as $tag) : ?>
        <a href="<?= Url::to(['/articles/cat', 'slug' => $article->cat->slug, 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
    <?php endforeach; ?>
</p>

<small class="text-muted">Views: <?= $article->views?></small>
  
			</div>
		</article>

	</div>
	<div class="col--m4 col--l3 side-col">
	</div>
</div>
</div>
