# test-your-self

<h3>Docker configuration to use nginx with php8 and mariaDB</h3>

<p>Nainstalovat docker na vasom oblubenom zariadeni, odporucam windows + wsl2 + docker podla</p>
<ul>
    <li>Najskor windows subsystem for linux na windows: <a href="https://docs.microsoft.com/en-us/windows/wsl/install-win10">how to install</a></li>
    <li>Nainstalovat si docker s wsl2 backendom: <a href="https://docs.docker.com/docker-for-windows/install/#system-requirements-for-wsl-2-backend">install docker with wsl backend</a></li>
    <li>Prejdi do nejakej zlozky, kde chces projektik</li>
    <li>stiahni si repo</li>
    <li>presun sa do zlozky, kde mas projekt cez <b>cd ./x./y/projekt </b></li>
    <li>v console spusti <b>docker-compose up</b> a bezi ti mariadb aj appka</li>
    <li>este treba dotiahnut dependecies, ktore nedavame do gitu <b>docker exec testapp-app composer install</b></li>
    <li> a <b>docker exec testapp-app php artisan key:generate</b></li>
    <li>Spusti si appku v prehliadaci vo windowse <a href="http://localhost:8000/">huraaa web</a></li>
</ul>

<br>
<p>Ak pouzivas vs code, tak super! Pridaj si <b> Remote - WSl</b> extension<br>
Chod cez konzolu do adresara s projektom a spusti <b>code .</b><br>

Mozes upravovat a zmeny sa automaticky presiria do dockeru :)))
</p>

<br>

<h4>cely setup podla <a href="https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-20-04">tutorialu</a></h4>
<p>
<ul>
<li>Exec on running container: docker-compose exec testapp-app ls -l</li>
</ul>
</p>

<!-- DO Only once after init to init laravel -->
<!-- composer create-project --prefer-dist laravel/laravel:^8.0 final -->
<!-- cd final -->
<!-- mv * ../ -->

