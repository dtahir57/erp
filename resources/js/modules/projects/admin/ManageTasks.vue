<template>
  <div class="wrapper manage__tasks">
    <div class="row">
      <div class="col-8">
        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
              <tr>
                <th class="w-1">ID</th>
                <th>Title</th>
                <th>User</th>
                <th>Timer</th>
                <th>Status</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="text-muted">1</span></td>
                  <td><a href="invoice.html" class="text-inherit">Design Works</a></td>
                  <td>Carlson Limited</td>
                  <td>87956621</td>
                  <td><span class="status-icon bg-success"></span> Completed</td>
                  <td class="text-right">
                    <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Manage</a>
                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                    </div> -->
                  </td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
      <div class="col-4">
        <card-component>
          <template slot="title">
            <!-- <div class="form-group col-6 offset-3" style="margin-bottom: -10px">
              <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                  <input type="radio" name="icon-input" value="1" class="selectgroup-input" checked="">
                  <span class="selectgroup-button selectgroup-button-icon"><i class="fe fe-send"></i></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="selectgroup-item">
                  <input type="radio" name="icon-input" value="2" class="selectgroup-input">
                  <span class="selectgroup-button selectgroup-button-icon"><i class="fe fe-align-center"></i></span>
                </label>
              </div>
            </div> -->
            <div class="col-10 offset-2">
              <button class="btn btn-success btn-sm">Quick Task</button>
              <button class="btn btn-primary btn-sm">Create a Task List</button>
            </div>
          </template>
          <template slot="body">
            <form action="">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
              </div>
              <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control">
              </div>
              <div class="form-group">
                <label for="assignee">Assign To</label>
                <select name="" id="" class="form-control">

                </select>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success">
              </div>
            </form>
          </template>
        </card-component>
      </div>
    </div>
  </div> 
</template>

<script>

export default {
  
}
</script>

<style>

</style>
