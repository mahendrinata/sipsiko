<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Model use to add all behavior model
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class AppModel extends OrmModel {

  protected $return_type = 'array';
  public $before_create = array('set_slug', 'created_at', 'updated_at');
  public $before_update = array('updated_at');
  public $after_get = array('set_uid');

  function set_slug($row) {
    if (isset($row['slug']) && empty($row['slug'])) {
      if (isset($this->fields['slug'])) {
        $slug = url_title((isset($row['name'])) ? $row['name'] : $row['title'], 'dash', TRUE);
        $count = $this->count_by('slug', $slug);
        if ($count > 0) {
          $row['slug'] = $slug . '-' . ($count + 1);
        } else {
          $row['slug'] = $slug;
        }
      }
    }
    return $row;
  }

  function remove_or_hide($id = NULL) {
    $data = $this->get_by('id', $id);
    if (isset($data['is_default']) && $data['is_default']) {
      $remove = $this->update($id, array('is_hide' => TRUE), TRUE);
    } else {
      $remove = $this->delete($id);
    }
    return $remove;
  }

  function set_status($id = NULL) {
    $data = $this->get_by('id', $id);
    if ($data['is_active']) {
      $edit = $this->update($id, array('is_active' => FALSE), TRUE);
    } else {
      $edit = $this->update($id, array('is_active' => TRUE), TRUE);
    }
    return $edit;
  }

}

?>