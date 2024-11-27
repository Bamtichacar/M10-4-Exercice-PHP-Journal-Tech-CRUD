<?php
include 'connexion.php';
include 'header.php';


$query = $conn->query("SELECT * FROM articles ORDER BY date_creation DESC");
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Liste des articles</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article['id'] ?></td>
                <td><?= $article['titre'] ?></td>
                <td><?= $article['auteur'] ?></td>
                <td><?= $article['date_creation'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $article['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="delete.php?id=<?= $article['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>
