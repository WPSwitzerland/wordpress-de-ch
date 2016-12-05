#!/bin/bash
# export/download latest de_DE locale translations from themes
curl -o de_DE-informal/wp-themes-twentyseventeen-de.po https://translate.wordpress.org/projects/wp-themes/twentyseventeen/de/default/export-translations

# copy from de_DE to de_CH
cp de_DE-informal/wp-themes-twentyseventeen-de.po de_CH-informal/wp-themes-twentyseventeen-de-ch.po
