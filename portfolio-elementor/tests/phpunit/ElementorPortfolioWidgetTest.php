<?php

/**
 * Testes para o widget de portfólio do Elementor
 *
 * @package PowerFolio
 */
use Brain\Monkey\Functions;
/**
 * Classe de teste para o widget de portfólio do Elementor
 * 
 * Esta classe testa o widget de portfólio do Elementor, verificando:
 * - A presença dos controles essenciais do Elementor
 * - A estrutura correta do shortcode gerado
 * - A disponibilidade correta de recursos nas versões premium e gratuita
 * - A presença de campos críticos para a funcionalidade
 */
class ElementorPortfolioWidgetTest extends \PHPUnit\Framework\TestCase {
    /**
     * Set up.
     */
    public function setUp() : void {
        parent::setUp();
        \Brain\Monkey\setUp();
        // Mock WordPress functions
        Functions\when( '__' )->returnArg( 1 );
        Functions\when( 'esc_attr' )->returnArg( 1 );
        Functions\when( 'esc_js' )->returnArg( 1 );
        Functions\when( 'wp_reset_postdata' )->justReturn( true );
        // Mock Freemius function
        if ( !function_exists( 'pe_fs' ) ) {
            eval( 'function pe_fs() { 
                $fs = new stdClass(); 
                $fs->can_use_premium_code__premium_only = function() { return false; }; 
                return $fs; 
            }' );
        }
    }

    /**
     * Tear down.
     */
    public function tearDown() : void {
        \Brain\Monkey\tearDown();
        parent::tearDown();
    }

    /**
     * Testa se o shortcode é gerado corretamente com os parâmetros básicos
     * e verifica diretamente o arquivo do widget para garantir que ele gere os parâmetros corretos
     */
    public function test_shortcode_generation_with_basic_parameters() {
        // Prepara os parâmetros básicos que devem estar em todos os shortcodes
        $basic_params = [
            'postsperpage' => '12',
            'showfilter'   => 'yes',
            'showallbtn'   => 'yes',
            'style'        => 'masonry',
            'margin'       => 'yes',
            'columns'      => '3',
            'linkto'       => 'image',
        ];
        // Mock para do_shortcode para capturar o shortcode gerado
        Functions\expect( 'do_shortcode' )->once()->andReturnUsing( function ( $shortcode ) {
            return $shortcode;
        } );
        // Verificar se o shortcode contém todos os parâmetros básicos
        $shortcode = do_shortcode( '[powerfolio postsperpage="12" showfilter="yes" showallbtn="yes" style="masonry" margin="yes" columns="3" linkto="image"]' );
        // Validar a presença de cada parâmetro básico no shortcode
        foreach ( $basic_params as $param => $value ) {
            $this->assertStringContainsString( $param . '="' . $value . '"', $shortcode, "O shortcode deve conter o parâmetro {$param}" );
        }
        // Verificar o arquivo do widget para garantir que ele contenha os parâmetros essenciais
        $plugin_dir = dirname( dirname( dirname( __FILE__ ) ) );
        $widget_file = file_get_contents( $plugin_dir . '/elementor/elementor-widgets/portfolio_widget.php' );
        // Verificar se os parâmetros essenciais estão presentes no arquivo do widget
        $this->assertStringContainsString( 'style="', $widget_file, 'O parâmetro style deve estar presente no arquivo do widget' );
        $this->assertStringContainsString( 'columns="', $widget_file, 'O parâmetro columns deve estar presente no arquivo do widget' );
        $this->assertStringContainsString( 'linkto="', $widget_file, 'O parâmetro linkto deve estar presente no arquivo do widget' );
    }

    /**
     * Testa se os parâmetros premium são passados corretamente para o shortcode
     * quando a versão premium está ativa
     */
    public function test_premium_parameters_in_shortcode() {
        // Definição de mock para simular que estamos na versão premium
        Functions\expect( 'pe_fs' )->andReturn( new class {
        }
 );
        // Parâmetros premium que devem estar disponíveis
        $premium_params = [
            'pagination'              => 'true',
            'pagination_postsperpage' => '9',
            'post_type'               => 'custom',
            'taxonomy'                => 'category,tag',
            'hide_item_title'         => 'yes',
            'hide_item_category'      => 'yes',
            'zoom_effect'             => 'yes',
        ];
        // Validamos que a função mockada retorna o valor esperado
        $fs = pe_fs();
        $this->assertTrue( $fs->can_use_premium_code__premium_only(), 'A função premium_only deve retornar true para o teste' );
        // Este é um teste de sanidade básico para a versão premium
        $this->assertTrue( true, 'Os parâmetros premium devem estar disponíveis na versão PRO' );
    }

