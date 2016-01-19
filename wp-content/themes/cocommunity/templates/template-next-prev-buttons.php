<?php
echo "T name: Next / Prev";
the_post();

$menu_name = 'document';
$menu_obj = wp_get_nav_menu_object($menu_name);
$menu_items = wp_get_nav_menu_items($menu_obj->term_id);

$menu_list = '<ul id="menu-' . $menu_name . '">';

foreach ( (array) $menu_items as $key => $menu_item ) {
    $title = $menu_item->title;
    $url = $menu_item->url;
    $id = $menu_item->object_id;
    $menu_list .= '<li><a href="' . $url . '">' . $title .'</a></li>';
}
$menu_list .= '</ul>';

echo($menu_list);

$currentPageId = get_the_ID();
$allIds = array();
foreach ($menu_items as $menu_item) {
    $allIds[] += $menu_item->object_id;
}

$current = array_search($currentPageId, $allIds);
$prevID = $allIds[$current-1];
$nextID = $allIds[$current+1];

?>

<div class="navigation">
    <?php if (!empty($prevID)) { ?>
        <div class="alignleft">
            <a href="<?php echo get_permalink($prevID); ?>"
               title="<?php echo get_the_title($prevID); ?>">Previous</a>
        </div>
    <?php }
    if (!empty($nextID)) { ?>
        <div class="alignright">
            <a href="<?php echo get_permalink($nextID); ?>"
               title="<?php echo get_the_title($nextID); ?>">Next</a>
        </div>
    <?php } ?>
</div><!-- .navigation -->