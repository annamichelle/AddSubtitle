<div class="field">
    <div class="two columns alpha">
        <?php echo get_view()->formLabel('field-added', __('Field to Add')); ?>
    </div>
    <div class="inputs five columns omega">
        <?php echo get_view()->formInput('field-added', $fieldAdded); ?>
    </div>

    <div class="five columns alpha">
    	<p class="explanation">The options are set to <strong><?php echo get_option('field-added'); ?></strong></p>
    	<p>The current fields available are:</p>
    	<?php 
    		$exhibitTable = get_db()->getTable('Exhibit');
    		$tableColumns = $exhibitTable->getColumns();

    		echo '<h3>' . $exhibitTable->getTableName() . '</h3>';

    		foreach ($tableColumns as $tableColumn) {
    			echo '<p>' . $tableColumn . "</p>";
    		}
    	?>
    </div>
</div>

