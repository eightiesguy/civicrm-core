<?php

return [
  'name' => 'RelationshipType',
  'table' => 'civicrm_relationship_type',
  'class' => 'CRM_Contact_DAO_RelationshipType',
  'getInfo' => fn() => [
    'title' => ts('Relationship Type'),
    'title_plural' => ts('Relationship Types'),
    'description' => ts('Relationship types s/b structured with contact_a as the \'subject/child\' contact and contact_b as the \'object/parent\' contact (e.g. Individual A is Employee of Org B).'),
    'log' => TRUE,
    'add' => '1.1',
    'label_field' => 'label_a_b',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/reltype/edit?action=add&reset=1',
    'view' => 'civicrm/admin/reltype/edit?action=view&id=[id]&reset=1',
    'update' => 'civicrm/admin/reltype/edit?action=update&id=[id]&reset=1',
    'delete' => 'civicrm/admin/reltype/edit?action=delete&id=[id]&reset=1',
    'browse' => 'civicrm/admin/reltype',
  ],
  'getIndices' => fn() => [
    'UI_name_a_b' => [
      'fields' => [
        'name_a_b' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '2.1',
    ],
    'UI_name_b_a' => [
      'fields' => [
        'name_b_a' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '2.1',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Relationship Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Primary key'),
      'add' => '1.1',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'name_a_b' => [
      'title' => ts('Relationship Type Name A to B'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'description' => ts('name for relationship of contact_a to contact_b.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'label_a_b' => [
      'title' => ts('Relationship Type Label A to B'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'localizable' => TRUE,
      'description' => ts('label for relationship of contact_a to contact_b.'),
      'add' => '3.0',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'name_b_a' => [
      'title' => ts('Relationship Type Name B to A'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'description' => ts('Optional name for relationship of contact_b to contact_a.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'label_b_a' => [
      'title' => ts('Relationship Type Label B to A'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'localizable' => TRUE,
      'description' => ts('Optional label for relationship of contact_b to contact_a.'),
      'add' => '3.0',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'description' => [
      'title' => ts('Relationship Description'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'localizable' => TRUE,
      'description' => ts('Optional verbose description of the relationship type.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'contact_type_a' => [
      'title' => ts('Contact Type for Contact A'),
      'sql_type' => 'varchar(12)',
      'input_type' => 'Select',
      'description' => ts('If defined, contact_a in a relationship of this type must be a specific contact_type.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 12,
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_contact_type',
        'key_column' => 'name',
        'label_column' => 'label',
        'condition' => 'parent_id IS NULL',
      ],
    ],
    'contact_type_b' => [
      'title' => ts('Contact Type for Contact B'),
      'sql_type' => 'varchar(12)',
      'input_type' => 'Select',
      'description' => ts('If defined, contact_b in a relationship of this type must be a specific contact_type.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 12,
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_contact_type',
        'key_column' => 'name',
        'label_column' => 'label',
        'condition' => 'parent_id IS NULL',
      ],
    ],
    'contact_sub_type_a' => [
      'title' => ts('Contact Subtype A'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Select',
      'description' => ts('If defined, contact_sub_type_a in a relationship of this type must be a specific contact_sub_type.'),
      'add' => '3.1',
      'input_attrs' => [
        'maxlength' => 64,
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_contact_type',
        'key_column' => 'name',
        'label_column' => 'label',
        'condition' => 'parent_id IS NOT NULL',
      ],
    ],
    'contact_sub_type_b' => [
      'title' => ts('Contact Subtype B'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Select',
      'description' => ts('If defined, contact_sub_type_b in a relationship of this type must be a specific contact_sub_type.'),
      'add' => '3.1',
      'input_attrs' => [
        'maxlength' => 64,
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_contact_type',
        'key_column' => 'name',
        'label_column' => 'label',
        'condition' => 'parent_id IS NOT NULL',
      ],
    ],
    'is_reserved' => [
      'title' => ts('Relationship Type is Reserved'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this relationship type a predefined system type (can not be changed or de-activated)?'),
      'add' => '1.1',
      'default' => FALSE,
    ],
    'is_active' => [
      'title' => ts('Relationship Type is Active'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this relationship type currently active (i.e. can be used when creating or editing relationships)?'),
      'add' => '1.1',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
  ],
];
