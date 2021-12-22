<?php
// Add new category
function insert_category()
{
    global $connect;
    if (isset($_POST['add_category'])) {
        $category_name =  $_POST['category'];
        if (empty($category_name)) {
            $message = '<div class="alert alert-warning">Category name can not be emptry.</div>';
        } else {
            $query = "INSERT INTO categories(cat_name) VALUES ('$category_name')";
            $addCategory = mysqli_query($connect, $query);
            if (!$category_name) {
                die("Query Failed." . mysqli_error($connect));
            } else {
                $message = '<div class="alert alert-success">Category name can not be emptry.</div>';
                header("Location:all-categories.php");
            }
        }
    }
}
//View All Category List
function view_all_category()
{
    global $connect;
    $sl = 1;
    $query = "SELECT * FROM categories";
    $select_categories =  mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_name = $row['cat_name'];
?>
        <tr>
            <td><?php echo $sl++; ?></td>
            <td><?php echo $cat_name; ?></td>
            <!-- <td><?php echo $cat_id; ?></td> -->

            <td>
                <div class="btn-group">
                    <a href="all-categories.php?update=<?php echo $cat_id; ?>" class="btn btn-primary btn-sm">Update</a>
                    <a href="all-categories.php?delete=<?php echo $cat_id; ?>" class="btn btn-danger btn-sm">Update</a>
                </div>
            </td>
        </tr>
<?php
    }
}

//Delete Category Page
function delete_category()
{
    global $connect;
    if (isset($_GET['delete'])) {
        $cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = '$cat_id'";
        $delete_query = mysqli_query($connect, $query);

        if (!$delete_query) {
            die("Update category failed" . mysqli_error($connect));
        } else {
            header("Location:all-categories.php");
        }
    }
}
