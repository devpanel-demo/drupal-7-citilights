<?php
/**
 * @file panels-pane.tpl.php
 * Main panel pane template
 *
 * Variables available:
 * - $pane->type: the content type inside this pane
 * - $pane->subtype: The subtype, if applicable. If a view it will be the
 *   view name; if a node it will be the nid, etc.
 * - $title: The title of the content
 * - $content: The actual content
 * - $links: Any links associated with the content
 * - $more: An optional 'more' link (destination only)
 * - $admin_links: Administrative links associated with the content
 * - $feeds: Any feed icons or associated with the content
 * - $display: The complete panels display object containing all kinds of
 *   data including the contexts and all of the other panes being displayed.
 */
?>
<?php if ($pane_prefix): ?>
  <?php print $pane_prefix; ?>
<?php endif; ?>
<div class="<?php print $classes; ?>" <?php print $id; ?> <?php print $attributes; ?>>
  <?php if ($admin_links): ?>
    <?php print $admin_links; ?>
  <?php endif; ?>
  
    <div class="row contact-form">
      <?php if($contact_info_display) : ?>
        <div class="col-sm-6 col-md-4">
          <div class="contact-info">
            <div class="text-block">
              <h4><?php print t('Contact Info'); ?></h4>
            </div>
            <div class="text-block">
              <ul>
                <?php
				  $array = theme_get_setting('ft_detail','citilights') ;
				  if(!empty($array)) :
					  foreach($array as $key => $value) :
						  print '<li><i class="fa '.$value['icon']['icon'].'"></i>&nbsp;'.$value['des'].'</li>'; 
					  endforeach;
				  endif;
			    ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="col-sm-12 col-md-<?php ($contact_info_display) ? print '8' : print '12'; ?>">
        <div class="contact-desc">
          <div class="text-block">
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
                <h4><?php print $title; ?></h4>
                <?php if($subtitle) : ?>
                  <p><?php print $subtitle; ?></p>
                <?php endif; ?>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
          </div>
          <hr class="noo-gap">
          <?php print render($content); ?>
        </div>
      </div>
    </div>

  <?php if ($links): ?>
    <div class="links">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <div class="more-link">
      <?php print $more; ?>
    </div>
  <?php endif; ?>
</div>
<?php if ($pane_suffix): ?>
  <?php print $pane_suffix; ?>
<?php endif; ?>
