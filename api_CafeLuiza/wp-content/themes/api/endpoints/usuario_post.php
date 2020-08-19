<?php

function api_usuario_post($request) {

    $nome = $request['nome'];
    $email = sanitize_email($request['email']);
    $senha = sanitize_text_field($request['senha']);
    $numero = sanitize_text_field($request['numero']);
    $apelido = sanitize_text_field($request['apelido']);

    $user_exists = username_exists($apelido);
    $email_exists = email_exists($email);

    if(!$user_exists && !$email_exists && $email && $senha){
        $user_id = wp_create_user($apelido, $senha, $email);
        
        $response = array(
            'ID' => $user_id,
            'display_name' => $nome,
            'firt_name' => $nome,
            'role' => 'subscriber' 
        );

        wp_update_user($response);

        update_user_meta($user_id, 'numero', $numero);

    }else{
        $response = new WP_Error('email', 'Email já cadastrado.', array('status' => 403));
    }

    return rest_ensure_response($response);
}

function registrar_api_usuario_post(){
    register_rest_route('api', '/usuario', array(
        array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => 'api_usuario_post',
        ),
    ));
}

add_action('rest_api_init', 'registrar_api_usuario_post');

?>