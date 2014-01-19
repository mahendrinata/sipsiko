<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Model use to add all behavior model
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class OrmModel extends BehaviorModel {

  public static $active_session;

  function __construct() {
    parent::__construct();
    $this->load->library('session');
    self::$active_session = $this->session->all_userdata();
  }

  public function get_fields($models = array(), $string = TRUE) {
    $string_field = array();
    if (empty($models)) {
      foreach ($this->fields as $field) {
        $string_field[] = $this->_table . '.' . $field['name'] . ' AS ' . $this->_table . '__' . $field['name'];
      }
    } else {
      foreach ($models as $model) {
        $this_model = singular($model) . '_model';
        $this->load->model($this_model);
        $fields_model = $this->{$this_model}->fields;
        foreach ($fields_model as $f) {
          $string_field[] = $this->{$this_model}->_table . '.' . $f['name'] . ' AS ' . $this->{$this_model}->_table . '__' . $f['name'];
        }
      }
    }
    if ($string) {
      return implode(',', $string_field);
    } else {
      return $string_field;
    }
  }

  public function set_fields($tables = array(), $string = TRUE) {
    $string_field = array();
    foreach ($tables as $table_name => $fields) {
      foreach ($fields as $field) {
        $string_field[] = plural($table_name) . '.' . $field . ' AS ' . plural($table_name) . '__' . $field;
      }
    }
    if ($string) {
      return implode(',', $string_field);
    } else {
      return $string_field;
    }
  }

  public function set_condition_value($field = NULL, $value = NULL) {
    $operations = explode(' ', $field);
    if (count($operations) == 1) {
      return $field . ' = "' . $value . '"';
    } else {
      return $field . ' "' . $value . '"';
    }
  }

  public function set_conditions($tables = array(), $string = TRUE) {
    $string_condition = array();
    foreach ($tables as $table_name => $fields) {
      foreach ($fields as $field => $value) {
        $field_name = plural($table_name) . '.' . $field;
        if (!is_array($value)) {
          $string_condition[] = $this->set_condition_value($field_name, $value);
        } elseif ($field == 'OR' && is_array($value)) {
          $ors = array();
          foreach ($value as $field_or => $or) {
            $ors[] = $this->set_condition_value(plural($table_name) . '.' . $field_or, $or);
          }
          $string_condition[] = '(' . implode(' OR ', $ors) . ')';
        } elseif (is_array($value)) {
          $in = '("' . implode('",', $value) . '")';
          $string_condition[] = $field_name . ' IN ' . $in;
        }
      }
    }
    if ($string) {
      return 'WHERE ' . implode(' AND ', $string_condition);
    } else {
      return $string_condition;
    }
  }

  function set_join_tables($tables = array(), $string = TRUE) {
    $string_join = array();
    foreach ($tables as $tables => $joins) {
      foreach ($joins as $position => $join) {
        $string_join[] = $position . ' JOIN ' . plural($tables) . ' ON ' . $join;
      }
    }
    if ($string) {
      return implode(' ', $string_join);
    } else {
      return $string_join;
    }
  }

  public function find($type = NULL, $conditions = array()) {

    if ($type == 'first') {
      $conditions['limit'] = 1;
    }

    $query = array();

    if (isset($conditions['fields']) && !empty($conditions['fields'])) {
      foreach ($conditions['fields'] as $table => $fields) {
        if (is_array($fields) && !empty($fields)) {
          $string_fields[] = $this->set_fields(array($table => $fields));
        } else {
          $string_fields[] = $this->get_fields(array($fields));
        }
      }
      $query[] = 'SELECT ' . implode(',', $string_fields);
    } else {
      $table = array();
      if (isset($conditions['from']) && !empty($conditions['from'])) {
        $table[] = $conditions['from'];
      } else {
        $table[] = $this->_table;
      }
      if (isset($conditions['join']) && !empty($conditions['join'])) {
        foreach ($conditions['join'] as $table_join => $join) {
          $table[] = $table_join;
        }
      }
      $query[] = 'SELECT ' . $this->get_fields($table);
    }

    if (isset($conditions['from']) && !empty($conditions['from'])) {
      $query[] = 'FROM ' . plural($conditions['from']);
    } else {
      $query[] = 'FROM ' . $this->_table;
    }

    if (isset($conditions['join']) && !empty($conditions['join'])) {
      $query[] = $this->set_join_tables($conditions['join']);
    }

    if (isset($conditions['condition']) && !empty($conditions['condition'])) {
      $query[] = $this->set_conditions($conditions['condition']);
    }

    if (isset($conditions['order']) && !empty($conditions['order'])) {
      $query[] = 'ORDER BY ' . implode(',', $conditions['order']);
    }


    if (isset($conditions['limit'])) {
      if (isset($conditions['offset'])) {
        $query[] = 'LIMIT ' . ceil($conditions['offset']) . ',' . $conditions['limit'];
      } else {
        $query[] = 'LIMIT ' . $conditions['limit'];
      }
    }

    $data = $this->db->query(implode(' ', $query));

    switch ($type) {
      case 'first':
        return $this->mapper_result($data->row_array());
        break;
      case 'count':
        return $data->num_rows();
        break;
      case 'all':
      default :
        return $this->mapper_result($data->result_array());
        break;
    }
  }

  public function model_object_word($char = NULL) {
    return str_replace(' ', '', ucwords(str_replace('_', ' ', singular($char))));
  }

  public function mapper_result($data = NULL) {
    if (!is_array($data)) {
      return $data;
    } else {
      $return = array();
      $iterator = 0;
      foreach ($data as $key => $row) {
        if (!is_array($row)) {
          $cell = explode('__', $key);
          $return[$this->model_object_word($cell[0])][$cell[1]] = $row;
          if ($cell[1] == 'id') {
            $return[$this->model_object_word($cell[0])]['uid'] = $this->get_uid($row, $cell[0]);
          }
        } else {
          foreach ($row as $field => $value) {
            $cell = explode('__', $field);
            $return[$iterator][$this->model_object_word($cell[0])][$cell[1]] = $value;
            if ($cell[1] == 'id') {
              $return[$iterator][$this->model_object_word($cell[0])]['uid'] = $this->get_uid($value, $cell[0]);
            }
          }
        }
        $iterator++;
      }
      return $return;
    }
  }

  public function mapper_slug($data) {
    $return = array();
    $model = $this->model_object_word($this->_table);
    foreach ($data as $row) {
      $return[$row[$model]['slug']] = $row;
    }
    return $return;
  }

  function get_uid($id = NULL, $table = NULL) {
    $table = (empty($table)) ? $this->_table : $table;
    return md5($this->session->encryption_key . $table . $id);
  }

  function set_uid($row) {
    if (!empty($row))
      return array_merge($row, array('uid' => $this->get_uid($row['id'])));
    else
      return array();
  }

  function save_data_after($rows = array(), $field = NULL, $id = NULL, $delete = FALSE, $skip_validation = TRUE) {
    $data = array();
    $i = 0;
    foreach ($rows as $row) {
      $data[$i] = $row;
      $data[$i][$field] = $id;
      $i++;
    }
    if ($delete) {
      $this->delete_by($field, $id);
    }
    if (!empty($data)) {
      return $this->insert_many($data, $skip_validation);
    } else {
      return FALSE;
    }
  }

  function set_tree_data($data = array(), $parent = 'parent_id', $id = 'id', $child = 'child') {
    $new_data = array();
    foreach ($data as $value) {
      $new_data[$value[$parent]][] = $value;
    }
    $tree = $this->tree_data($new_data, array($data[0]), $id, $child);
    return $tree;
  }

  function tree_data(&$data = array(), $id = 'id', $child = 'child') {
    $tree = array();
    foreach ($data as $key => $val) {
      if (isset($data[$val[$id]])) {
        $val[$child] = $this->tree_data($data, $data[$val[$id]], $id, $child);
      }
      $tree[] = $val;
    }
    return $tree;
  }

}

?>