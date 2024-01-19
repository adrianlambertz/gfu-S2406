
## Ein eigenes Plugin schreiben

Ein eigenes Plugin zu schreiben bedarf nur einen einzigen Ordner mit einer einzigen Datei mit einem speziellen PHP Kommentar drin.

### Installation

gfu-plugin.zip herunterladen und in WordPress installieren. Fertig.

Im FTP sehen wir nun im `wp-content/plugins/` Ordner einen neuen Ordner namens `gfu-plugin`. In diesem ORdner befindet sich eine Datei `gfu-plugin.php`.

In dieser Datei ist der folgende Kommentar alles was aus unserem Ordner und der Datei ein Plugin macht:

```
<?php
/*
Plugin Name: GFU Plugin
Plugin URI: https://gfu.de
Description: Unser kleines Plugin
Version: 1.0
Author: Adrian Lambertz
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: gfu-plugin
Domain Path: /languages
*/
```

Das war's schon. Unser Plugin ist erstellt. In der PHP Datei können wir nun unsere Funktionalitäten aufbauen, andere Scripts includen etc.

Fügen wir z.B. folgenden WordPress Filter ein:

```
function gfu_greetings_nach_content($content)  {
	if  ( is_single()  )  {
		$content  .=  '<div class="greeting"><i>Hallo! Wie gehts?</i></div>';
	}
	return  $content;
}
add_filter('the_content',  'gfu_greetings_nach_content');
```

Dieser Filter greift in die `the_content` Funktion ein und passt den auszugebenden Inhalt an. Wir prüfen ob der Besucher sich auf einer Beitrags-Detailseite befindet und wenn ja fügen wir am Ende der `$content` Variable eine Begrüssung mit an.
Über das `return` wurde die Variable zurückgegeben.
