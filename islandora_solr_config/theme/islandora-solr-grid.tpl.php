<?php
/**
 * @file
 *   Islandora solr primary results template file for
 *
 * Variables available:
 * - $variables: all array elements of $variables can be used as a variable.
 * - $user: The user object.
 * - $solr_default_img: default solr image. Used when no thumbnail is available.
 *
 * - $results: Primary profile results array
 *
 * @see template_preprocess_islandora_solr_grid()
 */

?>

<?php if (empty($results)): ?>
  <p class="no-results"><?php print t('Sorry, but your search returned no results.'); ?></p>
<?php else: ?>
  <div class="islandora-solr-search-results">
    <div class="islandora-solr-grid clearfix">
    <?php foreach($results as $result): ?>
      <dl class="solr-grid-field">
        <dt class="solr-grid-thumb">
          <?php
            $image = '<img src="' . url($result['thumbnail_url'], array('query' => $result['thumbnail_url_params'])) . '" />';
            print l($image, $result['object_url'], array('html' => TRUE, 'query' => $result['object_url_params']));
          ?>
        </dt>
        <dd class="solr-grid-caption">
          <?php
            $label_field = variable_get('islandora_solr_object_label_field', 'fgs_label_s');
            $object_label = isset($result['solr_doc'][$label_field]['value']) ? $result['solr_doc'][$label_field]['value'] : '';
            print l($object_label, $result['object_url'], array('query' => $result['object_url_params']));
          ?>
        </dd>
      </dl>
    <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
