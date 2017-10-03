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

    'accepted'             => 'El/la :attribute debe ser aceptado.',
    'active_url'           => 'El/la :attribute no es una URL válida.',
    'after'                => 'El/la :attribute debe ser una fecha mayor a :date.',
    'after_or_equal'       => 'El/la :attribute debe ser una fecha mayor o igual a :date.',
    'alpha'                => 'El/la :attribute solo debe tener letras.',
    'alpha_dash'           => 'El/la :attribute solo debe tener letras, números, y guiones.',
    'alpha_num'            => 'El/la :attribute solo debe tener letras y números.',
    'array'                => 'El/la :attribute debe ser una lista.',
    'before'               => 'El/la :attribute debe ser una fecha menor a :date.',
    'before_or_equal'      => 'El/la :attribute debe ser una fecha menor o igual a :date.',
    'between'              => [
        'numeric' => 'El/la :attribute debe estar entre :min y :max.',
        'file'    => 'El/la :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El/la :attribute debe estar entre :min y :max caracteres.',
        'array'   => 'El/la :attribute debe estar entre :min y :max elementos.',
    ],
    'boolean'              => 'El/la :attribute debe ser true o false.',
    'confirmed'            => 'El/la :attribute debe coincidir con la confirmación.',
    'date'                 => 'El/la :attribute no es una fecha válida.',
    'date_format'          => 'El/la :attribute no coincide con el formato :format.',
    'different'            => 'El/la :attribute y :other deben ser diferentes.',
    'digits'               => 'El/la :attribute debe ser de :digits dígitos.',
    'digits_between'       => 'El/la :attribute debe estar entre :min y :max dígitos.',
    'dimensions'           => 'El/la :attribute tiene dimensiones inválidas.',
    'distinct'             => 'El/la :attribute tiene valores duplicados.',
    'email'                => 'El/la :attribute debe ser una dirección de correo válida.',
    'exists'               => 'El/la :attribute seleccionado es inválido.',
    'file'                 => 'El/la :attribute debe ser un archivo.',
    'filled'               => 'El/la :attribute debe tener un valor.',
    'image'                => 'El/la :attribute debe ser una imagen.',
    'in'                   => 'El/la :attribute seleccionado es inválido.',
    'in_array'             => 'El/la :attribute no existe en :other.',
    'integer'              => 'El/la :attribute debe ser un entero.',
    'ip'                   => 'El/la :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El/la :attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El/la :attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El/la :attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El/la :attribute no debe ser mayor a :max.',
        'file'    => 'El/la :attribute no debe ser mayor a :max kilobytes.',
        'string'  => 'El/la :attribute no debe ser mayor a :max caracteres.',
        'array'   => 'El/la :attribute no debe tener mas de :max elementos.',
    ],
    'mimes'                => 'El/la :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El/la :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El/la :attribute debe ser al menos :min.',
        'file'    => 'El/la :attribute debe ser al menos :min kilobytes.',
        'string'  => 'El/la :attribute debe ser al menos :min caracteres.',
        'array'   => 'El/la :attribute debe ser al menos :min elementos.',
    ],
    'not_in'               => 'El/la :attribute seleccionado es inválido.',
    'numeric'              => 'El/la :attribute debe ser un número.',
    'present'              => 'El/la :attribute debe estar presente.',
    'regex'                => 'El/la :attribute formato es inválido.',
    'required'             => 'El/la :attribute es requerido.',
    'required_if'          => 'El/la :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El/la :attribute es requerido a menos que :other esté en :values.',
    'required_with'        => 'El/la :attribute es requerido cuando :values está presente.',
    'required_with_all'    => 'El/la :attribute es requerido cuando :values está presente.',
    'required_without'     => 'El/la :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El/la :attribute es requerido cuando niguno de los siguientes valores :values estén presentes.',
    'same'                 => 'El/la :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'El/la :attribute debe ser :size.',
        'file'    => 'El/la :attribute debe ser :size kilobytes.',
        'string'  => 'El/la :attribute debe ser :size caracteres.',
        'array'   => 'El/la :attribute debe contener :size elementos.',
    ],
    'string'               => 'El/la :attribute debe ser una cadena.',
    'timezone'             => 'El/la :attribute debe ser una zona válida.',
    'unique'               => 'El/la :attribute ya ha sido tomado.',
    'uploaded'             => 'El/la :attribute ha fallado su carga.',
    'url'                  => 'El/la :attribute formato es inválido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
