# Language File Translator

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![Version](https://img.shields.io/badge/version-1.0.0-green.svg)

Language File Translator est un outil conçu pour automatiser la traduction et la préparation des fichiers de langue utilisés dans des frameworks PHP comme Laravel, Symfony, et bien d'autres.

## Fonctionnalités

- **Traduction Automatisée** : Envoie les chaînes de caractères à traduire à l'API de DeepL pour une traduction rapide et précise.
- **Compatibilité** : Génère des fichiers de langues prêts à l'emploi pour Laravel, Symfony, et tout autre projet PHP utilisant des fichiers de traduction.
- **Personnalisation** : Supporte la configuration des langues cibles et des formats de sortie (guillemets simples ou doubles).
- **Facilité d'Utilisation** : Parcourez simplement vos fichiers de traduction, envoyez-les pour traduction, et récupérez un fichier traduit structuré.

## Prérequis

- PHP 7.2 ou supérieur
- Une clé API DeepL valide

## Installation

Clonez le dépôt sur votre machine locale et installez les dépendances nécessaires.

\`\`\`bash
git clone https://github.com/Titovich2203/language-file-translator.git
cd language-file-translator
\`\`\`

## Configuration

Ajoutez votre clé API DeepL dans le fichier de configuration ou directement dans le script PHP :

\`\`\`php
$authKey = 'votre_cle_auth_deepl';
\`\`\`

## Utilisation

1. Placez les fichiers de langue que vous souhaitez traduire dans le répertoire approprié.
2. Exécutez le script pour traduire les fichiers et générer les nouveaux fichiers de langue.

\`\`\`bash
php translate.php
\`\`\`

## Exemple de Résultat

Voici un exemple de fichier de langue généré :

\`\`\`php

return array(
    "welcome" => "Bienvenue",
    "account_transaction" => "Transaction du compte",
    // Ajoutez d'autres chaînes ici...
);

\`\`\`

## Contributions

Les contributions sont les bienvenues ! Si vous avez des idées d'améliorations ou des fonctionnalités supplémentaires, n'hésitez pas à soumettre une pull request ou à ouvrir une issue.

## License

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## Acknowledgments

- [DeepL API](https://www.deepl.com/pro-api) pour la traduction.
- Communauté open-source pour le soutien et les contributions.
