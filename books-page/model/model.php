<?php
//of of the queries relating to database will be writen on this class
class model
{
    public $cnt = null;
    public $search = null;
    public $searchEntity = null;
    public $db = null;

    public function __construct()
    {

        try {
            $this->db = new mysqli('localhost', 'root', '', 'library');
        } catch (mysqli_sql_exception $e) {
            exit('Database Connection could not established.');
        }
    }
    public function getBooks()
    {
        $data = array();
        $queryGetBooks = mysqli_query($this->db, 'SELECT * FROM tblbooks');

        while ($row = mysqli_fetch_array($queryGetBooks)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getBookDetail($id)
    {
        $data = array();
        $queryGetBooks = mysqli_query($this->db, 'SELECT * FROM tblbooks WHERE ISBN=' . $id);

        while ($row = mysqli_fetch_array($queryGetBooks)) {
            $data[] = $row;
        }
        return $data;
    }

    public function deleteBook($id)
    {
        $queryGetBooks = mysqli_query($this->db, "DELETE FROM tblbooks WHERE  ISBN = '$id' ");

        if (!$queryGetBooks) {
            return mysqli_error($this->db);
        } else {
            return 'Record Deleted';
        }
    }
    public function insertBook(
        $id,
        $title,
        $author,
        $abstract,
        $description,
        $publisher,
        $copyright,
        $category,
        $unitprice
    ) {

        $insertQuery = "INSERT INTO tblbooks(isbn,Title,Author,Abstract,Description,Publisher,CopyRightYear, Category,Unitprice) VALUES ('$id','$title','$author','$abstract','$description','$publisher','$copyright ','$category ', '$unitprice')";

        $result = mysqli_query($this->db, $insertQuery);
        if (!$result) {
            return mysqli_error($this->db);
        } else {
            return 'Record Saved';
        }
    }



    public function updateBook(
        $id,
        $title,
        $author,
        $abstract,
        $description,
        $publisher,
        $copyright,
        $category,
        $unitprice
    ) {
        $updateQuery = "UPDATE `tblbooks` SET `ISBN`='$id',`Title`='$title',`Author`='$author',`Abstract`='$abstract',`Description`='$description',`Publisher`='$publisher',`CopyRightYear`='$copyright,',`Category`='$category',`UnitPrice`='$unitprice' WHERE ISBN = " . $id;


        $result = mysqli_query($this->db, $updateQuery);
        if (!$result) {
            return mysqli_error($this->db);
        } else {
            return 'Record Updated';
        }
    }


    public function insertImage($new_img_name)
    {
        $sql = "INSERT INTO tblimages(image_url) 
				        VALUES('$new_img_name')";
        mysqli_query($this->db, $sql);
    }
    public function viewImage()
    {
        $sql = "SELECT * FROM tblimages";

        $data = array();
        $queryGetImage = mysqli_query($this->db, $sql);

        while ($row = mysqli_fetch_array($queryGetImage)) {
            $data[] = $row;
        }
        return $data;
    }

















    public function getTable()
    {
        echo
        '<table width = 100% border = 1>
                <thead>
                    <th>header1</th>
                    <th>header2</th>
                    <th>header3</th>
                    <th>header4</th>
                    <th>header5</th>
                </thead>
         
          
            ';
        echo '<tbody>';
        for ($row = 0; $row <= 10; $row++) {

            echo '<tr>';

            for ($col = 0; $col < 5; $col++) {
                echo '<td>';
                echo 'row ' . $row;
                echo '<br>col ' . $col;
                echo '</td>';
            }

            echo '</tr>';
        }
        echo '</tbody>';
        echo '
                 </tfoot>
                    <th>footer1</th>
                    <th>footer2</th>
                    <th>footer3</th>
                    <th>footer4</th>
                    <th>footer5</th>
                </tfoot>
            </table>';
    }

    /* 
    public function getTotalRows($searchEntity)
    {

        $sql = "SELECT * FROM " . $this->cnt->tblname . "  WHERE " . $searchEntity . " LIKE :search";

        // Prepare and execute the query
        $stmt = $this->cnt->connect()->prepare($sql);
        $stmt->bindValue(':search', '%' . $this->search . '%');
        $stmt->execute();

        // Get the row count
        $rowCount = $stmt->rowCount();
        return $rowCount;
    }

    public function search()
    {

        $search = isset($_GET['search']) ? $_GET['search'] : '';
        return $search;
    } */
}
