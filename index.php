<?php
// Votre clé d'authentification DeepL
$authKey = 'AUTH-KEY';

$translation_strings = array(
    'account_transaction' => 'Account transaction',
    'Cash_Collection_Transaction' => 'Cash Collection Transaction',
    'type' => 'Type',
    'deliveryman' => 'Deliveryman',
    'restaurant' => 'Restaurant',
    'select_restaurant' => 'Select restaurant',
    'select_deliveryman' => 'Select deliveryman',
    'method' => 'Method',
    'Ex_:_Cash' => 'Ex: Cash',
    // Ajoutez plus de traductions ici si nécessaire
);


// Tableau pour stocker les traductions
$translated_strings = array();

foreach ($translation_strings as $key => $value) {
    // Appel API pour traduire chaque valeur
    $translated_text = translate_text($value, $authKey);
    // Ajouter au tableau traduit
    $translated_strings[$key] = $translated_text;
}

// Fonction pour traduire un texte en utilisant l'API de DeepL
function translate_text($text, $authKey)
{
    $url = 'https://api-free.deepl.com/v2/translate';
    $data = array(
        'auth_key' => $authKey,
        'text' => $text,
        'target_lang' => 'FR',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        die('Error: ' . curl_error($ch));
    }

    curl_close($ch);

    $responseData = json_decode($response, true);
    if (isset($responseData['translations'][0]['text'])) {
        return $responseData['translations'][0]['text'];
    } else {
        die('Translation failed: ' . $response);
    }
}

// Fonction pour générer le contenu du fichier PHP
function generate_php_array_file($array, $filename)
{
    $content = "<?php\n\n";
    $content .= "return array(\n";

    foreach ($array as $key => $value) {
        // Utilisation des guillemets doubles ici
        $content .= "    \"$key\" => \"$value\",\n";
    }

    $content .= ");\n";

    file_put_contents($filename, $content);
}

// Nom du fichier de sortie
$output_filename = 'translated_strings.php';

// Générer le fichier PHP avec les traductions
generate_php_array_file($translated_strings, $output_filename);

echo "Fichier traduit créé : $output_filename\n";
// Afficher le tableau traduit
//print_r($translated_strings);
//var_dump($translated_strings);
?>
