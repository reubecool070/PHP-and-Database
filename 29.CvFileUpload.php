<!--  29. Write PHP script to upload CV with following details: 
     a.File type: PDF & DOCS
     b.File size less than 1 MB
-->

<pre>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err = [];
    if ($_FILES['CV']['error'] == 0) {
        if ($_FILES['CV']['size'] < 1024*1024) {
            $file_formats = ['application/pdf','application/docx'];
            if (in_array($_FILES['CV']['type'],$file_formats)) {
                if(move_uploaded_file($_FILES['CV']['tmp_name'],'uploads/' . $_FILES['CV']['name'])){
                    echo "File upload success";
                } else {
                    $err['CV'] = 'File upload error';
                }
            } else {
                $err['CV'] = 'Please upload valid file format pdf.';
            }
        } else {
            $err['CV'] = 'Please select file below 1MB.';
        }
    } else {
        $err['CV'] = 'Please select file';
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cv Update</title>
</head>
<body>
    <h1>CV Update</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">CV Update</label>
        <input type="file" name="CV" />
        <?php echo isset($err['CV'])?$err['CV']:''; ?>
        <br />
        <input type="submit" name="submit" value="Upload CV" />
    </form>
</body>
</html>