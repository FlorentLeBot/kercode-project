<!-- le formulaire de contact -->
<section class="container-form">
    <h1>Nous contacter</h1>
    <form id="form-contact" action="/kercode-project/contact" method="POST">
        <fieldset class="form">
            <legend>Laissez-nous un message</legend>

            <p>
                <label for="firstname">Entrez votre prénom </label>
                <input type="text" id="firstname" name="firstname" placeholder="prénom" required>
            </p>

            <p>
                <label for="lastname">Entrez votre nom </label>
                <input type="text" id="lastname" name="lastname" placeholder="nom" required>
            </p>

            <p>
                <label for="email">Entrez votre email </label>
                <input type="email" id="email" name="email" placeholder="email" required>
            </p>

            <p>
                <label for="address">Entrez votre adresse </label>
                <input type="text" id="address" name="address" placeholder="adresse" required>
                <div id="api-address"></div>
            </p>

            <p>
                <label for="message">Entrez votre message </label>
                <textarea name="content" id="message" cols="20" rows="6" placeholder="Message" required></textarea>
            </p>

            <p class="accept">
                <input type="checkbox" id="accept" name="accept" required>
                <label for="accept">J'accepte les conditions générales</label>
            </p>

            <p><button class="submit" type="submit">Envoyer</button></p>

        </fieldset>
    </form>
</section>