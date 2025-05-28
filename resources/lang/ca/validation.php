<?php

return [

    'required' => 'El camp :attribute és obligatori.',
    'email' => 'El camp :attribute ha de ser un correu electrònic vàlid.',
    'max' => [
        'string' => 'El camp :attribute no pot tenir més de :max caràcters.',
    ],
    'min' => [
        'string' => 'El camp :attribute ha de tenir almenys :min caràcters.',
    ],
    'in' => 'El valor seleccionat de :attribute no és vàlid.',
    'date' => 'El camp :attribute ha de ser una data vàlida.',
    'date_format' => 'El camp :attribute no correspon al format :format.',
    'after_or_equal' => 'La data de :attribute ha de ser posterior o igual a :date.',
    'unique' => 'Aquest :attribute ja està registrat.',
    'exists' => 'El :attribute seleccionat no existeix.',

    'attributes' => [

        // Pacient
        'nom' => 'nom',
        'cognoms' => 'cognoms',
        'genere' => 'gènere',
        'email' => 'correu electrònic',
        'data_naixement' => 'data de naixement',
        'num_document' => 'número de document',
        'telefon' => 'telèfon',
        'adreca' => 'adreça',
        'ciutat' => 'ciutat',
        'codi_postal' => 'codi postal',
        'provincia' => 'província',
        'metode_contacte' => 'mètode de contacte',
        'observacions' => 'observacions',
        'alergies' => 'al·lèrgies',
        'medicaments' => 'medicaments',
        'antecedents' => 'antecedents',
        'vacunes' => 'vacunes',

        // Medicament
        'dosi' => 'dosi',
        'descripcio' => 'descripció',

        // Personal Sanitari
        'rol' => 'rol',
        'torn' => 'torn',
        'password' => 'contrasenya',

        // Recordatori
        'pacient_id' => 'pacient',
        'medicament_id' => 'medicament',
        'missatge' => 'missatge',
        'inici' => 'data d\'inici',
        'fi' => 'data de fi',
        'hora' => 'hora',
        'dies_setmana' => 'dies de la setmana',
        'dies_setmana.*' => 'dies seleccionats',
    ],
];
