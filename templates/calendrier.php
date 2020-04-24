<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}
?>

<div class="page-content">

<div id=calendrier>
<form name="sampleform">
<a href="javascript:showCal('Calendar1')"><input type="text" name="firstinput" id="textcalendrie" size=20 placeholder="Selectionner une date"></a>
<input type="button"  value="Selectionner" id="but_calendrier"/>


<input type="button"  value="Modifier" id="but_calendrier_modifier"/>
</form>
</div>

<div>

<font id=horaire_calendrier size=1>
<p class=horaire_calendrier_p>08h00</p>
<p class=horaire_calendrier_p>08h30</p>
<p class=horaire_calendrier_p>09h00</p>
<p class=horaire_calendrier_p>09h30</p>
<p class=horaire_calendrier_p>10h00</p>
<p class=horaire_calendrier_p>10h30</p>
<p class=horaire_calendrier_p>11h00</p>
<p class=horaire_calendrier_p>11h30</p>
<p class=horaire_calendrier_p>12h00</p>
<p class=horaire_calendrier_p>12h30</p>
<p class=horaire_calendrier_p>13h00</p>
<p class=horaire_calendrier_p>13h30</p>
<p class=horaire_calendrier_p>14h00</p>
<p class=horaire_calendrier_p>14h30</p>
<p class=horaire_calendrier_p>15h00</p>
<p class=horaire_calendrier_p>15h30</p>
<p class=horaire_calendrier_p>16h00</p>
<p class=horaire_calendrier_p>16h30</p>
<p class=horaire_calendrier_p>17h00</p>
<p class=horaire_calendrier_p>17h30</p>
<p class=horaire_calendrier_p>18h00</p>
<p class=horaire_calendrier_p>18h30</p>
<p class=horaire_calendrier_p>19h00</p>
<p class=horaire_calendrier_p>19h30</p>
<p class=horaire_calendrier_p>20h00</p>
<p class=horaire_calendrier_p>20h30</p>
</font>



<div id="Grille_horaire_calendrier">
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire"></div>
<div class="Grille_horaire" style="border-bottom:1px solid #848484;"></div>
</div>



<div id="demander_RDV">
<p>Prise de rendez-vous.</p>
<p>Jour :</p>
<p>Horaire :</p>
<input type="button"  value="Selectionner" id="but_demander_RDV"/>
</div>

<div id="modifier_RDV">
<form name="sampleform2">
<a href="javascript:showCal('Calendar2')"><input type="text" name="secondinput" id="textcalendrie_modifier" size=20 placeholder="Selectionner une date"></a>
</form>
<select id="select_heure_depart">
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
</select>
h
<select id="select_minute_depart">
    <option>00</option>
    <option>05</option>
    <option>10</option>
    <option>15</option>
    <option>20</option>
    <option>25</option>
    <option>30</option>
    <option>35</option>
    <option>40</option>
    <option>45</option>
    <option>50</option>
    <option>55</option>
</select>
<br>
<select id="select_heure_fin">
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
</select>
h
<select id="select_minute_fin">
    <option>00</option>
    <option>05</option>
    <option>10</option>
    <option>15</option>
    <option>20</option>
    <option>25</option>
    <option>30</option>
    <option>35</option>
    <option>40</option>
    <option>45</option>
    <option>50</option>
    <option>55</option>
</select>
<br>	
<input type="button"  value="Valider" id="but_creer_RDV"/>
</div>

</div>

</div>































