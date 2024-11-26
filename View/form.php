<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Manager Entité</title>
    <meta name="viewport" content="width=device-width">
    <link href="View/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>Création/Modification d'un User</h1>
    </header>
    <hr/>

    <?php if (isset($message)): ?>
        <div class="modal-message"><?php echo $message; ?></div>
    <?php endif; ?>

    <section id="main-section">
        <form action="index.php" method="POST">
            <!-- Champ caché pour l'ID en cas de modification -->
            <input type="hidden" name="id" value="<?php echo isset($userToEdit) ? $userToEdit['id'] : ''; ?>">
            
            <label>Mail :</label><br/>
            <input type="email" name="email" placeholder="Mail.." value="<?php echo isset($userToEdit) ? $userToEdit['email'] : ''; ?>"/><br>
            
            <label>Mot de passe :</label><br/>
            <input type="password" name="password" placeholder="Mot de passe.." value="<?php echo isset($userToEdit) ? $userToEdit['password'] : ''; ?>"/><br>
            
            <label>Nom :</label><br/>
            <input type="text" name="lastName" placeholder="Nom.." value="<?php echo isset($userToEdit) ? $userToEdit['lastName'] : ''; ?>"/><br>
            
            <label>Prénom :</label><br/>
            <input type="text" name="firstName" placeholder="Prénom.." value="<?php echo isset($userToEdit) ? $userToEdit['firstName'] : ''; ?>"/><br>
            
            <label>Adresse :</label><br/>
            <input type="text" name="address" placeholder="Adresse.." value="<?php echo isset($userToEdit) ? $userToEdit['address'] : ''; ?>"/><br>
            
            <label>Code Postal :</label><br/>
            <input type="text" name="postalCode" placeholder="Code Postal.." value="<?php echo isset($userToEdit) ? $userToEdit['postalCode'] : ''; ?>"/><br>
            
            <label>Ville :</label><br/>
            <input type="text" name="city" placeholder="Ville.." value="<?php echo isset($userToEdit) ? $userToEdit['city'] : ''; ?>"/><br>
            
            <p>
                <input type="submit" class="submit-btn" value="<?php echo isset($userToEdit) ? 'Modifier' : 'Créer'; ?>">
            </p>
        </form>
    </section>

    <!-- Liste des utilisateurs -->
    <div class="users-list">
        <h2>Liste des utilisateurs</h2>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['lastName']; ?></td>
                <td><?php echo $user['firstName']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="index.php?id=<?php echo $user['id']; ?>">Modifier</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script> // Script pour supprimer le message après 3 secondes
        document.addEventListener('DOMContentLoaded', function() {
            const message = document.querySelector('.modal-message');
            if (message) {
                setTimeout(function() {
                    message.remove();
                }, 3000); // 3000ms = 3 secondes
            }
        });
    </script>
</body>
</html>