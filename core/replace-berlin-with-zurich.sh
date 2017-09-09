#!/bin/bash
find de_CH/wp-dev-admin-de-ch.po -type f -exec sed -i '' 's/Berlin/Zürich/g' {} +
find de_CH/wp-dev-de-ch.po -type f -exec sed -i '' 's/Berlin; Köln; München/Bern; Zürich; Genf/g' {} +
find de_CH/wp-dev-de-ch.po -type f -exec sed -i '' 's/Berlin/Zürich/g' {} +
find de_CH-informal/wp-dev-admin-de-ch.po -type f -exec sed -i '' 's/Berlin/Zürich/g' {} +
find de_CH-informal/wp-dev-de-ch.po -type f -exec sed -i '' 's/Berlin; Köln; München/Bern; Zürich; Genf/g' {} +
find de_CH-informal/wp-dev-de-ch.po -type f -exec sed -i '' 's/Berlin/Zürich/g' {} +
