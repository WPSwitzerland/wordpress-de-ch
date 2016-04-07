# export/download latest de_DE locates from dev
curl -o de_DE/wp-dev-de.po https://translate.wordpress.org/projects/wp/dev/de/formal/export-translations
curl -o de_DE/wp-dev-cc-de.po https://translate.wordpress.org/projects/wp/dev/cc/de/formal/export-translations
curl -o de_DE/wp-dev-admin-de.po https://translate.wordpress.org/projects/wp/dev/admin/de/formal/export-translations
curl -o de_DE/wp-dev-admin-network-de.po https://translate.wordpress.org/projects/wp/dev/admin/network/de/formal/export-translations
curl -o de_DE/wp-dev-twentyfifteen-de.po https://translate.wordpress.org/projects/wp/dev/twentyfifteen/de/formal/export-translations
curl -o de_DE/wp-dev-twentyfourteen-de.po https://translate.wordpress.org/projects/wp/dev/twentyfourteen/de/formal/export-translations

# copy from de_DE to de_CH
cp de_DE/wp-dev-de.po de_CH/wp-dev-de-ch.po 
cp de_DE/wp-dev-cc-de.po de_CH/wp-dev-cc-de-ch.po 
cp de_DE/wp-dev-admin-de.po de_CH/wp-dev-admin-de-ch.po 
cp de_DE/wp-dev-admin-network-de.po de_CH/wp-dev-admin-network-de-ch.po
cp de_DE/wp-dev-twentyfifteen-de.po de_CH/wp-dev-twentyfifteen-de-ch.po
cp de_DE/wp-dev-twentyfourteen-de.po de_CH/wp-dev-twentyfourteen-de-ch.po
cp de_DE/wp-dev-twentythirteen-de.po de_CH/wp-dev-twentythirteen-de-ch.po
cp de_DE/wp-dev-twentyten-de.po de_CH/wp-dev-twentyten-de-ch.po
cp de_DE/wp-dev-twentytwelve-de.po de_CH/wp-dev-twentytwelve-de-ch.po
cp de_DE/wp-dev-twentyeleven-de.po de_CH/wp-dev-twentyeleven-de-ch.po
