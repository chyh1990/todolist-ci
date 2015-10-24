<div class="starter-template">
  <h1>TODO Example</h1>

  <form class="form-inline">
    <div class="form-group">
      <label for="todo">TOOD</label>
      <input type="text" class="form-control" id="todo" placeholder="Hello world">
    </div>
    <button type="submit" class="btn btn-default">Add TODO</button>
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
        <tr>
          <th scope="row"><?php echo $e->id;?></th>
          <td><?php echo $e->title;?></td>
          <td><?php echo $e->description;?></td>
          <td><?php echo $e->created_at;?></td>
          <td>Ok</td>
        </tr>
      <?php endforeach;?>
      </tbody>
    </table>
</div>

