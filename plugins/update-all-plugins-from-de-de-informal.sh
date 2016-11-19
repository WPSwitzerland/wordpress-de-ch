#!/bin/bash
# export/download latest de_DE locale translations from dev
curl -o woocommerce/de_DE-informal/wp-plugins-woocommerce-dev-de.po https://translate.wordpress.org/projects/wp-plugins/woocommerce/dev/de/default/export-translations

# copy from de_DE to de_CH
cp woocommerce/de_DE-informal/wp-plugins-woocommerce-dev-de.po woocommerce/de_CH-informal/wp-plugins-woocommerce-dev-de-ch.po
