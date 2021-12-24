<?php

//Connection String
$db = mysqli_connect("localhost", "root", "", "university_db");

// To Insert Arabic Caracters
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER SET utf8");

//Read File
if (isset($_POST["submit_file"])) {
    $file = $_FILES["file"]["tmp_name"];
    $file_open = fopen($file, "r");
    while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
        $id = $csv[0];
        $firstname = $csv[1];
        $lastname = $csv[2];
        $fullname = $csv[3];
        $firstname_ar = $csv[4];
        $lastname_ar = $csv[5];
        $fullname_ar = $csv[6];

        mysqli_query($db, "INSERT INTO employee VALUES ('$id','$firstname','$lastname','$fullname','$firstname_ar','$lastname_ar','$fullname_ar')");
    }
}
?>

<!DOCTYPE html>
<html>

<body>
    <div id="wrapper">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" name="submit_file" value="Submit" />
        </form>
    </div>
</body>

</html>