<?php
chdir(dirname(__DIR__));

// load env
$envPath = __DIR__ . "/../";
if (is_file($envPath . ".env")) {
    $dotenv = Dotenv\Dotenv::createImmutable($envPath);
    $dotenv->load();
}

// Config Loader
\F3::instance()->config("app/config/config.ini");

//connect to SQL Database.
\F3::set('SYSTEM.DB', false);
if (F3::instance()->exists('database')) {
    $dbDSN = F3::get('ENV.DB_DSN') ?? getenv('DB_DSN');
    $dbUSERNAME = F3::get('ENV.DB_USERNAME') ?? getenv('DB_USERNAME');
    $dbPASSWORD = F3::get('ENV.DB_PASSWORD') ?? getenv('DB_PASSWORD');
    \F3::set('DB', new \DB\SQL($dbDSN, $dbUSERNAME, $dbPASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]));
    \F3::set('SYSTEM.DB', true);
}

F3::set('DEBUG', F3::get('ENV.APP_DEBUG'));
F3::set('ILGAR.path', "app/migration/");
\CHEZ14\Ilgar\Boot::now();
