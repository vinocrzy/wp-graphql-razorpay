<?php
/*
 * Plugin Name: Razorpay for WooCommerce WPGraphQL server
 * Description: Razorpay Payment Gateway Integration for WooCommerce
 * Author:            Vino Crazy
 * Author URI:        https://vinocrazy.com/
 * Domain Path:       /languages
 * Version:           0.1.0
 * Requires PHP:      7.0
 * GitHub Plugin URI: https://github.com/vinocrzy/wp-graphql-woocommerce-gold-price
*/

require_once(__DIR__ . '/vendor/autoload.php');

use Razorpay\Api\Api;

$api_key = defined('RAZORPAY_API_KEY') ? RAZORPAY_API_KEY : '';

$api_secret = defined('RAZORPAY_API_SECRET') ? RAZORPAY_API_SECRET : '';

$GLOBALS['api'] = new Api($api_key, $api_secret);


add_action('graphql_register_types', 'razorpay');

function razorpay()
{
    register_graphql_mutation('paymentIntent', [

        # inputFields expects an array of Fields to be used for inputting values to the mutation
        'inputFields'         => [
            'amount' => [
                'type' => 'Float',
                'description' => __('Razerpay Amount', 'wp-graphql-razorpay'),


            ],
            'currency' => [
                'type' => 'String',
                'description' => __('Razerpay Currency', 'wp-graphql-razorpay'),

            ],
            'email' => [
                'type' => 'String',
                'description' => __('User email', 'wp-graphql-razorpay'),

            ],
            'phone' => [
                'type' => 'String',
                'description' => __('User phone', 'wp-graphql-razorpay'),

            ],

        ],

        # outputFields expects an array of fields that can be asked for in response to the mutation
        # the resolve function is optional, but can be useful if the mutateAndPayload doesn't return an array
        # with the same key(s) as the outputFields
        'outputFields'        => [
            'id' => [
                'type' => 'String',
                'description' => __('Description of the output field', 'your-textdomain'),
                'resolve' => function ($payload, $args, $context, $info) {
                    return isset($payload['id']) ? $payload['id']  : null;
                }
            ],
            'amount' => [
                'type' => 'String',
                'description' => __('Description of the output field', 'your-textdomain'),
                'resolve' => function ($payload, $args, $context, $info) {
                    return isset($payload['amount']) ? $payload['amount']  : null;
                }
            ],
            'currency' => [
                'type' => 'String',
                'description' => __('Description of the output field', 'your-textdomain'),
                'resolve' => function ($payload, $args, $context, $info) {
                    return isset($payload['currency']) ? $payload['currency']  : null;
                }
            ],
            'email' => [
                'type' => 'String',
                'description' => __('Description of the output field', 'your-textdomain'),
                'resolve' => function ($payload, $args, $context, $info) {
                    return isset($payload['email']) ? $payload['email']  : null;
                }
            ],
            'phone' => [
                'type' => 'String',
                'description' => __('Description of the output field', 'your-textdomain'),
                'resolve' => function ($payload, $args, $context, $info) {
                    return isset($payload['phone']) ? $payload['phone']  : null;
                }
            ],
        ],

        # mutateAndGetPayload expects a function, and the function gets passed the $input, $context, and $info
        # the function should return enough info for the outputFields to resolve with
        'mutateAndGetPayload' => function ($input, $context, $info) {
            // Do any logic here to sanitize the input, check user capabilities, etc
            // $Output = null;

            // $Output = $input;



            $order = $GLOBALS['api']->order->create(array('receipt' => '123',  'amount' => $input['amount'],  'currency' => $input['currency']));

            return [
                'id' => $order['id'],
                'amount' => $order['amount'],
                'currency' => $order['currency'],
                'email' => $input['email'],
                'phone' => $input['phone'],
            ];
        }
    ]);
}
