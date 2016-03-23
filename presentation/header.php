<header class="headerImage">
            <div class="login clearFix">
                {% if login == false %}
                  <form action="loginControl.php" method="post" class="login" id="registreer" name="registreer">                                              
                    <div class="login clearFix"><input type="submit" value="registreer" name="registreer"/></div>
                </form>
                <form action="loginControl.php" method="post" class="login" id="login" name="login">
                    <label for="username">gebruikersnaam :<input type="text" id="username" name="username"></label>
                    <label for="password">wachtwoord :<input type="password" id="password" name="password"></label>                               
                    <input type="submit" value="login" name="login" />
                </form>
                
                {% else %}
                  <p>Gebruiker: <a href="loginControl.php?profile={{login.userID}}" alt="Mijn profiel pagine">{{login.username}}</a></p>
                {% endif %}              
            </div>

            <h1><span>Losse Flodders</span></h1>
            <p>Westvlaamse datingsite</p>

            <nav class="hoofdmenu clearFix">
                <ul>
                    <li><a href="showIndex.php" id="a"><p>Menu</p></a></li>
                    <li><a href="profielaanmaak.twig" id="b" alt="profiel" title="profiel"><p>Profiel</p></a></li>
                    <li><a href="#" id="c"><p>Matchen</p></a></li>
                    <li><a href="#" id="d"><p>Instellingen</p></a></li>
                </ul>
            </nav>
        </header>