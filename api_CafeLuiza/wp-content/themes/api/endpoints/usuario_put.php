<?php

function api_usuario_put($request) {

    $user = wp_get_current_user();
    $user_id = $user->ID;

    if($user_id > 0) {
        $nome = $request['nome'];
        $email = sanitize_email($request['email']);
        $senha = sanitize_text_field($request['senha']);
        $numero = sanitize_text_field($request['numero']); 
        $apelido = sanitize_text_field($request['apelido']);

        $email_exists = email_exists($email);

        if(!$email_exists || $email_exists === $user_id) {
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
    } else {
        $response = new WP_Error('permissao', 'Usuário não possui permissão.', array('status' => 401));
    }

        return rest_ensure_response($response);
}

function registrar_api_usuario_put() {
    register_rest_route('api', '/usuario', array(
      array(
        'methods' => WP_REST_Server::EDITABLE,
        'callback' => 'api_usuario_put',
      ),
    ));
  }

add_action('rest_api_init', 'registrar_api_usuario_put');

?>