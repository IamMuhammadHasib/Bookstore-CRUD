<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit book information</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php
    //get id from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('bookData.json');
    $data_array = json_decode($data);
 
    //assign the data to selected index
    $row = $data_array[$index];
 
    if(isset($_POST['save'])){
        $input = array(
            'id' => $_POST['id'],
            'bookname' => $_POST['bookname'],
            'author' => $_POST['author'],
            'publisher' => $_POST['publisher']
        );
 
        //update the selected index
        $data_array[$index] = $input;
 
        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('bookData.json', $data);
 
        header('location: index.php');
    }
?>
<div class="container">
    <h1 class="page-header text-center">Edit book information</h1>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8"><a href="index.php">Back</a>
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $row->id; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">bookname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookname" name="bookname" value="<?php echo $row->bookname; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">author</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" name="author" value="<?php echo $row->author; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">publisher</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $row->publisher; ?>">
                </div>
            </div>
            <input type="submit" name="save" value="Save" class="btn btn-primary">
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
</body>
</html>