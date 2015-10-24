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

  public function new_todo($title)
  {
    $sql = "INSERT INTO todos (title, created_at, done) VALUES (?, ?, FALSE)";
    $this->db->query($sql, array($title, date("Y-m-d H:i:s")));
  }

  public function finish($id)
  {
    $sql = "UPDATE todos SET done = TRUE WHERE id = ?";
    $this->db->query($sql, array($id));
  }
}

