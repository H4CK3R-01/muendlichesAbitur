# muendlichesAbitur
Beispiel Quellcode, der in der Präsentation verwendet wurde 

## Installation
Die Datei `index.php` und der Ordner `static` müssen beide im gleiche Verzeichnis liegen.

Mithilfe der Datei `users.sql` kann eine Tabelle mit einem Benutzer erstellt werden.

### Tabelle
```
CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);
COMMIT;
```
### Benutzer
```
INSERT INTO `users` (`id`, `name`, `password`, `admin`) VALUES
(0, 'admin', 'admin_password', 1);
```

In der Datei `index.php` müssen danach nur noch Benutzername, Passwort, Datenbank-Host und Datenbank-Name angepasst werden.

## Nutzung
Um sich anzumelden kann entweder der in der Tablle hinterlegte Benutzername mit dem richtigen Passwort verwendet werden oder man nutzt SQL-Injections um sich einzuloggen. Standartmäsig existiert eine Benutzer mit dem Namen `admin` und dem zugehörigen Passwort `admin_password`.
