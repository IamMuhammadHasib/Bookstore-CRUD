<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP JSON File CRUD (Create Read Update and Delete)</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Add a new book</h1>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8"><a href="index.php">Back</a>
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Book name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" name="address">
                </div>
            </div>    
 
            <input type="submit" name="save" value="Save" class="btn btn-primary">
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
<?php
    if(isset($_POST['save'])){
        //open the json file
        $data = file_get_contents('bookData.json');
        $data = json_decode($data);
 
        //data in out POST
        $input = array(
            'id' => $_POST['id'],
            'bookname' => $_POST['bookname'],
            'author' => $_POST['author'],
            'publisher' => $_POST['publisher']
        );
 
        //append the input to our array
        $data[] = $input;
        //encode back to json
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('bookData.json', $data);
 
        header('location: index.php');
    }
?>
</body>
</html>