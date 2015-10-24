<div class="starter-template">
  <div class="jumbotron">
    <h1>TODO List Example</h1>
    <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.</p>
    <p>
    Powered by CodeIgniter 3.0.2.
    </p>
    <p class="text-right"><small>Chen Yuheng</small></p>
    <p>
      <a class="btn btn-lg btn-primary" href="#" role="button">View source code »</a>
    </p>
  </div>

  <h2>Add TODO</h2>
  <form class="form-horizontal" method="post" action="index.php?/todo/add">
    <div class="form-group">
      <label for="title" class="col-sm-2 control-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" id="title" placeholder="Hello">
      </div>
    </div>
    <div class="form-group">
      <label for="description" class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="optional"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add</button>
      </div>
    </div>
  </form>

  <hr />

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

