<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
   
    switch ($action) {
        case 'view':
            // Code to view questions
            echo "View Questions button clicked";
           script 
            break;
        case 'add':
            // Code to add questions
            echo "Add Questions button clicked";
            break;
        case 'delete':
            // Code to delete questions
            echo "Delete Questions button clicked";
            break;
        default:
            echo "Unknown action";
    }
} else {
    echo "No action received";
}
?>
