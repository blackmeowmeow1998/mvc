<?php  
namespace Black\Core;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Core {

	public static $EntityManager;

	public static function EntityManager() {
		$isDevMode = true;
		$proxyDir = null;
		$cache = null;
		$useSimpleAnnotationReader = false;
		$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
		// or if you prefer yaml or XML
		//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
		//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

		// database configuration parameters
		$conn = array(
			'host'	   => 'localhost:3306',
		    'driver'   => 'pdo_mysql',
		    'user'     => 'root',
		    'password' => '',
		    'dbname'   => 'mvc',
		);

		// obtaining the entity manager
		if (self::$EntityManager == null) {
			self::$EntityManager = EntityManager::create($conn, $config);
		}
		return self::$EntityManager;
	}
}
?>