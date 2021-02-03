<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="form.css">
    </head>
    <body>
        <form action="index.php" method="POST">
            <div id="<?php echo $formSend; ?>"></div><!-- Detecte si le formulaire à bien été envoyé -->
            <div class="panneau-deroulant-1" id="panneau1">
                <div class="row-title" id="row_title1">
                    <span class="title-panneau">Informations identitaires</span>
                    <img class="arrow-down" id="arrow_down_identite" src="arrow_down.jpg" alt="arrow_down"/>
                    <img class="arrow-up" id="arrow_up_identite" src="arrow_up.jpg" alt="arrow_up"/>
                </div>
                <div class="row-form">
                    <label for="lastname">Nom : </label>
                    <input type="text" name="lastname" placeholder="O'connor/De Beauclair" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lastname'])) echo $lastname; ?>"/>
                    <img src="error.png" title="Erreur sur le nom" alt="Erreur sur le nom" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(1,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="firstname">Prénom : </label>
                    <input type="text" name="firstname" placeholder="Jean-Sébastien" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstname'])) echo $firstname; ?>"/>
                    <img src="error.png" title="Erreur sur le prénom" alt="Erreur sur le prénom" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(2,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="birthday">Date de naissance : </label>
                    <input type="date" name="birthday" id="birthday" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['birthday'])) echo $_POST['birthday']; ?>"/>
                    <img src="error.png" title="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $birthdayError; ?>" alt="Erreur sur la date de naissance" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(3,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="country">Pays de naissance : </label>
                    <input type="text" name="country" placeholder="France" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['country'])) echo $country; ?>"/>
                    <img src="error.png" title="Erreur sur le pays" alt="Erreur sur le pays de naissance" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(4,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="nationality">Nationalité : </label>
                    <input type="text" name="nationality" placeholder="française" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nationality'])) echo $nationality; ?>"/>
                    <img src="error.png" title="Erreur sur la nationalité" alt="Erreur sur la nationalité" width="30px" height='30px' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(5,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
            </div>
            <div class="panneau-deroulant-2" id="panneau2">
                <div class="row-title" id="row_title2">
                    <span class="title-panneau">Informations secondaires</span>
                    <img class="arrow-down" id="arrow_down_secondaire" src="arrow_down.jpg" alt="arrow_down"/>
                    <img class="arrow-up" id="arrow_up_secondaire" src="arrow_up.jpg" alt="arrow_up"/>
                </div>
                <div class="row-form">
                    <label for="address">Adresse : </label>
                    <input type="text" name="street" placeholder="N° rue" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['street'])) echo $street; ?>"/>
                    <input type="text" name="city" placeholder="Ville" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['city'])) echo $city; ?>"/>
                    <input type="text" name="postal" placeholder="Code postal" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postal'])) echo $postal; ?>"/>
                    <img src="error.png" title="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $adressError; ?>" width="30px" height='30px' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(6,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="email">Email : </label>
                    <input type="text" name="email" placeholder="léa.vanghzertahlt@google.com" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) echo $email; ?>"/>
                    <img src="error.png" title="Erreur sur l'email" alt="Erreur sur l'email" width="30px" height='30px' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(7,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="tel">Téléphone : </label>
                    <input type="text" name="tel" placeholder="+336 45 37 82 73/0645362739" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tel'])) echo $tel; ?>"/>
                    <img src="error.png" title="Erreur sur le téléphone" alt="Erreur sur le téléphone" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(8,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="degree">Diplôme : </label>
                    <select name="degree">
                        <option value="sans" <?php if(($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['degree'] == 'sans') || !isset($_POST['Monsieur'])) echo 'selected' ?>>sans</option>
                        <option value="BAC+2" <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['degree'] == 'BAC+2') echo 'selected' ?>>BAC+2</option>
                        <option value="BAC+3" <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['degree'] == 'BAC+3') echo 'selected' ?>>BAC+3</option>
                        <option value="BAC+5" <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['degree'] == 'BAC+5') echo 'selected' ?>>BAC+5</option>
                        <option value="Doctorat" <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['degree'] == 'Doctorat') echo 'selected' ?>>Doctorat</option>
                    </select>
                    <img src="error.png" title="Erreur sur le diplôme" alt="Erreur sur le diplôme" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(9,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
            </div>
            <div class="panneau-deroulant-3" id="panneau3">
                <div class="row-title" id="row_title3">
                    <span class="title-panneau">Informations pole emploi et codecademy</span>
                    <img class="arrow-down" id="arrow_down_pecc" src="arrow_down.jpg" alt="arrow_down"/>
                    <img class="arrow-up" id="arrow_up_pecc" src="arrow_up.jpg" alt="arrow_up"/>
                </div>
                <div class="row-form">
                    <label for="poleEmploiNumber">Numéro pôle emploi : </label>
                    <input type="text" name="poleEmploiNumber" placeholder="647382N" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['poleEmploiNumber'])) echo $poleEmploiNumber; ?>"/>
                    <img src="error.png" title="Erreur sur le numéro pole emploi" alt="Erreur sur le numéro pole emploi" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(10,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="badgeCount">Nombre de badge : </label>
                    <input type="text" name="badgeCount" placeholder="0 à 99" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['badgeCount'])) echo $badgeCount; ?>"/>
                    <img src="error.png" title="Erreur sur le nombre de badge" alt="Erreur sur le nombre de badge" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(11,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
                <div class="row-form">
                    <label for="codecademy">Lien codecademy : </label>
                    <input type="text" name="codecademy" placeholder="http://www.codecademy.com" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['codecademy'])) echo $codecademy; ?>"/>
                    <img src="error.png" title="Erreur sur le lien codecademy" alt="Erreur sur le lien codecademy" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(15,$errors)) || empty($errors)) echo 'hidden'; ?>>
                </div>
            </div>
            <div class="panneau-deroulant-4" id="panneau4">
                <div class="row-title" id="row_title4">
                    <span class="title-panneau">Informations particulières</span>
                    <img class="arrow-down" id="arrow_down_area" src="arrow_down.jpg" alt="arrow_down"/>
                    <img class="arrow-up" id="arrow_up_area" src="arrow_up.jpg" alt="arrow_up"/>
                </div>
                <div class="row-form area">
                    <label for="heroes">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ? </label><br/>
                    <div class="area-img">                
                        <textarea rows="2" cols="60" wrap="hard" name="heroes" placeholder="Vous pouvez utiliser plusieurs lignes ainsi que certains caractères spéciaux commes les virgules"><?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['heroes'])) echo $heroes; ?></textarea>
                        <img src="error.png" title="Erreur sur quel héros vous voulez être" alt="Erreur sur quel héros vous voulez être" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(12,$errors)) || empty($errors)) echo 'hidden'; ?>>
                    </div>
                </div>
                <div class="row-form area">
                    <label for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique) </label><br/>
                    <div class="area-img">
                        <textarea rows="2" cols="60" wrap="hard" name="hack" placeholder="Vous pouvez utiliser plusieurs lignes ainsi que certains caractères spéciaux commes les virgules"><?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hack'])) echo $hack; ?></textarea>
                        <img src="error.png" title="Erreur sur vos hacks" alt="Erreur sur vos hacks" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(13,$errors)) || empty($errors)) echo 'hidden'; ?>>
                    </div>
                </div>
                <div class="row-form area">
                    <label for="experience">Avez vous déjà eu une expérience avec la programmation<br/> et/ou l'informatique avant de remplir ce formulaire ? </label><br/>
                    <div class="area-img">
                        <textarea rows="2" cols="60" wrap="hard" name="experience" placeholder="Vous pouvez utiliser plusieurs lignes ainsi que certains caractères spéciaux commes les virgules"><?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['experience'])) echo $experience; ?></textarea>
                        <img src="error.png" title="Erreur sur vos expériences" alt="Erreur sur vos expériences" width="30" height='30' <?php if(($_SERVER["REQUEST_METHOD"] == "POST" && !in_array(14,$errors)) || empty($errors)) echo 'hidden'; ?>>
                    </div>
                </div>
            </div>
            <button class="submit" type="submit">Envoyer</button>
        </form>
        <script src="form.js"></script>
    </body>
</html>