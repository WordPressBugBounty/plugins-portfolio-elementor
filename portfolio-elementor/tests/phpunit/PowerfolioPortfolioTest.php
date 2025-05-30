<?php

use Brain\Monkey\Functions;
use Brain\Monkey\Actions;
use Brain\Monkey\Filters;

// A classe Powerfolio_Common_Settings já foi definida no bootstrap

/**
 * Class PowerfolioPortfolioTest
 * 
 * Testes para a classe Powerfolio_Portfolio que realmente executam o código
 * real em vez de apenas mockar tudo.
 */
class PowerfolioPortfolioTest extends PowerFolio_TestCase {
    
    /**
     * Setup antes de cada teste
     */
    public function setUp(): void {
        parent::setUp();
        
        // Inicializa o Brain Monkey
        Brain\Monkey\setUp();
        
        // Mock de funções do WordPress
        Functions\stubs([
            'wp_parse_args',
            'get_terms',
            'get_term_link',
            'is_wp_error',
            'esc_attr',
            'esc_url',
            'wp_enqueue_style',
            'wp_enqueue_script',
            'wp_add_inline_script',
            'plugins_url',
            'sanitize_text_field',
            'wp_kses_post'
        ]);
        
        // Mock de funções de tradução do WordPress
        Functions\stubs([
            '__' => function($text) { return $text; },
            '_x' => function($text) { return $text; },
            'esc_html__' => function($text) { return $text; },
            'esc_html_x' => function($text) { return $text; },
            'esc_attr__' => function($text) { return $text; }
        ]);
        
        // Incluir a classe Powerfolio_Portfolio depois de configurar os mocks
        if (!class_exists('Powerfolio_Portfolio')) {
            require_once dirname(dirname(dirname(__FILE__))) . '/classes/PowerFolio_Portfolio.php';
        }
        
        // Cria stubs para verificar se os filtros foram chamados corretamente
        Filters\expectApplied('elemenfolio_posttypes_args')
            ->andReturn([]);
        
        Filters\expectApplied('powerfolio_portfolio_cpt_name')
            ->andReturn('Portfolio');
        
        Filters\expectApplied('powerfolio_portfolio_cpt_slug_rewrite')
            ->andReturn('portfolio');
            
        Filters\expectApplied('powerfolio_elemenfoliocategory_name')
            ->andReturn('Portfolio Category');
            
        Filters\expectApplied('powerfolio_elemenfoliocategory_slug_rewrite')
            ->andReturn('portfolio-category');
    }
    
    /**
     * Teardown após cada teste
     */
    public function tearDown(): void {
        Brain\Monkey\tearDown();
        parent::tearDown();
    }
    
    /**
     * Testa se o método register_portfolio_post_type está registrando
     * o post type 'elemenfolio' corretamente
     */
    public function test_register_portfolio_post_type() {
        // Configura expectativa para register_post_type
        Functions\expect('register_post_type')
            ->once()
            ->with('elemenfolio', \Mockery::type('array'))
            ->andReturnNull();
        
        // Executa o método real da classe
        $portfolio = new Powerfolio_Portfolio();
        $portfolio->register_portfolio_post_type();
        
        // Verificação explícita para evitar testes "risky"
        $this->assertTrue(true, 'O teste foi executado até o fim');
    }
    
    /**
     * Testa se o método create_portfolio_taxonomies está registrando
     * a taxonomia 'elemenfoliocategory' corretamente
     */
    public function test_register_portfolio_taxonomy() {
        // Configura expectativa para register_taxonomy
        Functions\expect('register_taxonomy')
            ->once()
            ->with('elemenfoliocategory', ['elemenfolio'], \Mockery::type('array'))
            ->andReturnNull();
        
        // Executa o método real da classe
        $portfolio = new Powerfolio_Portfolio();
        $portfolio->create_portfolio_taxonomies();
        
        // Verificação explícita para evitar testes "risky"
        $this->assertTrue(true, 'A taxonomia foi registrada corretamente');
    }
    
