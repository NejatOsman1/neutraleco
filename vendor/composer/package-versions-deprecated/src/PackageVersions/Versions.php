<?php

declare(strict_types=1);

namespace PackageVersions;

use Composer\InstalledVersions;
use OutOfBoundsException;

class_exists(InstalledVersions::class);

/**
 * This class is generated by composer/package-versions-deprecated, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 *
 * @deprecated in favor of the Composer\InstalledVersions class provided by Composer 2. Require composer-runtime-api:^2 to ensure it is present.
 */
final class Versions
{
    /**
     * @deprecated please use {@see self::rootPackageName()} instead.
     *             This constant will be removed in version 2.0.0.
     */
    const ROOT_PACKAGE_NAME = 'beyonit/trinity-base';

    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    const VERSIONS          = array (
  'beberlei/assert' => 'v3.3.2@cb70015c04be1baee6f5f5c953703347c0ac1655',
  'beberlei/doctrineextensions' => 'v1.3.0@008f162f191584a6c37c03a803f718802ba9dd9a',
  'clue/stream-filter' => 'v1.6.0@d6169430c7731d8509da7aecd0af756a5747b78e',
  'cocur/slugify' => 'v4.1.0@2611e6081dbbb05837a16ed339c0451923d4046e',
  'composer/ca-bundle' => '1.3.1@4c679186f2aca4ab6a0f1b0b9cf9252decb44d0b',
  'composer/package-versions-deprecated' => '1.11.99.4@b174585d1fe49ceed21928a945138948cb394600',
  'cweagans/composer-patches' => '1.7.2@e9969cfc0796e6dea9b4e52f77f18e1065212871',
  'doctrine/annotations' => '1.13.2@5b668aef16090008790395c02c893b1ba13f7e08',
  'doctrine/cache' => '2.1.1@331b4d5dbaeab3827976273e9356b3b453c300ce',
  'doctrine/collections' => '1.6.8@1958a744696c6bb3bb0d28db2611dc11610e78af',
  'doctrine/common' => '3.3.0@c824e95d4c83b7102d8bc60595445a6f7d540f96',
  'doctrine/dbal' => '2.13.8@dc9b3c3c8592c935a6e590441f9abc0f9eba335b',
  'doctrine/deprecations' => 'v0.5.3@9504165960a1f83cc1480e2be1dd0a0478561314',
  'doctrine/doctrine-bundle' => '2.6.2@53cf797feda995299629bed081ffb51776f36e9f',
  'doctrine/doctrine-migrations-bundle' => '3.2.2@3393f411ba25ade21969c33f2053220044854d01',
  'doctrine/event-manager' => '1.1.1@41370af6a30faa9dc0368c4a6814d596e81aba7f',
  'doctrine/inflector' => '2.0.4@8b7ff3e4b7de6b2c84da85637b59fd2880ecaa89',
  'doctrine/instantiator' => '1.4.1@10dcfce151b967d20fde1b34ae6640712c3891bc',
  'doctrine/lexer' => '1.2.3@c268e882d4dbdd85e36e4ad69e02dc284f89d229',
  'doctrine/migrations' => '3.4.2@f9b4c8032276460afd9dfa62fb215734b4380d90',
  'doctrine/orm' => '2.11.2@9c351e044478135aec1755e2c0c0493a4b6309db',
  'doctrine/persistence' => '2.5.1@4473480044c88f30e0e8288e7123b60c7eb9efa3',
  'doctrine/sql-formatter' => '1.1.2@20c39c2de286a9d3262cc8ed282a4ae60e265894',
  'egulias/email-validator' => '3.1.2@ee0db30118f661fb166bcffbf5d82032df484697',
  'friendsofphp/proxy-manager-lts' => 'v1.0.7@c828ced1f932094ab79e4120a106a666565e4d9c',
  'friendsofsymfony/oauth-server-bundle' => 'dev-master@dc8ff343363cf794d30eb1a123610d186a43f162',
  'friendsofsymfony/oauth2-php' => '1.3.1@546f869d68fb79b284752e6787263d797165dba4',
  'friendsofsymfony/rest-bundle' => '3.3.0@54f5ffec4bff71b727a2aa4877915ad81358defc',
  'geoip2/geoip2' => 'v2.12.2@83adb44ac4b9553d36b579a14673ed124583082f',
  'guzzlehttp/guzzle' => '7.4.2@ac1ec1cd9b5624694c3a40be801d94137afb12b4',
  'guzzlehttp/promises' => '1.5.1@fe752aedc9fd8fcca3fe7ad05d419d32998a06da',
  'guzzlehttp/psr7' => '1.8.5@337e3ad8e5716c15f9657bd214d16cc5e69df268',
  'http-interop/http-factory-guzzle' => '1.2.0@8f06e92b95405216b237521cc64c804dd44c4a81',
  'incenteev/composer-parameter-handler' => 'v2.1.4@084befb11ec21faeadcddefb88b66132775ff59b',
  'jaybizzle/crawler-detect' => 'v1.2.111@d572ed4a65a70a2d2871dc5137c9c5b7e69745ab',
  'jean85/pretty-package-versions' => '2.0.5@ae547e455a3d8babd07b96966b17d7fd21d9c6af',
  'laminas/laminas-code' => '4.5.1@6fd96d4d913571a2cd056a27b123fa28cb90ac4e',
  'lcobucci/clock' => '2.0.0@353d83fe2e6ae95745b16b3d911813df6a05bfb3',
  'lcobucci/jwt' => '4.0.4@55564265fddf810504110bd68ca311932324b0e9',
  'maxmind-db/reader' => 'v1.11.0@b1f3c0699525336d09cc5161a2861268d9f2ae5b',
  'maxmind/web-service-common' => 'v0.9.0@4dc5a3e8df38aea4ca3b1096cee3a038094e9b53',
  'mhujer/breadcrumbs-bundle' => '1.5.8@2a262e182d7baead37e64408081bd17e53938c06',
  'mollie/mollie-api-php' => 'v2.42.0@1d3ba6a8c345140f23f52facc4267ece12395b11',
  'monolog/monolog' => '2.5.0@4192345e260f1d51b365536199744b987e160edc',
  'nelmio/api-doc-bundle' => 'v4.8.2@1885d25cd95810b376b670e7f5f23a33c0dda068',
  'netresearch/jsonmapper' => 'v0.11.0@979abda4b128415c642b06f07db615e75cfd3173',
  'opensdks/omnikassa2-sdk' => '1.6.1@25d51b8f0310bd74ec62e84b8c48e3581f481690',
  'paragonie/constant_time_encoding' => 'v2.5.0@9229e15f2e6ba772f0c55dd6986c563b937170a8',
  'paragonie/random_compat' => 'v9.99.100@996434e5492cb4c3edcb9168db6fbb1359ef965a',
  'phing/phing' => '2.17.2@8b8cee3eb12c24502fc4c227ac5889746248a140',
  'php-http/client-common' => '2.5.0@d135751167d57e27c74de674d6a30cef2dc8e054',
  'php-http/discovery' => '1.14.1@de90ab2b41d7d61609f504e031339776bc8c7223',
  'php-http/httplug' => '2.3.0@f640739f80dfa1152533976e3c112477f69274eb',
  'php-http/message' => '1.13.0@7886e647a30a966a1a8d1dad1845b71ca8678361',
  'php-http/message-factory' => 'v1.0.2@a478cb11f66a6ac48d8954216cfed9aa06a501a1',
  'php-http/promise' => '1.1.0@4c4c1f9b7289a2ec57cde7f1e9762a5789506f88',
  'phpdocumentor/reflection-common' => '2.2.0@1d01c49d4ed62f25aa84a747ad35d5a16924662b',
  'phpdocumentor/reflection-docblock' => '5.3.0@622548b623e81ca6d78b721c5e029f4ce664f170',
  'phpdocumentor/type-resolver' => '1.6.1@77a32518733312af16a44300404e945338981de3',
  'phpseclib/phpseclib' => '3.0.14@2f0b7af658cbea265cbb4a791d6c29a6613f98ef',
  'propel/propel1' => '1.7.2@d46b050b41f2a4c7a0ef58bd1b84c07bd5e1d2cd',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.1.2@513e0666f7216c7459170d56df27dfcefe1689ea',
  'psr/event-dispatcher' => '1.0.0@dbefd12671e8a14ec7f180cab83036ed26714bb0',
  'psr/http-client' => '1.0.1@2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
  'psr/http-factory' => '1.0.1@12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
  'psr/http-message' => '1.0.1@f6561bf28d520154e4b0ec72be95418abe6d9363',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.4@d49695b909c3b7628b6289db5479a1c204601f11',
  'qipsius/tcpdf-bundle' => '2.0.2@270667cb258b2d2a6b2b906f436765e51570e661',
  'ralouphie/getallheaders' => '3.0.3@120b605dfeb996808c31b6477290a714d356e822',
  'scheb/2fa-backup-code' => 'v5.13.2@5584eb7a2c3deb80635c7173ad77858e51129c35',
  'scheb/2fa-bundle' => 'v5.13.2@dc575cc7bc94fa3a52b547698086f2ef015d2e81',
  'scheb/2fa-google-authenticator' => 'v5.13.2@9477bfc47b5927fb165022dd75700aefdd45a8cc',
  'scheb/2fa-totp' => 'v5.13.2@6b03afbfeedd3e6fab491690a9702410e2770244',
  'scheb/2fa-trusted-device' => 'v5.13.2@acf5a1526eb2111fb7a82b9b52eb34b1ddfdc526',
  'sensio/framework-extra-bundle' => 'v6.2.6@6bd976c99ef3f78e31c9490a10ba6dd8901076eb',
  'sentry/sdk' => '2.2.0@089858b1b27d3705a5fd1c32d8d10beb55980190',
  'sentry/sentry' => '2.5.2@ce63f13e2cf9f72ec169413545a3f7312b2e45e3',
  'sentry/sentry-symfony' => '3.5.4@b3f9b7f0fff3725f0b7811aa4e070e4658b8722b',
  'spomky-labs/otphp' => 'v10.0.3@9784d9f7c790eed26e102d6c78f12c754036c366',
  'symfony/asset' => 'v5.4.7@4affdca3da5f380caa27a338269b36ac288b3981',
  'symfony/cache' => 'v5.4.7@ba06841ed293fcaf79a592f59fdaba471f7c756c',
  'symfony/cache-contracts' => 'v2.5.1@64be4a7acb83b6f2bf6de9a02cee6dad41277ebc',
  'symfony/config' => 'v5.4.7@05624c386afa1b4ccc1357463d830fade8d9d404',
  'symfony/console' => 'v5.4.7@900275254f0a1a2afff1ab0e11abd5587a10e1d6',
  'symfony/dependency-injection' => 'v5.4.7@35588b2afb08ea3a142d62fefdcad4cb09be06ed',
  'symfony/deprecation-contracts' => 'v2.5.1@e8b495ea28c1d97b5e0c121748d6f9b53d075c66',
  'symfony/doctrine-bridge' => 'v5.4.7@8293adcd47c2a3195cfa5f511feebb12832c47b4',
  'symfony/dotenv' => 'v5.4.5@83a2310904a4f5d4f42526227b5a578ac82232a9',
  'symfony/error-handler' => 'v5.4.7@060bc01856a1846e3e4385261bc9ed11a1dd7b6a',
  'symfony/event-dispatcher' => 'v5.4.3@dec8a9f58d20df252b9cd89f1c6c1530f747685d',
  'symfony/event-dispatcher-contracts' => 'v2.5.1@f98b54df6ad059855739db6fcbc2d36995283fe1',
  'symfony/expression-language' => 'v5.4.7@2ab2550b48ee6e88137f69967a5ded0852741549',
  'symfony/filesystem' => 'v5.4.7@3a4442138d80c9f7b600fb297534ac718b61d37f',
  'symfony/finder' => 'v5.4.3@231313534dded84c7ecaa79d14bc5da4ccb69b7d',
  'symfony/flex' => 'v1.18.6@130851b90c1ea615ac5be6fce827971f4f55afbf',
  'symfony/form' => 'v5.4.7@75267931833e98f82bc39fb20f54251b7516680b',
  'symfony/framework-bundle' => 'v5.4.7@7520f553c7a7721652c1b7ac95c09dae62a1676e',
  'symfony/http-client' => 'v5.4.7@88b6909f74fd1f2147e068411f71870a3b27ac56',
  'symfony/http-client-contracts' => 'v2.5.1@1a4f708e4e87f335d1b1be6148060739152f0bd5',
  'symfony/http-foundation' => 'v5.4.6@34e89bc147633c0f9dd6caaaf56da3b806a21465',
  'symfony/http-kernel' => 'v5.4.7@509243b9b3656db966284c45dffce9316c1ecc5c',
  'symfony/intl' => 'v5.4.5@47a1413da15ff840d7c419fa704d32caba3276ac',
  'symfony/lock' => 'v5.4.7@a16279554621453840eb8af14d12cfa24c10b8d3',
  'symfony/mailer' => 'v5.4.7@03332035eef89557db9eb7ead4e899685d5962b9',
  'symfony/mime' => 'v5.4.7@92d27a34dea2e199fa9b687e3fff3a7d169b7b1c',
  'symfony/monolog-bridge' => 'v5.4.3@4b56e17c443e7092895477f047f2a70f324f984c',
  'symfony/monolog-bundle' => 'v3.7.1@fde12fc628162787a4e53877abadc30047fd868b',
  'symfony/notifier' => 'v5.4.8@c5df5af88278e8c15020dd1f95f30eebf280f895',
  'symfony/options-resolver' => 'v5.4.3@cc1147cb11af1b43f503ac18f31aa3bec213aba8',
  'symfony/password-hasher' => 'v5.4.3@b5ed59c4536d8386cd37bb86df2b7bd5fbbd46d4',
  'symfony/polyfill-intl-grapheme' => 'v1.25.0@81b86b50cf841a64252b439e738e97f4a34e2783',
  'symfony/polyfill-intl-icu' => 'v1.25.0@c023a439b8551e320cc3c8433b198e408a623af1',
  'symfony/polyfill-intl-idn' => 'v1.25.0@749045c69efb97c70d25d7463abba812e91f3a44',
  'symfony/polyfill-intl-normalizer' => 'v1.25.0@8590a5f561694770bdcd3f9b5c69dde6945028e8',
  'symfony/polyfill-mbstring' => 'v1.25.0@0abb51d2f102e00a4eefcf46ba7fec406d245825',
  'symfony/polyfill-php80' => 'v1.25.0@4407588e0d3f1f52efb65fbe92babe41f37fe50c',
  'symfony/polyfill-php81' => 'v1.25.0@5de4ba2d41b15f9bd0e19b2ab9674135813ec98f',
  'symfony/polyfill-uuid' => 'v1.25.0@7529922412d23ac44413d0f308861d50cf68d3ee',
  'symfony/process' => 'v5.4.7@38a44b2517b470a436e1c944bf9b9ba3961137fb',
  'symfony/property-access' => 'v5.4.7@57196a19211baa36087e6fc06254d3b39ff0f369',
  'symfony/property-info' => 'v5.4.7@0fc07795712972b9792f203d0fe0e77c26c3281d',
  'symfony/proxy-manager-bridge' => 'v5.4.6@e6936de1cc8f4e6e3b2264aef186ca21695aee8e',
  'symfony/routing' => 'v5.4.3@44b29c7a94e867ccde1da604792f11a469958981',
  'symfony/security-bundle' => 'v5.4.5@d6ae2f605fa8e4e0860c1a6574271af2bb4ba16c',
  'symfony/security-core' => 'v5.4.7@8d622c29dd018a5fb4a3994c9eeae2e9dfe68e96',
  'symfony/security-csrf' => 'v5.4.3@57c1c252ca756289c2b61327e08fb10be3936956',
  'symfony/security-guard' => 'v5.4.3@3d68d9f8e162f6655eb0a0237b9f333a82a19da9',
  'symfony/security-http' => 'v5.4.5@53d572f06fc438faae3713cc97d186d941919748',
  'symfony/serializer' => 'v5.4.7@d1bc37090edabada161b6490d1be14e8cb4891d4',
  'symfony/service-contracts' => 'v2.5.1@24d9dc654b83e91aa59f9d167b131bc3b5bea24c',
  'symfony/stopwatch' => 'v5.4.5@4d04b5c24f3c9a1a168a131f6cbe297155bc0d30',
  'symfony/string' => 'v5.4.3@92043b7d8383e48104e411bc9434b260dbeb5a10',
  'symfony/templating' => 'v5.4.3@b530c7c560b46b5cf792c0cc2095856f60b3b6d0',
  'symfony/translation' => 'v5.4.7@e1eb790575202ee3ac2659f55b93b05853726f8e',
  'symfony/translation-contracts' => 'v2.5.1@1211df0afa701e45a04253110e959d4af4ef0f07',
  'symfony/twig-bridge' => 'v5.4.7@b43e9bdb57a39ffffb4c44a7ef0a47d338e9f1da',
  'symfony/twig-bundle' => 'v5.4.3@45ae3ee8155f93042a1033b166a7a3ed57b96a92',
  'symfony/validator' => 'v5.4.7@f6402ff65e23b7a701d6938809c6451a8a125a8b',
  'symfony/var-dumper' => 'v5.4.6@294e9da6e2e0dd404e983daa5aa74253d92c05d0',
  'symfony/var-exporter' => 'v5.4.7@7eacaa588c9b27f2738575adb4a8457a80d9c807',
  'symfony/web-link' => 'v5.4.3@8b9b073390359549fec5f5d797f23bbe9e2997a5',
  'symfony/yaml' => 'v5.4.3@e80f87d2c9495966768310fc531b487ce64237a2',
  'tecnickcom/tcpdf' => '6.4.4@42cd0f9786af7e5db4fcedaa66f717b0d0032320',
  'thecodingmachine/safe' => 'v1.3.3@a8ab0876305a4cdaef31b2350fcb9811b5608dbc',
  'tinify/tinify' => '1.5.3@f971971ca4b4f0185277a81ba695640d47833852',
  'twig/extra-bundle' => 'v3.3.8@2e58256b0e9fe52f30149347c0547e4633304765',
  'twig/intl-extra' => 'v3.3.5@8dca6f4c5a00cdd3c43b6bd080f50d32aca33a84',
  'twig/string-extra' => 'v3.3.5@03608ae2e9c270a961e8cf1b75751e8635ad3e3c',
  'twig/twig' => 'v3.3.10@8442df056c51b706793adf80a9fd363406dd3674',
  'webmozart/assert' => '1.10.0@6964c76c7804814a842473e0c8fd15bab0f18e25',
  'willdurand/jsonp-callback-validator' => 'v2.0.0@738c36e91d4d7e0ff0cac145f77057e0fb88526e',
  'willdurand/negotiation' => '3.1.0@68e9ea0553ef6e2ee8db5c1d98829f111e623ec2',
  'willdurand/propel-typehintable-behavior' => '1.0.5@19c09407b306cafa1a2c066b08efb9017cccb96b',
  'zircote/swagger-php' => '4.3.0@24b23371ee962ac201fac33292034ae099c8d4a0',
  'myclabs/deep-copy' => '1.11.0@14daed4296fae74d9e3201d2c4925d1acb7aa614',
  'nikic/php-parser' => 'v4.13.2@210577fe3cf7badcc5814d99455df46564f3c077',
  'phar-io/manifest' => '2.0.3@97803eca37d319dfa7826cc2437fc020857acb53',
  'phar-io/version' => '3.2.1@4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
  'phpspec/prophecy' => 'v1.15.0@bbcd7380b0ebf3961ee21409db7b38bc31d69a13',
  'phpunit/php-code-coverage' => '9.2.15@2e9da11878c4202f97915c1cb4bb1ca318a63f5f',
  'phpunit/php-file-iterator' => '3.0.6@cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf',
  'phpunit/php-invoker' => '3.1.1@5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
  'phpunit/php-text-template' => '2.0.4@5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
  'phpunit/php-timer' => '5.0.3@5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
  'phpunit/phpunit' => '9.5.20@12bc8879fb65aef2138b26fc633cb1e3620cffba',
  'sebastian/cli-parser' => '1.0.1@442e7c7e687e42adc03470c7b668bc4b2402c0b2',
  'sebastian/code-unit' => '1.0.8@1fc9f64c0927627ef78ba436c9b17d967e68e120',
  'sebastian/code-unit-reverse-lookup' => '2.0.3@ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
  'sebastian/comparator' => '4.0.6@55f4261989e546dc112258c7a75935a81a7ce382',
  'sebastian/complexity' => '2.0.2@739b35e53379900cc9ac327b2147867b8b6efd88',
  'sebastian/diff' => '4.0.4@3461e3fccc7cfdfc2720be910d3bd73c69be590d',
  'sebastian/environment' => '5.1.4@1b5dff7bb151a4db11d49d90e5408e4e938270f7',
  'sebastian/exporter' => '4.0.4@65e8b7db476c5dd267e65eea9cab77584d3cfff9',
  'sebastian/global-state' => '5.0.5@0ca8db5a5fc9c8646244e629625ac486fa286bf2',
  'sebastian/lines-of-code' => '1.0.3@c1c2e997aa3146983ed888ad08b15470a2e22ecc',
  'sebastian/object-enumerator' => '4.0.4@5c9eeac41b290a3712d88851518825ad78f45c71',
  'sebastian/object-reflector' => '2.0.4@b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
  'sebastian/recursion-context' => '4.0.4@cd9d8cf3c5804de4341c283ed787f099f5506172',
  'sebastian/resource-operations' => '3.0.3@0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
  'sebastian/type' => '3.0.0@b233b84bc4465aff7b57cf1c4bc75c86d00d6dad',
  'sebastian/version' => '3.0.2@c6c1022351a901512170118436c764e473f6de8c',
  'symfony/browser-kit' => 'v5.4.3@18e73179c6a33d520de1b644941eba108dd811ad',
  'symfony/css-selector' => 'v5.4.3@b0a190285cd95cb019237851205b8140ef6e368e',
  'symfony/debug-bundle' => 'v5.4.3@6f508169752ed2c0d0d8a6641c4cca39a8f1dfcb',
  'symfony/dom-crawler' => 'v5.4.6@c0bda97480d96337bd3866026159a8b358665457',
  'symfony/maker-bundle' => 'v1.38.0@143024ab0e426285d3d9b7f6a3ce51e12a9d8ec5',
  'symfony/phpunit-bridge' => 'v5.4.7@31977d36f253607e1fc4e1fb54df18bd9f1e4348',
  'symfony/web-profiler-bundle' => 'v5.4.6@1497b1d22c2807a77563439f8ec489407a989d59',
  'theseer/tokenizer' => '1.2.1@34a41e998c2183e22995f158c581e7b5e755ab9e',
  'symfony/polyfill-ctype' => '*@403e27fe5909b545da24fa766c2a215aa38057f6',
  'symfony/polyfill-iconv' => '*@403e27fe5909b545da24fa766c2a215aa38057f6',
  'symfony/polyfill-php73' => '*@403e27fe5909b545da24fa766c2a215aa38057f6',
  'symfony/polyfill-php72' => '*@403e27fe5909b545da24fa766c2a215aa38057f6',
  'symfony/polyfill-php71' => '*@403e27fe5909b545da24fa766c2a215aa38057f6',
  'symfony/polyfill-php70' => '*@403e27fe5909b545da24fa766c2a215aa38057f6',
  'symfony/polyfill-php56' => '*@403e27fe5909b545da24fa766c2a215aa38057f6',
  'beyonit/trinity-base' => 'dev-master@403e27fe5909b545da24fa766c2a215aa38057f6',
);

    private function __construct()
    {
    }

    /**
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function rootPackageName() : string
    {
        if (!self::composer2ApiUsable()) {
            return self::ROOT_PACKAGE_NAME;
        }

        return InstalledVersions::getRootPackage()['name'];
    }

    /**
     * @throws OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function getVersion(string $packageName): string
    {
        if (self::composer2ApiUsable()) {
            return InstalledVersions::getPrettyVersion($packageName)
                . '@' . InstalledVersions::getReference($packageName);
        }

        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }

    private static function composer2ApiUsable(): bool
    {
        if (!class_exists(InstalledVersions::class, false)) {
            return false;
        }

        if (method_exists(InstalledVersions::class, 'getAllRawData')) {
            $rawData = InstalledVersions::getAllRawData();
            if (count($rawData) === 1 && count($rawData[0]) === 0) {
                return false;
            }
        } else {
            $rawData = InstalledVersions::getRawData();
            if ($rawData === null || $rawData === []) {
                return false;
            }
        }

        return true;
    }
}
