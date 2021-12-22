<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blog Posts</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Section Title -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Blog Posts</h6>
                </div>
                <!-- Card section body -->
                <div class="card-body table-responsive">
                    <!-- Blog post table start -->
                    <table class="table table-striped ">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sl.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Post Category</th>
                                <!-- <th scope="col">Post Status</th> -->
                                <th scope="col">Post Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            //  <!-- Read data from Posts table -->
                            $query = "SELECT * FROM posts";
                            $select_all_post = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_assoc($select_all_post)) {
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_description = $row['post_description'];
                                $post_author = $row['post_author'];
                                $post_thumb = $row['post_thumb'];
                                $post_category = $row['post_category'];
                                $post_tags = $row['post_tags'];
                                // $post_status = $row['post_status'];
                                $post_date = $row['post_date'];
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $post_title; ?></td>
                                    <td><?php echo $post_author; ?></td>
                                    <td><?php echo $post_category; ?></td>
                                    <!-- <td><?php echo $post_status; ?></td> -->
                                    <td><?php echo $post_date; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="update-posts.php?update=<?php echo $post_id ?>" class="btn btn-primary btn-sm">Update</a>
                                            <a href="allposts.php?delete=<?php echo $post_id ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <!-- Blog post table end -->
                </div>
            </div>
        </div>
    </div>

</div>
<?php
if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = '$post_id'";
    $delete_query = mysqli_query($connect, $query);
    if (!$delete_query) {
        die("Not deleted" . mysqli_error($connect));
    } else {
        header("Location:allposts.php");
    }
}

?>
<!-- /.container-fluid -->

<?php include 'includes/footer.php'; ?>