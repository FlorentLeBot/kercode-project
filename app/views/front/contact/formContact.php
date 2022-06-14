<!-- le formulaire de contact -->
<section class="container-form">
    <h1 class="title">Nous contacter</h1>
    <form id="form-contact" action="/kercode-project/contact" method="POST">
        <fieldset class="form">
            <legend>Laissez-nous un message</legend>

            <p class="item-form">
                <label for="firstname">Entrez votre prénom *</label>
                <input type="text" id="firstname" name="firstname" required>
            </p>

            <p class="item-form">
                <label for="lastname">Entrez votre nom *</label>
                <input type="text" id="lastname" name="lastname" required>
            </p>

            <p class="item-form">
                <label for="email">Entrez votre email *</label>
                <input type="email" id="email" name="email" required>
            </p>

            <!-- Pas de div dans un p (création d'element ul et li avec l'api gouv) -->
            <div class="item-form">
                <label for="address">Entrez votre adresse *</label>
                <input type="text" id="address" name="address" required>
                <div id="api-address"></div>
            </div>

            <p class="item-form">
                <label for="message">Entrez votre message *</label>
                <textarea name="content" id="message" cols="20" rows="6" required></textarea>
            </p>

            <p class="accept">
                <input type="checkbox" id="accept" name="accept" required>
                <label for="accept"><a>J'accepte les conditions générales *</a></label>
            </p>

            <button class="btn" type="submit">Envoyer</button>

            <p>* Tous les champs sont obligatoires</p>

        </fieldset>
    </form>

</section>