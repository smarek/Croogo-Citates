<div class="route form">
    <h2><?php echo $title_for_layout; ?>&nbsp;</h2>

    <?php echo $this->Form->create('Citate', array('url' => array('action' => 'add', 'controller' => 'citates'))); ?>
    <fieldset>
        <?php
        echo $this->Form->input('body', array('label' => __('Body', true), 'class' => 'content'));
        echo $this->Form->input('author', array('label' => __('Author', true), 'class' => 'title'));
        ?>
    </fieldset>

    <div class="buttons">
        <?php
        echo $this->Form->end(__('Create Citate', true));
        echo $this->Html->link(
                __('Cancel', true), array(
            'action' => 'index',
                ), array(
            'class' => 'cancel',
                )
        );
        ?>	
    </div>
</div>