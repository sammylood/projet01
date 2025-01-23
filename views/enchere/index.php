{{ include('layouts/header.php', {title:'Enchères'})}}
<header class="entete">
    <section class="fil-ariane container">
        <span><a href="">Enchères </a> > <a href=""> Toutes les enchères</a></span>
    </section>
</header>

<div class="container">
    <main>
        <h1>Enchères</h1>
        <table>
            <thead>
                <tr>
                    <th>N° de l'enchère</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Prix initial</th>
                    <th>Coup de coeur</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% for enchere in encheres %}
                <tr>
                    <td><strong><a href="{{ base }}/enchere/show?id={{ enchere.id }}">{{ enchere.id }} Voir plus ></a></strong></td>
                    <td>{{ enchere.date_debut }}</td>
                    <td>{{ enchere.date_fin }} </td>
                    <td>{{ enchere.prix_debut }}</td>
                    <td>{{ enchere.vedette }}</td>
                    <td><a href="{{ base }}/enchere/edit?id={{ enchere.id }}" class="btn">Modifier l'enchère</a></td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        <a href="{{ base }}/enchere/create" class="bouton">Nouvelle enchère</a>
    </main>
</div>

{{ include('layouts/footer.php')}}