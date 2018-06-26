<?php

if(isset($_POST["Import"])){
    include 'config.php';
    $conn = getdb();

    $filename=$_FILES["file"]["name"];

    $checkFile = explode('.', $filename);

    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");

//        var_dump($filename);

        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        {

//            var_dump($getData);

            $sql = "INSERT into shop (id, nazwa,ilosc,wartosc) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";
            $result = mysqli_query($conn, $sql);

            if(!isset($result) || $checkFile[1] !== 'csv')
            {
                echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						  </script>";
            }
            else {
                echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
            }
        }

        fclose($file);
    }
}

function get_all_records(){

    $conn = getdb();
    $Sql = "SELECT * FROM shop";
    $result = mysqli_query($conn, $Sql);
//    var_dump($result);


    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>ID</th>
                          <th>nazwa</th>
                          <th>ilość</th>
                          <th>wartość</th>
                        </tr></thead><tbody>";

        while($row = mysqli_fetch_assoc($result)) {
//            var_dump($row);

            echo "<tr><td>" . $row['id']."</td>
                   <td>" . $row['nazwa']."</td>
                   <td>" . $row['ilosc']."</td>
                   <td>" . $row['wartosc']."</td></tr>";
        }

        echo "</tbody></table></div>";

    } else {
        echo "you have no records";
    }
}
