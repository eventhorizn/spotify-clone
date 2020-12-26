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

1. Search bar
   - There's a separation b/t the Search text and the icon
   - I want the whole thing to click
   - Also want the icon to turn white on highlight as well
   - I might move this to the header, like in spotify
1. Big refactoring
   - Javascript is spread out b/t php pages and script files
     - Should just be in a script file
   - Separate js files for each page
   - I can do actual classes to represent front end stuff
     - js class for now playing bar
   - Remove jquery
1. Progress green hover needs work, maybe up an element
   - Also needs to work when mouse down, sliding
1. Left Nav
   - Your music now, eventually albums and artists
1. Package css
1. Album List Now Playing Song Enhancements
   - Row text green
   - Pause button instead of play button
1. Clean up Listing to match spotify
1. Play button on track list grow on hover (like now playing)
1. Full Screen
