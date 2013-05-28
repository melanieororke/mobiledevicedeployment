<?php
    include("includes/header.php");

    if (isset($_GET['id']) && (int)addslashes($_GET['id'])) {
        $id = sprintf("%06d", (int)addslashes($_GET['id']));
        $findiderrors = 0;
    }
    elseif (isset($_POST['id']) && (int)addslashes($_POST['id'])) {
        $id = sprintf("%06d", (int)addslashes($_POST['id']));
        $findiderrors = 0;
    }
    else {
        $findiderrors = 1;
    }


    if ($findiderrors == 0) {
            // Get our fields already in the db, and compare, to decrease db updates
            $sql = "SELECT * FROM horses WHERE id=$id";
            $horseresult=mysql_query($sql);
            if (mysql_num_rows($horseresult) == 0) {
                echo '<h3>Update a Horse Page</h3>
                        <p>Sorry, we cannot find that horse (ID#' . $id . ') in our database. Please try again.</p>
                ';
            }
            else {
                while ($row = (mysql_fetch_array($horseresult))) {

                    if (isset($_POST['submit'])) {
                        $allowedFields = array(
                            'horseName',
                            'yob',
                            'color',
                            'breed',
                            'strain',
                            'gender',
                            'competingIn',
                            'sire',
                            'dam',
                            'damsire',
                            'breeder',
                            'owner',
                            'retired'
                        );
                        
                        if($row['retired'] == 1) {
                          $retired = "DELETE FROM entries WHERE horseid = $id";
                          mysql_query($retired) or die ('Error deleting entries from database because: '. $mysql_error() .' '. $retired);
                        }



                        foreach($_POST AS $key => $value)
                        {
                            $value = mysql_real_escape_string($value);
                            $$key = mysql_real_escape_string($value);
                            $fields = substr($keys,0,-2);
                            $inserts = substr($values,0,-1);
                            // first need to make sure this is an allowed field
                            if(in_array($key, $allowedFields))
                            {
                                echo 'field:' . $key . '<br />';

                                //echo $row[$key] . ' is what is in the dabase.<br />';
                                if ($value == $row[$key]) {echo '<font color="green">This value is still the same!</font><br /><br />';}
                                else {
                                    echo '<font color="red" size="2"><b>We should update this!</b></font><br /><br />';
                                    $query="UPDATE horses SET $key='$value' WHERE id='$id'";
                                    mysql_query($query)
                                        or die ('Error updating horse: ' . mysql_error() . ' ' . $query);
                                    echo '<div class="salehorse"><h3>New Value:</h3>
                                                                        <p>' . $value . '</p></div><br /><br />';
                                }
                            }
                        }
                    }
                    else {
                                echo '<h1>Update a Horse</h1>';
                                include("edit_horse_form.php");
                    } // end else if the form was not submitted
                } // end while ($row = ... ($horseresult)))
            }
    } // end if no find id errors were found
    else {
        echo '<h1>No Horses Selected</h1>
            <p>There may have been an error, or you may have found this page by mistake. Either way, a horse id must be set to continue. Please go back and try again.</p>';
    }
?>
<?php include("includes/footer.php"); ?>