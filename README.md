# Spotify Clone PHP

Course for making Spotify clone in: php, js, css, html

## Set Up Local Server

[XAMPP](https://www.apachefriends.org/index.html)

- Make sure SQL Server and Apache are running

## Another Approach Local Server

Eh, on second thought, not great if you are using MySQL through XAMPP

**VS Code Add-ins**

1. PHP Extension Pack
1. PHP Server (instead of XAMPP)

# TODO:

1. Refactoring
   - Move new pages (artist, search, your music, profile) to refactor design
1. Progress green hover needs work, maybe up an element
   - Also needs to work when mouse down, sliding
1. Left Nav
   - Your music now, eventually albums and artists
   - Your music is just playlists
   - Will need to add tables for albums and artists
1. Scroll needs to be contextual
   - Right now, it scrolls the main container
   - I eventually want the scroll on volume to turn it up/down
1. Full Screen
1. Album update (browse, 'your music/albums')
   - Artist and album
   - Picture goes to album
   - Album green
1. Artist page
   - Sprucing up a bit (simple implementation)
   - Artist header image (need to update database)
1. Small one. when clicking the song on now playing
   - Already opens to album page
   - Do a highlight effect on selected song (css style)
1. Play button pauses and plays
   - But it will start at first song in playlist
1. Add Playlist pop up instead of alert
1. Something more clever on playlist pic
1. Search page song results match playlist table
1. Search page, something more interesting for artist
1. Artist page listing, put album
