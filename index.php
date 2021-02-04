<?php
    session_start();

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://localhost/exoForm/assets/css/form.css">
    </head>
    <body>
        <form action="index.php" method="POST">
            <div class="panneau-deroulant-1" id="panneau1">
                <div class="row-title" id="row_title1">
                    <span class="title-panneau">Informations identitaires</span>
                    <img class="arrow-down" id="arrow_down_identite" src="http://localhost/exoForm/assets/img/arrow_down.jpg" alt="arrow_down"/>
                    <img class="arrow-up" id="arrow_up_identite" src="http://localhost/exoForm/assets/img/arrow_up.jpg" alt="arrow_up"/>
                </div>
                <div class="row-form">
                    <label for="lastname">Nom : </label>
                    <input type="text" name="lastname" placeholder="O'connor/De Beauclair" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['lastname']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur le nom" alt="Erreur sur le nom" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(1,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="firstname">Prénom : </label>
                    <input type="text" name="firstname" placeholder="Jean-Sébastien" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['firstname']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur le prénom" alt="Erreur sur le prénom" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(2,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="birthday">Date de naissance : </label>
                    <input type="date" name="birthday" id="birthday" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['birthday']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $birthdayError; ?>" alt="Erreur sur la date de naissance" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(3,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="country">Pays de naissance : </label>
                    <input type="text" name="country" placeholder="France" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['country']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur le pays" alt="Erreur sur le pays de naissance" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(4,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="nationality">Nationalité : </label>
                    <input type="text" name="nationality" placeholder="française" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['nationality']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur la nationalité" alt="Erreur sur la nationalité" width="30px" height='30px' <?php if(isset($_SESSION['error']) && !in_array(5,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
            </div>
            <div class="panneau-deroulant-2" id="panneau2">
                <div class="row-title" id="row_title2">
                    <span class="title-panneau">Informations secondaires</span>
                    <img class="arrow-down" id="arrow_down_secondaire" src="http://localhost/exoForm/assets/img/arrow_down.jpg" alt="arrow_down"/>
                    <img class="arrow-up" id="arrow_up_secondaire" src="http://localhost/exoForm/assets/img/arrow_up.jpg" alt="arrow_up"/>
                </div>
                <div class="row-form">
                    <label for="address">Adresse : </label>
                    <input type="text" name="street" placeholder="N° rue" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['street']; ?>"/>
                    <input type="text" name="city" placeholder="Ville" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['city']; ?>"/>
                    <input type="text" name="postal" placeholder="Code postal" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['postal']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $adressError; ?>" width="30px" height='30px' <?php if(isset($_SESSION['error']) && !in_array(6,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="email">Email : </label>
                    <input type="text" name="email" placeholder="léa.vanghzertahlt@google.com" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['email']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur l'email" alt="Erreur sur l'email" width="30px" height='30px' <?php if(isset($_SESSION['error']) && !in_array(7,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="tel">Téléphone : </label>
                    <input type="text" name="tel" placeholder="+336 45 37 82 73/0645362739" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['tel']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur le téléphone" alt="Erreur sur le téléphone" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(8,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="degree">Diplôme : </label>
                    <select name="degree">
                        <option value="sans" <?php if(isset($_SESSION['form']) && $_SESSION['form']['degree'] == 'sans') echo 'selected' ?>>sans</option>
                        <option value="BAC+2" <?php if(isset($_SESSION['form']) && $_SESSION['form']['degree'] == 'BAC+2') echo 'selected' ?>>BAC+2</option>
                        <option value="BAC+3" <?php if(isset($_SESSION['form']) && $_SESSION['form']['degree'] == 'BAC+3') echo 'selected' ?>>BAC+3</option>
                        <option value="BAC+5" <?php if(isset($_SESSION['form']) && $_SESSION['form']['degree'] == 'BAC+5') echo 'selected' ?>>BAC+5</option>
                        <option value="Doctorat" <?php if(isset($_SESSION['form']) && $_SESSION['form']['degree'] == 'Doctorat') echo 'selected' ?>>Doctorat</option>
                    </select>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur le diplôme" alt="Erreur sur le diplôme" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(9,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
            </div>
            <div class="panneau-deroulant-3" id="panneau3">
                <div class="row-title" id="row_title3">
                    <span class="title-panneau">Informations pole emploi et codecademy</span>
                    <img class="arrow-down" id="arrow_down_pecc" src="http://localhost/exoForm/assets/img/arrow_down.jpg" alt="arrow_down"/>
                    <img class="arrow-up" id="arrow_up_pecc" src="http://localhost/exoForm/assets/img/arrow_up.jpg" alt="arrow_up"/>
                </div>
                <div class="row-form">
                    <label for="poleEmploiNumber">Numéro pôle emploi : </label>
                    <input type="text" name="poleEmploiNumber" placeholder="647382N" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['poleEmploiNumber']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur le numéro pole emploi" alt="Erreur sur le numéro pole emploi" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(10,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="badgeCount">Nombre de badge : </label>
                    <input type="text" name="badgeCount" placeholder="0 à 99" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['badgeCount']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur le nombre de badge" alt="Erreur sur le nombre de badge" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(11,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="codecademy">Lien codecademy : </label>
                    <input type="text" name="codecademy" placeholder="http://www.codecademy.com" value="<?php if(isset($_SESSION['form'])) echo $_SESSION['form']['codecademy']; ?>"/>
                    <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur le lien codecademy" alt="Erreur sur le lien codecademy" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(15,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                </div>
            </div>
            <div class="panneau-deroulant-4" id="panneau4">
                <div class="row-title" id="row_title4">
                    <span class="title-panneau">Informations particulières</span>
                    <img class="arrow-down" id="arrow_down_area" src="http://localhost/exoForm/assets/img/arrow_down.jpg" alt="arrow_down"/>
                    <img class="arrow-up" id="arrow_up_area" src="http://localhost/exoForm/assets/img/arrow_up.jpg" alt="arrow_up"/>
                </div>
                <div class="row-form area">
                    <label for="heroes">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ? </label><br/>
                    <div class="area-img">                
                        <textarea rows="2" cols="60" wrap="hard" name="heroes" placeholder="Vous pouvez utiliser plusieurs lignes ainsi que certains caractères spéciaux commes les virgules"><?php if(isset($_SESSION['form'])) echo $_SESSION['form']['heroes']; ?></textarea>
                        <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur quel héros vous voulez être" alt="Erreur sur quel héros vous voulez être" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(12,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                    </div>
                </div>
                <div class="row-form area">
                    <label for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique) </label><br/>
                    <div class="area-img">
                        <textarea rows="2" cols="60" wrap="hard" name="hack" placeholder="Vous pouvez utiliser plusieurs lignes ainsi que certains caractères spéciaux commes les virgules"><?php if(isset($_SESSION['form'])) echo $_SESSION['form']['hack']; ?></textarea>
                        <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur vos hacks" alt="Erreur sur vos hacks" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(13,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                    </div>
                </div>
                <div class="row-form area">
                    <label for="experience">Avez vous déjà eu une expérience avec la programmation<br/> et/ou l'informatique avant de remplir ce formulaire ? </label><br/>
                    <div class="area-img">
                        <textarea rows="2" cols="60" wrap="hard" name="experience" placeholder="Vous pouvez utiliser plusieurs lignes ainsi que certains caractères spéciaux commes les virgules"><?php if(isset($_SESSION['form'])) echo $_SESSION['form']['experience']; ?></textarea>
                        <img src="http://localhost/exoForm/assets/img/error.png" title="Erreur sur vos expériences" alt="Erreur sur vos expériences" width="30" height='30' <?php if(isset($_SESSION['error']) && !in_array(14,$_SESSION['error']) || empty($_SESSION['error'])) echo 'hidden'; ?>>
                    </div>
                </div>
            </div>
            <button class="submit" type="submit">Envoyer</button>
        </form>
        <script src="http://localhost/exoForm/assets/js/form.js"></script>
    </body>
</html>