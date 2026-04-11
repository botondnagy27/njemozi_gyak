<h2>Kapcsolat</h2>
<p>Ügyvezető: <strong>Kiss Tibor</strong></p>
<p>E-mail: <strong>kiss.tibor@minihonlap.hu</strong></p>

<iframe src="https://maps.google.com/maps?q=Kecskemét,%20Pallasz%20Athéné%20Egyetem&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

<hr>

<h3>Írjon nekünk üzenetet!</h3>
<form name="kapcsolatForm" action="?kapcsolat_eredmeny" method="post" onsubmit="return ellenoriz();">
    <div>
        <label>Név:</label><br>
        <input type="text" id="nev" name="nev" value="<?= isset($_SESSION['login']) ? $_SESSION['csn'].' '.$_SESSION['un'] : '' ?>">
    </div>
    <br>
    <div>
        <label>E-mail cím:</label><br>
        <input type="text" id="email" name="email">
    </div>
    <br>
    <div>
        <label>Üzenet szövege:</label><br>
        <textarea id="uzenet" name="uzenet" rows="5" cols="40"></textarea>
    </div>
    <br>
    <input type="submit" value="Üzenet küldése">
</form>

<script>
// Kliensoldali JavaScript ellenőrzés
function ellenoriz() {
    let nev = document.getElementById("nev").value;
    let email = document.getElementById("email").value;
    let uzenet = document.getElementById("uzenet").value;
    let hiba = "";

    if (nev.trim() === "") hiba += "A név megadása kötelező!\n";
    
    let emailMinta = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailMinta.test(email)) hiba += "Kérjük, adjon meg egy érvényes e-mail címet!\n";
    
    if (uzenet.trim() === "") hiba += "Az üzenet nem lehet üres!\n";

    if (hiba !== "") {
        alert(hiba);
        return false; // Megakadályozza az űrlap elküldését
    }
    return true; // Ha minden jó, elküldi az űrlapot a szervernek
}
</script>