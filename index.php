<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <style>
        body {margin:0px;padding:0px;}
        .divbody {margin-left:25px;}
        .red {color: red;}
        .yellow {color: gold;font-size: 40px;}
        .star~label::before{
            content: "\2606";
            font-size: 40px;
            color: gold;
        }
        .star:hover~label::before{
            color: gold;
            content: "\2605";
            opacity: 80%;
        }
        .star:checked~label::before {
            content: "\2605";
        }
        .star {
            display: none;
        }
        .rating{
            display:flex;
            flex-direction:row-reverse;
            width:30px;
            margin:0;
        }
        .coord{
            width:500px;
            margin:0;
        }
        fieldset{
            background: white;
        }
    </style>
    <!--<script>
        alert('hacker');
    </script>-->
</head>
<body>
<?php
    
    // Verification caractère spéciaux
    $name = $email = $gender = $comment = $website = "";
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    // -- VERIFICATION REQUEST_METHOD : --

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST['name'])){
            $nameErr = "<span class=red>Name is required</span>";
        } else {
            $name = test_input($_POST['name']);
            if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $name)) {
                $nameErr = "<span class=red>Only letters and white space allowed</span>";
            }
        }

        if(empty($_POST['email'])){
            $emailErr = "<span class=red>Email is required</span>";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "<span class=red>Invalid email format</span>";
            }
        }

        if(empty($_POST['website'])){
            //$websiteErr = "Website is required";
        } else {
            $website = test_input($_POST['website']);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "<span class=red>Invalid URL</span>";
            }
        }

        if(empty($_POST['comment'])){
            //$commentErr = "Comment is required";
        } else {
            $comment = test_input($_POST['comment']);
        }

        if(empty($_POST['gender'])){
            $genderErr = "<span class=red>Gender is required</span>";
        } else {
            $gender = test_input($_POST['gender']);
        }

        if(empty($_POST['support'])){
        } else {
            $support = test_input($_POST['support']);
        }

        if(empty($_POST['ambiance'])){
        } else {
            $ambiance = test_input($_POST['ambiance']);
        }

        if(empty($_POST['pedagogie'])){
        } else {
            $pedagogie = test_input($_POST['pedagogie']);
        }
    }
