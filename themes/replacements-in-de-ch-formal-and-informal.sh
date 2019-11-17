#!/bin/bash
find de_CH -type f -exec sed -i '' 's/ß/ss/g' {} +
find de_CH-informal -type f -exec sed -i '' 's/ß/ss/g' {} +
find de_CH -type f -exec sed -i '' 's/de.wordpress.org/de-ch.wordpress.org/g' {} +
find de_CH-informal -type f -exec sed -i '' 's/de.wordpress.org/de-ch.wordpress.org/g' {} +
