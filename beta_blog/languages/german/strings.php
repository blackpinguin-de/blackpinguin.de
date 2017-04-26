<?php
  // German Language File
  // (c) 2007 www.datenritter.de

  // Simple PHP Version: 0.5.0
  // Language Version:   0.5.0.1

  function sb_language( $page ) {
    global $language, $html_charset, $php_charset, $lang_string;

    // Language: German
    $lang_string['language'] = 'german';
    $lang_string['locale'] = array('de_DE', 'de');
    $lang_string['rss_locale'] = 'de-DE'; // New 0.4.8

    // ISO Charset: ISO-8859-1
    $lang_string['html_charset'] = 'ISO-8859-1';
    $lang_string['php_charset'] = 'ISO-8859-1';
    setlocale( LC_TIME, $lang_string['locale'] );

    // Global Strings

    // Menu
    $lang_string['menu_links'] = "Links";
    $lang_string['menu_home'] = "Startseite";
    $lang_string['menu_contact'] = "Kontakt";
    $lang_string['menu_stats'] = "Statistik";
    $lang_string['menu_calendar'] = "Kalender"; // New for 0.4.8
    $lang_string['menu_archive'] = "Archiv";
    $lang_string['menu_viewarchives'] = "Archiv ansehen"; // evtl. nur "Archiv"
    $lang_string['menu_menu'] = "Men&uuml;";
    $lang_string['menu_add'] = "Eintrag hinzuf&uuml;gen"; // neuer Eintrag ?
    $lang_string['menu_add_static'] = "Statische Seite anlegen";
    $lang_string['menu_upload'] = "Bild hochladen";
    $lang_string['menu_setup'] = "Einstellungen";
    $lang_string['menu_categories'] = "Kategorien";
    $lang_string['menu_info'] = "Metadaten";      // war: "Meta-Tags"
    $lang_string['manage_users'] = "Benutzer verwalten";
    $lang_string['menu_options'] = "Datum &amp; Zeit";
    $lang_string['menu_themes'] = "Oberfl&auml;che";    // "Skin" und "Theme" sind Fachbegriffe, aber "Oberfl?che" geht.
    $lang_string['menu_colors'] = "Farben";
    $lang_string['menu_change_login'] = "Login &auml;ndern";  // Login = un?bersetzbares nominatives Verb
    $lang_string['menu_logout'] = "Ausloggen";      // "Abmelden" geht auch, ist aber nicht ganz so eindeutig.
    $lang_string['menu_login'] = "Einloggen";     // dito f?r "Anmelden"
    $lang_string['menu_most_recent'] = "Neueste Kommentare";
    $lang_string['menu_most_recent_entries'] = "Neueste Eintr&auml;ge";
    $lang_string['menu_most_recent_trackback'] = "Neueste Trackbacks";  // Fachbegriff
    $lang_string['menu_add_block'] = "Bl&ouml;cke";
    $lang_string['menu_emoticons'] = "Smileys";     // "Smiley" is more common than "Emoticons" in German
    $lang_string['menu_avatar'] = "Avatarbildchen";     // war: "Avatar", Pr?zisierung
    $lang_string['menu_moderation'] = "Wort- und IP-Moderation"; // New for 0.4.9
    $lang_string['menu_commentmoderation'] = "Unmoderierte Kommentare"; // New for 0.5.0
    $lang_string['notice_moderator1'] = "Es warten noch ";
    $lang_string['notice_moderator2'] = " Kommentar(e) auf Ihre Best&auml;tigung.";
    $lang_string['notice_loggedin'] = "Sie sind eingeloggt.";

    // Counter
    $lang_string['counter_today'] = "Heute:"; // New for 0.4.8
    $lang_string['counter_yesterday'] = "Gestern:"; // New for 0.4.8
    $lang_string['counter_totalsidebar'] = "Insgesamt:"; // New for 0.4.8
    $lang_string['counter_title'] = "Besucherz&auml;hler";    // ?hm...? war: "Counter Totals"

    // Other
    $lang_string['home'] = 'Zur&uuml;ck zur Startseite';          // war: 'Return to Home'
    $lang_string['nav_next'] = 'Weiter';
    $lang_string['nav_back'] = 'Zur&uuml;ck';
    $lang_string['search_title'] = 'Suche';
    $lang_string['search_go'] = 'suchen';       // oder "los" ?
    $lang_string['page_generated_in'] = 'Seite generiert in %s Sekunden';
    $lang_string['counter_total'] = 'Sitebesuche: ';      // war: 'Site Views: '
    $lang_string['read_more'] = 'Mehr...'; // New in 0.4.8

    // SB Functions
    $lang_string['sb_months'] = array( 'Januar', 'Februar', 'M&auml;rz', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' );
    $lang_string['sb_default_title'] = 'Kein Titel';
    $lang_string['sb_default_author'] = 'Kein Autor';
    $lang_string['sb_default_footer'] = 'Keine Fu&szlig;zeile';

    $lang_string['sb_edit'] = 'editieren';
    $lang_string['sb_delete'] = 'l&ouml;schen';
    $lang_string['sb_permalink'] = 'Permanentlink';
    $lang_string['sb_trackback'] = 'Trackbacks';
    $lang_string['sb_postedby'] = 'Geschrieben von'; // 0.5.0
    $lang_string['sb_admin'] = 'Administrator'; // 0.5.0
    $lang_string['sb_relatedlink'] = '&auml;hnliche Links';         // schwierig: related = ?hnlich, verwandt; related to = bezogen auf

    $lang_string['sb_add_comment_btn'] = 'kommentieren';
    $lang_string['sb_read_entry_btn'] = 'Eintrag ansehen'; // 0.5.0
    $lang_string['sb_comment_btn_number_first'] = true;
    $lang_string['sb_comment_btn'] = 'Kommentar';        // war: 'comment'
    $lang_string['sb_comment_view'] = 'Kommentar ansehen'; // 0.5.0   // ???
    $lang_string['sb_comments_plural_btn_number_first'] = true;
    $lang_string['sb_comments_plural_btn'] = 'Kommentare';
    $lang_string['sb_comments_plural_view'] = 'views';        // ??? plural?

    // ( 1 view )
    $lang_string['sb_view_counter_pre'] = '';
    $lang_string['sb_view_counter_post'] = ' mal gelelsen.';        // war: "view" - mal im Kontext ansehen

    // ( 2 views )
    $lang_string['sb_view_counter_plural_pre'] = '';
    $lang_string['sb_view_counter_plural_post'] = ' mal gelesen.';      // war: "views"

    $lang_string['sb_add_link_btn'] = '+ Link';
    $lang_string['sb_rate_entry_btn'] = 'Eintrag bewerten';

    // Entry Text Editor
    if ( $page == 'add' || $page == 'add_static' || $page == 'comments' || $page == 'add_block' ) {   // should be left, right?
      $lang_string['label_subject'] = "Betreff:";
      $lang_string['label_insert'] = "spezielles Einf&uuml;gen:";   // war: "Insert Special"
      $lang_string['btn_bold'] = " b ";
      $lang_string['btn_italic'] = " i ";
      $lang_string['btn_image'] = "img";
      $lang_string['btn_url'] = "url";
      $lang_string['btn_readmore'] = "mehr lesen";        // war: "read more"
      $lang_string['view_images'] = "hochgeladene Bilder ansehen";
      $lang_string['label_entry'] = "Eintrag:";
      $lang_string['btn_preview'] = "&nbsp;Vorschau&nbsp;";
      $lang_string['btn_post'] = "&nbsp;Abschicken&nbsp;";
      $lang_string['chk_visiblemenu'] = "Sichtbar (im Men&uuml; anzeigen)";
      $lang_string['file_name'] = "Statischer Dateiname: (Keine Leerzeichen, keine Dateiendung!)";

      // Javascript Strings
      $lang_string['insert_styles'] = "Zu formatierenden Text eingeben:";
      $lang_string['insert_image'] = "Bild-URL eingeben:";
      $lang_string['insert_url1'] = "Text welcher f&uuml;r den Link angezeigt werden soll eingeben (optional):";
      $lang_string['insert_url2'] = "Volle URL f&uuml;r den Link eingeben:";
      $lang_string['insert_url3'] = "Link in neuem Fenster &ouml;ffnen (optional):";
      $lang_string['form_error'] = "Bitte füllen Sie Betreff und Text aus.";

      // More Javascript Strings
      $lang_string['insert_image_optional'] = 'Optional:';
      $lang_string['insert_image_width'] = 'Breite (optional):';
      $lang_string['insert_image_height'] = 'H&ouml;he (optional):';
      $lang_string['insert_image_popup'] = 'Bei Mausklick volle Gr&ouml;&szlig;e in Pop-Up-Fenster anzeigen (optional):'; // This is as ambigious as the english text was. What is to be turned on or off here? The full-sized view or just the pop-up?
      $lang_string['insert_image_float'] = 'Float (optional):';     // Textfluss? Umflie?en?

      $lang_string['day'] = 'Tag';
      $lang_string['month'] = 'Monat';
      $lang_string['year'] = 'Jahr';
      $lang_string['hour'] = 'Stunde';
      $lang_string['minute'] = 'Minute';
      $lang_string['second'] = 'Sekunde';
    }

    switch ($page) {
      case 'add':
        // Add Entry
        $lang_string['title'] = "Eintrag hinzuf&uuml;gen";
        $lang_string['instructions'] = "Bereit zum Bloggen? F&uuml;llen Sie das Formular unten aus und dr&uuml;cken Sie 'Vorschau' um zu sehen, wie Ihr Eintrag aussehen wird oder 'Abschicken' um den Eintrag zu speichern.";
        $lang_string['title_ad'] = "Trackback-Pings best&auml;tigen";   // Fachbegriff
        $lang_string['instructions_ad'] = "Dies sind die automatisch erkannten URIs, welche Sie pingen werden. Wenn Sie eine bestimte URI nicht pingen wollen, entfernen Sie unten das H&auml;ckchen. Dr&uuml;cken Sie dann den 'OK'-Button um die markierten URIs zu pingen oder 'Abbrechen' um &uuml;berhaupt nicht zu pingen.";
        $lang_string['label_tb_ping'] = "Zu sendende Ping(s) (durch Kommata getrennt)";
        $lang_string['label_tb_autodiscovery'] = "Autodiscovery";
        $lang_string['label_relatedlink'] = "&Auml;hnliche Links";     // da ist es wieder, das "related" :(
        $lang_string['label_categories'] = "Kategorien";

        // Preview / Edit Entry
        $lang_string['title_preview'] = "Vorschau / Eintrag editieren";
        $lang_string['instructions_preview'] = "Dies ist eine Vorschau des Eintrags. Wenn Sie Hervorhebungen verwendet oder Bilder eingebunden haben, vergessen Sie nicht, alle Tags zu schlie&szlig;en!";
        $lang_string['title_update'] = "Eintrag aktualisieren";
        $lang_string['instructions_update'] = "Sie k&ouml;nnen den Eintrag im Formular unten ver&auml;ndern. Dr&uuml;cken Sie 'Vorschau' oder 'Abschicken' wenn Sie fertig sind.";
        $lang_string['ok_btn'] = "&nbsp;OK&nbsp;";
        $lang_string['cancel_btn'] = "&nbsp;Abbrechen&nbsp;";

        // Error Response
        $lang_string['error'] = "<h2>Hoppla!</h2> Es gab ein Problem, und der Eintrag konnte nicht gespeichert werden.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Eintrag gespeichert!</h2> Ihr Eintrag wurde gespeichert."; // 0.4.8.1
        break;

      case 'add_static':
        // Add Entry
        $lang_string['title'] = "Statische Seite anlegen";
        $lang_string['instructions'] = "Um eine statische Seite anzulegen, f&uuml;llen Sie das nachfolgende Formular aus. Im Gegensatz zu einem normalen Blog-Eintrag erscheinen statische Seiten im Links-Men&uuml;. Statische Seiten sind f&uuml;r Inhalte gedacht, die immer verf&uuml;gbar sein sollen, so wie: &Uuml;ber mich, Kontakt, Zeitplan, etc. Dr&uuml;cken Sie auf 'Vorschau' um zu sehen, wie die statische Seite aussehen wird, oder 'Abschicken' um sie zu speichern.";

        // Preview / Edit Entry
        $lang_string['title_preview'] = "Vorschau / statische Seite editieren";
        $lang_string['instructions_preview'] = "Dies ist eine Vorschau der statischen Seite. Wenn Sie Hervorhebungen verwendet oder Bilder eingebunden haben, vergessen Sie nicht, alle Tags zu schlie&szlig;en!";
        $lang_string['title_update'] = "Statische Seite aktualisieren";
        $lang_string['instructions_update'] = "Sie k&ouml;nnen den Eintrag im Formular unten ver&auml;ndern. Dr&uuml;cken Sie 'Vorschau' oder 'Abschicken' wenn Sie fertig sind.";
        $lang_string['form_error'] = "Bitte füllen sie Betreff, Text und Dateiname aus.";

        // Error Response
        $lang_string['error'] = "<h2>Hoppla!</h2> Es gab ein Problem, und die Seite konnte nicht gespeichert werden.<br /><br />Der Server meldet:<br />";
        break;

      case 'add_block':
        // Add / Manage Blocks
        $lang_string['title'] = "Bl&ouml;cke verwalten";
        $lang_string['instructions'] = "Im Formular unten k&ouml;nnen Sie eigene 'Bl&ouml;cke' eintragen. Diese erscheinen dann in der seitlichen Men&uuml;leiste.";
        $lang_string['up'] = "hoch";
        $lang_string['down'] = "runter";
        $lang_string['edit'] = "editieren";
        $lang_string['delete'] = "l&ouml;schen";
        $lang_string['block_name'] = "Name des Blocks:";
        $lang_string['block_content'] = "Inhalt des Blocks:";
        $lang_string['instructions_edit'] = "Sie editieren gerade einen Block.";
        $lang_string['instructions_modify'] = "Benutzen Sie das Formular, um eigene Bl&ouml;cke anzulegen oder zu modifizieren. Die Bl&ouml;cke erscheinen in der seitlichen Men&uuml;leiste.";
        $lang_string['submit_btn_edit'] = "Block editieren";
        $lang_string['submit_btn_add'] = "Block hinzuf&uuml;gen";
        $lang_string['form_error'] = "Bitte den Namen des Blocks eingeben!";
        break;

      case 'add_link':
        $lang_string['static_pages'] = "Statische Seiten:";

        // Add / Manage Links
        $lang_string['title'] = "Links verwalten";
        $lang_string['instructions'] = "Hier k&ouml;nnen Sie eigene Links zu anderen Webseiten hinzuf&uuml;gen. F&uuml;llen Sie das Formular aus und klicken Sie auf 'Link hinzuf&uuml;gen'. Dr&uuml;cken Sie die Hoch- oder Runter-Buttons, um die Reihenfolge der Links zu ver&auml;ndern. D&uuml;cken Sie 'editieren', um einen Link zu ver&auml;ndern. Um einen Link zu entfernen dr&uuml;cken sie 'l&ouml;schen'.";
        $lang_string['up'] = "hoch";
        $lang_string['down'] = "runter";
        $lang_string['edit'] = "editieren";
        $lang_string['delete'] = "l&ouml;schen";
        $lang_string['link_name'] = "Link-Titel:";
        $lang_string['link_url'] = "URL: (Leer lassen, um einen Trenner einzuf&uuml;gen.)";
        $lang_string['instructions_edit'] = "Sie editieren gerade einen Link:";
        $lang_string['instructions_modify'] = "Klicken Sie unten um einen Link zu ver&auml;ndern:";
        $lang_string['submit_btn_edit'] = "Link editieren";
        $lang_string['submit_btn_add'] = "Link hinzuf&uuml;gen";
        $lang_string['form_error'] = "Bitte tragen Sie den Namen des Links ein.";
        break;

      case 'categories':

        // Add / Manage Links
        $lang_string['title'] = "Kategorien verwalten";
        $lang_string['instructions'] = "Im Formular unten k&ouml;nnen Sie Kategorien hinzuf&uuml;gen und editieren. Jeder Kategorieeintrag sollte die Form 'Kategoeriename (ID-Nummer)' haben. Um eine Hierarchie zu erzeugen, r&uuml;cken sie die Eintr&auml;ge mit Leerzeichen ein.<br /><br /><b>Beispiel:</b><br />Allgemeines (1)<br />News (3)<br />&nbsp;&nbsp;Ank&uuml;ndigungen (6)<br />&nbsp;&nbsp;Ereignisse (5)<br />&nbsp;&nbsp;&nbsp;&nbsp;Verschiedenes (7)<br />Technik (2)<br />";
        $lang_string['error'] = "Fehler";
        $lang_string['current_categories'] = "Aktuelle Kategorien";
        $lang_string['no_categories_found'] = "Keine Kategorien gefunden";
        $lang_string['category_list'] = "Kategorieliste:";
        $lang_string['validate'] = "validieren";
        $lang_string['submit_btn'] = "&nbsp;Abschicken&nbsp;";
        break;

      case 'colors':
        // Change Colors
        $lang_string['title'] = "Farben ver&auml;ndern";
        $lang_string['instructions'] = "Sie k&ouml;nnen die Text- und Hintergrundfarben Ihres Blogs beliebig einstellen. W&auml;hlen Sie dazu zuerst unten ein Feld aus. Benutzen Sie dann den Color Picker um eine Farbe einzustellen. Der Wert &auml;ndert sich automatisch.";
        $lang_string['bg_color'] = "Seitenhintergrund";
        $lang_string['main_bg_color'] = "Hauptseiten-Hintergrund";
        $lang_string['border_color'] = "Seitenrahmem";
        $lang_string['inner_border_color'] = "Innerer Rahmen";
        $lang_string['header_bg_color'] = "Kopfzeilen-Hintergrund";
        $lang_string['header_txt_color'] = "Kopfzeilentext";
        $lang_string['menu_bg_color'] = "Men&uuml;hintergrund";
        $lang_string['footer_bg_color'] = "Fu&szlig;zeilenhintergrund";
        $lang_string['txt_color'] = "Text allgemein";
        $lang_string['headline_txt_color'] = "Text &Uuml;berschrift";
        $lang_string['date_txt_color'] = "Textfarbe Datum";
        $lang_string['footer_txt_color'] = "Text Fu&szlig;zeile";
        $lang_string['link_reg_color'] = "Link";
        $lang_string['link_hi_color'] = "Link bei Ber&uuml;hrung";
        $lang_string['link_down_color'] = "aktiver Link";

        // More Colors
        $lang_string['entry_bg'] = "Blogeintrag: Hintergrund";
        $lang_string['entry_title_bg'] = "Blogeintrag: Titelhintergrund";
        $lang_string['entry_border'] = "Blogeintrag: Rahmen";
        $lang_string['entry_title_text'] = "Blogeintrag: Titeltext";
        $lang_string['entry_text'] = "Blogeintrag: Text";

        $lang_string['static_bg'] = "Statische Seite: Hintergund"; // 0.5.0
        $lang_string['static_title_bg'] = "Statische Seite: Titelhintergund"; // 0.5.0
        $lang_string['static_border'] = "Statische Seite: Rahmen"; // 0.5.0
        $lang_string['static_title_text'] = "Statische Seite: Titeltext"; // 0.5.0
        $lang_string['static_text'] = "Statische Seite: Text"; // 0.5.0

        $lang_string['comment_bg'] = "Kommentar: Hintergrund"; // 0.5.0
        $lang_string['comment_title_bg'] = "Kommentar: Titelhintergrund"; // 0.5.0
        $lang_string['comment_border'] = "Kommentar: Rahmen"; // 0.5.0
        $lang_string['comment_title_text'] = "Kommentar: Titeltext"; // 0.5.0
        $lang_string['comment_text'] = "Kommentar: Text"; // 0.5.0

        $lang_string['menu_bg'] = "Men&uuml;: Hintergrund";
        $lang_string['menu_title_bg'] = "Men&uuml;: Titelhintergrund";
        $lang_string['menu_border'] = "Men&uuml;: Rahmen";
        $lang_string['menu_title_text'] = "Men&uuml;: Titeltext";
        $lang_string['menu_text'] = "Men&uuml;: Text";
        $lang_string['menu_link_reg_color'] = "Men&uuml;: Link";
        $lang_string['menu_link_hi_color'] = "Men&uuml;: Link (bei Ber&uuml;hrung)";
        $lang_string['menu_link_down_color'] = "Men&uuml;: akiver Link";

        // Submit
        $lang_string['color_preset'] = "Farbschemata:";
        $lang_string['scheme_name'] = "Geben Sie einen Namen f&uuml;r das Farbschema ein:";
        $lang_string['scheme_file'] = "Geben Sie einen Dateinamen f&uuml;r das Farbschema ein: (keine Leerzeichen, keine Dateiendung!)";
        $lang_string['save_btn'] = "&nbsp;Speichern&nbsp;";
        $lang_string['form_error'] = "Bitte geben Sie einen Namen f&uuml;r das Farbschema an!";
        $lang_string['submit_btn'] = "&nbsp;Abschicken&nbsp;";
        $lang_string['theme_doesnt_allow_colors'] = 'Das ausgew&auml;hlte Theme erm&ouml;glicht keine individuelle Farbeinstellung.';

        // Error Response
        $lang_string['error'] = "<h2>Hoppla!</h2> Einstellung nicht gespeichert. Es ist ein Problem aufgetreten.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Farbeinstellungen gespeichert!</h2> Ihre Farbeinstellungen wurden erfolgreich gespeichert."; // New for 0.4.8.1
        break;

      case 'comments':
        // Comments
        $lang_string['name'] = "Name:"; //New in 0.4.6.2
        $lang_string['email'] = "E-Mail:";          // deutsche Schreibweise
        $lang_string['homepage'] = "Homepage:"; //New in 0.4.6.2
        $lang_string['comment'] = "Kommentar:"; //New in 0.4.6.2
        $lang_string['IPAddress'] = "IP-Addresse:";  // New for 0.4.6.2
        $lang_string['useragent'] = "User-Agent-String:";       // Fachbegriff
        $lang_string['wrote'] = "<i>Am %s schrieb %s:</i><br />\n<br />\n%s"; // New for 0.4.6.2

        $lang_string['comment_capcha'] = "Anti-Spam-Ma&szlig;nahme: Geben Sie den Text in der Grafik ein:";       // what was the "<b>%s</b>" for?
        $lang_string['title'] = "Kommentare";
        $lang_string['header'] = "Kommentar hinzuf&uuml;gen";
        $lang_string['instructions'] = "Um einen Kommentar zu hinterlassen, f&uuml;llen Sie das Formular aus.";
        $lang_string['comment_name'] = "Ihr Name:";
        $lang_string['comment_email'] = "E-Mail-Adresse:";
        $lang_string['comment_url'] = "URL:";
        $lang_string['commentposted'] = "Neuer Kommentar hinterlassen beim Blog ";  // New for 0.4.6.2
        $lang_string['comment_remember'] = "Meine Daten merken:";
        $lang_string['comment_text'] = "Kommentar:";
        $lang_string['post_btn'] = "&nbsp;Kommentar absenden&nbsp;";
        $lang_string['delete_btn'] = "l&ouml;schen";
        $lang_string['ban_btn'] = "IP sperren"; // New for 0.4.8
        $lang_string['expired_comment1'] = "Entschuldigung, aber neue Kommentare sind nach "; // New for 0.4.8
        $lang_string['expired_comment2'] = " Tagen nicht mehr erlaubt."; // New for 0.4.8

        $lang_string['blacklisted'] = "Entschuldigung, Ihre IP-Addresse wurde gesperrt. Kommentare sind nicht erlaubt."; // New for 0.4.8
        $lang_string['bannedword'] = "Ihr Kommentar, die URL, der Name oder die E-Mail-Adresse enthielten ein oder mehrere Worte, welche vom Administrator verboten wurden. Ihr Kommentar wurde NICHT gespeichert."; // New for 0.4.8
        $lang_string['nocomments'] = "Kommentare sind f&uuml;r diesen Eintrag nicht m&ouml;glich."; // New for 0.4.9
        $lang_string['email_moderator'] = "Kommentare werden zur zeit moderiert. Dieser Kommentar wartet auf eine Best&auml;tigung durch den Moderator, bevor er &ouml;ffentlich sichtbar wird."; // "zurzeit" ist neue Schreibweise von "zur zeit" und hat eine andere Bedeutung als "zur Zeit"!
        $lang_string['user_notice_mod'] = "Dieses Blog wird moderiert. Ihr Kommentar muss erst von einem Administrator best&auml;tigt werden, bevor er &ouml;ffentlich sichtbar wird."; // new for 0.5.0

        $lang_string['return_to_comments'] = 'Zur&uuml;ck zu den Kommentaren';

        // Error Response
        $lang_string['error_add'] = "<h2>Sch&oumlner Mist!</h2>Kommentar nicht gespeichert. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        $lang_string['error_delete'] = "<h2>Ohjeh!</h2>Kommenta nicht gel&ouml;scht. Es ist ein Fehler aufgetreten.<br /><br />Der Server meldet:<br />";
        $lang_string['error_ban'] = "<h2>Oh oh!</h2>IP-Adresse konnte der Bannliste nicht hinzugef&uuml;gt werden.<br /><br />Der Server meldet:<br />";
        $lang_string['success_add'] = "<h2>Kommentar eingetragen!</h2> Ihr Kommentar wurde erfolgreich gespeichert."; // New for 0.4.8.1
        $lang_string['success_delete'] = "<h2>Kommentar gel&ouml;scht!</h2> Der Kommentar wurde erfolgreich entfernt."; // New for 0.4.8.1
        $lang_string['success_ban1'] = "<h2>IP gesperrt!";
        $lang_string['success_ban2'] = "</h2>Um die IP-Sperre aufzuheben, benutzen Sie die Moderationsoptionen im Einstellungsmen&uuml;."; // New for 0.4.8.1
        $lang_string['form_error'] = "Bitte füllen Sie Namens-, Kommentar- and Anti-Spam-Feld aus.";
        $lang_string['error_noip'] = "Keine IP f&uuml;r Blacklist (Negativ-Liste) angegeben.";

        $lang_string[ 'error_comments_disabled' ] = '<h2>Fehler!</h2> He! Kommentare sind in diesem Blog deaktiviert. Sind Sie ein Spambot?'; // New 0.5.0
        $lang_string[ 'error_no_match' ] = '<h2>Fehler!</h2> Ihre IP-Adresse passt nicht zur eintragenden IP-Adresse. Sind Sie ein Spambot?'; // New 0.5.0
        $lang_string[ 'error_fields_missing' ] = '<h2>Fehler!</h2> Es fehlen die folgenden Eintr&auml;ge: '; // New 0.5.0
        $lang_string[ 'error_spambot' ] = '<h2>Fehler!</h2> Captcha-Daten fehlen. Sind Sie ein Spambot?'; // New 0.5.0
        $lang_string[ 'error_capcha' ] = '<h2>Fehler!</h2> Das Captcha-Feld wurde falsch ausgef&uuml;llt.'; // New 0.5.0
        $lang_string[ 'error_bad_data' ] = '<h2>Fehler!</h2> POST-Daten ung&uuml;ltig. Sind Sie ein Hacker?'; // New 0.5.0
        $lang_string[ 'error_entry_missing' ] = '<h2>Fehler!</h2> Sie versuchen, einen Eintrag zu kommentieren, der nicht existiert.'; // New 0.5.0
        $lang_string[ 'error_empty_text' ] = '<h2>Fehler!</h2> Sie haben entweder keinen Kommentar oder Ihren Namen nicht eingegeben.'; // New 0.5.0
        break;

      case 'delete':
        $lang_string['title'] = "Eintrag l&ouml;schen";
        $lang_string['instructions'] = "Dies ist der Eintrag, welchen Sie l&ouml;schen werden. Bitte &uuml;berpr&uuml;fen Sie, ob dies wirklich der richtige Eintrag ist, es gibt keinen Weg, die L&ouml;schung r&uuml;ckg&auml;ngig zu machen...";
        $lang_string['ok_btn'] = "&nbsp;Ok&nbsp;";
        $lang_string['cancel_btn'] = "&nbsp;Abbrechen&nbsp;";
        // Error Response
        $lang_string['error'] = "<h2>Arrrg!</h2> Konnte Eintrag nicht l&ouml;schen.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Eintrag gel&ouml;scht!</h2> Der Eintrag wurde gel&ouml;scht."; // New for 0.4.8.1
        break;

      case 'delete_static':
        $lang_string['title'] = "Statische Seite l&ouml;schen";
        $lang_string['instructions'] = "Dies ist die statische Seite, welchen Sie l&ouml;schen werden. Bitte &uuml;berpr&uuml;fen Sie, ob dies wirklich die richtige Seite ist, es gibt keinen Weg, die L&ouml;schung r&uuml;ckg&auml;ngig zu machen...";
        $lang_string['ok_btn'] = "&nbsp;Ok&nbsp;";
        $lang_string['cancel_btn'] = "&nbsp;Abbrechen&nbsp;";
        // Error Response
        $lang_string['error'] = "<h2>Neiiiiin!</h2>Konnte Eintrag nicht l&ouml;schen.<br /><br />Server Reported:<br />";
        $lang_string['success'] = "<h2>Statische Seite gel&ouml;scht!</h2> Die Statische Seite wurde gel&ouml;scht."; // New for 0.4.8.1
        break;

      case 'image_list':
        $lang_string['title'] = "Bilderliste";
        $lang_string['instructions'] = "Klicken Sie auf die Links unten um die Bilder anzusehen.<br /><br />Um ein Bild zu einem Eintrag hinzuzuf&uuml;gen:<br />1) Klicken Sie einen Link mit gedr&uuml;ckter Control-Taste und w&auml;hlen Sie 'Link in die Zwischenablage kopieren'.<br />2) Gehen Sie zur&uuml;ck zur Eintrag-Hinzuf&uuml;gen- oder Eintrag-Bearbeiten-Seite.<br />3) Dr&uuml;cken Sie den 'img'-Button und f&uuml;gen Sie die URL im Fenster ein.";
        break;

      case 'info':
        $lang_string['title'] = "Metadaten";
        $lang_string['instructions'] = "Die Informationen unten werden als &quot;Metadaten&quot; verwendet, welche Suchmaschinen helfen, Ihre Seiten zu finden und korrekt zu identifizieren. Die Informationen k&ouml;nnten auch in RSS-Feeds verwendet werden.";
        $lang_string['info_keywords'] = "Keywords: (Liste von Schl&uuml;sselworten, mit Kommata getrennt.)";
        $lang_string['info_description'] = "Description: (Eine abstrakte oder Freitext-Beschreibung Ihrer Seiten.)";
        $lang_string['info_copyright'] = "Rights: (Copyright-Hinweis oder ein Link zu einem Dokument mit den entsprechenden Informationen.)";
        $lang_string['tracking_code'] = "External Tracking Code: (HTML-Code, welcher nur auf der Hauptseite &mdash; aus Sicherheitsgr&uuml;nden in den Header-Tags &mdash f&uuml;r jeden, der auf die Seite kommt, ausgef&uuml;hrt werden soll, z.B. Google Analytics.)";
        $lang_string['submit_btn'] = "&nbsp;Abschicken&nbsp;";
        // Error Response
        $lang_string['error'] = "<h2>Sch....!</h2> Informationen nicht gespeichert. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Metadaten gespeichert!</h2> Die Informationen wurden eingetragen."; // New for 0.4.8.1
        $lang_string['form_error'] = "Bitte tragen Sie Titel und Autor ein.";
        break;

      case 'index':
        // Index
        break;

      case 'static':
        // Index
        break;

      case 'rating':
        $lang_string['error'] = "<h2>&Ouml;mmpf!</h2> Informationen nicht gespeichert. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Stimme gez&auml;hlt!</h2> Ihre Bewertung wurd erfolgreich gespeichert."; // New for 0.4.8.1
        break;

      case 'login':
        $lang_string['upgrade'] = "<h2>Update</h2>"; // New 0.3.8
        $lang_string['upgrade_count'] = "%n Kommentardateien m&uuml;ssen aktualisiert werden:"; // New 0.3.8
        $lang_string['upgrade_url'] = "Kommentare updaten"; // New 0.3.8
        $lang_string['title'] = "Einloggen";
        $lang_string['instructions'] = "Bitte geben Sie Ihren Benutzernamen und Ihr Passwort ein:";
        $lang_string['username'] = "Username:";
        $lang_string['password'] = "Password:";
        $lang_string['submit_btn'] = "&nbsp;einloggen&nbsp;";
        // Success
        $lang_string['success'] = "<h2>Willkommen!</h2> Sie sind jetzt eingeloggt. Fr&ouml;hliches Bloggen!<p />";
        // Wrong Password
        $lang_string['wrong_password'] = "<h2>Moooment mal!</h2> Sie konnten nicht eingeloggt werden. Wahrscheinlich haben Sie Benutzername und Passwort falsch eingegeben. Versuchen Sie es erneut!<p />";
        $lang_string['inactive_account'] = "<h2>So'n Mist!</h2> Sie konnten nicht eingeloggt werden. Ihr Konto wurde vom Administrator deaktiviert &mdash; warum auch immer.<p />";
        $lang_string['form_error'] = "Bitte Benutzernamen und Passwort eingeben!";
        break;

      case 'logout':
        $lang_string['title'] = "Ausloggen";
        $lang_string['error'] = "<h2>Auf Wiedersehen!</h2> Sie sind ausgeloggt. (Sie waren ohnehin nicht eingeloggt!)<p />";
        $lang_string['error_no_cookie'] = "<h2>Auf Wiedersehen!</h2> Sie sind ausgeloggt. (Es wurde kein Cookie gefunden. Sie waren also sowieso nicht eingeloggt!)<p />"; // New 0.5.0
        $lang_string['success'] = "<h2>Auf Wiedersehen!</h2> Sie haben sich ausgeloggt.<p />(Weiterleitung zur Hauptseite in 5 Sekunden.)<p />";
        break;

      case 'forms':
        $lang_string['title'] = "";
        $lang_string['instructions'] = "";
        // Error Response
        $lang_string['error'] = "<h2>&Ouml;hh...?!</h2> Informationen nicht gespeichert. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        break;

      case 'set_login':
        $lang_string['title'] = "Benutzername &amp; Passwort &auml;ndern";
        $lang_string['instructions'] = "Hier k&ouml;nnen Sie Ihren Benutzernamen oder Ihr Passwort &auml;ndern. Geben Sie Benutzernamen und Passwort, welche Sie benutzen wollen, ein.";
        $lang_string['username'] = "Benutzername:";
        $lang_string['password'] = "Passwort:";
        $lang_string['submit_btn'] = "&nbsp;Abschicken&nbsp;";
        // Success
        $lang_string['success'] = "<h2>Erfolgreich!</h2> Benutzername und Passwort sind jetzt aktiv. Happy blogging!<p />";
        // Wrong Password
        $lang_string['wrong_password'] = "<h2>So ein Mist!</h2> Die Eingaben wurden nicht gespeichert. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        $lang_string['form_error'] = "Bitte Benutzername und Passwort eintragen!";
        $lang_string['explanation'] = "In neueren Versionen hat sich die Passwort-Struktur ver&auml;ndert. Es ist jetzt nicht mehr m&ouml;glich, Passw%ouml;rter und Benutzernamen aus dem Blog-Code zu ver&auml;ndern.  Um das Passwort zu &auml;ndern l&ouml;schen Sie /config/password.php und stellen Sie sicher, dass install*.php auf dem Server existiert. Wenn das erledigt ist, laden Sie diese Seite neu (oder loggen Sie sich aus).  Sie bekommen dann dasselbe Script angezeigt, mit dem Sie urspr&uuml;nglich Ihr Passwort generiert haben, als sie das Blog installiert haben.";  // New for 0.4.6
        break;

      case 'install00':
        $lang_string['title'] = "Willkommen";
        $lang_string['instructions'] = "Danke, dass Sie sich f&uuml;r Simple PHP Blog entschieden haben!";
        $lang_string['blog_choose_language'] = "Sprache ausw&auml;hlen:";
        $lang_string['submit_btn'] = "&nbsp;Abschicken&nbsp;";
        break;

      case 'install01':
        $lang_string['title'] = "Willkommen";
        $lang_string['instructions'] = "Danke, dass Sie sich f&uuml;r Simple PHP Blog entschieden haben!<br /><br />Simple PHP Blog ist ein Light-Weight-Blog-System. Es ben&ouml;tigt PHP 4.1 oder h&ouml;her und Schreibzugriff auf dem Server. Alle Daten werden in sogenannten Flat-Files gespeichert, Sie brauchen keine Datenbank...<br /><br />
        Simple PHP Blog muss zu Beginn drei Ordner erzeugen (<b>config</b>, <b>content</b>, und <b>images</b>), in welchen Ihre Daten gespeichert werden. Danach geben Sie Ihr Passwort ein und k&ouml;nnen mit dem Bloggen beginnen.<br /><br />
        <b>Klicken Sie hier, um mit dem Setup zu beginnen:</b>";
        $lang_string['begin'] = "[ Setup beginnen ]";
        break;

      case 'install02':
        $lang_string['title'] = "Setup";
        $lang_string['instructions'] = "Versuche, <b>config</b>, <b>content</b>, und <b>images</b> zu erzeugen:";
        $lang_string['folder_exists'] = "Okay! Die Ordner existieren schon. Es wurden keine Ver&auml;nderungen vorgenommen...";
        $lang_string['folder_failed'] = "Ups! Konnte Ordner nicht anlegen...";
        $lang_string['folder_success'] = "Erfolg! Ordner erzeugt...";
        // Help
        $lang_string['help'] = "
        <h2>Ups!</h2>
        Konnte einen oder mehrere Ordner nicht anlegen!<br /><br />Die wahrscheinlichsten Gr&uuml;nde daf&uuml;r sind:<br />
        <ol>
        <li>Die <b>Schreibrechte</b> sind falsch gesetzt und erlauben keinen <b>Schreib-Lese-</b>Zugriff.</li>
        <li>Die <b>UID</b>s (Benutzer IDs) stimmen nicht bei allen Dateien und Ordnern &uuml;berein.</li>
        </ol>
        Folgen Sie den folgenden Anweisungen zur Fehlerbehebung und klicken Sie <b>nochmal versuchen</b>:<br />
        <ol>
        <li>Erzeugen Sie die Ordner <b>config</b>, <b>content</b>, und <b>images</b> von Hand.</li>
        <li>Setzen Sie <b>Schreibrechte</b> auf den Ordnern. In Ihrem FTP-Program sollten Owner (Besitzer), Group (Gruppe) und Others (Andere) <b>Lese-</b> und <b>Schreib</b>-Zugriff haben. <i>(Es kann sein, dass Sie Ihren Webhoster deswegen kontaktieren m&uuml;ssen...)</i></li>
        <li>Stellen Sie sicher, dass die UIDs all Ihrer Dateien und Ordner identisch sind. <i>(Auch hier kann es sein, dass Sie Ihren Webhoster deswegen kontaktieren m&uuml;ssen...)</i></li>
        </ol>";
        $lang_string['try_again'] = "[ nochmal versuchen ]";
        // Success
        $lang_string['success'] = "<h2>Erfolg!</h2> Ordner erzeugt!<p /><b> Klicken Sie hier um weiterzumachen:</b>";
        $lang_string['continue'] = "[ weiter ]";
        break;

      case 'install03':
        $lang_string['supported'] = "<b>Ihr Webserver unterst&uuml;tzt die folgenden Verschl&uuml;sselungsmethoden:</b>";
        $lang_string['standard'] = "Standard DES-Verschl&uuml;sselung: ";
        $lang_string['extended'] = "Extended DES-Verschl&uuml;sselung: ";
        $lang_string['MD5'] = "MD5-Verschl&uuml;sselung: ";
        $lang_string['blowfish'] = "Blowfish-Verschl&uuml;sselung: ";
        $lang_string['enabled'] = "aktiviert";
        $lang_string['disabled'] = "deaktiviert";
        $lang_string['using_standard'] = "<b>Verwende Standard-DES Verschl&uuml;sselung...</b>";
        $lang_string['using_extended'] = "<b>Verwende Extended-DES Verschl&uuml;sselung...</b>";
        $lang_string['using_MD5'] = "<b style=\"color: green;\">Verwende MD5-Verschl&uuml;sselung...</b>";
        $lang_string['using_blowfish'] = "<b style=\"color: green;\">Verwende Blowfish-Verschl&uuml;sselung...</b>";
        $lang_string['using_unknown'] = "<b>Verwende unbekannte Verschl&uuml;sselungsmethode...</b>";
        $lang_string['salt_length'] = " <i>(Salt Length = %string)</i><br />";
        $lang_string['title'] = "Benutzername &amp; Passwort erzeugen";
        $lang_string['instructions'] = "Verwenden Sie dieses Formular, um einen Benutzernamen und ein Passwort anzulegen.";
        $lang_string['username'] = "Benutzername:";
        $lang_string['password'] = "Passwort:";
        $lang_string['submit_btn'] = "&nbsp;abschicken&nbsp;";
        // Success
        $lang_string['success'] = "<h2>Gl&uuml;ckwunsch!</h2>Sie sind jetzt eingeloggt. Klicken Sie unten, um zur Setup-Seite zu gelangen, wo Sie ihrem Blog einen Namen geben k&ouml;nnen. Happy blogging!<p />";
        $lang_string['btn_setup'] = "[ Setup ]";
        // Wrong Password
        $lang_string['wrong_password'] = "<h2>Uuups!</h2> Informationen nicht gespeichert. Es gab ein Problem als Benutzername und/oder Passwort gespeichert werden sollten.<br /><br />Der Server meldet:<br />";
        $lang_string['form_error'] = "Bitte Benutzername und Passwort eintragen.";
        break;

      case 'install04':
        $lang_string['title'] = "Passwortdatei erzeugen";
        $lang_string['instructions'] = "<br />Jetzt kommt der knifflige Teil:<br />
        <ol>
        <li>&Ouml;ffnen Sie einen Text-Editor. <i>(Notepad, Word, KWrite, BBEdit, Pico, VIM, etc...)</i></li>
        <li>Erzeugen Sie eine neue Textdatei.</li>
        <li>Kopieren Sie den Code aus der Textbox unten und f&uuml;gen Sie ihn in Ihre Textdatei ein.</li>
        <li>Speichern Sie die Datei unter dem Namen <b>password.php</b> <br /> <i>Speichern Sie die Datei unbedingt im <b>Klartext- (bzw. Plain-Text-)</b>Format!</i></li>
        <li>&Ouml;ffnen Sie Ihr FTP-Programm.</li>
        <li>Laden Sie die neue Datei <b>password.php</b> in den Ordner <b>config</b> ihrer Webpr&auml;senz hoch.</li>
        <li>L&ouml;schen Sie die Datei <b>password.php</b> von Ihrer Festplatte.</li>
        </ol>
        ";
        $lang_string['information'] = "<i>Hinweis: Falls Sie Ihren Benutzernamen und Ihr Passwort zur&uuml;cksetzen wollen (wahrscheinlich, weil sie sie vergessen haben), l&ouml;schen Sie die Datei <b>password.php</b> im Ordner <b>config</b> ihrer Webpr&auml;senz. Wenn Sie Ihr Blog das n&auml;chste Mal besuchen, werden Sie erneut durch den Installationsprozess geleitet...</i>";
        $lang_string['code'] = "Code f&uuml;r <b>password.php</b>:";
        $lang_string['continue'] = "[ weiter ]";
        break;

      case 'install05':
      case 'install06':
        $lang_string['title'] = "Einloggen";
        $lang_string['instructions'] = "Bitte geben Sie Ihren Benutzernamen und Ihr Passwort jetzt ein:";
        $lang_string['username'] = "Benutzername:";
        $lang_string['password'] = "Passwort";
        $lang_string['submit_btn'] = "&nbsp;Einloggen&nbsp;";
        // Success
        $lang_string['success'] = "<h2>Herzlichen Gl&uuml;ckwunsch!</h2> Sie sind jetzt eingeloggt.<p />
        Klicken Sie den Button, um auf die <b>Einstellungen</b>-Seite zu gelangen, wo Sie Ihr neues Blog personalisieren k&ouml;nnen.<p />
        <i>Hinweis: Jetzt, da Sie die Installation beendet haben, sollten Sie die Dateien <b>installXX.php</b> von ihrem Webspace l&ouml;schen. (Z.B. install00.php bis install06.php.)</i><p />";
        // Wrong Password
        $lang_string['wrong_password'] = "<h2>Ups!</h2> Sie sind nicht eingeloggt. Bitte geben Sie Ihren Benutzernamen und Ihr Passwort korrekt ein.<p />";
        $lang_string['form_error'] = "Bitte geben Sie Benutzernamen and Passwort ein.";
        // Success
        $lang_string['btn_setup'] = "[ Einstellungen ]";
        $lang_string['btn_try_again'] = "[ nochmal versuchen ]";
        break;

      case 'setup':
        $lang_string['title'] = "Einstellungen";
        $lang_string['instructions'] = "Hier k&ouml;nnen Sie den Namen Ihres Blogs und Ihre pers&ouml;nlichen Informationen &auml;ndern.";
        $lang_string['blog_title'] = "Name des Blogs:";
        $lang_string['blog_header'] = "Banner-URL: images/blogheader.jpg (Leer lassen f&uuml;r Standard-Grafik des Themes.)";
        $lang_string['blog_author'] = "Autor:";
        $lang_string['blog_email'] = "E-Mail-Adresse: (Mehrere Adressen mit Kommata trennen. Leer lassen, um Kontaktformular zu deaktivieren.)"; // Updated 0.4.7
        $lang_string['blog_avatar'] = "Avatar-URL: images/avatar.jpg (Leer lassen, falls kein Avatarbildchen gew&uuml;nscht.)"; // <-- New 0.4.7
        $lang_string['blog_footer'] = "Fu&szlig;zeile:";
        $lang_string['blog_choose_language'] = "Sprache w&auml;hlen:";
        $lang_string['blog_enable_comments'] = "Benutzer-Kommentare einschalten";
        $lang_string['blog_comments_popup'] = "Kommentare im Popup-Fenster &ouml;ffnen";
        $lang_string['blog_search_top'] = "Suche in den Eintr&auml;gen (anstatt in der Seitenleiste) anzeigen"; // New for 0.5.0
        $lang_string['blog_enable_static_block'] = "Fest definierten Block als ersten Eintrag im Blog: "; // New for 0.5.0
        $lang_string['static_block_border'] = 'Rahmen'; // New for 0.5.0
        $lang_string['static_block_noborder'] = 'kein Rahmen'; // New for 0.5.0 
        $lang_string['blog_enable_voting'] = "erlaube Benutzern, Beitr&auml;ge zu bewerten";
        $lang_string['blog_enable_cache'] = "aktiviere Blogeintrags-Cache (kann auf manchen Servern die Geschwindigkeit erh&ouml;hen)"; // New for 0.4.6
        $lang_string['blog_enable_calendar'] = "aktiviere Kalender"; // New for 0.4.6
        $lang_string['blog_enable_archives'] = "aktiviere Archiv-Block"; // New for 0.4.8
        $lang_string['blog_enable_counter'] = "aktiviere Z&auml;hler in der Seitenleiste"; // New for 0.4.8
        $lang_string['blog_counter_hours'] = "Stunden bis Aufruf von gleicher IP-Adresse erneut gez&auml;hlt wird:"; // New for 0.4.8
        $lang_string['blog_enable_login'] = "aktiviere Login-Link (Bitte vor dem Abschalten ein Lesezeichen auf \"login.php\" setzen...)"; // New for 0.4.8
        $lang_string['blog_enable_title'] = "aktiviere Klartext-Titel (Abschalten, falls der Titel im Banner enthalten ist.)"; // New for 0.4.6
        $lang_string['blog_enable_permalink'] = "aktiviere Permanentlinks auf Blog-Eintr&auml;ge"; // New for 0.4.6
        $lang_string['blog_enable_capcha'] = "aktiviere Captcha (Anti-Spam-Grafik)"; // New for 0.4.8
        $lang_string['blog_footer_counter'] = "aktiviere Z&auml;hler in der Fu&szlig;zeile"; // New for 0.4.8
        $lang_string['blog_enable_capcha_image'] = "Anti-Spam-Grafik (nur wenn GD-Bibliothek vorhanden) / Anti-Spam-Text-Feld"; // New for 0.4.8
        $lang_string['blog_enable_stats'] = "aktiviere Men&uuml;eintrag 'Statistik'"; // New for 0.4.7
        $lang_string['blog_enable_lastcomments'] = "aktiviere Liste der neuesten Kommentare"; // New for 0.4.7
        $lang_string['blog_enable_lastentries'] = "aktiviere Liste der neuesten Blogeintr&auml;ge"; // New for 0.4.7
        $lang_string['blog_email_notification'] = "sende Benachrichtigungs-E-Mail wenn Kommentare hinterlassen werden";
        $lang_string['blog_send_pings'] = "sende Weblog-&quot;Pings&quot;";
        $lang_string['blog_ping_urls'] = "Vollst&auml;ndige URL (z.B. http://rpc.weblogs.com/RPC2) des &quot;Ping&quot;-Dienstes .<br />(Sie k&ouml;nnen mehrere Adressen eingeben, wenn Sie sie mit Kommata trennen.)"; // XXX
        $lang_string['blog_trackback_about'] = "Trackbacks erm&ouml;glichen Benachrichtigungen &uuml;ber Verlinkungen zwischen Blogs. Durch einen Trackback-Ping lassen Sie ein anderes Blog wissen, dass sie es verlinkt haben. Durch den Empfang von Trackback-Pings k&ouml;nnen Sie sehen, wer Ihr Blog verlinkt hat.<br />
           Sie k&ouml;nnen die URIs, die Sie pingen wollen, von Hand eingeben oder dies der automatischen Erkennung &uuml;berlassen.";
        $lang_string['blog_trackback_enabled'] = "aktiviere Trackback in diesem Blog";
        $lang_string['blog_trackback_auto_discovery'] = "aktiviere automatische Erkennung bei Blogeintr&auml;gen, die URLs enthalten";
        $lang_string['blog_max_entries'] = "maximal angezeigte Eintr&auml;ge:";
        $lang_string['blog_comment_tags'] = "in Kommentaren erlaubte Tags:";
        $lang_string['blog_gzip_about'] = "
          Seit PHP 4.0.4 kann PHP gzip-komprimierte Dateien (.gz) lesen und schreiben und dadurch Speicherplatz sparen. Es ist auch m&ouml;glich, Seiten, die an Browser gesendet werden, transparent zu komprimieren, um Bandbreite zu sparen.<br />
          <br />
          Die Zlib-Unterst&uuml;tzung ist in PHP standardm&auml;&szlig;ig deaktiviert. Falls die K&auml;stchen deaktiviert sind, unterst&uuml;tzt Ihre PHP-Installation die Zlib-Erweiterung nicht.";
        $lang_string['blog_enable_gzip_txt'] = "aktiviere GZIP-Kompression f&uuml;r Datenbank-Dateien";
        $lang_string['blog_enable_gzip_output'] = "aktiviere GZIP-Kompression f&uuml;r HTTP-Ausgabe";
        $lang_string['submit_btn'] = "&nbsp;speichern&nbsp;";
        // Error Response
        $lang_string['error'] = "<h2>Hoppla!</h2>Einstellungen nicht gespeichert. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Einstellungen gespeichert!</h2>Ihre Einstellungen wurden erfolgreich gespeichert"; // New for 0.4.8.1
        $lang_string['form_error'] = "Bitte tragen Sie Titel und Autor ein!";
        $lang_string['label_entry_order'] = "Eintragsreihenfolge:";
        $lang_string['select_new_to_old'] = "neueste Eintr&auml;ge zuerst";
        $lang_string['select_old_to_new'] = "&auml;lteste Eintr&auml;ge zuerst";
        $lang_string['label_comment_order'] = "Kommentarreihenfolge:";
        $lang_string['cal_sunday'] = "Sonntag";
        $lang_string['cal_monday'] = "Montag";
        $lang_string['label_calendar_start'] = "erster Tag der Woche:";
        $lang_string['title_sidebar'] = "Seitenleiste"; // New in 0.4.7
        $lang_string['title_comments'] = "Kommentare"; // New in 0.4.7
        $lang_string['title_trackback'] = "Trackbacks"; // New in 0.4.7
        $lang_string['title_compression'] = "Kompression"; // New in 0.4.7
        $lang_string['title_entries'] = "Eintr&auml;ge"; // New in 0.4.7
        $lang_string['title_general'] = "Allgemein"; // New in 0.4.7
        $lang_string['title_language'] = "Sprache"; // New in 0.4.7
        $lang_string['blog_comment_days_expiry'] = "Kommentare erlaubt f&uuml;r wieviele Tage? (0 bedeutet Kommentare sind immer erlaubt.)"; // New in 0.4.8
        $lang_string['blog_comments_moderation'] = "Kommentare m&uuml;ssen von einem eingeloggten Benutzer best&auml;tigt werden, bevor sie &ouml;ffentlich sichtbar werden. (Eingeloggte Benutzer sehen die Kommentare immer.)"; // New in 0.5.0
        $lang_string['comment_moderation'] = "Moderation"; // New in 0.5.0
        break;
      case 'comment_moderation':
        $lang_string['title'] = "Unmoderierte Kommentare";
        $lang_string['instructions'] = "Hier sehen Sie eine Liste der Kommentare, welche f&uuml;r nicht-eingeloggte Benutzer unsichtbar sind, weil sie noch nicht von einem Moderator best&auml;tigt wurden.";
        $lang_string['header'] = "Moderationsliste";
        $lang_string['enteredby'] = "Kommentar eingetragen von: ";
        $lang_string['entrydate'] = "Kommentar eingetragen am: ";
        $lang_string['blogentrytitle'] = "Titel des Blogeintrags: ";
        $lang_string['enteredcontent'] = "Inhalt: ";
        $lang_string['totalunmodded'] = " Kommentar(e) warten auf Best&auml;tigung durch den Moderator.";
        $lang_string['mod_approve'] = "[ Best&auml;tigen ] ";
        $lang_string['mod_delete'] = "[ L&ouml;schen ]";
        break;
      case 'moderation':
        $lang_string['title'] = "Moderationseinstellungen";
        $lang_string['instructions'] = "Hier k&ouml;nnen Sie die automatische Moderationsliste editieren.";
        $lang_string['submit_btn'] = "&nbsp;Moderationseinstellungen speichern&nbsp;";
        // Error Response
        $lang_string['error'] = "<h2>Arrrg!</h2> Einstellungen nicht gespeichert. Es gab ein Problem..<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Einstellugnen gespeichert!</h2> Ihre Einstellungen wurden gespeichert."; // New for 0.4.8.1
        $lang_string['banned_address_list_title'] = "<h2>gesperrte IP-Adressen</h2>";
        $lang_string['banned_address_list'] = "Hier sehen Sie eine Liste von IP-Adressen, f&uuml;r welche die Kommentarfunktion gesperrt wird. Jede IP-Adresse muss in einer eigene Zeile stehen. IP-Adressen bestehen aus Zahlen, DNS-Namen sind nicht erlaubt! Wenn Sie eingeloggt sind, k&ouml;nnen Sie IPs direkt aus der Kommentaransicht heraus sperren.";
        $lang_string['banned_word_list_title'] = "<h2>Wortzensur</h2>";
        $lang_string['banned_word_list'] = "Hier sehen Sie eine Liste von zensierten Worten, welche weder in URLs noch im Text zugelassen werden. Jedes Wort bzw. jede Wortgruppe muss in einer eigenen Zeile stehen. Die Kommentarfunktion wird jede Zeile auf exakte &Uuml;bereinstimmung pr&uuml;fen.";
        break;
      case 'trackbacks':
        // Trackbacks
        $lang_string['title'] = "Trackbacks";       // Fachbegriff
        $lang_string['header'] = "Trackback-URL f&uuml;r diesen Eintrag:";
        $lang_string['delete_btn'] = "l&ouml;schen";
        // Error Response
        $lang_string['error_add'] = "Fehler beim speichern der Trackback-Daten.";
        $lang_string['error_delete'] = "<h2>Neeeiiiin!</h2>Trackback nicht gel&ouml;scht. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        $lang_string['success_delete'] = "<h2>Trackback gel&ouml;scht!</h2>Der Trackback-Link wurde gel&ouml;scht."; // New for 0.4.8.1
        break;

      case 'options':
        $lang_string['title'] = "Optionen";
        $lang_string['instructions'] = "Auf dieser Seite k&ouml;nnen Sie das Anzeigeformat von Datum und Zeit in Blogeintr&auml;gen und Kommentaren anpassen. Sie k&ouml;nnen eine 12- oder 24-Stunden-Anzeige w&auml;hlen und ein kurzes oder langes Datumsformat. Die <b>Vorschau</b>-Bereiche &auml;ndern sich dynamisch, so dass Sie sehen k&ouml;nnen, wie die Einstellungen sich auswirken.";
        // Long Date
        $lang_string['ldate_title'] = "langes Datumsformat:";
        $lang_string['weekday'] = "Wochentag";
        $lang_string['month'] = "Monat";
        $lang_string['day'] = "Tag";
        $lang_string['year'] = "Jahr";
        $lang_string['none'] = "Nichts";
        // Short Date
        $lang_string['sdate_title'] = "kurzes Datumsformat:";
        $lang_string['s_month'] = "Monat";
        $lang_string['s_mon'] = "MMM";
        $lang_string['s_day'] = "Tag";
        $lang_string['s_year'] = "Jahr";
        $lang_string['zero_day'] = "f&uuml;hrende Null beim Tag";
        $lang_string['show_century'] = "Jahrhundert anzeigen";
        // Time
        $lang_string['time_title'] = "Zeitformat:";
        $lang_string['12hour'] = "12-Stunden-Format";
        $lang_string['24hour'] = "24-Stunden-Format";
        $lang_string['before_noon'] = "Vormittags";
        $lang_string['after_noon'] = "Nachmittags";
        // Date
        $lang_string['date_title'] = "Datumsformat:";
        $lang_string['long_date'] = "langes Datum";
        $lang_string['short_date'] = "kurzes Datum";
        $lang_string['time'] = "Zeit";
        // Menu
        $lang_string['menu_title'] = "Datumsformat im Men&uuml;:";
        $lang_string['long_date'] = "langes Datum";
        $lang_string['short_date'] = "kurzes Datum";
        // Used in multiple places
        $lang_string['zero_day'] = "f&uuml;hrende Null beim Tag";
        $lang_string['zero_month'] = "fF&uuml;hrende Null beim Monat";
        $lang_string['zero_hour'] = "f&uuml;hrende Null bei Stunden";
        $lang_string['separator'] = "Trennzeichen:";
        $lang_string['preview'] = "Vorschau:";
        $lang_string['server_offset'] = "Server-Zeitverschiebung:";
        // Buttons
        $lang_string['submit_btn'] = "&nbsp;speichern&nbsp;";
        // Error Response
        $lang_string['error'] = "<h2>Meeep!</h2>Einstellungen nicht gespeichert. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Einstellungen gespeichert!</h2> Die Einstellungen wurden gespeichert."; // New for 0.4.8.1
        break;

      case 'themes':
        $lang_string['title'] = "Themes";       // un?bersetzbar
        $lang_string['instructions'] = "Im Drop-Down-Men&uuml; k&ouml;nnen Sie ein anderes Theme ausw&auml;hlen:";
        // Themes
        $lang_string['choose_theme'] = "Themes:";
        // Buttons
        $lang_string['submit_btn'] = "&nbsp;speichern&nbsp;";
        // Error Response
        $lang_string['error'] = "<h2>Hups!</h2> Theme nicht eingestellt. Es gab ein Problem.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Theme ausgew&auml;hlt!</h2> Das Theme wurde aktiviert."; // New for 0.4.8.1
        break;

      case 'upload_img':
        $lang_string['title'] = "Bild hochladen";
        $lang_string['instructions'] = "Klicken Sie auf den Button, um eine Datei zum Hochladen auszuw&auml;hlen.";
        $lang_string['select_file'] = "Datei ausw&auml;hlen...:";
        $lang_string['upload_btn'] = "hochladen";
        // Error Response
        $lang_string['error'] = "<h2>Fehler!</h2>Das Bild konnte nicht hochgeladen werden.<br /><br />Der Server meldet:<br />";
        $lang_string['success'] = "<h2>Bild hochgeladen!</h2> Das Bild wurde auf den Server &uuml;bertragen."; // New for 0.4.8.1
        break;

      case 'search':
        $lang_string['title'] = "Suchergebnisse";
        $lang_string['instructions'] = "Suchergebnisse f&uuml;r <b>%string</b>:";
        $lang_string['not_found'] = "Nichts gefunen.";
        break;

      case 'contact':
        $lang_string['contact_capcha'] = "Captcha (Spam-Schutz): Geben Sie den Text aus der Grafik ein:"; // 0.4.2
        $lang_string['title'] = "Kontakt";
        $lang_string['instructions'] = "F&uuml;llen Sie das Formular aus:";
        $lang_string['form_error'] = "Bitte geben Sie einen (sinnvollen) Betreff und Ihre Nachricht ein!";
        $lang_string['name'] = "Name:";
        $lang_string['email'] = "E-Mail-Adresse:";
        $lang_string['subject'] = "Betreff:";
        $lang_string['comment'] = "Nachricht:";
        $lang_string['submit_btn'] = "&nbsp;abschicken&nbsp;";
        $lang_string['success'] = "<h2>Gesendet.</h2> Ihre Nachricht wurde abgeschickt.<p />";
        $lang_string['failure'] = "<h2>Fehler!</h2> Ihre Nachricht konnte nicht gesendet werden. Wahrscheinlich haben Sie den Text aus dem Captcha nicht richtig eingegeben.<p />";
        $lang_string['contactsent'] = "Neue Nachricht über Blog: ";       // XXX have to see this in context!
        $lang_string['IPAddress'] = "IP-Adresse:";  // New for 0.4.6
        $lang_string['useragent'] = "User-Agent-String:";  // New for 0.4.6
        $lang_string['wrote'] = "<i>am %s, schrieb %s:</i><br />\n<br />\n%s"; // New for 0.4.6.2
        break;

      case 'stats':
        $lang_string["title"] = "Statistik";
        $lang_string["general"] = "Allgemein";
        $lang_string["entry_info"] = "<b>%s</b> Eintr&auml;ge mit insgesamt <b>%s</b> Worten belegen <b>%s</b> byte Speicherplatz.";
        $lang_string["comment_info"] = "<b>%s</b> Kommentare mit insgesamt <b>%s</b> Worten belegen <b>%s</b> byte Speicherplatz.";
        $lang_string["trackback_info"] = "<b>%s</b> Trackbacks belegen <b>%s</b> byte Speicherplatz";
        $lang_string["static_info"] = "<b>%s</b> statische Seiten mit insgesamt <b>%s</b> Worten belegen <b>%s</b> byte Speicherplatz";
        $lang_string["most_viewed_entries"] = "10 am h&auml;ufigsten angesehene Eintr&auml;ge";
        $lang_string["most_commented_entries"] = "10 am h&auml;ufigsten kommentierte Eintr&auml;ge";
        $lang_string["most_trackbacked_entries"] = "10 am h&auml;ufigsten per Trackback verlinkte Eintr&auml;ge";
        $lang_string['vote_info'] = "<b>%s</b> Bewertungen belegen <b>%s</b> byte Speicherplatz"; // 0.4.1
        $lang_string["most_voted_entries"] = "10 am h&auml;ufigsten bewertete Eintr&auml;ge"; // 0.4.1
        $lang_string["most_rated_entries"] = "10 am besten bewertete Eintr&auml;ge"; // 0.4.1
        break;

      case 'errorpage-nocookies':  // New for 0.4.6
        $lang_string["title"] = 'HTTP Fehler 403.8 - Seiten- oder Funktionszugriff verweigert';
        $lang_string["errorline1"] = 'Die Seite oder Funktion, die Sie aufgerufen haben, ben&ouml;tigt Cookies.';
        $lang_string["errorline2"] = 'Aktivieren Sie Cookies in Ihrem Browser oder Ihrer Schutzsoftware und versuchen Sie es erneut.';
        $lang_string["clientid"] = 'Client-ID: ';
        break;

      case 'errorpage':  // New for 0.4.6
        $lang_string["403.8"] = 'HTTP Fehler 403.8 - Seiten- oder Funktionszugriff verweigert';
        $lang_string["404"] = 'HTTP Error 404 - Seite oder Funktionexistiert nicht';
        $lang_string["error_404"] = 'Die Seite oder Funktion, die Sie aufgerufen haben, existiert nicht.';
        $lang_string["error_javascript"] = 'Die Seite oder Funktion, die Sie aufgerufen haben, ben&ouml;tigt JavaScript.';
        $lang_string["error_emailnotsent"] = 'Die Nachricht konnte nicht gesendet werden.';
        $lang_string["error_emailnotsentcapcha"] = 'Die Nachricht konnte nicht gesendet werden, weil das Captcha falsch oder gar nicht abgelesen wurde.';
        $lang_string["clientid"] = 'Client-ID: ';
        break;

      case 'emoticons':  // New for 0.4.7
        $lang_string['title'] = "Smiley-Einstellungen";
        $lang_string['instructions'] = "
          W&auml;hlen Sie die Smileys, die Sie benutzen wollen. Schreiben Sie Tags, welche durch die Smiley-Grafiken ersetzt werden sollen in die Textboxen. Mehrere Tags pro Smiley sind m&ouml;glich, trennen Sie diese einfach durch Leerzeichen.<br /><br />

          Zum Beispiel:<br />
          :) :-) :SMILE: :HAPPY:<br /><br />

          <i>(Es wird dringend empfohlen, Tags von mehr als 2 Zeichen L&auml;nge zu verwenden, damit keine unerwarteten Ersetzungen auftreten.)</i>";
        $lang_string["upload_instructions"] = 'neuen Smiley hochladen:';
        $lang_string["upload_success"] = 'Erfolg! Smiley wurde hochgeladen!';
        $lang_string["upload_error"] = 'Fehler! Smiley nicht hochgeladen.';
        $lang_string["upload_invalid"] = 'Fehler! Undg&uuml;ltiges Grafikformat. Grafik muss ein PNG, JPG, oder GIF sein.';
        $lang_string["save_success"] = 'Smiley-Einstellungen erfolgreic gespeichert!';
        $lang_string["save_error"] = 'Fehler! Smiley-Einstellungen nicht gespeichert.';
        $lang_string["save_button"] = 'Smileys speichern';
        break;

      case 'archives': // New for 0.4.8
        $lang_string['title'] = "Archiv";
        $lang_string['showall'] = "alles zeigen";
        break;

      case 'manage_users':
        $lang_string['title'] = "Benutzerverwaltung";
        $lang_string['instructions'] = "Hier k&ouml;nnen Sie Benutzer hinzuf&uuml;gen, die keine Administratoren sind, aber Blogeintr&auml;ge verfassen und Kommentare moderieren k&ouml;nnen, ihre EInstellungen &auml;ndern oder Benutzer l&ouml;schen.";
        $lang_string['fulladminerror'] = "Sie m&uuml;ssen Administrator sein, um dies tun zu k&ouml;nnen!";
        $lang_string['header_user'] = "Benutzer: ";
        $lang_string['header_property'] = "Property";       // XXX have to see this in context
        $lang_string['header_value'] = "Value";         // XXX have to see this in context
        $lang_string['prop_username'] = "Benutzername:";
        $lang_string['prop_fullname'] = "angezeigter Name:";
        $lang_string['prop_password'] = "Passwort:";
        $lang_string['prop_email'] = "E-Mail-Adresse:";
        $lang_string['prop_avatar'] = "Avatar-URL:";
        $lang_string['prop_state'] = "aktiv?";
        $lang_string['prop_sec_Moderate'] = "darf Kommentare moderieren?";
        $lang_string['prop_sec_Delete'] = "darf Blogeintr&auml;ge l&ouml;schen?";
        $lang_string['prop_sec_Edit'] = "darf alle Eintr&auml;ge editieren?";
        $lang_string['btn_SaveChanges'] = "&Auml;nderungen speichern";
        $lang_string['btn_CreateUser'] = "Benutzer anlegen";
        $lang_string['btn_Cancel'] = "abbrechen";  
        $lang_string['grid_header'] = "Benutzerliste";
        $lang_string['grid_login'] = 'Login';
        $lang_string['grid_email'] = 'E-Mail';
        $lang_string['grid_avatar'] = 'Avatar';
        $lang_string['grid_state'] = 'aktiv?';
        $lang_string['btn_modify'] = 'editieren';
        $lang_string['btn_delete'] = 'l&ouml;schen';  
        break;

      default:
        break;
    }
  }
?>