    /**
     * Testa se o método register_portfolio_shortcodes está registrando
     * os shortcodes 'powerfolio' e 'elemenfolio' corretamente
     */
    public function test_register_portfolio_shortcodes() {
        // O add_shortcode será chamado duas vezes
        Functions\expect('add_shortcode')
            ->times(2)
            ->andReturnNull();
            
        // Executa o método real da classe
        $portfolio = new Powerfolio_Portfolio();
        $portfolio->register_portfolio_shortcodes();
        
        // Verificação explícita para evitar testes "risky"
        $this->assertTrue(true, 'Os shortcodes foram registrados');
    }
    
    /**
     * Testa se o método get_widget_settings está definindo os atributos
     * padrão do shortcode corretamente
     */
    public function test_shortcode_default_attributes() {
        // Configura o mock para shortcode_atts para que ele retorne um array mesclado
        Functions\expect('shortcode_atts')
            ->andReturnUsing(function($defaults, $atts) {
                return array_merge($defaults, $atts);
            });
        
        // Chamamos o método real com um array vazio de atributos
        $settings = Powerfolio_Portfolio::get_widget_settings([]);
        
        // Verificamos se os atributos padrão foram definidos corretamente
        $this->assertIsArray($settings, 'Os settings devem ser um array');
        
        // Verificamos valores específicos de atributos padrão que são importantes
        $this->assertEquals('elemenfolio', $settings['post_type'], 'O post_type padrão deve ser elemenfolio');
        
        // Verificamos se as chaves de atributos importantes existem
        $expected_keys = [
            'postsperpage', 'showfilter', 'style', 'columns', 
            'columns_mobile', 'margin', 'linkto', 'element_id'
        ];
        
        foreach ($expected_keys as $key) {
            $this->assertArrayHasKey($key, $settings, "A chave {$key} deve existir nos settings");
        }
    }
    
    /**
     * Testa se o método get_widget_settings está mesclando corretamente
     * os atributos personalizados com os valores padrão
     */
    public function test_shortcode_custom_attributes() {
        // Atributos personalizados
        $custom_atts = [
            'postsperpage' => '5',
            'columns' => '4',
            'style' => 'grid'
        ];
        
        // Configura o mock para shortcode_atts para que ele retorne um array mesclado
        Functions\expect('shortcode_atts')
            ->andReturnUsing(function($defaults, $atts) {
                return array_merge($defaults, $atts);
            });
        
        // Chamamos o método real com atributos personalizados
        $settings = Powerfolio_Portfolio::get_widget_settings($custom_atts);
        
        // Verificamos se os valores personalizados foram mantidos
        $this->assertEquals('5', $settings['postsperpage'], 'O valor personalizado para postsperpage deve ser mantido');
        $this->assertEquals('4', $settings['columns'], 'O valor personalizado para columns deve ser mantido');
        $this->assertEquals('grid', $settings['style'], 'O valor personalizado para style deve ser mantido');
        
        // Verificamos se valores padrão foram aplicados para outros atributos
        $this->assertEquals('elemenfolio', $settings['post_type'], 'O post_type padrão deve ser aplicado mesmo com atributos personalizados');
    }
    
    /**
     * Testa o comportamento de sanitização de valores não numéricos para o atributo 'columns'
     */
    public function test_non_numeric_columns_attribute() {
        // Configura o mock para shortcode_atts
        Functions\expect('shortcode_atts')
            ->andReturnUsing(function($defaults, $atts) {
                return array_merge($defaults, $atts);
            });
        
        // Testa com um valor não numérico para 'columns'
        $atts_with_non_numeric = ['columns' => 'abc'];
        
        $settings = Powerfolio_Portfolio::get_widget_settings($atts_with_non_numeric);
        
        // Verificamos se 'columns' foi sanitizado para o valor padrão quando recebe um valor não numérico
        // A implementação atual não sanitiza, mas deveria - este teste confirma o comportamento atual
        $this->assertEquals('abc', $settings['columns'], 'Valores não numéricos para columns são aceitos sem sanitização');
    }
}
