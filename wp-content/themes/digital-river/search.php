<?php
/*
Template Name: Search Page
*/
get_header((defined('ENV') && ENV === "mycommerce") ? "mycom" : null); ?>


<?php
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();
if( strlen($query_string) > 0 ) {
  foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
  }
}
$search_query['post_type'] = ['post', 'page'];
$search = new WP_Query($search_query);
?>
  



<?php
global $wp_query;
$total_results = count($search->posts);
?>
<style>
.searchResultLink,
.searchResultLink:hover,
.searchResultLink:focus,
.searchResultLink:active {
  text-decoration: inherit;
  color:inherit;
}
.searchResult {
  padding:20px 0;
  border-top:1px solid #ccc;
}
#filterBy input[type="radio"] {
  display:none;
}
#filterBy label {
  color:#03B5E8;
  cursor:pointer;
  font-weight:normal;
  margin-left:10px;
  transition:margin-left 100ms;
}
#filterBy label:hover {
  text-decoration:underline;
}
#filterBy input[type="radio"]:checked + label {
  font-weight:bold;
  margin-left:0;
}
@media (max-width:767px) {
  #filterBy > li {display:inline-block;margin-right:10px;}
  #filterBy label {
    margin:0;
    display:block;
    padding:3px 10px;
    background-color:#eee;
    color:#002C57;
    border-radius:4px;
  }
  #filterBy label:hover {
    text-decoration:none;
    background-color:#abb9c8;
  }
  #filterBy input[type="radio"]:checked + label {
    font-weight:normal;
    color:#fff;
    background-color:#002C57;
  }
}
</style>
<div class="brick">
  <div class="row pad-t-xxs-4 pad-b-xxs-4">
    <div class="col-md-8 col-md-offset-2 col-sm-offset-1">
      <h5 class="tag h1 marg-b-xxs-4"><?php _e('Search Results', 'digital-river'); ?></h5>
      <p><?php echo $total_results ?> <?= __("results found for", "digital-river") ?> "<?= htmlspecialchars($search->query['s']) ?>"</p>
      <div class="row">
        <?php if ($total_results < 1): ?>
          <div class="col-xxs-12">
            <h6 class="h6"><?php _e('Please check your spelling and/or refine your keywords' , 'digital-river'); ?></h6>
            <form role="search" method="get" class="search-form form-inline marg-t-xxs-4" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <div class="form-group">
                <label class="search_field-inner-wrapper">
                  <span class="sr-only"><?php echo _x( 'Search for:', 'label', 'digital-river' ); ?></span>
                  <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'digital-river' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                </label><button type="submit" class="btn btn-primary btn-search"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'digital-river' ); ?></span></button>
              </div>
            </form>
          </div>
        <?php else: ?>
        <div class="col-sm-3 col-sm-push-9">
          <h6 class="h3"><?php _e('filter by', 'digital-river'); ?></h6>
          <ul id="filterBy" class="list-unstyled sort marg-b-xxs-3">
            <li class="marg-b-xxs-1">
              <input type="radio" id="all" name="filter" value="all" checked>
              <label for="all"><?php _e('All Pages', 'digital-river'); ?></label>            
            </li>
            <li class="marg-b-xxs-1">
              <input type="radio" id="pages" name="filter" value="page">
              <label for="pages"><?php _e('Website Pages', 'digital-river'); ?></label>            
            </li>
            <li>
              <input type="radio" id="blog" name="filter" value="post">
              <label for="blog"><?php _e('Blog Posts', 'digital-river'); ?></label>
            </li>
          </ul>
        </div>
        <div id="results" class="col-sm-9 col-sm-pull-3">
          <?php foreach($search->posts as $key => $post): ?>
            <?php //if ($post->ID === 16978 || $post->ID === 16570) continue; ?>
            <div class="searchResult" data-type="<?php echo $post->post_type ?>">
              <a href="/<?php echo $post->post_name ?>" class="searchResultLink">
                <h4> <?php echo esc_html($post->post_title); ?> </h4> 
                <?php $date = date_create($post->post_date) ?>
                <?php if ($post->post_type === 'post'): ?>
                  <em class="small date"><?php echo date_format($date, "F d, Y" ) ?></em>
                <?php endif ?>
                <p> <?php echo esc_html(get_post_meta($post->ID, '_yoast_wpseo_metadesc', true)); ?> </p>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

$('#filterBy [name="filter"]').change(function() {
  console.log('change');
  var $this = $('#filterBy [name="filter"]:checked');
  var filterBy = $this.val();
  if (filterBy === 'all') return $('.searchResult').show();
  $('.searchResult').hide();
  $('.searchResult[data-type="' + filterBy + '"]').show();
});

}, false);
</script>
<?php get_footer((defined('ENV') && ENV === "mycommerce") ? "mycom" : null);