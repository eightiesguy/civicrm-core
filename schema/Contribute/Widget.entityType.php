<?php

return [
  'name' => 'Widget',
  'table' => 'civicrm_contribution_widget',
  'class' => 'CRM_Contribute_DAO_Widget',
  'getInfo' => fn() => [
    'title' => ts('Widget'),
    'title_plural' => ts('Widgets'),
    'description' => ts('A Widget object to store meta information about a single customized contribution widget'),
    'log' => TRUE,
    'add' => '2.0',
    'label_field' => 'title',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Widget ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Contribution ID'),
      'add' => '2.0',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'contribution_page_id' => [
      'title' => ts('Contribution Page ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('The Contribution Page which triggered this contribution'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('Contribution Page'),
      ],
      'entity_reference' => [
        'entity' => 'ContributionPage',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'is_active' => [
      'title' => ts('Enabled?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this property active?'),
      'add' => '2.0',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'title' => [
      'title' => ts('Widget Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Widget title.'),
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'url_logo' => [
      'title' => ts('Widget Image Url'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('URL to Widget logo'),
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'button_title' => [
      'title' => ts('Button Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Button title.'),
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'about' => [
      'title' => ts('Description'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => ts('About description.'),
      'add' => '2.0',
    ],
    'url_homepage' => [
      'title' => ts('Homepage Url'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('URL to Homepage.'),
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'color_title' => [
      'title' => ts('Title Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
    'color_button' => [
      'title' => ts('Button Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
    'color_bar' => [
      'title' => ts('Bar Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
    'color_main_text' => [
      'title' => ts('Main Text Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
    'color_main' => [
      'title' => ts('Main Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
    'color_main_bg' => [
      'title' => ts('Background Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
    'color_bg' => [
      'title' => ts('Other Background Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
    'color_about_link' => [
      'title' => ts('About Link Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
    'color_homepage_link' => [
      'title' => ts('Homepage Link Color'),
      'sql_type' => 'varchar(10)',
      'input_type' => 'Text',
      'add' => '2.0',
      'input_attrs' => [
        'maxlength' => 10,
      ],
    ],
  ],
];
