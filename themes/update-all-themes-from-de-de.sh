#!/bin/bash
# export/download latest de_DE locale translations from themes
curl -o de_DE/wp-themes-twentyseventeen-de.po https://translate.wordpress.org/projects/wp-themes/twentyseventeen/de/formal/export-translations/
curl -o de_DE/wp-themes-twentynineteen-de.po https://translate.wordpress.org/projects/wp-themes/twentynineteen/de/formal/export-translations/
curl -o de_DE/wp-themes-twentytwenty-de.po https://translate.wordpress.org/projects/wp-themes/twentytwenty/de/formal/export-translations/

# copy from de_DE to de_CH
cp de_DE/wp-themes-twentyseventeen-de.po de_CH/wp-themes-twentyseventeen-de-ch.po
cp de_DE/wp-themes-twentynineteen-de.po de_CH/wp-themes-twentynineteen-de-ch.po
cp de_DE/wp-themes-twentytwenty-de.po de_CH/wp-themes-twentytwenty-de-ch.po
