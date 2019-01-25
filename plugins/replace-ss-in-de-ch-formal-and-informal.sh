#!/bin/bash
find woocommerce/de_CH/wp-plugins-woocommerce-dev-de-ch.po -type f -exec sed -i '' 's/ß/ss/g' {} +
find woocommerce/de_CH-informal/wp-plugins-woocommerce-dev-de-ch.po -type f -exec sed -i '' 's/ß/ss/g' {} +
find classic-editor/de_CH/wp-plugins-classic-editor-dev-de-ch.po -type f -exec sed -i '' 's/ß/ss/g' {} +
find classic-editor/de_CH-informal/wp-plugins-classic-editor-dev-de-ch.po -type f -exec sed -i '' 's/ß/ss/g' {} +
