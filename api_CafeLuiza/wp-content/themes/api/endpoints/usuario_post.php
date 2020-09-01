<?php

function api_usuario_post($request) {
    
    $email = sanitize_email($request['email']);
    $nome = sanitize_text_field($request['username']);
    $senha = $request['password'];


    if(empty($nome) || empty($email) || empty($senha)){
        $response = new WP_Error('error', 'Dados Incompletos', array('status' => 406));
        return rest_ensure_response($response);
    }

    if(username_exists($nome) || email_exists($email)){
        $response = new WP_Error('error', 'Email já cadastrado', array('status' => 403));
        return rest_ensure_response($response);
    }

    $response = wp_insert_user([
        'user_login' => $nome,
        'user_email' => $email,
        'user_pass' => $senha,
        'role' => 'subscriber'
    ]);

    return rest_ensure_response($response);
}

function registrar_api_usuario_post(){
    register_rest_route('api', '/usuario', [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => 'api_usuario_post',
    ]);
}

add_action('rest_api_init', 'registrar_api_usuario_post');

?>