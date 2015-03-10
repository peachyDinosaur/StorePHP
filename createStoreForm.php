<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/store.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Create Store Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createStoreForm" name="createStoreForm" action="createStore.php" action="checkStoreRegister.php"method="POST"onsubmit="return validateCreateStore(this);">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value=""/>                            
                            <span id="addressError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['address'])) {
                                echo $errorMessage['address'];
                            }
                            ?>                                
                            </span>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>
                            <input type="text" name="manager" value=""/>
                            <span id="managerError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['manager'])) {
                                echo $errorMessage['manager'];
                            }
                            ?>     
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>
                            <input type="text" name="phoneNumber" value="" />
                            <span id="phoneNumberError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['phoneNumber'])) {
                                echo $errorMessage['phoneNumber'];
                            }
                            ?>     
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Store" name="createStore" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>



