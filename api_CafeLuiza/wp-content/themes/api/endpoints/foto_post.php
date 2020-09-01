<?php

function api_foto_post($request) {

    $usuario = wp_get_current_user();

    $usuario_id = $usuario->ID;

    if($usuario_id === 0){
        $response = new WP_Error('error', 'Usuario não possui permissão.', ['status' => 401]);
        return rest_ensure_response($response);
    }

    $nome = sanitize_text_field($request['nome']);
    $descricao = sanitize_text_field($request['descricao']);
    $valor = sanitize_text_field($request['valor']);
    $arquivos = $request->get_file_params();

    if(empty($nome) || empty($descricao) || empty($valor) || empty($arquivos) ){
        $response = new WP_Error('error', 'Usuario não possui permissão.', ['status' => 401]);
        return rest_ensure_response($response);
    }

    $response = [
        'post_author' => $usuario_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'post_title' => $nome,
        'post_content' => $descricao,
        'files' => $arquivos,
        'meta_input' => [
            'valor' => $valor, 
            'acessos' => 0
        ],
    ];

    $post_id = wp_insert_post($response);

    
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    $foto_id = media_handle_upload('img', $post_id);

    update_post_meta($post_id, 'img', $foto_id);

    return rest_ensure_response($response);
}

function registrar_api_foto_post(){
    register_rest_route('api', '/foto', [
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => 'api_foto_post',
    ]);
}

add_action('rest_api_init', 'registrar_api_foto_post');

?>