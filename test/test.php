 <?php
               include '../db_conn.php';
                require_once('./src/jpgraph.php');
                require_once('./src/jpgraph_bar.php');

                // Récupérer les données de la table "produit" depuis la base de données
                // Remplacez les détails de la connexion et de la requête selon votre configuration

                $query = "SELECT idProduit, nbreClick FROM produit";
                $resultat = mysqli_query($conn, $query);

                // Créer un tableau avec les données pour le graphe
                $data = array();
                while ($row = mysqli_fetch_assoc($resultat)) {
                    $idProduit = $row['idProduit'];
                    $nombreClick = $row['nbreClick'];
                    $data[$idProduit] = $nombreClick;
                }

                // Configurer le graphique
                $graph = new Graph(800, 600);
                $graph->SetScale("textlin");

                // Créer un ensemble de données pour le graphe
                $barplot = new BarPlot(array_values($data));
                $barplot->SetFillColor('lightblue');

                // Ajouter le graphe à l'image
                $graph->Add($barplot);

                // Afficher les valeurs sur les barres
                $barplot->value->Show();

                // Configurer les légendes
                $graph->xaxis->SetTickLabels(array_keys($data));
                $graph->title->Set("Statistiques du nombre de visites par produit");
                $graph->xaxis->title->Set("Produits");
                $graph->yaxis->title->Set("Nombre de visites");
                $graph->Stroke();
                ?>