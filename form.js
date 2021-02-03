var formSend = document.getElementById('1');

//Panneau 1
var arrow_down_identite = document.getElementById('arrow_down_identite');
var arrow_up_identite = document.getElementById('arrow_up_identite');
var panneau1 = document.getElementById('panneau1');
var panneau1Hidden = panneau1.getElementsByClassName('row-form');
arrow_up_identite.style.display = "none";
var row_title1 = document.getElementById('row_title1');
var down1 = true;
panneau1.style.border = "solid black 2px";
panneau1.style.borderBottom = "none";

row_title1.onclick = function() {
    if (down1) {
        down1 = false;
        arrow_up_identite.style.display = "block";
        arrow_down_identite.style.display = "none";
        for(var i = 0 ; i < panneau1Hidden.length ; i++) {
            panneau1Hidden[i].style.display = "none";
        }
        panneau1.style.height = "50px";
        panneau1.style.border = "none";
        row_title1.style.border = "solid black 2px";
        row_title1.style.borderBottom = "none";
    }
    else {
        down1 = true;
        arrow_up_identite.style.display = "none";
        arrow_down_identite.style.display = "block";
        for(var i = 0 ; i < panneau1Hidden.length ; i++) {
            panneau1Hidden[i].style.display = "block";
        }
        panneau1.style.height = "280px";
        panneau1.style.border = "solid black 2px";
        panneau1.style.borderBottom = "none";
        row_title1.style.border = "none";
    }
}


//Panneau 2
var arrow_down_secondaire = document.getElementById('arrow_down_secondaire');
var arrow_up_secondaire = document.getElementById('arrow_up_secondaire');
var panneau2 = document.getElementById('panneau2');
var panneau2Hidden = panneau2.getElementsByClassName('row-form');
var row_title2 = document.getElementById('row_title2');
if (formSend == null) {
    arrow_down_secondaire.style.display = "none";
    for(var i = 0 ; i < panneau2Hidden.length ; i++) {
        panneau2Hidden[i].style.display = "none";
    }
    panneau2.style.height = "50px";
    panneau2.style.border = "none";
    row_title2.style.border = "solid black 2px";
    row_title2.style.borderBottom = "none";
    var down2 = false;
}
else {
    var down2 = true;
    panneau2.style.border = "solid black 2px";
    panneau2.style.borderBottom = "none";
    panneau2.style.height = "240px";
    arrow_up_secondaire.style.display = "none";
}


row_title2.onclick = function() {
    if (down2) {
        down2 = false;
        arrow_up_secondaire.style.display = "block";
        arrow_down_secondaire.style.display = "none";
        for(var i = 0 ; i < panneau2Hidden.length ; i++) {
            panneau2Hidden[i].style.display = "none";
        }
        panneau2.style.height = "50px";
        panneau2.style.border = "none";
        row_title2.style.border = "solid black 2px";
        row_title2.style.borderBottom = "none";
    }
    else {
        down2 = true;
        arrow_up_secondaire.style.display = "none";
        arrow_down_secondaire.style.display = "block";
        for(var i = 0 ; i < panneau2Hidden.length ; i++) {
            panneau2Hidden[i].style.display = "block";
        }
        panneau2.style.height = "240px";
        panneau2.style.border = "solid black 2px";
        panneau2.style.borderBottom = "none";
        row_title2.style.border = "none";
    }
}

//Panneau 3
var arrow_down_pecc = document.getElementById('arrow_down_pecc');
var arrow_up_pecc = document.getElementById('arrow_up_pecc');
var panneau3 = document.getElementById('panneau3');
var panneau3Hidden = panneau3.getElementsByClassName('row-form');
var row_title3 = document.getElementById('row_title3');

if (formSend == null) {
    arrow_down_pecc.style.display = "none";
    for(var i = 0 ; i < panneau3Hidden.length ; i++) {
        panneau3Hidden[i].style.display = "none";
    }
    panneau3.style.height = "50px";
    panneau3.style.border = "none";
    row_title3.style.border = "solid black 2px";
    row_title3.style.borderBottom = "none";
    var down3 = false;
}
else {
    var down3 = true;
    panneau3.style.border = "solid black 2px";
    panneau3.style.borderBottom = "none";
    panneau3.style.height = "200px";
    arrow_up_pecc.style.display = "none";
}

row_title3.onclick = function() {
    if (down3) {
        down3 = false;
        arrow_up_pecc.style.display = "block";
        arrow_down_pecc.style.display = "none";
        for(var i = 0 ; i < panneau3Hidden.length ; i++) {
            panneau3Hidden[i].style.display = "none";
        }
        panneau3.style.height = "50px";
        panneau3.style.border = "none";
        row_title3.style.border = "solid black 2px";
        row_title3.style.borderBottom = "none";
    }
    else {
        down3 = true;
        arrow_up_pecc.style.display = "none";
        arrow_down_pecc.style.display = "block";
        for(var i = 0 ; i < panneau3Hidden.length ; i++) {
            panneau3Hidden[i].style.display = "block";
        }
        panneau3.style.height = "200px";
        panneau3.style.border = "solid black 2px";
        panneau3.style.borderBottom = "none";
        row_title3.style.border = "none";
    }
}

//Panneau 4
var arrow_down_area = document.getElementById('arrow_down_area');
var arrow_up_area = document.getElementById('arrow_up_area');
var panneau4 = document.getElementById('panneau4');
var panneau4Hidden = panneau4.getElementsByClassName('row-form');
var row_title4 = document.getElementById('row_title4');

if (formSend == null) {
    arrow_down_area.style.display = "none";
    for(var i = 0 ; i < panneau4Hidden.length ; i++) {
        panneau4Hidden[i].style.display = "none";
    }
    panneau4.style.height = "54px";
    panneau4.style.border = "none";
    row_title4.style.border = "solid black 2px";
    var down4 = false;
}
else {
    var down4 = true;
    panneau4.style.border = "solid black 2px";
    panneau4.style.height = "410px";
    arrow_up_area.style.display = "none";
}

row_title4.onclick = function() {
    if (down4) {
        down4 = false;
        arrow_up_area.style.display = "block";
        arrow_down_area.style.display = "none";
        for(var i = 0 ; i < panneau4Hidden.length ; i++) {
            panneau4Hidden[i].style.display = "none";
        }
        panneau4.style.height = "54px";
        panneau4.style.border = "none";
        row_title4.style.border = "solid black 2px";
    }
    else {
        down4 = true;
        arrow_up_area.style.display = "none";
        arrow_down_area.style.display = "block";
        for(var i = 0 ; i < panneau4Hidden.length ; i++) {
            panneau4Hidden[i].style.display = "block";
        }
        panneau4.style.height = "410px";
        panneau4.style.border = "solid black 2px";
        row_title4.style.border = "none";
    }
}