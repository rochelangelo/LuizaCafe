<?php

function api_usuario_get($request) {

    $usuario = wp_get_current_user();
    $usuario_id = $usuario->ID;

    if ($usuario_id === 0) {
        $response = new WP_Error('error', 'Usuário não possui permissão', ['status' => 401]);
        return rest_ensure_response($response);
    }

    $response = [
        'id' => $usuario_id,
        'username' => $usuario->user_login,
        'nome' => $usuario->display_name,
        'email' => $usuario->user_email
    ];


    return rest_ensure_response($response);
}

function registrar_api_usuario_get(){
    register_rest_route('api', '/usuario', [
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'api_usuario_get',
    ]);
}

add_action('rest_api_init', 'registrar_api_usuario_get');

?>