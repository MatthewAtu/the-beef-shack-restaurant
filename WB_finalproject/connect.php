<?php
    //database connection
    $dbc = mysqli_connect('localhost', 'root', '', 'careers');
 
    if (isset($_POST['apply-button'])){//set data
        $FIRST_NAME = $_POST['first-name'];
        $LAST_NAME = $_POST['last-name'];
        $EMAIL = $_POST['email'];
        $PHONE_NUMBER = $_POST['phone-number'];
        $ADDRESS = $_POST['Address'];
        $POSTAL_CODE = $_POST['postal-code'];
        $PROVINCE = $_POST['province'];
        $GENDER = $_POST['gender'];//gender
        $JOB_ROLE = $_POST['job-role'];
        $DATE = $_POST['date'];
        $CV = $_POST['upload'];

        if (isset($_POST['skills']) && !empty($_POST['skills'])) {
            $ALL_Skills = $_POST['skills']; // Retrieve the array
    
        }
        $string = implode(", ", $ALL_Skills);
  
        $sql = "INSERT INTO `jobapp` (firstname, lastname, email, phonenumber, theAddress, postalcode, province , gender, skills, jobrole, thedate, upload) 
        VALUES('$FIRST_NAME', '$LAST_NAME', '$EMAIL', '$PHONE_NUMBER', '$ADDRESS', '$POSTAL_CODE', '$PROVINCE', '$GENDER', '$string', '$JOB_ROLE', '$DATE', '$CV')";

        $result = mysqli_query($dbc, $sql) or die("bad query: $sql");

        $dbc->close();
        echo 'alert("Applied successfully")';
        header("Location: careers/careers.html");
    }

    if (isset($_POST['find-app'])){//retreive data from jobapp
        $sql = "SELECT firstname, lastname, email, jobrole FROM `jobapp`";
        $result = mysqli_query($dbc, $sql) or die("bad query: $sql");

        if ($result->num_rows > 0) {
            $count = 0;
            // output data of each row
            echo "<p>"." pending applications: </p>";
            echo "<table border=1>";
            echo "<tr> <th>first name</th> <th>last name</th> <th>email</th> <th>job role</th>";
            echo "<th></th>\n";
            echo "</tr>\n";
            while($row = $result->fetch_assoc()){
                if($row["email"] == $_POST['entered-email']){
                    echo "<tr>"; 
                    echo "<td>".$row["firstname"]."</td>";
                    echo "<td>".$row["lastname"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["jobrole"]."</td>";
                    echo "</tr>";
                } else{
                    $count++;
                }

                if ($count == $result->num_rows){
                    echo "<p>0 results</p>"."<br>";
                }

            }
        echo "</table>";
        echo "<form action='home-page.html'><input type='submit' value='back to home page'></form>";
        } else {
            echo "<p>0 results</p>"."<br>";
            echo "<form action='home-page.html'><input type='submit' value='back to home page'></form>";
        }
        $dbc->close();
    }

    if(isset($_POST['submit-review'])){ //submit and store reviews
        $NAME = $_POST['entered-name'];
        $REVIEW = $_POST['rating'];
        $REVIEW_TEXT = $_POST['review-text'];

        //check to see if the name has already posted a review
        $sql1 = "SELECT * FROM `review` WHERE CustomerName = '$NAME'";
        $result1 = mysqli_query($dbc, $sql1) or die("bad query: $sql");

        //if the amount of rows is greater than 0 then replace the valid entries
        if ($result1->num_rows>0){
            $sql2 = "UPDATE `review` SET Rating = '$REVIEW' WHERE CustomerName = '$NAME';";
            $sql2 .= "UPDATE `review` SET ReviewText = '$REVIEW_TEXT' WHERE CustomerName = '$NAME'";
            $result2 = mysqli_multi_query($dbc, $sql2) or die("bad query: $sql"); 
        }else{//if no valid rows are found add new row
            $sql2 = "INSERT INTO `review` (CustomerName, Rating, ReviewText) 
                    VALUES('$NAME', '$REVIEW', '$REVIEW_TEXT')"; 
            $result2 = mysqli_query($dbc, $sql2) or die("bad query: $sql"); 
        }

        header("Location: reveiw/Reviews.php");

        $dbc->close();
    }

    if(isset($_POST['submit-feedback'])){ //submit and store reviews
        $FEEDBACK = $_POST['feedback'];

        $sql = "INSERT INTO `feedback` (feedback) 
                VALUES('$FEEDBACK')"; 

        $result = mysqli_query($dbc, $sql) or die("bad query: $sql");
        header("Location: feedback/feedback.html");

        $dbc->close();
    }

    if (isset($_POST['submit-order']) ){
        $NAME = $_POST['order-name'];
        $NUMBER = $_POST['order-number'];
    

        if (!empty($_POST['listItems'])) {
                // Split the textarea input into an array
                $listValues = explode(",", $_POST['listItems']);

            } else {
                echo "No list items submitted.";
            }
   
        $string = implode(", ", $listValues);

        $sql = "INSERT INTO `order` (theName, phone, theorder) 
                VALUES('$NAME', '$NUMBER', '$string')"; 
        $result = mysqli_query($dbc, $sql) or die("bad query: $sql");

        $dbc->close();
        header("Location: order/Order.html");
    }

    if (isset($_POST['track-order'])){//retreive data from jobapp
        $sql = "SELECT theName, phone, theorder FROM `order`";
        $result = mysqli_query($dbc, $sql) or die("bad query: $sql");

        if ($result->num_rows > 0) {
            $count = 0;
            // output data of each row
            echo "<p>"." pending applications: </p>";
            echo "<table border=1>";
            echo "<tr> <th>name</th> <th>Phone</th> <th>your order</th>";
            echo "<th></th>\n";
            echo "</tr>\n";
            while($row = $result->fetch_assoc()){
                if($row["phone"] == $_POST['track-number']){
                    echo "<tr>"; 
                    echo "<td>".$row["theName"]."</td>";
                    echo "<td>".$row["phone"]."</td>";
                    echo "<td>".$row["theorder"]."</td>";
                    echo "</tr>";
                } else{
                    $count++;
                }
                if ($count == $result->num_rows){
                    echo "<p>0 results</p>"."<br>";
                }

            }
        echo "</table>";
        echo "<form action='home-page.html'><input type='submit' value='back to home page'></form>";
        } else {
            echo "<p>0 results</p>"."<br>";
            echo "<form action='home-page.html'><input type='submit' value='back to home page'></form>";
        }
        $dbc->close();
    }


?>
