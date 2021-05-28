<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Caterpillar calculator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="fonts.css">

        <link rel="stylesheet" href="https://use.typekit.net/rts3cue.css">

    </head>

    <body onload="loadDefaults();addListener();addDotsMultipleElements();">

    <?php 

    include 'sqlconnection.php';


    ?>

    <?php while($row = mysqli_fetch_array($result)) { ?>

       <span class="sqlData" style="z-index: -1; position: absolute;"> <?php echo $row["MONEY"]; ?> </span>
       
    <?php
        }
        ?>

<?php echo $shipDatabase; ?>

        <form action="loginProcessing.php" method="POST" id="loginWrapper">

            <span class="biloLight listEntryName" id="loginHeader">Login</span>

            <div class="inputGroup">
            <label class="biloLight" for="usernameInput">Username</label>
            <input class="biloLight" id="usernameInput" name="username" type="text" required autocomplete="off">
            </div>

            <div class="inputGroup">
            <label class="biloLight" for="passwordInput">Password</label>
            <input class="biloLight" id="passwordInput" name="password" type="password" required autocomplete="off">
            </div>
            <button class="biloLight btn btn-primary" id="loginWrapperBTN" name="submit" type="submit">login</button>
        </form>

        <div id="opacityLayer"></div>

        <div id="contentWrapper">

            <div id="accountWrapper">

                <?php
                    if(isset($_SESSION["username"])){

                ?>
                    <div id="upperAccountWrapper">
                        <span>Logged in as <span id="accountName"><?php echo $_SESSION["username"]?></span></span>
                    </div>
                    <div id="lowerAccountWrapper">
                        <div id="accountSpacer"></div>
                        <button id="logoutBTN">Logout</button>
                    </div>
                </div>

                <?php } else { ?>

                    <div id="loginBTNWrapper">
                        <button id="loginBTN" onclick="loginExec();">Login</button>
                    </div>

                <?php } ?>
            </div>
        
            <div id="resultWrapper">
                <input id="resultSearch" type="search" placeholder="Search...">
                <div id="innerWrapper">
                    <div class="grid-container">
                        <span class="biloLight listEntryName smallHeader">Ship</span>
                        <span class="rightAlign biloLight listEntryUEC smallHeader">Price</span>
                        <span class="rightAlign biloLight listEntryUEC smallHeader">Location</span>
                        <span class="rightAlign biloLight listEntryUEC smallHeader">Rest</span>
                        <?php while($row2 = mysqli_fetch_array($shipList)) { ?>
                            <?php if($row2["shipPrice"] >0) { ?>
                                <span class="pointer biloLight listEntryName resultGridName"> <?php echo $row2["shipName"]; ?> </span>
                                <span class="rightAlign biloLight listEntryUEC resultGridPrice"> <?php if ($row2["shipPrice"] >0) {echo $row2["shipPrice"];} else {echo "No Data";}  ?> </span>
                                <span class="rightAlign biloLight listEntryLocation"> <?php echo $row2["shipLocation"] ?> </span>
                                <span class="rightAlign biloLight listEntryUEC resultGridRest">Pending</span>
                             <?php } ?>

                        <?php
                        } 
                        ?>
                    </div>
                </div>
                <button class="biloLight btn btn-primary" onclick="back();">back</button>
            </div>

            
            <div id="calcWrapper">

                <div class="listEntry">
                    <span class="biloLight listEntryName smallHeader">Person</span>
                    <span class="biloLight listEntryUEC smallHeader">aUEC</span>
                </div>

                <div class="listEntry">
                    <span class="biloLight listEntryName">Anil</span>
                        <input maxlength="30"id="input1" onkeyup="addDot(this);" type="text" placeholder="aUEC amount"  class="inputCheck biloLight listEntryUEC listEntryInput">
                </div>

                <div class="spacer"></div>

                <div class="listEntry">
                    <span class="biloLight listEntryName">Hannes</span>
                        <input maxlength="30" id="input2" onkeyup="addDot(this);" placeholder="aUEC amount"  class="inputCheck biloLight listEntryUEC listEntryInput" type="text">
                </div>

                <div class="spacer"></div>

                <div class="listEntry">
                    <span class="biloLight listEntryName">Manuel</span>
                        <input maxlength="30" id="input3" onkeyup="addDot(this);" placeholder="aUEC amount" class="inputCheck biloLight listEntryUEC listEntryInput" type="text">
                </div>

                <div class="listEntry">
                    <span class="biloLight listEntryName">Total</span>
                        <span maxlength="30" id="together" class="biloLight listEntryUEC listEntryInput">0</span>
                </div>
            </div>

            <button id="nextBTN" class="biloLight btn btn-primary" onclick="nextExec();">next</button>
        
        </div>
        
        <script src="mainScript.js" async defer></script>
    </body>
</html>