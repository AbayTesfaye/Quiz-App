<?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($_POST['action'] == 'add') {
                    // Redirect to add question page
                    header("Location: ../Admin/addQue.php");
                    exit;
                } elseif ($_POST['action'] == 'view') {
                    // Redirect to view question page
                    header("Location: ../Admin/viewQue.php");
                    exit;
                } elseif ($_POST['action'] == 'delete') {
                    // Redirect to delete question page
                    header("Location: ../Admin/deleteQue.php");
                    exit;
                }
            }
            ?>