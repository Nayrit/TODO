<?php
// include function file
require_once('function.php');

// This line is added to handle form submissions from the "Add Task" modal.
include_once("insert.php");
?>
<?php
    include_once("header.php");
?>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="p-4">
            <h3 class="logo">TaskFlow</h3>
            <ul class="list-unstyled components">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i><span>Home</span></a>
                </li>
                <li class="active">
                    <a href="trash.php"><i class="fa fa-trash"></i><span>Trash</span></a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i><span>Add Task</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="content" class="p-4 p-md-5 pt-5">
    <?php
    // include function file
    require_once('function.php');

    // Permanent Deletion
    if(isset($_GET['del']))
    {
        $rid=$_GET['del'];
        $deletedata=new DB_con();
        $sql=$deletedata->deleteTrash($rid);
        if($sql)
        {
            echo "<script>window.location.href = 'trash.php'</script>";
        }
    }
    // Restore
    if(isset($_GET['restore']))
    {
        $rid=$_GET['restore'];
        $deletedata=new DB_con();
        $fetchdata=new DB_con();
        $fetchdata->insertTodo();
        $sql=$fetchdata->deleteTrash($rid);
        if($sql)
        {
            echo "<script>window.location.href = 'index.php'</script>"; // Redirect to index after restore
        }
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Recently Deleted Tasks</h3>
                <hr />
                <div class="table-responsive mt-4">
                    <table id="mytable" class="table">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Task Description</th>
                                <th>Deleted On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $fetchdata=new DB_con();
                                $sql=$fetchdata->fetchdataTrash();
                                $cnt=1;
                                while($row=mysqli_fetch_array($sql)) 
                                {
                            ?>
                            <tr class="text-center">
                                <td><?php echo htmlentities($cnt);?></td>
                                <td><?php echo htmlentities($row['trashName']);?></td>
                                <td><?php echo htmlentities($row['created_at']);?></td>
                                <td>
                                    <a href="trash.php?restore=<?php echo htmlentities($row['id']);?>">
                                        <button class="btn btn-success btn-xs">
                                            <i class="fa fa-undo"></i>
                                        </button>
                                    </a>
                                    <a href="trash.php?del=<?php echo htmlentities($row['id']);?>" onClick="return confirm('Do you really want to permanently delete this task?');">
                                        <button class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                 $cnt++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" name="insertrecord" method="POST">
                    <input type="text" name="todo" placeholder="What do you need to do?" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="insert" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>
    </div>
</div>