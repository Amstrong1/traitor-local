<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => "La valeur entrée doit être accepté.",
    "active_url"       => "La valeur entrée n'est pas une URL valide.",
    "after"            => "La valeur entrée doit être une date postérieure au :date.",
    "alpha"            => "La valeur entrée doit seulement contenir des lettres.",
    "alpha_dash"       => "La valeur entrée doit seulement contenir des lettres, des chiffres et des tirets.",
    "alpha_num"        => "La valeur entrée doit seulement contenir des chiffres et des lettres.",
    "before"           => "La valeur entrée doit être une date antérieure à :date.",
    "between"          => array(
        "numeric" => "La valeur de doit être comprise entre :min et :max.",
        "file"    => "Le fichier doit avoir une taille entre :min et :max kilobytes.",
        "string"  => "Le texte doit avoir entre :min et :max caractères.",
    ),
    "confirmed"        => "La valeur entrée ne correspond pas.",
    "date"             => "La valeur entrée n'est pas une date valide.",
    "date_format"      => "La valeur entrée ne correspond pas au format :format.",
    "different"        => "Les champs doivent être différents.",
    "digits"           => "La valeur entrée doit avoir :digits chiffres.",
    "digits_between"   => "La valeur entrée doit avoir entre :min and :max chiffres.",
    "email"            => "Le format du champ est invalide.",
    "exists"           => "La valeur entrée sélectionné est invalide.",
    "image"            => "Le fichier sélectionné doit être une image.",
    "in"               => "La valeur entrée est invalide.",
    "integer"          => "La valeur entrée doit être un entier.",
    "ip"               => "La valeur entrée doit être une adresse IP valide.",
    "max"              => array(
        "numeric" => "La valeur de ne peut être supérieure à :max.",
        "file"    => "Le fichier ne peut être plus gros que :max kilobytes.",
        "string"  => "Le texte ne peut contenir plus de :max caractères.",
    ),
    "mimes"            => "La valeur entrée doit être un fichier de type : :values.",
    "min"              => array(
        "numeric" => "La valeur de doit être inférieure à :min.",
        "file"    => "Le fichier doit être plus que gros que :min kilobytes.",
        "string"  => "Le texte doit contenir au moins :min caractères.",
    ),
    "not_in"           => "La valeur entrée sélectionné n'est pas valide.",
    "numeric"          => "La valeur entrée doit contenir un nombre.",
    "regex"            => "Le format du champ est invalide.",
    "required"         => "Ce champ est obligatoire.",
    "required_if"      => "Ce champ est obligatoire quand la valeur de :other est :value.",
    "required_with"    => "Ce champ est obligatoire quand :values est présent.",
    "required_without" => "Ce champ est obligatoire quand :values n'est pas présent.",
    "same"             => "Les champs doivent être identiques.",
    "size"             => array(
        "numeric" => "La taille de la valeur de doit être :size.",
        "file"    => "La taille du fichier de doit être de :size kilobytes.",
        "string"  => "Le texte de doit contenir :size caractères.",
    ),
    "unique"           => "La valeur du champ est déjà utilisée.",
    "url"              => "Le format de l'URL de n'est pas valide.",
    
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
