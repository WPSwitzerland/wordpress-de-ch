#!/bin/bash
find woocommerce/de_CH/wp-plugins-woocommerce-dev-de-ch.po -type f -exec sed -i '' 's/ß/ss/g' {} +
find woocommerce/de_CH-informal/wp-plugins-woocommerce-dev-de-ch.po -type f -exec sed -i '' 's/ß/ss/g' {} +