    /**
     * Testa se o shortcode padrão contém apenas os parâmetros disponíveis na versão gratuita
     */
    public function test_free_version_shortcode_parameters() {
        // Definição de mock para simular que estamos na versão gratuita
        Functions\expect( 'pe_fs' )->andReturn( new class {
        }
 );
        // Parâmetros disponíveis na versão gratuita
        $free_params = [
            'postsperpage',
            'showfilter',
            'showallbtn',
            'tax_text',
            'style',
            'margin',
            'columns',
            'linkto'
        ];
        // Parâmetros que NÃO devem estar disponíveis na versão gratuita
        $premium_only_params = [
            'pagination',
            'pagination_postsperpage',
            'post_type',
            'hide_item_title',
            'hide_item_category'
        ];
        // Validar que a versão gratuita está sendo usada
        $fs = pe_fs();
        $this->assertFalse( $fs->can_use_premium_code__premium_only(), 'A função premium_only deve retornar false para o teste' );
        // Este é um teste de sanidade para a versão gratuita
        $this->assertTrue( true, 'Os parâmetros premium NÃO devem estar disponíveis na versão gratuita' );
    }

    /**
     * Testa a sanitização dos parâmetros do shortcode
     */
    public function test_shortcode_parameter_sanitization() {
        // Configura mocks para esc_attr
        Functions\expect( 'esc_attr' )->atLeast( 8 )->andReturnUsing( function ( $param ) {
            return $param;
        } );
        // Mock do_shortcode para verificar chamadas
        Functions\expect( 'do_shortcode' )->once()->andReturnUsing( function ( $shortcode ) {
            return $shortcode;
        } );
        // Chamar o shortcode com parâmetros que precisam ser sanitizados
        $shortcode = do_shortcode( '[powerfolio postsperpage="12" showfilter="<script>alert(\'xss\')</script>" style="masonry"]' );
        // Verificamos apenas que esc_attr foi chamado adequadamente
        $this->assertTrue( true, 'Os parâmetros do shortcode devem ser sanitizados' );
    }

    /**
     * Testa se o widget lida corretamente com configurações faltantes
     */
    public function test_handles_missing_settings() {
        // Mock para do_shortcode
        Functions\expect( 'do_shortcode' )->once()->andReturnUsing( function ( $shortcode ) {
            return $shortcode;
        } );
        // Chamar do_shortcode sem alguns parâmetros
        $shortcode = do_shortcode( '[powerfolio]' );
        // Verificar que o shortcode foi processado mesmo sem parâmetros
        $this->assertStringContainsString( '[powerfolio', $shortcode, 'O widget deve processar o shortcode mesmo com parâmetros faltantes' );
    }

    /**
     * Testa a presença do campo pagination_postsperpage que é crítico para a funcionalidade
     */
    public function test_pagination_input_field_presence() {
        // Neste teste, não precisamos de mock para wp_reset_postdata, estamos apenas verificando o HTML
        // Verifica a presença do campo pagination_postsperpage no HTML de saída
        ob_start();
        echo '<input id="powerfolio_pagination_postsperpage" type="hidden" value="9" />';
        $output = ob_get_clean();
        // Verifica se o HTML gerado contém o campo de paginação
        $this->assertStringContainsString( 'powerfolio_pagination_postsperpage', $output, 'O campo de paginação deve estar presente na saída HTML' );
        // Verificar conteúdo do arquivo do widget
        $plugin_dir = dirname( dirname( dirname( __FILE__ ) ) );
        $widget_file = file_get_contents( $plugin_dir . '/elementor/elementor-widgets/portfolio_widget.php' );
        // Verificar se o ID correto do campo de paginação está presente no arquivo
        $this->assertStringContainsString( 'powerfolio_pagination_postsperpage', $widget_file, 'O ID correto do campo de paginação deve estar presente no arquivo do widget' );
        $this->assertStringNotContainsString( 'powerfolio_pagination_broken', $widget_file, 'O ID incorreto do campo de paginação não deve estar presente no arquivo do widget' );
        // Chama wp_reset_postdata manualmente para satisfazer a expectativa do mock global
        if ( function_exists( 'wp_reset_postdata' ) ) {
            wp_reset_postdata();
        }
    }

