<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Post Content</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Section Title -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Post Content</h6>
                </div>
                <?php
                //Read data from posts table
                if (isset($_GET['update'])) {
                    $the_post_id = $_GET['update'];
                    $query = "SELECT * FROM posts WHERE post_id = '$the_post_id'";
                    $post_existing_content = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($post_existing_content)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_description = $row['post_description'];
                        $post_author = $row['post_author'];
                        $post_thumb = $row['post_thumb'];
                        $post_category = $row['post_category'];
                        $post_tags = $row['post_tags'];
                        $post_date = $row['post_date'];
                ?>
                        <!-- Card section body -->
                        <div class="card-body">
                            <!-- Post form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="post-title">Tittle</label>
                                    <input type="text" name="post-title" class="form-control" value="<?php echo $post_title; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="post-desc">Description</label>
                                    <textarea name="post-desc" rows="7" class="form-control"><?php echo $post_description; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="post-author">Post Author</label>
                                    <input type="text" name="post-author" class="form-control" value="<?php echo $post_author; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Post Thumbnail</label><br>
                                    <img src="img/posts-thumbnail/<?php echo $post_thumb; ?>" alt="image not found" width="200">
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label for="post-category">Post Category</label>
                                    <input type="text" name="post-category" value="<?php echo $post_category; ?>" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="post_tags">Tags</label>
                                    <input type="text" name="post-tags" value="<?php echo $post_tags; ?>" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update-post" value="Update Post" class="btn btn-primary btn-sm">
                                </div>
                            </form>
                            <!-- Post form end -->
                        </div>
                <?php
                    }
                }

                ?>
            </div>
        </div>
    </div>
    <!-- <?php
            // if (isset($_POST['add-post'])) {
            //     $post_title = $_POST['post-title'];
            //     $post_desc = $_POST['post-desc'];
            //     $post_author = $_POST['post-author'];

            //     $post_image = $_FILES['image']['name'];
            //     $post_image_temp = $_FILES['image']['tmp_name'];

            //     $post_category = $_POST['post-category'];
            //     $post_tags = $_POST['post-tags'];

            //     move_uploaded_file($post_image_temp, 'img/posts-thumbnail/$post_image-image');

            //     $query = "INSERT INTO posts(post_title,post_description,post_author,post_thumb,post_category,post_tags,post_date) VALUES('$post_title','$post_desc','$post_author','$post_image','$post_category','$post_tags',now())";
            //     $add_new_post = mysqli_query($connect, $query);
            //     if (!$add_new_post) {
            //         die("Query Failded." . mysqli_error($connect));
            //     } else {
            //         header("Location:allposts.php");
            //     }
            // }
            ?> -->

</div>
<!-- /.container-fluid -->

<?php include 'includes/footer.php'; ?>