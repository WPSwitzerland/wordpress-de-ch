Introduction
------------
This is a repository for tracking changes in the formal and informal Swiss German WordPress language packs, i.e. de_CH or German (Switzerland).

We're not trying to reinvent the wheel, so therefore the de_CH language pack is based on the de_DE language pack with some minor modifications. We still think it's important that we have our own locale, because of number formating and of course because of spelling. We also now have our own Rosetta site for building the Swiss WordPress community.

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

How it works
-------------
Replacing is (partly) done with various shell scripts which can be run by changing directory and then running e.g. `sh replace-ss-in-de-ch.sh`. Some of the differences mentioned above are still done manually, but eventually it could be only one main script which would run everything automatically, but this is work in progress.

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
