<?php
    $controller = $page->config["directory"];
?>

<nav class="pagination-responsive-sm">
    <ul class="pagination">
        <?php if ($first_page !== FALSE) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url($first_page, $controller)) ?>" class="page-link">
                    <?php echo '<<'; ?>
                </a>
            </li>
        <?php } ?>

        <?php if ($previous_page !== FALSE) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url($previous_page, $controller)) ?>" class="page-link">
                    <?php echo '<'; ?>
                </a>
            </li>
        <?php } ?>

        <?php
            $offset = $total_pages - ($total_pages - $current_page);
            $left = $offset > $max_left_pages ? $max_left_pages : $offset;
        ?>

        <?php if ($offset > 1) for ($i = $offset - $left + 1; $i < $offset; $i++) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url(abs($i), $controller)) ?>" class="page-link">
                    <?php echo abs($i) ?>
                </a>
            </li>
        <?php } ?>

        <?php
            $right = $current_page + $max_right_pages;
        ?>

        <?php for ($i = $current_page; $i <= $right && $i <= $total_pages; $i++) { ?>
            <?php if ($i == $current_page) { ?>
                <li class="page-item active">
                    <a href="#" class="page-link">
                        <?php echo $i ?>
                    </a>
                </li>
            <?php } else { ?>
                <li class="page-item">
                    <a href="<?php echo HTML::chars($page->url($i, $controller)) ?>" class="page-link">
                        <?php echo $i ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>

        <?php if ($next_page !== FALSE) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url($next_page, $controller)) ?>" class="page-link">
                    <?php echo '>'; ?>
                </a>
            </li>
        <?php } ?>

        <?php if ($last_page !== FALSE) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url($last_page, $controller)) ?>" class="page-link">
                    <?php echo '>>'; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>
