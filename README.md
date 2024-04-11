Introduction
------------
This repository used to track `.po` file changes in the formal and informal translations for de_CH or German (Switzerland). Since we no longer use the shell scripts, this repo now only contains the PHP script that does all the replacements via a web interface on https://po.dominikschilling.de/. Dominik wrote the PHP code at a WordCamp Zurich contributor day.

We're not translating manually for de_CH, we're just converting the de_DE files uploading them directly to https://translate.wordpress.org/locale/de-ch/. It's important that we have our own locale, because of number and time formating, as well as because of some spelling and wording differences.

You can find more information in both English and German on https://de-ch.wordpress.org/team/handbook/translations/.

Differences
-----------
via shell script
- ss instead of ß
- "Europe/Zürich" instead of "Europe/Berlin"
- "Bern; Zürich; Genf" instead of "Berlin; Köln; München"
- de-ch.wordpress.org instead of de.wordpress.org (replaced only in themes)

manually
- de-CH instead of de-DE (html_lang_attribute)
- ' instead of . (number_format_thousands_sep)
- . instead of , (number_format_decimal_point)
- link to classic editor plugin is https://de.wordpress.org/plugins/classic-editor for de_DE and https://de-ch.wordpress.org/plugins/classic-editor for de_CH 

de-ch.wordpress.org
-------------------
This is the new Rosetta site at http://de-ch.wordpress.org for the de_CH language pack.

gsw.wordpress.org
-----------------
This is the old Rosetta site at http://gsw.wordpress.org/ for the gws language pack in informal dialect.

- WordPress.org: <a href="https://profiles.wordpress.org/openstream">@openstream</a>
- <a href="https://wordpress.slack.com/">Slack</a>: @openstream
- Twitter: <a href="https://twitter.com/nickweisser">@nickweisser</a>
- E-Mail: nick@openstream.ch
