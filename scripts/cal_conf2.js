
//Define calendar(s): addCalendar ("Unique Calendar Name", "Window title", "Form element's name", Form name")
addCalendar("Calendar1", "Select Date", "firstinput", "sampleform");
addCalendar("Calendar2", "Select Date", "secondinput", "sampleform2");

// default settings for English
// Uncomment desired lines and modify its values
setFont("verdana", 25);
setWidth(900, 2, 150, 3);
// setColor("#cccccc", "#cccccc", "#ffffff", "#ffffff", "#333333", "#cccccc", "#333333");
// setFontColor("#333333", "#333333", "#333333", "#ffffff", "#333333");
setFormat("dd/mm/yyyy");
setSize(400, 400, -200, 16);

setWeekDay(1);
setMonthNames("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
setDayNames("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
setLinkNames("[Fermer]", "[Effacer]");
