<div class="field">
    <div class="two columns alpha">
        <?php echo get_view()->formLabel('field-added', __('Field to Add')); ?>
    </div>
    <div class="inputs five columns omega">
        <p class="explanation">
            <?php echo __('Add a field to the Exhibit table.'); ?>
        </p>
        <?php echo get_view()->formInput('field-added', $fieldAdded); ?>
    </div>

    <div class="inputs five columns omega">
    	<?php $db = get_db(); ?>
    	<?php $table = $db->getTable('Exhibit'); ?>
    	<p>The options are set to <strong><?php echo get_option('field-added'); ?></strong></p>
    	<p>This field <strong>does 
    		<?php if($table->hasColumn('field-added')): ?>
    		not
    		<?php endif; ?>
    	</strong> exist in the current exhibit table</p>
    </div>
</div>

