<?php class Todo_model extends CI_Model {

  public $id;
  public $title;
  public $description;
  public $done;

  public function __construct()
  {
    parent::__construct();
  }

  public function list_todos()
  {
    $query = $this->db->query('SELECT * FROM todos ORDER BY id DESC LIMIT 200');
    return $query->result();
  }
}
