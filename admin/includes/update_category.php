<!-- Read Category -->
<?php
$query = "SELECT * FROM categories WHERE cat_id = $cat_id";
$update_query = mysqli_query($connect, $query);
while ($row = mysqli_fetch_assoc($update_query)) {
    $cat_id = $row['cat_id'];
    $cat_name = $row['cat_name'];
?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
        </div>
        <div class="card-body">
            <!-- Category form start -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="category" class="form-label">Update Category Name</label>
                    <input type="text" name="category" value="<?php if (isset($cat_id)) {
                                                                    echo $cat_name;
                                                                } ?>" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="editcategory" value="Update Category">
                </div>
            </form>
            <!-- Category form end -->
        </div>
    </div>
    <!-- read category end -->
<?php
}

?>
<!-- Update category start -->
<?php
if (isset($_POST['editcategory'])) {
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['category'];
    $query = "UPDATE categories SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
    $update_category = mysqli_query($connect, $query);

    if (!$update_category) {
        die("Update category failed" . mysqli_error($connect));
    } else {
        header("Location:all-categories.php");
    }
}
?>