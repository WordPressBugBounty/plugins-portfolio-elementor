<?php
/**
 * PHPUnit bootstrap file
 *
 * @package PowerFolio
 */

// Composer autoloader
require_once dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

// Use Brain\Monkey para simular funções do WordPress
require_once dirname( dirname( __DIR__ ) ) . '/vendor/antecedent/patchwork/Patchwork.php';

// Para testes que precisam de Brain\Monkey
require_once dirname( dirname( __DIR__ ) ) . '/vendor/brain/monkey/inc/patchwork-loader.php';

// Carregar os arquivos de classe do plugin para testes
// Essas classes só serão usadas se o ambiente tiver acesso às funções do WordPress
// Caso contrário, usaremos mocks

// Definir constantes necessárias para carregar o plugin
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(dirname(dirname(__DIR__))) . '/');
}

// Mock da classe Powerfolio_Common_Settings que é dependencia de Powerfolio_Portfolio
if (!class_exists('Powerfolio_Common_Settings')) {
    class Powerfolio_Common_Settings {
        public static function generate_element_id() {
            return 'element-123';
        }
        
        public static function get_image_url($attachment_id, $size = 'full') {
            return 'https://example.com/image.jpg';
        }
    }
}

// NÃO incluir a classe Powerfolio_Portfolio aqui - será incluída nos arquivos de teste individuais
// após a configuração dos mocks das funções do WordPress

/**
 * Test case base class for PowerFolio plugin tests.
 */
abstract class PowerFolio_TestCase extends \PHPUnit\Framework\TestCase {
	/**
	 * Setup the test environment.
	 */
	protected function setUp(): void {
		parent::setUp();
		
		// Configura Brain\Monkey
		\Brain\Monkey\setUp();
		
		// Configuração para simular funções do WordPress
		\Brain\Monkey\Functions\when('__')->returnArg(1);
		\Brain\Monkey\Functions\when('_e')->returnArg(1);
		\Brain\Monkey\Functions\when('esc_attr')->returnArg(1);
		\Brain\Monkey\Functions\when('esc_html')->returnArg(1);
		\Brain\Monkey\Functions\when('esc_url')->returnArg(1);
		\Brain\Monkey\Functions\when('wp_kses_post')->returnArg(1);
		\Brain\Monkey\Functions\when('do_action')->justReturn(null);
		\Brain\Monkey\Functions\when('apply_filters')->returnArg(2);
	}

	/**
	 * Tear down the test environment.
	 */
	protected function tearDown(): void {
		\Brain\Monkey\tearDown();
		parent::tearDown();
	}
}