?>


        <!-- ============================================================= -->
        <!--                      FORMULAIRE DE CONTACT                    -->
        <!-- ============================================================= -->

    <div class=divbody>
    <form action="<?php print(htmlspecialchars($_SERVER["PHP_SELF"])); ?>" method="post"><br>
    <h1>Formulaire de contact</h1>
    <h3 class=red>* Veuillez renseigner ces champs !!</h3>

        <!-- Champ coordonnée -->
        <fieldset class=coord>
            <legend>Coordonnées</legend><br>

            <!-- <span class=red>*</span> == mettre une étoile rouge pour signaler l'obligation -->
            <span class=red>*</span>Name: <input type="text" name="name" value="<?php print($name); ?>">
            <span class="error"><?php echo $nameErr; ?></span>
            <br><br>

            <span class=red>*</span>Email: <input type="text" name="email" value="<?php print($email); ?>">
            <span class="error"><?php echo $emailErr; ?></span>
            <br><br>

            Website: <input type="text" name="website" value="<?php print($website); ?>">
            <br><br>

            Comment: <textarea rows="5" cols="40" name="comment"></textarea>
            <br><br>

            <span class=red>*</span>Gender: <input type="radio" name="gender" <?php if(isset($gender) && $gender =="female") {print("checked");}?> value="female">Female
            <input type="radio" name="gender" <?php if(isset($gender) && $gender =="male") {print("checked");}?> value="male">Male
            <input type="radio" name="gender" <?php if(isset($gender) && $gender =="other") {print("checked");}?> value="other">Other
            <span class="error"><?php echo $genderErr; ?></span>
            <br><br>

        </fieldset><br>

        <!-- Champ support -->
        <?php
            // Le nom de la catégorie
            $menuNoteEtoile = "support";
        ?>
        <fieldset class="rating">
            <legend>Facilité de support</legend>
            <!--Note :-->
            <input for="<?php print($menuNoteEtoile); ?>5" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>5" <?php if(isset($support) && $support =="5") {print("checked");}?> value="5">
            <label for="<?php print($menuNoteEtoile); ?>5"></label>
            <input for="<?php print($menuNoteEtoile); ?>4" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>4" <?php if(isset($support) && $support =="4") {print("checked");}?> value="4">
            <label for="<?php print($menuNoteEtoile); ?>4"></label>
            <input for="<?php print($menuNoteEtoile); ?>3" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>3" <?php if(isset($support) && $support =="3") {print("checked");}?> value="3">
            <label for="<?php print($menuNoteEtoile); ?>3"></label>
            <input for="<?php print($menuNoteEtoile); ?>2" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>2" <?php if(isset($support) && $support =="2") {print("checked");}?> value="2">
            <label for="<?php print($menuNoteEtoile); ?>2"></label>
            <input for="<?php print($menuNoteEtoile); ?>1" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>1" <?php if(isset($support) && $support =="1") {print("checked");}?> value="1">
            <label for="<?php print($menuNoteEtoile); ?>1"></label>
        </fieldset>
        <br><br>

        <!-- Champ ambiance -->
        <?php
            // Le nom de la catégorie
            $menuNoteEtoile = "ambiance";
        ?>
        <fieldset class="rating">
            <legend>Qualité</legend>
            <!--Note :-->
            <input for="<?php print($menuNoteEtoile); ?>5" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>5" <?php if(isset($ambiance) && $ambiance =="5") {print("checked");}?> value="5">
            <label for="<?php print($menuNoteEtoile); ?>5"></label>
            <input for="<?php print($menuNoteEtoile); ?>4" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>4" <?php if(isset($ambiance) && $ambiance =="4") {print("checked");}?> value="4">
            <label for="<?php print($menuNoteEtoile); ?>4"></label>
            <input for="<?php print($menuNoteEtoile); ?>3" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>3" <?php if(isset($ambiance) && $ambiance =="3") {print("checked");}?> value="3">
            <label for="<?php print($menuNoteEtoile); ?>3"></label>
            <input for="<?php print($menuNoteEtoile); ?>2" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>2" <?php if(isset($ambiance) && $ambiance =="2") {print("checked");}?> value="2">
            <label for="<?php print($menuNoteEtoile); ?>2"></label>
            <input for="<?php print($menuNoteEtoile); ?>1" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>1" <?php if(isset($ambiance) && $ambiance =="1") {print("checked");}?> value="1">
            <label for="<?php print($menuNoteEtoile); ?>1"></label>
        </fieldset>
        <br><br>

        <!-- Champ pedagogie -->
        <?php
            // Le nom de la catégorie
            $menuNoteEtoile = "pedagogie";
        ?>
        <fieldset class="rating">
            <legend>Esthétique</legend>
            <!--Note :-->
            <input for="<?php print($menuNoteEtoile); ?>5" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>5" <?php if(isset($pedagogie) && $pedagogie =="5") {print("checked");}?> value="5">
            <label for="<?php print($menuNoteEtoile); ?>5"></label>
            <input for="<?php print($menuNoteEtoile); ?>4" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>4" <?php if(isset($pedagogie) && $pedagogie =="4") {print("checked");}?> value="4">
            <label for="<?php print($menuNoteEtoile); ?>4"></label>
            <input for="<?php print($menuNoteEtoile); ?>3" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>3" <?php if(isset($pedagogie) && $pedagogie =="3") {print("checked");}?> value="3">
            <label for="<?php print($menuNoteEtoile); ?>3"></label>
            <input for="<?php print($menuNoteEtoile); ?>2" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>2" <?php if(isset($pedagogie) && $pedagogie =="2") {print("checked");}?> value="2">
            <label for="<?php print($menuNoteEtoile); ?>2"></label>
            <input for="<?php print($menuNoteEtoile); ?>1" class="star" type="radio" name="<?php print($menuNoteEtoile); ?>" id="<?php print($menuNoteEtoile); ?>1" <?php if(isset($pedagogie) && $pedagogie =="1") {print("checked");}?> value="1">
            <label for="<?php print($menuNoteEtoile); ?>1"></label>
        </fieldset>
        <br><br>

        <!-- == BOUTON VALIDATION == -->
        <input type="submit">
        <!--<input type="reset">-->


        <!-- ============================================================= -->
        <!--               Affichage temporaire (pour les test)            -->
        <!-- ============================================================= -->

    </form><br/>
    <h1>Réponse :</h1>
    <?php
        print('name : '.$name).'<br>';
        print('email : '.$email).'<br>';
        print('website : '.$website).'<br>';
        print('comment : '.$comment).'<br>';
        print('gender : '.$gender).'<br>';

        // Affichage étoile support
        if(!empty($_POST['support'])){
            print('note : '.$support).'<br>';
            print('Clareté du Support : ');
            for ($i=0 ; $i < $support ; $i++){
                print("<span class='yellow'>★</span>");
            }
            print('<br><br>');
        }

        // Affichage étoile ambiance
        if(!empty($_POST['ambiance'])){
            print('note : '.$ambiance).'<br>';
            print('Note Ambiance : ');
            for ($i=0 ; $i < $ambiance ; $i++){
                print("<span class='yellow'>★</span>");
            }
            print('<br><br>');
        }

        // Affichage étoile pédagogie
        if(!empty($_POST['pedagogie'])){
            print('note : '.$pedagogie).'<br>';
            print('Note Pédagogie du formateur : ');
            for ($i=0 ; $i < $pedagogie ; $i++){
                print("<span class='yellow'>★</span>");
            }
            print('<br><br>');
        }

        // Affichage + calcul étoile moyenne
        $moyNote = ($support + $ambiance + $pedagogie) / 3;
        $moyNote = round($moyNote);
        print('Moyenne : '.$moyNote).'<br>';
        print('Moyenne (étoile) : ');
        for ($i=0 ; $i < $moyNote ; $i++){
            print("<span class='yellow'>★</span>");
        }
        print('<br><br>');

    ?>
    </div>
</body>
</html>