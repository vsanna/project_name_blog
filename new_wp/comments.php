<style media="screen">

.comments {
    padding-top: 0;
}

.mdl-list {
    padding: 0;
}

.comments .mdl-list__item-text-body {
    height: auto;
    padding: 4px 0 0 56px;
    line-height: 1.7rem !important;
    white-space: pre;

}

.comments .mdl-list__item--three-line .mdl-list__item-primary-content {
    line-height: inherit;
}

.comments .mdl-list {
    padding: 0 0 0 58px !important;
}
ul.mdl-list.comments {
    overflow: visible;
    /* width: 100%; */
}


span.mdl-list__item-secondary-content {
    position: absolute;
    right: 0;
}

ul.mdl-list.comments.parent {
  margin-right: 40px;
}


.mdl-list__item {
    padding-right: 0;
}
.input-name {
  max-width: 150px;
  margin-bottom: 16px;
}
.form-submit .submit{
  display: none;
}

</style>

<div class="article__section comment-area clearfix" data-postid="<?php echo get_the_ID() ?>">
  <span class="article__section--title">Comment here!</span>
  <span class="article__section--line"></span>
  <?php if(have_comments()): // コメントがあったら ?>
    <span class="article__section--text show-comments">
      <i class="material-icons">comment</i>
      <?php echo count(get_approved_comments(get_the_ID())); ?>
      <i class="material-icons arrow">keyboard_arrow_down</i>
    </span>
    <div class="comments_area">
      <ul class="mdl-list comments parent">
        <?php foreach(get_approved_comments(get_the_ID()) as $c): ?>
          <?php var_dump($c); ?>
          <?php echo show_comments($c, true); ?>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="comment-input">
      <?php get_template_part('shared/comment_form'); ?>
    </div>
  <?php else: ?>
    <span class="article__section--text">
      <i class="material-icons">comment</i>
      <?php echo count(get_approved_comments(get_the_ID())); ?>
    </span>
    <div class="comment-input">
      <?php get_template_part('shared/comment_form'); ?>
    </div>
  <?php endif; ?>
</div>
