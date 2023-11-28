<?php
class controller
{
    public $model = null;
    public function __construct()
    {
        //instantiate the model
        require_once('./model/model.php');
        $this->model = new model;
    }


    public function getPage()
    {
        //setting up the value and the default value from command in navbar which is 0         
        $command = isset($_GET['command']) ? $_GET['command'] : '0';


        //use the com
        switch ($command) {
                //navbar - HOME
            case '0':
                include('./view/contents/home.php');
                break;

                //TABLE fetched from MODEL
            case '1':
                $this->model->getTable();
                break;

                //gallery and fetched from model to send in view gallery.php
            case '2':
                $imageUrl = $this->model->viewImage(); //from model to controller and send it to view
                include('./view/contents/gallery.php'); //<--this is your view
                break;

                //view book list
            case '3':
                $books = $this->model->getBooks(); //
                include('view/contents/viewbooklist.php'); //<--this is your view
                break;

                //view add books
            case '4':
                include('./view/contents/addbooks.php');
                break;

                //the process of adding books
            case '5':
                //from index.php?command=5 in view checking the submmit button named saveRecords
                if (isset($_REQUEST['saveRecords'])) {
                    $id = isset($_REQUEST['ID']) ? $_REQUEST['ID'] : ""; //putting it all to a variable
                    $title = isset($_REQUEST['Title']) ? $_REQUEST['Title'] : ""; // if ther it is empty the default is ""
                    $author = isset($_REQUEST['Author']) ? $_REQUEST['Author'] : "";
                    $abstract = isset($_REQUEST['Abstract']) ? $_REQUEST['Abstract'] : "";
                    $description = isset($_REQUEST['Description']) ? $_REQUEST['Description'] : "";
                    $publisher = isset($_REQUEST['Publisher']) ? $_REQUEST['Publisher'] : "";
                    $copyright = isset($_REQUEST['Copyright']) ? $_REQUEST['Copyright'] : "";
                    $category = isset($_REQUEST['Category']) ? $_REQUEST['Category'] : "";
                    $unitprice = isset($_REQUEST['UnitPrice']) ? $_REQUEST['UnitPrice'] : 0; // if ther it is empty the default value will be 0

                    //this is from our model and its function insertBook-- 
                    $result = $this->model->insertBook($id, $title, $author, $abstract, $description, $publisher, $copyright, $category, $unitprice); //inside is a variable name that has the value of our form

                    echo '<script> alert("' . $result . '") </script>';
                    include('./view/contents/addbooks.php');
                }

                break;

                //this is the details of the books
            case '6':
                //from view, if you press the title it will open this
                $details = isset($_GET["ID"]) ? $_GET["ID"] : ""; //getting the ID from view
                $books = $this->model->getBookDetail($details); //all if the information will be inside
                include("./view/contents/bookDetail.php"); //because you include bookDetails, you can use now $books in your view
                break;



                //ask to delete
            case '7':
                $id = isset($_GET['ID']) ? $_GET['ID'] : "";
                echo "<script type='text/javascript'>
                        let con = confirm('Record Delete');
                        if (con) {
                            window.location.href = 'index.php?command=7.1&&ID=" . $id . "';
                        } else {
                            window.location.href = 'index.php?command=3';
                        }
                    </script>";

                break;
                //delete records
            case '7.1':
                $id = isset($_GET['ID']) ? $_GET['ID'] : ""; //getting the ID from view
                $result = $this->model->deleteBook($id);

                echo "<script type='text/javascript'>alert('Record deleted');
                        window.location='index.php?command=3';
                        </script>";

                break;

                //edit books
            case '8':
                $details = isset($_GET["ID"]) ? $_GET["ID"] : "";
                $books = $this->model->getBookDetail($details);
                include('./view/contents/editbook.php');
                break;

                //update records
            case '9':
                if (isset($_REQUEST['updateRecords'])) {
                    $id = isset($_REQUEST['ID']) ? $_REQUEST['ID'] : "";
                    $title = isset($_REQUEST['Title']) ? $_REQUEST['Title'] : "";
                    $author = isset($_REQUEST['Author']) ? $_REQUEST['Author'] : "";
                    $abstract = isset($_REQUEST['Abstract']) ? $_REQUEST['Abstract'] : "";
                    $description = isset($_REQUEST['Description']) ? $_REQUEST['Description'] : "";
                    $publisher = isset($_REQUEST['Publisher']) ? $_REQUEST['Publisher'] : "";
                    $copyright = isset($_REQUEST['Copyright']) ? $_REQUEST['Copyright'] : "";
                    $category = isset($_REQUEST['Category']) ? $_REQUEST['Category'] : "";
                    $unitprice = isset($_REQUEST['UnitPrice']) ? $_REQUEST['UnitPrice'] : 0;

                    $result =  $this->model->updateBook($id, $title, $author, $abstract, $description, $publisher, $copyright, $category, $unitprice);


                    echo "<script type='text/javascript'>alert('Record Updated');
                        window.location='index.php?command=3';
                        </script>";
                }

                break;
        }










        // for image
        $action = isset($_GET['action']) ? $_GET['action'] : '0';
        switch ($action) {
            case "uploadpic":

                if (isset($_POST['submit']) && isset($_FILES['my_image'])) {




                    $img_name = $_FILES['my_image']['name'];
                    $img_size = $_FILES['my_image']['size'];
                    $tmp_name = $_FILES['my_image']['tmp_name'];
                    $error = $_FILES['my_image']['error'];



                    if ($error === 0) {
                        if ($img_size > 10000000) {
                            $em = "Sorry, your file is too large.";

                            header("Location: index.php?command=2&error=$em");
                            echo "<script>alert('$em');</script>";
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $img_upload_path = 'images/' . $new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);

                                // Insert into Database
                                $this->model->insertImage($new_img_name);
                            } else {
                                $em = "You can't upload files of this type";
                                header("Location: index.php?command=2&error=$em");
                            }
                        }
                    } else {
                        $em = "unknown error occurred!";
                        header("Location: index.php?command=2&error=$em");
                    }
                } else {

                    header("Location: index.php?command=2");
                }
                echo "<script>alert('Image uploaded successfully!');</script>";
                header("Location: index.php?command=2");
                break;
        }
    }
}
