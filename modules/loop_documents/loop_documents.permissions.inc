<?php

/**
 * @file
 * Permission settings for the loop_documents module.
 */

/**
 * Implements hook_permissions_secure_permissions_roles().
 */
function loop_documents_secure_permissions_roles() {
  return array(
    'document author',
    'document collection editor',
  );
}

/**
 * Implements hook_permissions().
 *
 * Add permission to restrict access to certain admin paths.
 */
function loop_documents_permission() {
  $permissions = array(
    'administer loop_documents settings' => array(
      'title' => t('Administer Loop documents settings'),
      'description' => t('Administer Loop documents settings'),
    ),
    'view document admin menu' => array(
      'title' => t('View document admin menu'),
      'description' => t('Menu displaying links to specific backend pages related to document providers'),
    ),
  );

  return $permissions;
}

/**
 * Implements hook_secure_permissions().
 */
function loop_documents_secure_permissions($role) {
  $permissions = array(
    'authenticated user' => array(
      'entity print access bundle loop_documents_collection',
      'view files',
    ),
    'document author' => array(
      'access content overview',
      'view the administration theme',
      'access media browser',
      'access ckeditor link',
      'create files',
      'create loop_documents_document content',
      'edit own loop_documents_document content',
      'download any image files',
      'use media wysiwyg',
      'use text format loop_documents',
      'view admin path',
    ),
  );

  $permissions['document collection editor'] = array_merge(
    $permissions['document author'],
    array(
      'view document admin menu',
      'publish any loop_documents_collection content',
      'unpublish any loop_documents_collection content',
      'publish any loop_documents_document content',
      'unpublish any loop_documents_document content',
      'administer menu',
      'create loop_documents_collection content',
      'edit any loop_documents_collection content',
      'edit any loop_documents_document content',
      'view any unpublished loop_documents_collection content',
      'view any unpublished loop_documents_document content',
      'delete any image files',
      'delete any loop_documents_collection content',
      'delete any loop_documents_document content',
      'edit any image files',
      'menu view unpublished',
      'set revision date for content',
    ));

  $permissions['administrator'] = array_merge(
    $permissions['document collection editor'],
    array(
      'administer loop_documents settings',
    )
  );

  return isset($permissions[$role]) ? $permissions[$role] : NULL;
}
