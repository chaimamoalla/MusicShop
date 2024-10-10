<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion de produit</title>

    <style>
        /* Form container */
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        /* Form labels */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Form inputs */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Select dropdown */
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Submit button */
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body style="background-image: url('../images/—Pngtree—original\ layered\ musical\ note\ staff_1297830.jpg'); background-repeat: repeat; background-position: top left; background-attachment: fixed; background-size: cover;">
    <h1 style="text-align: center;">Ajouter un produit</h1>
    <div class="form-container">
        <form action="insertion.php" method="post" enctype="multipart/form-data">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">
            <label for="descrip">Description:</label>
            <textarea id="descrip" name="descrip" rows="6" cols="30"></textarea>
            <label for="prix">Prix:</label>
            <input type="text" id="prix" name="prix">
            <label for="couleur">Couleur:</label>
            <input type="text" id="couleur" name="couleur">
            <label for="categorie">Catégorie:</label>
            <select id="categorie" name="categorie">
                <option value="pianos">Pianos</option>
                <option value="guitares">Guitares</option>
                <option value="batteries-drums">Batteries & Drums</option>
                <option value="violons">Violons</option>
                <option value="vents">Vents</option>
            </select>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>