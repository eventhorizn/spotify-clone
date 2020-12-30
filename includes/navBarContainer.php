<?php?>
<div id="navBarContainer">
    <nav class="navBar">
        <div class="group-alt">
            <div class="NavItem">
                <span class="navItemLink disable-select" onclick="openPage('index.php')">
                    <i id="homeNavIco" class="icofont-home icon"></i>
                    <span id="homeNav" class="navItemLink-span">Home</span>
                </span>
            </div>

            <div class="navItem">
                <span class="navItemLink disable-select" onclick="openPage('browse.php')">
                    <i id="browseNavIco" class="icofont-basket icon"></i>
                    <span id="browseNav" class="navItemLink-span">Browse</span>
                </span>
            </div>
        </div>

        <div class="group">
            <div class="navItem">
                <span id="yourMusicNav" class="navItemLink disable-select" onclick="openPage('yourMusic.php')">Your
                    Music</span>
            </div>
            <div class="navItem disable-select">
                <span id="profileNav" class="navItemLink" onclick="openPage('profile.php')">Gary Hake</span>
            </div>
        </div>

        <div class="group">
            <div class="navItem">
                <span class="navItemLink disable-select" onclick="openPage('search.php')">
                    <i id="searchNavIco" class="icofont-search-1 icon-alt"></i>
                    <span id="searchNav" class="navItemLink-span">Search</span>
                </span>
            </div>
        </div>
    </nav>
</div>