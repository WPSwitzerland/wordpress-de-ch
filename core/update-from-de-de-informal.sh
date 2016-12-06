#!/bin/bash
# export/download latest de_DE locates from dev
curl -o de_DE-informal/wp-dev-de.po https://translate.wordpress.org/projects/wp/dev/de/default/export-translations
curl -o de_DE-informal/wp-dev-cc-de.po https://translate.wordpress.org/projects/wp/dev/cc/de/default/export-translations
curl -o de_DE-informal/wp-dev-admin-de.po https://translate.wordpress.org/projects/wp/dev/admin/de/default/export-translations
curl -o de_DE-informal/wp-dev-admin-network-de.po https://translate.wordpress.org/projects/wp/dev/admin/network/de/default/export-translations
curl -o de_DE-informal/wp-dev-twentyfifteen-de.po https://translate.wordpress.org/projects/wp/dev/twentyfifteen/de/default/export-translations
curl -o de_DE-informal/wp-dev-twentyfourteen-de.po https://translate.wordpress.org/projects/wp/dev/twentyfourteen/de/default/export-translations

# copy from de_DE to de_CH
cp de_DE-informal/wp-dev-de.po de_CH-informal/wp-dev-de-ch.po 
cp de_DE-informal/wp-dev-cc-de.po de_CH-informal/wp-dev-cc-de-ch.po 
cp de_DE-informal/wp-dev-admin-de.po de_CH-informal/wp-dev-admin-de-ch.po 
cp de_DE-informal/wp-dev-admin-network-de.po de_CH-informal/wp-dev-admin-network-de-ch.po
cp de_DE-informal/wp-dev-twentyfifteen-de.po de_CH-informal/wp-dev-twentyfifteen-de-ch.po
cp de_DE-informal/wp-dev-twentyfourteen-de.po de_CH-informal/wp-dev-twentyfourteen-de-ch.po
