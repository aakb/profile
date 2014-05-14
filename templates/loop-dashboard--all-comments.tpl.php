<?php

/**
 * @file loop-dashboard--all-comments.tpl.php
 * Displays all comments page for dashboard.
 */
?>
<div class="">
  <div class="dashboard-list--filter">
    <form class="dashboard-list--form jquery-once-1-processed" action="/editor/dashboard/content" method="get" id="views-exposed-form-loop-editor-content-panel-pane-1" accept-charset="UTF-8">
      <div class="views-exposed-widgets">
        <input placeholder="<?php print t('Type parts of title or content to filter the list');?>" class="dashboard-list--filter-field form-text" type="text" id="edit-combine" name="combine" value="" size="30" maxlength="128">
      </div>
      <div class="">
        <input class="dashboard-list--submit form-submit" type="submit" id="edit-submit-loop-editor-content" name="" value="Udfør">
      </div>
    </form>
    <div class="dashboard--sorting">
      <label class="dashboard--filter-label"><?php print t('Sort by');?></label>
      <div class="dashboard--sort-links">
        <a href="#" class="dashboard--sort-link is-active js-sort-link"><?php print t('Newest');?></a>
        <a href="#" class="dashboard--sort-link js-sort-link"><?php print t('Oldest');?></a>
        <a href="#" class="dashboard--sort-link js-sort-link js-dashboard-alphabetical"><?php print t('Alphabetical');?></a>
      </div>
    </div>
  </div>

  <div class="dashboard-list js-dashboard-comments">
    <div class="dashboard--spinner">
    </div>
  </div>
</div>


<?php
// This is used to enrich the above results.
?>
<script id="js-list-item-template-comments" type="text/x-handlebars-template">
  <div class="dashboard-image-list--item">
    <div class="meta-data--author-image">
      <a href="/user/{{uid}}"><img src="{{uri}}"></a>
    </div>
    <a href="/comment/{{cid}}#comment-{{cid}}" class="dashboard-list--icon"> </a>
    <p class="dashboard-list--text">
      <a href="/comment/{{cid}}#comment-{{cid}}">{{subject}}</a>
      <span class="dashboard-list--meta-data">
        <?php print t('Content, created');?> {{date}}
      </span>
    </p>
    <p class="dashboard-list--question-title"><?php print t('Question');?>: {{content-title}}</p>
  </div>
</script>