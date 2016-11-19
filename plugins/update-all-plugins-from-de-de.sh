#!/bin/bash
# export/download latest de_DE locale translations from dev
curl -o woocommerce/de_DE/wp-plugins-woocommerce-dev-de.po https://translate.wordpress.org/projects/wp-plugins/woocommerce/dev/de/formal/export-translations

# copy from de_DE to de_CH
cp woocommerce/de_DE/wp-plugins-woocommerce-dev-de.po woocommerce/de_CH/wp-plugins-woocommerce-dev-de-ch.po
