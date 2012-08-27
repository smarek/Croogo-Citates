<?php

CroogoNav::add('citates', array(
    'title' => __('Citates'),
    'weight' => 35,
    'url' => array(
        'plugin' => 'citates',
        'controller' => 'citates',
        'action' => 'index'
    ),
    'access' => array('admin', 'registered'),
    'children' => array(
        'listcitates' => array(
            'title' => __('List'),
            'url' => array(
                'plugin' => 'citates',
                'controller' => 'citates',
                'action' => 'index'
            ),
            'weight' => 10
        ),
        'createcitate' => array(
            'title' => __('Create new'),
            'weight' => 15,
            'url' => array(
                'plugin' => 'citates',
                'controller' => 'citates',
                'action' => 'add'
            )
        )
    )
));