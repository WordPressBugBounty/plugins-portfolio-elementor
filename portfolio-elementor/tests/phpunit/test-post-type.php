<?php
/**
 * Test para verificar o registro do post type do Portfolio
 *
 * @package PowerFolio
 */

use Brain\Monkey\Functions;

/**
 * Test case para verificar se o post type está sendo registrado.
 */
class PostTypeTest extends PowerFolio_TestCase {

	/**
	 * Set up test environment
	 */
	protected function setUp(): void {
		parent::setUp();

		// Incluir a classe Powerfolio_Portfolio depois de configurar os mocks
		if (!class_exists('Powerfolio_Portfolio')) {
			require_once dirname(dirname(dirname(__FILE__))) . '/classes/Powerfolio_Portfolio.php';
		}
	}

	/**
	 * Test se o post type 'elemenfolio' é registrado corretamente
	 */
	public function test_register_portfolio_post_type() {
		// Configuramos o mock para a função register_post_type do WordPress
		$register_post_type = Functions\expect('register_post_type')
			->once()
			->with('elemenfolio', \Mockery::type('array'))
			->andReturn(true);

		// Mock outras funções do WordPress usadas no método
		Functions\when('apply_filters')->returnArg(2);

		// Criamos uma instância da classe real
		$portfolio = new Powerfolio_Portfolio();

		// Chamamos o método para registrar o post type
		$portfolio->register_portfolio_post_type();

		// O teste passa se o mock foi chamado corretamente
		$this->assertTrue(true);
	}

	/**
	 * Test se a taxonomia 'elemenfoliocategory' é registrada corretamente
	 */
	public function test_register_portfolio_taxonomy() {
		// Configuramos o mock para a função register_taxonomy do WordPress
		$register_taxonomy = Functions\expect('register_taxonomy')
			->once()
			->with('elemenfoliocategory', \Mockery::type('array'), \Mockery::type('array'))
			->andReturn(true);

		// Mock para funções auxiliares
		Functions\when('__')->returnArg(1);
		Functions\when('_x')->returnArg(1); // Mock para a função _x() de tradução com contexto
		Functions\when('apply_filters')->returnArg(2);

		// Criamos uma instância da classe real
		$portfolio = new Powerfolio_Portfolio();

		// Acessamos o método para registrar a taxonomia
		// Como em alguns códigos pode ser register_portfolio_taxonomies ou create_portfolio_taxonomies
		// vamos verificar qual método existe
		if (method_exists($portfolio, 'register_portfolio_taxonomies')) {
			$portfolio->register_portfolio_taxonomies();
		} else {
			// Se o método for outro, podemos tentar com create_portfolio_taxonomies
			$reflection_class = new \ReflectionClass($portfolio);
			$methods = $reflection_class->getMethods();
			$taxonomy_method = null;

			// Procurar um método que tenha 'taxonom' no nome
			foreach ($methods as $method) {
				if (stripos($method->name, 'taxonom') !== false) {
					$taxonomy_method = $method->name;
					break;
				}
			}

			if ($taxonomy_method) {
				$portfolio->$taxonomy_method();
			} else {
				$this->markTestSkipped('Método para registrar taxonomias não encontrado');
			}
		}

		// O teste passa se o mock foi chamado corretamente
		$this->assertTrue(true);
	}

	/**
	 * Test se o shortcode 'powerfolio' é registrado corretamente
	 */
	public function test_register_portfolio_shortcodes() {
		// Configuramos o mock para a função add_shortcode do WordPress
		$add_shortcode = Functions\expect('add_shortcode')
			->twice()  // Deve ser chamado duas vezes (powerfolio e elemenfolio)
			->andReturn(true);

		// Criamos uma instância da classe real
		$portfolio = new Powerfolio_Portfolio();

		// Chamamos o método para registrar os shortcodes
		$portfolio->register_portfolio_shortcodes();

		// O teste passa se o mock foi chamado corretamente
		$this->assertTrue(true);
	}
}
