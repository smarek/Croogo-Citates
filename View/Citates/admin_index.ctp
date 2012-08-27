
<div class="citates index">
    <h2><?php echo $title_for_layout; ?></h2>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Add Citate', true), array('action' => 'add')); ?></li>

        </ul>
    </div>

    <table cellpadding="0" cellspacing="0">
        <?php
        $tableHeaders = $this->Html->tableHeaders(
                array(
                    $this->Paginator->sort('id'),
                    __('Body', true),
                    $this->Paginator->sort('author'),
                    __('Actions', true),
                )
        );
        echo $tableHeaders;

        $rows = array();
        foreach ($citates as $citate) {

            $actions = ' ' . $this->Form->postLink(
                            __('Delete', true), array(
                        'controller' => 'citates',
                        'action' => 'delete',
                        $citate['Citate']['id'],
                        'token' => $this->params['_Token']['key'],
                            ), null, __('Are you sure you want to delete this citate?', true)
            );

            $actions .= ' ' . $this->Layout->adminRowActions($citate['Citate']['id']);

            $actions .= ' ' . $this->Html->link(
                            __('Edit', true), array(
                        'controller' => 'citates',
                        'action' => 'edit',
                        $citate['Citate']['id']
                            )
            );


            $newrow = array(
                $citate['Citate']['id'],
            );


            $newrow[] = substr(trim(strip_tags($citate['Citate']['body'])), 0, 150);
            $newrow[] = $citate['Citate']['author'];
            $newrow[] = $actions;

            $rows[] = $newrow;
        }

        echo $this->Html->tableCells($rows);
        echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php
        echo $this->Paginator->numbers();
        ?></div>

<div class="counter">
    <?php
    echo $this->Paginator->counter(
            array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}', true)
            )
    );
    ?>
</div>