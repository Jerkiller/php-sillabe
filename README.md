# php-sillabe

## Cos'è

Una classe php per gestire la sillabazione di frasi in lingua italiana.

L'argomento è piuttosto complesso e a volte poco deterministico. I problemi sorgono con la divisione di gruppi vocalici e talvolta anche consonantici.

Accettate questa classe come un'esperimento, anche perché ci sono molte eccezioni e diverse scuole di pensiero.
A tal riguardo consiglio di leggere [questo articolo](http://www.accademiadellacrusca.it/it/lingua-italiana/consulenza-linguistica/domande-risposte/divisione-sillabe "Divisione in sillabe").

## Applicazioni

Un'interessante risvolto per il quale ho impiegato questa classe è il rilevamento statistico della frequenza sillabica in una frase. Da questo si può desumere se un testo ha molte parole straniere, se esso è scritto a caso, se contiene molti errori di battitura. Il tutto in modo comunque euristico e talvolta impreciso.

## Utilizzo

Consiglio di visionare il file [example](example.php) di questa repository. Questo file utilizza tutti i metodi della classe ed è ampiamente commentato.

## Miglioramenti futuri

* Intendo migliorare alcune funzioni interne di divisione sillabica
* Intendo documentare meglio i metodi, l'esempio e la classe
* Intendo fare un testing massivo su parole improbabili
* Intendo integrare la classe con l'installatore Composer
