    <link rel="stylesheet" href="lib/table-bootstrap.css">
    <link rel="stylesheet" href="lib/dataTables.css">


    <script type="text/javascript" src="lib/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="lib/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="lib/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            new DataTable('#example');
        });
    </script>
    <div class="overflow-auto">
        <table id="example" class="table table-striped table-bordered " style="width:100%">
            <thead>
                <tr>
                    <th width=21% class=" text-center">Title</th>
                    <th width=21% class="text-center">Author</th>
                    <td width=50% align="center">Abstract</td>
                    <td width=10% align="center">Action</td>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td width=21% class="text-center">Title</td>
                    <td width=21% class="text-center"">Author</td>
                <td width=50% align=" center">Abstract</td>
                    <td width=10% align="center">Action</td>
                </tr>
            </tfoot>
            <tbody>
                <?php
                foreach ($books as $title => $MybookList) {
                    echo "<tr>";
                    echo "<td class='p-5'><a class='text-decoration-none' href=index.php?command=6&&ID=" . $MybookList['ISBN'] . ">" . $MybookList['Title'] . "</a></td>";
                    echo "<td class='p-5'>" . $MybookList['Author'] . "</td>";
                    echo "<td class='p-5'>" . $MybookList['Abstract'] . "</td>";
                    echo "<td align='center'><a class='text-decoration-none' href='index.php?command=8&&ID=" . $MybookList['ISBN'] . " '>Edit</a> | <a class='text-decoration-none' href=index.php?command=7&&ID=" . $MybookList['ISBN'] . " id='delrec'>Delete</a> </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>