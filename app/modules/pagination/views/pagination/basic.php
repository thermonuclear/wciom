<nav class="pagination-responsive">
    <ul class="pagination">
        <?php if ($first_page !== FALSE) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url($first_page)) ?>" class="page-link">
                    <?php echo '<<'; ?>
                </a>
            </li>
        <?php } ?>

        <?php if ($previous_page !== FALSE) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url($previous_page)) ?>" class="page-link">
                    <?php echo '<'; ?>
                </a>
            </li>
        <?php } ?>

	      <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
		        <?php if ($i == $current_page) { ?>
                <li class="page-item active">
                    <a href="#" class="page-link">
                        <?php echo $i; ?>
                    </a>
                </li>
		        <?php } else { ?>
                <li class="page-item">
                    <a href="<?php echo HTML::chars($page->url($i)) ?>" class="page-link">
                        <?php echo $i; ?>
                    </a>
                </li>
		        <?php } ?>
	      <?php } ?>

        <?php if ($next_page !== FALSE) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url($next_page)) ?>" class="page-link">
                    <?php echo '>'; ?>
                </a>
            </li>
        <?php } ?>

        <?php if ($last_page !== FALSE) { ?>
            <li class="page-item">
                <a href="<?php echo HTML::chars($page->url($last_page)) ?>" class="page-link">
                    <?php echo '>>'; ?>
                </a>
            </li>
        <?php } ?>
    </nav>
</ul>