<?php
namespace AngieSnippets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Featured_Properties_bdf72cd6 extends Widget_Base {

    public function get_name() {
        return 'featured_properties_bdf72cd6';
    }

    public function get_title() {
        return esc_html__( 'Featured Properties', 'angie-snippets' );
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return [ 'angie-widgets', 'general' ];
    }

    public function get_style_depends() {
        return [ 'featured-properties-style-bdf72cd6' ];
    }

    protected function register_controls() {

        // Layout Tab
        $this->start_controls_section(
            'section_layout',
            [
                'label' => esc_html__( 'Layout', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'angie-snippets' ),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->end_controls_section();
		
		// Content Tab
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'products_per_page_desktop',
			[
				'label' => esc_html__( 'Products Per Page - Desktop', 'angie-snippets' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
				'min' => 1,
				'max' => 50,
				'step' => 1,
			]
		);

		$this->add_control(
			'products_per_page_tablet',
			[
				'label' => esc_html__( 'Products Per Page - Tablet', 'angie-snippets' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 4,
				'min' => 1,
				'max' => 50,
				'step' => 1,
			]
		);

		$this->add_control(
			'products_per_page_mobile',
			[
				'label' => esc_html__( 'Products Per Page - Mobile', 'angie-snippets' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 2,
				'min' => 1,
				'max' => 50,
				'step' => 1,
			]
		);

        $this->add_control(
            'read_more_text',
            [
                'label' => esc_html__( 'Read More Text', 'angie-snippets' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Read More', 'angie-snippets' ),
            ]
        );

        $this->add_control(
            'price_label',
            [
                'label' => esc_html__( 'Price Label', 'angie-snippets' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Price', 'angie-snippets' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'angie-snippets' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'View Details', 'angie-snippets' ),
            ]
        );
		
		$this->add_control(
			'show_category',
			[
				'label' => esc_html__( 'Show Category', 'angie-snippets' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'angie-snippets' ),
				'label_off' => esc_html__( 'Hide', 'angie-snippets' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_attributes',
			[
				'label' => esc_html__( 'Show Attributes', 'angie-snippets' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'angie-snippets' ),
				'label_off' => esc_html__( 'Hide', 'angie-snippets' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->end_controls_section();

        // Pagination Tab
        $this->start_controls_section(
            'section_pagination',
            [
                'label' => esc_html__( 'Pagination', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'products_per_page',
			[
				'label' => esc_html__( 'Products Per Page', 'angie-snippets' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
				'min' => 1,
				'max' => 50,
				'step' => 1,
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'angie-snippets' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'angie-snippets' ),
				'label_off' => esc_html__( 'Hide', 'angie-snippets' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
            'prev_icon',
            [
                'label' => esc_html__( 'Previous Icon', 'angie-snippets' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-left',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'show_pagination' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'next_icon',
            [
                'label' => esc_html__( 'Next Icon', 'angie-snippets' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'show_pagination' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
		
		// Style Tab - Card
        $this->start_controls_section(
            'section_style_card',
            [
                'label' => esc_html__( 'Card', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-wrapper',
            ]
        );
        
        $this->add_responsive_control(
            'card_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__( 'Padding', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
        // Style Tab - Attributes
		$this->start_controls_section(
			'section_style_attributes',
			[
				'label' => esc_html__( 'Attributes', 'angie-snippets' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_attributes' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'attributes_typography',
				'selector' => '{{WRAPPER}} .fp-bdf72cd6-feature-pill',
			]
		);

		$this->end_controls_section();

		// Style Tab - Read More
		$this->start_controls_section(
			'section_style_read_more',
			[
				'label' => esc_html__( 'Read More', 'angie-snippets' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'read_more_typography',
				'selector' => '{{WRAPPER}} .fp-bdf72cd6-read-more',
			]
		);

		$this->end_controls_section();

        // Style Tab - Image
        $this->start_controls_section(
            'section_style_image',
            [
                'label' => esc_html__( 'Image', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__( 'Padding', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Category
        $this->start_controls_section(
            'section_style_category',
            [
                'label' => esc_html__( 'Category', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-category',
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => esc_html__( 'Text Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-category' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'category_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-category' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'category_border',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-category',
            ]
        );

        $this->add_responsive_control(
            'category_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'category_padding',
            [
                'label' => esc_html__( 'Padding', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Texts
        $this->start_controls_section(
            'section_style_texts',
            [
                'label' => esc_html__( 'Title & Description', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_title_style',
            [
                'label' => esc_html__( 'Title', 'angie-snippets' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-title',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_desc_style',
            [
                'label' => esc_html__( 'Description', 'angie-snippets' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-description',
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-description' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'read_more_color',
            [
                'label' => esc_html__( 'Read More Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-read-more' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Price
        $this->start_controls_section(
            'section_style_price',
            [
                'label' => esc_html__( 'Price', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_price_label_style',
            [
                'label' => esc_html__( 'Price Label', 'angie-snippets' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_label_typography',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-price-label',
            ]
        );

        $this->add_control(
            'price_label_color',
            [
                'label' => esc_html__( 'Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-price-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_price_value_style',
            [
                'label' => esc_html__( 'Price Value', 'angie-snippets' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_value_typography',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-price-value',
            ]
        );

        $this->add_control(
            'price_value_color',
            [
                'label' => esc_html__( 'Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-price-value' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Button
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__( 'Button', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-btn',
            ]
        );

        $this->start_controls_tabs( 'tabs_button_style' );

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => esc_html__( 'Normal', 'angie-snippets' ),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__( 'Text Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-btn',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-btn',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => esc_html__( 'Hover', 'angie-snippets' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__( 'Text Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_hover_background',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-btn:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_hover_border',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-btn:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__( 'Padding', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Pagination Buttons
        $this->start_controls_section(
            'section_style_pagination_buttons',
            [
                'label' => esc_html__( 'Pagination Buttons', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'pagination_btn_size',
            [
                'label' => esc_html__( 'Size', 'angie-snippets' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pagination_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'angie-snippets' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 80,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( 'tabs_pagination_btn_style' );

        $this->start_controls_tab(
            'tab_pagination_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'angie-snippets' ),
            ]
        );

        $this->add_control(
            'pagination_btn_color',
            [
                'label' => esc_html__( 'Arrow Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'pagination_btn_background',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'pagination_btn_border',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_pagination_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'angie-snippets' ),
            ]
        );

        $this->add_control(
            'pagination_btn_hover_color',
            [
                'label' => esc_html__( 'Arrow Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'pagination_btn_hover_background',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'pagination_btn_hover_border',
                'selector' => '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'pagination_btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fp-bdf72cd6-pagination-arrows a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
		$settings = $this->get_settings_for_display();

		if ( ! function_exists( 'wc_get_product' ) ) {
			return;
		}

		$view_key = 'fp_view_' . sanitize_key( $this->get_id() );
		$view = isset( $_GET[ $view_key ] )
			? sanitize_key( wp_unslash( $_GET[ $view_key ] ) )
			: 'desktop';

		$desktop_per_page = isset( $settings['products_per_page_desktop'] )
			? max( 1, absint( $settings['products_per_page_desktop'] ) )
			: 6;

		$tablet_per_page = isset( $settings['products_per_page_tablet'] )
			? max( 1, absint( $settings['products_per_page_tablet'] ) )
			: 4;

		$mobile_per_page = isset( $settings['products_per_page_mobile'] )
			? max( 1, absint( $settings['products_per_page_mobile'] ) )
			: 2;

		if ( 'mobile' === $view ) {
			$per_page = $mobile_per_page;
		} elseif ( 'tablet' === $view ) {
			$per_page = $tablet_per_page;
		} else {
			$view = 'desktop';
			$per_page = $desktop_per_page;
		}
		$page_key = 'fp_page_' . sanitize_key( $this->get_id() );
		$page = isset( $_GET[ $page_key ] ) ? max( 1, absint( wp_unslash( $_GET[ $page_key ] ) ) ) : 1;

		$q = new \WP_Query( [
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'posts_per_page' => $per_page,
			'paged'          => $page,
			'tax_query'      => [
				[
					'taxonomy' => 'product_tag',
					'field'    => 'slug',
					'terms'    => 'featured',
				],
			],
		] );

		$total_pages = max( 1, (int) $q->max_num_pages );

		if ( $page > $total_pages && $q->found_posts > 0 ) {
			$page = $total_pages;
			$q = new \WP_Query( [
				'post_type'      => 'product',
				'post_status'    => 'publish',
				'posts_per_page' => $per_page,
				'paged'          => $page,
				'tax_query'      => [
					[
						'taxonomy' => 'product_tag',
						'field'    => 'slug',
						'terms'    => 'featured',
					],
				],
			] );
		}

		echo '<div class="fp-bdf72cd6-container"><div class="fp-bdf72cd6-grid">';

		while ( $q->have_posts() ) {
			$q->the_post();
			$product = wc_get_product( get_the_ID() );

			if ( ! $product ) {
				continue;
			}

			$url   = $product->get_permalink();
			$image = $product->get_image( 'woocommerce_thumbnail' );
			$cats  = wp_get_post_terms( $product->get_id(), 'product_cat', [ 'fields' => 'names' ] );
			$cat   = ( ! is_wp_error( $cats ) && ! empty( $cats ) ) ? $cats[0] : '';
			$desc  = $product->get_short_description();
			$price = $product->get_price_html();

			// WooCommerce product attributes used for the property feature pills.
			$bedroom  = trim( wp_strip_all_tags( $product->get_attribute( 'Bedroom' ) ) );
			$bathroom = trim( wp_strip_all_tags( $product->get_attribute( 'Bathroom' ) ) );
			$type     = trim( wp_strip_all_tags( $product->get_attribute( 'Type' ) ) );

			// Also support global attributes if these were later converted to pa_* attributes.
			if ( '' === $bedroom ) {
				$bedroom = trim( wp_strip_all_tags( $product->get_attribute( 'pa_bedroom' ) ) );
			}

			if ( '' === $bathroom ) {
				$bathroom = trim( wp_strip_all_tags( $product->get_attribute( 'pa_bathroom' ) ) );
			}

			if ( '' === $type ) {
				$type = trim( wp_strip_all_tags( $product->get_attribute( 'pa_type' ) ) );
			}

			echo '<div class="fp-bdf72cd6-wrapper">';

			if ( $image ) {
				echo '<div class="fp-bdf72cd6-image"><a href="' . esc_url( $url ) . '">' . wp_kses_post( $image ) . '</a></div>';
			}

			echo '<div class="fp-bdf72cd6-content">';

			if ( 'yes' === ( $settings['show_category'] ?? 'yes' ) && $cat ) {
				echo '<span class="fp-bdf72cd6-category">' . esc_html( $cat ) . '</span>';
			}

			echo '<h3 class="fp-bdf72cd6-title"><a href="' . esc_url( $url ) . '">' . esc_html( $product->get_name() ) . '</a></h3>';

			if ( $desc ) {
				echo '<div class="fp-bdf72cd6-description-wrap"><div class="fp-bdf72cd6-description">';
				echo wp_kses_post( wpautop( $desc ) );

				if ( ! empty( $settings['read_more_text'] ) ) {
					echo '<a href="' . esc_url( $url ) . '" class="fp-bdf72cd6-read-more">' . esc_html( $settings['read_more_text'] ) . '</a>';
				}

				echo '</div></div>';
			}

			echo '</div>';

			if (
				'yes' === ( $settings['show_attributes'] ?? 'yes' ) &&
				( $bedroom || $bathroom || $type )
			) {
				echo '<div class="fp-bdf72cd6-features">';

				if ( $bedroom ) {
					$bedroom_label = preg_match( '/bedroom/i', $bedroom )
						? $bedroom
						: $bedroom . '-Bedroom';

					echo '<span class="fp-bdf72cd6-feature-pill">';
					echo '<i class="fas fa-bed" aria-hidden="true"></i>';
					echo '<span>' . esc_html( $bedroom_label ) . '</span>';
					echo '</span>';
				}

				if ( $bathroom ) {
					$bathroom_label = preg_match( '/bathroom/i', $bathroom )
						? $bathroom
						: $bathroom . '-Bathroom';

					echo '<span class="fp-bdf72cd6-feature-pill">';
					echo '<i class="fas fa-bath" aria-hidden="true"></i>';
					echo '<span>' . esc_html( $bathroom_label ) . '</span>';
					echo '</span>';
				}

				if ( $type ) {
					echo '<span class="fp-bdf72cd6-feature-pill">';
					echo '<i class="fas fa-building" aria-hidden="true"></i>';
					echo '<span>' . esc_html( $type ) . '</span>';
					echo '</span>';
				}

				echo '</div>';
			}

			echo '<div class="fp-bdf72cd6-footer"><div class="fp-bdf72cd6-price-wrap">';

			if ( ! empty( $settings['price_label'] ) ) {
				echo '<div class="fp-bdf72cd6-price-label">' . esc_html( $settings['price_label'] ) . '</div>';
			}

			echo '<div class="fp-bdf72cd6-price-value">' . wp_kses_post( $price ) . '</div></div>';

			if ( ! empty( $settings['button_text'] ) ) {
				echo '<div class="fp-bdf72cd6-action"><a class="fp-bdf72cd6-btn" href="' . esc_url( $url ) . '">' . esc_html( $settings['button_text'] ) . '</a></div>';
			}

			echo '</div></div>';
		}

		echo '</div>';

		if ( 'yes' === ( $settings['show_pagination'] ?? 'yes' ) && $total_pages > 1 ) {
			$base = remove_query_arg( $page_key );

			echo '<div class="fp-bdf72cd6-pagination" data-current-page="' . esc_attr( $page ) . '" data-total-pages="' . esc_attr( $total_pages ) . '">';
			echo '<div class="fp-bdf72cd6-pagination-info">' . esc_html( $page . ' of ' . $total_pages ) . '</div>';
			echo '<div class="fp-bdf72cd6-pagination-arrows">';

			if ( $page > 1 ) {
				$prev = add_query_arg( $page_key, $page - 1, $base );
				echo '<a href="' . esc_url( $prev ) . '" class="fp-bdf72cd6-arrow-prev" aria-label="Previous page">';
				Icons_Manager::render_icon( $settings['prev_icon'] ?? [], [ 'aria-hidden' => 'true' ] );
				echo '</a>';
			}

			if ( $page < $total_pages ) {
				$next = add_query_arg( $page_key, $page + 1, $base );
				echo '<a href="' . esc_url( $next ) . '" class="fp-bdf72cd6-arrow-next" aria-label="Next page">';
				Icons_Manager::render_icon( $settings['next_icon'] ?? [], [ 'aria-hidden' => 'true' ] );
				echo '</a>';
			}

			echo '</div></div>';
		}

		echo '</div>';

		?>
		<script>
		(function() {
			var key = <?php echo wp_json_encode( $view_key ); ?>;
			var url = new URL(window.location.href);
			var current = url.searchParams.get(key) || 'desktop';
			var width = window.innerWidth || document.documentElement.clientWidth;
			var wanted = width <= 767 ? 'mobile' : (width <= 1024 ? 'tablet' : 'desktop');

			if (current !== wanted) {
				url.searchParams.set(key, wanted);

				// When changing responsive page-size, reset this widget to page 1
				// so the current page cannot become invalid.
				url.searchParams.delete(<?php echo wp_json_encode( $page_key ); ?>);

				window.location.replace(url.toString());
			}
		})();
		</script>
		<?php

		wp_reset_postdata();
	}
    protected function content_template() {
        /*
         * This widget is rendered server-side because the card content comes
         * from WooCommerce rather than Elementor control values.
         */
    }
}
