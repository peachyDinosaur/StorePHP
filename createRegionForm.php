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
        <script type="text/javascript" src="js/region.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Create Region Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createRegionForm" name="createRegionForm" action="createRegion.php" action="checkRegion.php"method="POST"onsubmit="return validateCreateRegion(this);">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Region</td>
                        <td>
                            <input type="text" name="region" value=""/>                            
                            <span id="regionError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['region'])) {
                                echo $errorMessage['region'];
                            }
                            ?>                                
                            </span>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Manager Name</td>
                        <td>
                            <input type="text" name="managerName" value=""/>
                            <span id="email" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['managerName'])) {
                                echo $errorMessage['managerName'];
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
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="" />
                            <span id="email" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['email'])) {
                                echo $errorMessage['email'];
                            }
                            ?>     
                            </span>
                        </td>
                    </tr>                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Region" name="createRegion" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>



