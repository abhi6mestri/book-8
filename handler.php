<?php

//require_once __DIR__ . '/vendor/autoload.php';
ini_set('allow_url_fopen',1);
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '':
        require 'index.php';
        break;
     case '/':
        require 'index.php';
        break;
    case '/index':
        require 'index.php';
        break;
    case '/index.php':
        require 'index.php';
        break;
    case '/admin_dashboard':
        require 'admin_dashboard.php';
        break;
     case '/admin_dashboard.php':
        require 'admin_dashboard.php';
        break;
    case '/admin_login':
        require 'admin_login.php';
        break;
     case '/admin_login.php':
        require 'admin_login.php';
        break;
    case '/admin_logout':
        require 'admin_logout.php';
        break;
     case '/admin_logout.php':
        require 'admin_logout.php';
        break;
    case '/admin_mainOrder':
        require 'admin_mainOrder.php';
        break;
     case '/admin_mainOrder.php':
        require 'admin_mainOrder.php';
        break;
    case '/admin_mainRentOrder':
        require 'admin_mainRentOrder.php';
        break;
     case '/admin_mainRentOrder.php':
        require 'admin_mainRentOrder.php';
        break;
    case '/admin_nav':
        require 'admin_nav.php';
        break;
     case '/admin_nav.php':
        require 'admin_nav.php';
        break;
    case '/admin_orderDetails':
        require 'admin_orderDetails.php';
        break;
     case '/admin_orderDetails.php':
        require 'admin_orderDetails.php';
        break;
    case '/admin_orderRentDetails':
        require 'admin_orderRentDetails.php';
        break;
     case '/admin_orderRentDetails.php':
        require 'admin_orderRentDetails.php';
        break;
    case '/admin_paymentDetails':
        require 'admin_paymentDetails.php';
        break;
    case '/admin_paymentDetails.php':
        require 'admin_paymentDetails.php';
        break;
    case '/admin_productDetails':
        require 'admin_productDetails.php';
        break;
    case '/admin_productDetails.php':
        require 'admin_productDetails.php';
        break;
    case '/admin_sellerDetails':
        require 'admin_sellerDetails.php';
        break;
    case '/admin_sellerDetails.php':
        require 'admin_sellerDetails.php';
        break;
    case '/admin_userDetails':
        require 'admin_userDetails.php';
        break;
    case '/admin_userDetails.php':
        require 'admin_userDetails.php';
        break;
    case '/cart':
        require 'cart.php';
        break;
    case '/cart.php':
        require 'cart.php';
        break;
    case '/cart_rent':
        require 'cart_rent.php';
        break;
    case '/cart_rent.php':
        require 'cart_rent.php';
        break;
    case '/checkout':
        require 'checkout.php';
        break;
    case '/checkout.php':
        require 'checkout.php';
        break;
    case '/checkout_rent':
        require 'checkout_rent.php';
        break;
    case '/checkout_rent.php':
        require 'checkout_rent.php';
        break;
    case '/choose_pay':
        require 'choose_pay.php';
        break;
    case '/choose_pay.php':
        require 'choose_pay.php';
        break;
    case '/choose_pay_rent':
        require 'choose_pay_rent.php';
        break;
    case '/choose_pay_rent.php':
        require 'choose_pay_rent.php';
        break;
    case '/config':
        require 'config.php';
        break;
    case '/config.php':
        require 'config.php';
        break;
    case '/edit_product':
        require 'edit_product.php';
        break;
    case '/edit_product.php':
        require 'edit_product.php';
        break;
    case '/ins_product':
        require 'ins_product.php';
        break;
    case '/ins_product.php':
        require 'ins_product.php';
        break;
    case '/insert_admin':
        require 'insert_admin.php';
        break;
    case '/insert_admin.php':
        require 'insert_admin.php';
        break;
    case '/insert-card':
        require 'insert-card.php';
        break;
    case '/insert-card.php':
        require 'insert-card.php';
        break;
    case '/insert-card_rent':
        require 'insert-card_rent.php';
        break;
    case '/insert-card_rent.php':
        require 'insert-card_rent.php';
        break;
    case '/insert-cart':
        require 'insert-cart.php';
        break;
    case '/insert-cart.php':
        require 'insert-cart.php';
        break;
    case '/insert-cart_rent':
        require 'insert-cart_rent.php';
        break;
    case '/insert-cart_rent.php':
        require 'insert-cart_rent.php';
        break;
    case '/insert-cash':
        require 'insert-cash.php';
        break;
    case '/insert-cash.php':
        require 'insert-cash.php';
        break;
    case '/insert-order':
        require 'insert-order.php';
        break;
    case '/insert-order.php':
        require 'insert-order.php';
        break;
    case '/insert-order_rent':
        require 'insert-order_rent.php';
        break;
    case '/insert-order_rent.php':
        require 'insert-order_rentr.php';
        break;
    case '/seller_add-product':
        require 'seller_add-product.php';
        break;
    case '/seller_add-product.php':
        require 'seller_add-product.php';
        break;
    case '/seller_dashboard':
        require 'seller_dashboard.php';
        break;
    case '/seller_dashboard.php':
        require 'seller_dashboard.php';
        break;
    case '/seller_display-product':
        require 'seller_display-product.php';
        break;
    case '/seller_display-product.php':
        require 'seller_display-product.php';
        break;
    case '/seller_edit-product':
        require 'seller_edit-product.php';
        break;
    case '/seller_edit-product.php':
        require 'seller_edit-product.php';
        break;
    case '/seller_login':
        require 'seller.php';
        break;
    case '/seller_login.php':
        require 'seller_login.php';
        break;
    case '/seller_logout':
        require 'seller_logout.php';
        break;
    case '/seller_logout.php':
        require 'seller_logout.php';
        break;
    case '/seller_nav':
        require 'seller_nav.php';
        break;
    case '/seller_nav.php':
        require 'seller_nav.php';
        break;
    case '/seller_orderDetails':
        require 'seller_orderDetails.php';
        break;
    case '/seller_orderDetails.php':
        require 'seller_orderDetails.php';
        break;
    case '/seller_registration':
        require 'seller_registration.php';
        break;
    case '/seller_registration.php':
        require 'seller_registration.php';
        break;
    case '/success_card':
        require 'success_card.php';
        break;
    case '/success_card.php':
        require 'success_card.php';
        break;
    case '/success_card_rent':
        require 'success_card_rent.php';
        break;
    case '/success_card_rent.php':
        require 'success_card_rent.php';
        break;
    case '/success_cash':
        require 'success_cash.php';
        break;
    case '/success_cash.php':
        require 'success_cash.php';
        break;
    case '/user_books':
        require 'user_books.php';
        break;
    case '/user_books.php':
        require 'user_books.php';
        break;
    case '/user_header':
        require 'user_header.php';
        break;
    case '/user_header.php':
        require 'user_header.php';
        break;
    case '/user_header2':
        require 'user_header2.php';
        break;
    case '/user_header2.php':
        require 'user_header2.php';
        break;
    case '/user_login':
        require 'user_login.php';
        break;
    case '/user_login.php':
        require 'user_login.php';
        break;
    case '/user_logout':
        require 'user_logout.php';
        break;
    case '/user_logout.php':
        require 'user_logout.php';
        break;
    case '/user_nav':
        require 'user_nav.php';
        break;
    case '/user_nav.php':
        require 'user_nav.php';
        break;
    case '/user_registration':
        require 'user_registration.php';
        break;
    case '/user_registration.php':
        require 'user_registration.php';
        break;
    case '/user_rent-books':
        require 'user_rent-books.php';
        break;
    case '/user_rent-books.php':
        require 'user_rent-books.php';
        break;
    default:
        http_response_code(404);
        echo @parse_url($_SERVER['REQUEST_URI'])['path'];
        exit('Not Found');
}


?>
