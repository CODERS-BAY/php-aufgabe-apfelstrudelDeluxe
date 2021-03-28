# php_aufgabe

# Erstelle eine Webseite + Datenbank für eine Firma wo sich Mitarbeiter einloggen können
DB angelegt
Teams, Rollen und User angelegt und befüllt

Lösung mit Session id: Wenn nicht eingeloggt, dann login.php, ansonsten index.php

Login mit eMail und PW

# Mitarbeiter haben einen Usernamen, einen Vor und Nachnamen, Rechte, ein Bild, ein Team und eine Email Adresse
ok

# Rechte: Admin, Teamleiter oder Mitarbeiter
ok

# Mitarbeiter können ihr eigenes Profil updaten
PROBLEM --> Upload vom Bild nicht möglich. Es werden alle Mitarbeiter angezeigt. Es scheint, als ob die Selektion fehlerhaft/verkehrt ist.

# Teamleiter darf zusätzlich Mitarbeiter aus seinem Team herausnehmen oder bestehende Mitarbeiter in seine Gruppe hinzufügen (ein Mitarbeiter kann immer nur in einem Team sein)
PROBLEM teamEdit.php --> Ich schaffe es nicht, dass mir als Admin alle Teams und als Teamlead alle Teammitglieder angezeigt werden. Select-Fehler?

PROBLEM adminEdit.php --> Ich schaffe es nicht, dass alle Mitarbeiter angezeigt werden. Meine Update-Query (mehrere Felder) führt zu Verbindungsfehler.
Wie kann ich Änderungen bei mehreren Mitarbeitern gleichzeitig durchführen?

# Überlege dir einen Teamnamen und gestalte die Webseite (Farben / Hintergrund) je nach Team
ok

# Admin darf alle Mitarbeiter löschen, verändern und neue Mitarbeiter anlegen
PROBLEM - Anzeige aller Mitarbeiter und löschen
Bei der Anlage eines neuen Mtarbeiters fehlt die Validierung (erst absenden, wenn Pflichfeld ausgefüllt)

# Löscht ein Admin einen Mitarbeiter, so wird dieser per Mail darüber informiert

# Wenn man angemeldet ist sieht man

# Seinen Namen, sein Bild und den Profiländerungsbutton
ok

# Man kann sich ausloggen
ok --> ***Probleme*** mit Session ID im Header...

# Auf der Startseite sieht man zusätzlich in welchem Team man sich befindet.
Um die Daten der Session zu verwenden muss man auf jeder Seite session_start(); ergänzen!

# Alle Änderungen (außer beim Login nicht zwingend) werden mit Ajax realisiert, damit der User immer auf einer Seite bleibt
PROBLEM

# Team intern können Nachrichten versendet werden

# Diese scheinen dann auf der Startseite auf

# Nur der Teamleiter hat die Möglichkeit diese Nachrichten auch zu löschen