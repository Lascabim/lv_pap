<?php

return [
    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute não é uma URL válida.',
    'after'                => 'O campo :attribute deve ser uma data posterior a :date.',
    'alpha'                => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash'           => 'O campo :attribute deve conter apenas letras, números e traços.',
    'alpha_num'            => 'O campo :attribute deve conter apenas letras e números.',
    'array'                => 'O campo :attribute deve ser um array.',
    'before'               => 'O campo :attribute deve ser uma data anterior a :date.',
    'between'              => [
        'numeric' => 'O campo :attribute deve estar entre :min e :max.',
        'file'    => 'O arquivo :attribute deve ter entre :min e :max kilobytes.',
        'string'  => 'O campo :attribute deve ter entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação do campo :attribute não coincide.',
    'date'                 => 'O campo :attribute não é uma data válida.',
    'date_equals'          => 'O campo :attribute deve ser uma data igual a :date.',
    'date_format'          => 'O campo :attribute não corresponde ao formato :format.',
    'different'            => 'Os campos :attribute e :other devem ser diferentes.',
    'digits'               => 'O campo :attribute deve ter :digits dígitos.',
    'digits_between'       => 'O campo :attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => 'A imagem do campo :attribute possui dimensões inválidas.',
    'distinct'             => 'O campo :attribute tem um valor duplicado.',
    'email'                => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'ends_with'            => 'O campo :attribute deve terminar com um dos seguintes valores: :values.',
    'exists'               => 'O campo selecionado :attribute é inválido.',
    'file'                 => 'O campo :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute é obrigatório.',
    'gt'                   => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file'    => 'O arquivo :attribute deve ter mais de :value kilobytes.',
        'string'  => 'O campo :attribute deve ter mais de :value caracteres.',
        'array'   => 'O campo :attribute deve ter mais de :value itens.',
    ],
    'gte'                  => [
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'file'    => 'O arquivo :attribute deve ter pelo menos :value kilobytes.',
        'string'  => 'O campo :attribute deve ter pelo menos :value caracteres.',
        'array'   => 'O campo :attribute deve ter pelo menos :value itens.',
    ],
    'image'                => 'O campo :attribute deve ser uma imagem.',
    'in'                   => 'O campo selecionado :attribute é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O campo :attribute deve ser um número inteiro.',
    'ip'                   => 'O campo :attribute deve ser um endereço de IP válido.',
    'ipv4'                 => 'O campo :attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'O campo :attribute deve ser um endereço IPv6 válido.',
    'json'                 => 'O campo :attribute deve ser uma string JSON válida.',
    'lt'                   => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file'    => 'O arquivo :attribute deve ter menos de :value kilobytes.',
        'string'  => 'O campo :attribute deve ter menos de :value caracteres.',
        'array'   => 'O campo :attribute deve ter menos de :value itens.'
    ],
    'lte'                  => [ // Adicionado
        'numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
        'file'    => 'O arquivo :attribute deve ter no máximo :value kilobytes.',
        'string'  => 'O campo :attribute deve ter no máximo :value caracteres.',
        'array'   => 'O campo :attribute deve ter no máximo :value itens.',
    ],
    'max'                  => [ // Adicionado
        'numeric' => 'O campo :attribute não deve ser maior que :max.',
        'file'    => 'O arquivo :attribute não deve ter mais de :max kilobytes.',
        'string'  => 'O campo :attribute não deve ter mais de :max caracteres.',
        'array'   => 'O campo :attribute não deve ter mais de :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um arquivo do tipo: :values.', // Adicionado
    'mimetypes'            => 'O campo :attribute deve ser um arquivo do tipo: :values.', // Adicionado
    'min'                  => [ // Adicionado
        'numeric' => 'O campo :attribute deve ser pelo menos :min.',
        'file'    => 'O arquivo :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O campo :attribute deve ter pelo menos :min caracteres.',
        'array'   => 'O campo :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O campo selecionado :attribute é inválido.', // Adicionado
    'not_regex'            => 'O formato do campo :attribute é inválido.', // Adicionado
    'nullable'             => 'O campo :attribute pode ser nulo.', // Adicionado
    'numeric'              => 'O campo :attribute deve ser um número.', // Adicionado
    'present'              => 'O campo :attribute deve estar presente.', // Adicionado
    'regex'                => 'O formato do campo :attribute é inválido.', // Adicionado
    'required'             => 'O campo :attribute é obrigatório.', // Adicionado
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.', // Adicionado
    'required_unless'      => 'O campo :attribute é obrigatório exceto quando :other está em :values.', // Adicionado
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'unique'               => 'O valor informado para o campo :attribute já está em uso.',

    'phone' => 'O campo :attribute deve ser um número de telefone válido.',
    'password_strength' => 'O campo :attribute deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.',
    'url_active' => 'O campo :attribute deve ser uma URL ativa e válida.',
    'date_before_or_equal' => 'O campo :attribute deve ser uma data antes ou igual a :date.',
    'date_after_or_equal' => 'O campo :attribute deve ser uma data depois ou igual a :date.',
];
