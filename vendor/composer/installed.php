<?php return array(
    'root' => array(
        'name' => 'onenetly/app',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => null,
        'type' => 'project',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'onemigrator/onemigrator' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '28ea07b3fb04709d18e9b68f61e4fb678eec3116',
            'type' => 'library',
            'install_path' => __DIR__ . '/../onemigrator/onemigrator',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'onenetly/app' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => null,
            'type' => 'project',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
