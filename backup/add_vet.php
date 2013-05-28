<?php
  include('includes/header.php');
    if (isset($_POST['submit'])) {

    $allowedFields = array(
        'id',
        'hid',
        'lastvet',
        'nextvet',
        'cogginstest',
        'cogginsdate',
        'cogginsneg',
        'details',
        'lastshoe',
        'nextshoe',
        'comments'
    );

    // Specify the fields that you want to require...
    $requiredFields = array(
        'id',
        'hid',
        'nextvet',
        'cogginstest',
        'cogginsdate',
        'nextshoe'    );

    // Loop through the $_POST array, which comes from the form...
    $errors = '';
    $values = '';
    $keys = '';
    foreach($_POST AS $key => $value)
    {
        // first need to make sure this is an allowed field
        if(in_array($key, $allowedFields))
        {
            //$value = make_safe(nl2br($value));
            $value = mysql_real_escape_string($value);
            //$$key = make_safe(nl2br($value));
            $$key = mysql_real_escape_string($value);
            // is this a required field?
            if(in_array($key, $requiredFields) && $value == '')
            {
                $errors.= "The $key field is required<br />";
            }

            $values.="'$value',";
            $keys.="$key, ";
        }
    }

    // were there any errors?
    if($errors == '')
    {
        // process the page.... hmmmm....
        $fields = substr($keys,0,-2);
        $inserts = substr($values,0,-1);

        $query="INSERT INTO healthRecords (id, $fields)
                    VALUES ('',$inserts)";
        mysql_query($query)
            or die (
                    "Error adding appointment: " . mysql_error() . "<br />
                    <h2><a href=\"add_vet.php\" title=\"try again\">Try Your Form Again</a></h2>" . $query
            );
        echo 'Appointment Successfully added to the Easy Keepr Database.';

    }
    else
    {
        $errstring = "<h3>The following errors were found:</h3>
                        <ul>$errors</ul>";
        echo $errstring;

        // display the previous form
        echo '<h3>Try Your Form Again</h3>';
        include("add_vet_form.php");
    }

} else {
  echo '<h3>Add an Appointment</h3>';
  include("add_vet_form.php");
} 
include('includes/footer.php');
?>