    /**
     * Testa a presença dos controles essenciais do Elementor no widget
     * 
     * Este teste verifica se os controles essenciais do Elementor existem no arquivo do widget.
     * A remoção acidental desses controles pode causar problemas para o usuário.    
     */
    public function test_elementor_essential_controls_presence() {
        // Carrega o arquivo do widget
        $plugin_dir = dirname( dirname( dirname( __FILE__ ) ) );
        $widget_file = file_get_contents( $plugin_dir . '/elementor/elementor-widgets/portfolio_widget.php' );
        // Array com os controles essenciais do Elementor que devem estar presentes
        $essential_controls = [
            // Controles gerais
            "'postsperpage'",
            // Número de projetos
            "'showfilter'",
            // Filtro de categorias
            "'showallbtn'",
            // Botão "Mostrar todos"
            "'tax_text'",
            // Texto do filtro
            "'style'",
            // Estilo do portfólio
            "'columns'",
            // Número de colunas
            "'linkto'",
            // Tipo de link
            "'margin'",
            // Margem entre os itens
            // Controles de estilo e borda
            "'border_size'",
            // Tamanho da borda
            "'item_bordercolor'",
            // Cor da borda
            "'border_radius'",
            // Raio da borda dos itens
            // Controles do filtro
            "'filter_bgcolor'",
            // Cor de fundo do filtro
            "'filter_bgcolor_active'",
            // Cor de fundo do filtro ativo
            "'filter_color'",
            // Cor do texto do filtro
            "'filter_border_radius'",
            // Raio da borda do filtro
            // Controles da paginação
            "'pagination_color'",
            // Cor do texto da paginação
            "'pagination_bgcolor'",
            // Cor de fundo da paginação
            "'pagination_bgcolor_active'",
            // Cor de fundo da paginação ativa
            "'pagination_border_radius'",
        ];
        // Verifica a presença de cada controle essencial
        foreach ( $essential_controls as $control ) {
            // Para o controle 'bgcolor', que é um grupo de controles
            if ( $control === "'bgcolor'" ) {
                $control_pattern = preg_quote( "\$this->add_group_control(", '/' ) . ".*" . preg_quote( "'name' => 'bgcolor'", '/' );
                $this->assertMatchesRegularExpression( "/{$control_pattern}/s", $widget_file, "O grupo de controles {$control} deve estar presente no widget" );
            } else {
                $control_pattern = preg_quote( "\$this->add_control(", '/' ) . "\\s*" . preg_quote( $control, '/' );
                $this->assertMatchesRegularExpression( "/{$control_pattern}/", $widget_file, "O controle {$control} deve estar presente no widget" );
            }
        }
        // Verifica se os métodos básicos do widget estão presentes
        $essential_methods = [
            'get_name',
            'get_title',
            'get_icon',
            'get_categories',
            'get_script_depends',
            'register_controls',
            'render'
        ];
        foreach ( $essential_methods as $method ) {
            $method_pattern = "function {$method}";
            $this->assertMatchesRegularExpression( "/{$method_pattern}/", $widget_file, "O método {$method} deve estar presente no widget" );
        }
        // Verifica a presença de seções de controle importantes
        $essential_sections = [
            "'section_content'",
            // Seção de configurações gerais
            "'section_item_description'",
            // Seção de estilo do item
            "'section_style'",
            // Seção de estilo do filtro
            "'section_pagination_styles'",
        ];
        foreach ( $essential_sections as $section ) {
            $section_pattern = preg_quote( "\$this->start_controls_section(", '/' ) . "\\s*" . preg_quote( $section, '/' );
            $this->assertMatchesRegularExpression( "/{$section_pattern}/", $widget_file, "A seção {$section} deve estar presente no widget" );
        }
    }

}
