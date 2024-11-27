<?php
include 'connexion.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $auteur = $_POST['auteur'];

    $stmt = $conn->prepare("INSERT INTO articles (titre, contenu, auteur) VALUES (?, ?, ?)");
    $stmt->execute([$titre, $contenu, $auteur]);
    header('Location: index.php');
}

?>
<h1>Publier un article</h1>
<form method="post" name="publication">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="contenu" class="form-label">Contenu</label>
        <textarea name="contenu" id="contenu" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Publier</button>
</form>
<?php include 'footer.php'; ?>
