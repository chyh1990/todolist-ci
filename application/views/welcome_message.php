<div class="starter-template">
  <h1>TODO Example</h1>

  <form class="form-inline" method="post" action="index.php?/todo/add">
    <div class="form-group">
      <label for="todo">TOOD</label>
      <input type="text" class="form-control" name="title" id="todo" placeholder="Hello world">
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>

  <table class="table table-stride">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Time</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($result as $e):?>
      <tr class="<?php echo $e->done ? 'success' : '';?>">
          <th scope="row"><?php echo $e->id;?></th>
          <td><?php echo $e->title;?></td>
          <td><?php echo $e->description;?></td>
          <td><?php echo $e->created_at;?></td>
          <td>
          <?php
            if(!$e->done) {
              echo "<button data-todo-id=".$e->id." class='btn btn-default btn-xs finish-btn'>Finish</button>";
            }
          ?>
          </td>
      </tr>
      <?php endforeach;?>
      </tbody>
    </table>
</div>

<script>
$(function() {
  $(".finish-btn").click(function() {
    var dom = $(this);
    var todo_id = dom.data('todo-id');
    $.post("index.php?/todo/finish/" + todo_id).success(function(res) {
      // update UI
      dom.parent().parent().addClass('success');
      dom.remove();
    }).error(function() { alert('error'); });
    // console.log(todo_id);
  });
});
</script>

