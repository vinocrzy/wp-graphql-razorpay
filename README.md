# WPGraphQL Razorpay for WooCommerce (RazorpayGraphQL)

<a href="https://vinocrazy.com/" target="_blank">Vino Crazy</a>

## Quick Install

1. Install & activate [WooCommerce](https://woocommerce.com/)
2. Install & activate [Razorpay for WooCommerce](https://wordpress.org/plugins/woo-razorpay/)
3. Install & activate [WPGraphQL](https://www.wpgraphql.com/)
4. Clone or download the zip of this repository into your WordPress plugin directory & activate the **WP GraphQL WooCommerce** plugin.
5. (Optional) Install & activate [WPGraphQL-JWT-Authentication](https://github.com/wp-graphql/wp-graphql-jwt-authentication) to add a `login` mutation that returns a JSON Web Token.
6. (Optional) Install & activate [WPGraphQL-CORS](https://github.com/funkhaus/wp-graphql-cors) to add an extra layer of security using HTTP CORS and some of WPGraphQL advanced functionality.

## What does this plugin do?

It adds Razorpay for WooCommerce functionality to the WPGraphQL schema using WooCommerce's objects.

## Features

- Mutation **Create payment intent using rezorpay** with complex filtering options.

## Configuration

- Add your API key and secrets on  **wp-config.php**.

```php
    define('RAZORPAY_API_KEY', 'your_api_key_id');
    define('RAZORPAY_API_SECRET', 'your_api_secrets');
```


## Playground

Feel free to test out the extension using this [GraphiQL Playground](https://woographql.com/playground). The playground allows you to execute queries and mutations, as well as view the schema.
