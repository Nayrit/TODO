<?php
// include function file
require_once('function.php');

// Deletion Logic
if(isset($_GET['del']))
    {
// Geeting deletion row id
    $rid=$_GET['del'];
    $deletedata=new DB_con();

    $fetchdata=new DB_con();
    $fetchdata->insertTrash();
    $sql=$fetchdata->delete($rid);
    
if($sql)
{
// Corrected the redirection to point back to the homepage silently.
echo "<script>window.location.href = 'index.php'</script>";
}
    }

// Insertion logic is now correctly placed at the top of the file.
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
            <h3 class="logo">Nayrit's TODO</h3>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="index.php"><i class="fa fa-home"></i><span>Home</span></a>
                </li>
                <li>
                    <a href="trash.php"><i class="fa fa-trash"></i><span>Trash</span></a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i><span>Add Task</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3>To do List</h3>
                    <hr />
                    <div class="table-responsive mt-5">
                        <table id="mytable" class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Mark as Done</th>
                                    <th>Number of Todos</th>
                                    <th>Todos</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fetchdata=new DB_con();
                                $sql=$fetchdata->fetchdata();
                                $cnt=1;
                                while($row=mysqli_fetch_array($sql)) 
                                {
                            ?>
                                <tr class="text-center">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input check1" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($cnt);?>
                                    </td>
                                    <td class="t">
                                        <?php echo htmlentities($row['todo']);?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row['created_at']);?>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#update<?php echo htmlentities($row['id'])?>">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <a href="index.php?del=<?php echo htmlentities($row['id']);?>" onClick="return confirm('Do you really want to delete');">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                        <?php
                                            include("update.php");
                                        ?>
                                        <div class="modal fade" id="update<?php echo htmlentities($row['id'])?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Task</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="./update.php?delID=<?php echo htmlentities($row['id']);?>" name="insertrecord" method="POST">
                                                            <input type="hidden" value="<?php echo htmlentities($row['id']);?>">
                                                            <input type="text" name="todo" placeholder="Enter Todos" value="<?php echo htmlentities($row['todo']);?>" class="form-control" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="update" class="btn btn-primary">Update Task</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$('.check1').change(function() {
    // Traverse up to the parent `tr` and then find the task text `td`
    var taskText = $(this).closest('tr').find('.t');
    if ($(this).prop("checked")) {
        taskText.css("text-decoration", "line-through");
        taskText.css("opacity", "0.5");
    } else {
        taskText.css("text-decoration", "none");
        taskText.css("opacity", "1");
    }
});

(function($) {
    "use strict";
    var fullHeight = function() {
        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function(){
            $('.js-fullheight').css('height', $(window).height());
        });
    };
    fullHeight();

    $('#sidebarCollapse').on('click', function() {
      $('#sidebar').toggleClass('active');
    });
})(jQuery);
</script>