<?php
include 'connexion.php';
include 'header.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM articles WHERE id = ?");
$query->execute([$id]);
$article = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $auteur = $_POST['auteur'];

    $stmt = $conn->prepare("UPDATE articles SET titre = ?, contenu = ?, auteur = ? WHERE id = ?");
    $stmt->execute([$titre, $contenu, $auteur, $id]);
    header('Location: index.php');
}

?>
<h1>Modifier un article</h1>
<form method="post">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" value="<?= $article['titre'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="contenu" class="form-label">Contenu</label>
        <textarea name="contenu" id="contenu" class="form-control" rows="5" required><?= $article['contenu'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" value="<?= $article['auteur'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<?php include 'footer.php'; ?>
