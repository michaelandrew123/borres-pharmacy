<?php include './../sql/db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$cats = $db->query("SELECT * FROM categories")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $cat_id = $_POST['category_id'];

    // Check if file is uploaded and no error
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imgTmpPath = $_FILES['image']['tmp_name'];
        $imgName = basename($_FILES['image']['name']);
        $imgDestPath = "./uploads/" . $imgName;

        $imageCheck = getimagesize($imgTmpPath);
        if ($imageCheck === false) {
            die("Uploaded file is not a valid image.");
        }

        if (move_uploaded_file($imgTmpPath, $imgDestPath)) {

            $stmt = $db->prepare("INSERT INTO products (name, description, price, category_id, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $desc, $price, $cat_id, $imgName]);


            header("Location: upload_product.php?success=1");
            exit;
        } else {
            die("Failed to move uploaded file." );
        }
    } else {
        die("No image uploaded or upload error: " . $_FILES['image']['error']);
    }
}

include './../include/header.php';
include './../menu/nav.php';
?>

<div class="container mt-5">
    <h2>Upload Product</h2>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Product uploaded successfully.</div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-2">
            <input class="form-control" name="name" placeholder="Product Name" required>
        </div>
        <div class="mb-2">
            <textarea class="form-control" name="description" placeholder="Description" required></textarea>
        </div>
        <div class="mb-2">
            <input class="form-control" type="number" step="0.01" name="price" placeholder="Price" required>
        </div>
        <div class="mb-2 d-flex align-items-center">
            <select name="category_id" class="form-select" required>
                <option value="">Select Category</option>
                <?php foreach ($cats as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal" title="Add Category">
                <strong>+</strong>
            </button>
        </div>
        <div class="mb-2">
            <input type="file" name="image" class="form-control" required>
        </div>
        <button class="btn btn-primary">Upload</button>
    </form>


    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addCategoryForm" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include './../include/footer-script.php'; ?>

<script>
    $(document).ready(function () {
        $('#addCategoryForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: './php/add_category.php',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        const $select = $('select[name="category_id"]');
                        $select.append(
                            $('<option>', {
                                value: data.id,
                                text: data.name
                            })
                        );
                        $select.val(data.id);

                        const modal = bootstrap.Modal.getInstance(document.getElementById('addCategoryModal'));
                        modal.hide();
                        $('#addCategoryForm')[0].reset();
                    } else {
                        alert(data.message || 'Failed to add category.');
                    }
                },
                error: function () {
                    alert('AJAX request failed.');
                }
            });
        });
    });
</script>

<?php include './../include/footer.php'; ?>