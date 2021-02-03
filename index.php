<?php
include('../../navbar.php');

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
$degreeArray = ['sans','BAC+2','BAC+3','BAC+5','Doctorat'];
$errors = array();
$formSend = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $formSend = true;
    //Vérification nom
    if(isset($_POST['lastname'])) {
        $lastname = validData($_POST['lastname']);
        if(!regexString($lastname)) array_push($errors,1);
    }
    //Vérification prénom
    if(isset($_POST['firstname'])) {
        $firstname = validData($_POST['firstname']);
        if(!regexString($firstname)) array_push($errors,2);
    }
    //Vérification date de naissance
    if(isset($_POST['birthday'])) {
        $birthdayError = "";
        if(empty($_POST['birthday'])) {
            array_push($errors,3);
            $birthdayError = "Date de naissance non renseignée";
        }
        $birthday = validData($_POST['birthday']);
        $birthday = transformDate($birthday);
        $birthdayYear = substr($birthday,6);
        $limitYear = date('Y',mktime(0,0,0,date('m'),date('d'),date('y')-15));
        if($limitYear < $birthdayYear) {
            array_push($errors,3);//On ne peut s'inscrire qu'à 15 ans
            $birthdayError = "Vous n'avez pas 15 ans";
        }
        if(!preg_match('/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/',$birthday)) {
            array_push($errors,3);
            $birthdayError = "Erreur sur la date de naissance";
        }
    }
     //Vérification pays de naissance
    if(isset($_POST['country'])) {
        $country = validData($_POST['country']);
        if(!regexString($country) || !in_array($country,$countries)) array_push($errors,4);
    }
    //Vérification nationalité
    if(isset($_POST['nationality'])) {
        $nationality = validData($_POST['nationality']);
        if(!regexString($nationality)) array_push($errors,5);
    }
    //Vérification Adresse
        $adressError = "";
        //Vérification ville
        if(isset($_POST['city'])) {
            $city = validData($_POST['city']);
            if(!regexString($city)) {
                array_push($errors,6);
                $adressError = "Erreur sur la ville";
            }
        }
        //Vérification code postal
        if(isset($_POST['postal'])) {
            $postal = validData($_POST['postal']);
            if(!preg_match('/^[0-9]{5}$/',$postal)) {
                array_push($errors,6);
                $adressError = "Erreur sur le code postal";
            }
        }
        //Vérification rue
        if(isset($_POST['street'])) {
            $street = validData($_POST['street']);
            if(!regexStreet($street)) {
                array_push($errors,6);
                $adressError = "Erreur sur la rue";
            }
        }
        if(!empty($street) && !empty($city) && !empty($postal)) {
            if(!existAddress($street,$city,$postal)) {
                array_push($errors,6);
                $adressError = "Cette adresse n'existe pas";
            }
        }
    //Vérification email
    if(isset($_POST['email'])) {
        $email = validData($_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) array_push($errors,7);
    }
    //Vérification téléphone
    if(isset($_POST['tel'])) {
        $tel = validData($_POST['tel']);
        if(!preg_match('/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/',$tel)) array_push($errors,8);
    }
    //Vérification diplôme
    if(isset($_POST['degree'])) {
        $degree = validData($_POST['degree']);
        if(!in_array($degree,$degreeArray)) array_push($errors,9);
    }
    //Vérification numéro pole emploi
    if(isset($_POST['poleEmploiNumber'])) {
        $poleEmploiNumber = validData($_POST['poleEmploiNumber']);
        if(!preg_match('/^([0-9]{6})([A-Z]{1})$/',$poleEmploiNumber)) array_push($errors,10);
    }
    //Vérification nombre de badge
    if(isset($_POST['badgeCount'])) {
        $badgeCount = validData($_POST['badgeCount']);
        if(!preg_match('/^[0-9]{1,2}$/',$badgeCount)) array_push($errors,11);
    }
    //Vérification codecademy
    if(isset($_POST['codecademy'])) {
        $codecademy = validData($_POST['codecademy']);
        //On vérifie si le lien est bien un URL
        if(!filter_var($codecademy,FILTER_VALIDATE_URL)) array_push($errors,15);
        //On vérifie si le nom de domaine est bien celui de codecademy
        $hostname = parse_url($codecademy,PHP_URL_HOST);
        $hostParts = explode('.',$hostname);
        $numberParts = count($hostParts);
        if($numberParts === 1) $domain = current($hostParts);
        else if($numberParts >= 2) {
            $hostParts = array_reverse($hostParts);
            $domain = $hostParts[1].'.'.$hostParts[0];
        }
        if($domain != 'codecademy.com') array_push($errors,15);
    }
    //Vérification héros
    if(isset($_POST['heroes'])) {
        $heroes = validData($_POST['heroes']);
        if(!regexTextarea($heroes)) array_push($errors,12);
        else $heroes = nl2br($heroes);
    }
    //Vérification hack
    if(isset($_POST['hack'])) {
        $hack = validData($_POST['hack']);
        if(!regexTextarea($hack)) array_push($errors,13);
        else $hack = nl2br($hack);
    }
    //Vérification de l'expérience
    if(isset($_POST['experience'])) {
        $experience = validData($_POST['experience']);
        if(!regexTextarea($experience)) array_push($errors,14);
        else $experience = nl2br($experience);
    }
}

include('form.php');

function existAddress($street,$city,$postal) {
    $tabCity = array();
    $tabPostal = array();

    //On remplace les espaces par des + car l'URL prend en parametre : q=12+bd+du+port 
    $paramURL = str_replace(' ','+',$street);
    $URL = 'https://api-adresse.data.gouv.fr/search/?q='.$paramURL; //On appel l'api
    $json = file_get_contents($URL); //On analyse le json
    $array = json_decode($json,true); //On transforme le json en array
    foreach($array['features'] as $elem) {
        array_push($tabPostal,$elem['properties']['postcode']);//On récupère uniquement le code postal
    }
    foreach($tabPostal as $postcode){//Pour chaque code postal
        $URL = 'https://apicarto.ign.fr/api/codes-postaux/communes/'.$postcode;//On appelle l'api des codes postaux
        $json = file_get_contents($URL);
        $array = json_decode($json,true);
        foreach($array as $elem) {//Pour chaque commune trouvée
            array_push($tabCity,$elem['nomCommune']);//On récupère le nom de la commune
        }
    }
    if(in_array($city,$tabCity,true) && in_array($postal,$tabPostal,true)) {
        return true;
    }
    else {
        return false;
    }
}

function regexString($string) {
    return preg_match('/^([a-zA-ZàáâäæçéèêëîïôœùûüÿÀÂÄÆÇÉÈÊËÎÏÖÔŒÙÛÜŸ \-\']+)$/',$string);
}

function regexTextarea($textarea) {
    return preg_match('/^([0-9a-zA-ZàáâäæçéèêëîïôœùûüÿÀÂÄÆÇÉÈÊËÎÏÖÔŒÙÛÜŸ \-\'\n\.\!\"\,\-]+)$/',$textarea);
}

function regexStreet($street) {
    return preg_match('/^([0-9a-zA-ZàáâäæçéèêëîïôœùûüÿÀÂÄÆÇÉÈÊËÎÏÖÔŒÙÛÜŸ \-\'\/\.\,]+)$/',$street);
}

function transformDate($date) {
    return date('d/m/Y',strtotime($date));
}

function validData($data) {
    $data = trim($data); //Supprime les espaces en début et fin de chaine
    $data = stripcslashes($data);//Supprime les antislash d'une chaine
    $data = htmlspecialchars($data);//Convertit les caractères spéciaux
    return $data;
}
?>