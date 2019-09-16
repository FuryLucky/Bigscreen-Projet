<?php

use Illuminate\Database\Seeder;
use App\Questions;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $questionsArray = [
            "Votre adresse mail",
            "Votre âge",
            "Votre sexe",
            "Nombre de personne dans votre foyer (adulte & enfants)",
            "Votre profession",
            "Quel marque de casque VR utilisez vous ?",
            "Sur quel magasin d’application achetez vous des contenus VR ?",
            "Quel casque envisagez vous d’acheter dans un futur proche ?",
            "Au sein de votre foyer, combien de personne utilisent votre casque VR pour regarder Bigscreen
            ?",
            "Vous utilisez principalement Bigscreen pour :",
            "Combien donnez vous de point pour la qualité de l’image sur Bigscreen ?",
            "Combien donnez vous de point pour le confort d’utilisation de l’interface Bigscreen ?",
            "Combien donnez vous de point pour la connection réseau de Bigscreen ?",
            "Combien donnez vous de point pour la qualité des graphismes 3D dans Bigscreen ?",
            "Combien donnez vous de point pour la qualité audio dans Bigscreen ?",
            "Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?", 
            "Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?",
            "Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?",
            "Aimeriez vous jouer à des jeux exclusifs sur votre Bigscreen ?",
            "Quelle nouvelle fonctionnalité de vos rêve devrait exister sur Bigscreen ?"
        ];

        $questionsTypeArray = [
            "B",
            "B",
            "A",
            "C",
            "B",
            "A",
            "A",
            "A",
            "C",
            "A",
            "C",
            "C",
            "C",
            "C",
            "C",
            "A",
            "A",
            "A",
            "A",
            "B"
        ];

        $isEmailArray = [true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false];

        $availableAnswerArray = [
            null,
            null,
            "Homme, Femme, Préfère de pas répondre",
            "1, 2, 3, 4, 5",
            null,
            "Occulus Rift/s, HTC Vive, Windows Mixed Reality, PSVR",
            "SteamVR, Occulus store, Viveport, Playstation VR, Google Play, Windows store",
            "Occulus Quest, Occulus Go, HTC Vive Pro, Autre, Aucun",
            "1, 2, 3, 4, 5",
            "regarder des émissions TV en direct, regarder des films, jouer en solo, jouer en team",
            "1, 2, 3, 4, 5",
            "1, 2, 3, 4, 5",
            "1, 2, 3, 4, 5",
            "1, 2, 3, 4, 5",
            "1, 2, 3, 4, 5",
            "Oui, Non",
            "Oui, Non",
            "Oui, Non",
            "Oui, Non",
            null
        ];

        for ($i=0; $i < count($questionsArray); $i++) { 
            Questions::create([    
                "question" => $questionsArray[$i],
                "question_number" => $i + 1,
                "question_type" => $questionsTypeArray[$i],
                "is_email" => $isEmailArray[$i],
                "available_answer" => $availableAnswerArray[$i],
                "sondage_id" => 1
            ]);
        }
    }
}
