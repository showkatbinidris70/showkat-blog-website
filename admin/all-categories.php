<?php
include 'includes/header.php';
?>
<!-- Add category  -->
<?php
//$message = "";
insert_category();
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="">View All Categories</h4>

    <!-- Basic Card Start -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
                </div>
                <div class="card-body">
                    <!-- Category form start -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="category" class="form-label">Add Category Name</label>
                            <input type="text" name="category" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm" name="add_category" value="Add Category">
                        </div>
                    </form>
                    <!-- Category form end -->
                </div>
            </div>
            <!-- Read category  -->
            <?php
            if (isset($_GET['update'])) {
                $cat_id = $_GET['update'];
                include "includes/update_category.php";
            }
            ?>

        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View All Categories</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <!-- <th>Category ID</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // View Category all list
                            view_all_category();
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Basic Card Start -->
    </div>

    <?php
    delete_category();
    ?>

    <!-- /.container-fluid -->
    <?php include 'includes/footer.php'; ?>