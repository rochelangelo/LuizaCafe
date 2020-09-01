<?php 

//remove_action('rest_api_init', 'create_initial_rest_routes', 99);


$template_diretorio = get_template_directory();

require_once($template_diretorio . "/custom-post-type/produto.php");
require_once($template_diretorio . "/custom-post-type/transacao.php");


require_once($template_diretorio . "/endpoints/usuario_post.php");
require_once($template_diretorio . "/endpoints/usuario_get.php");
require_once($template_diretorio . "/endpoints/usuario_put.php");

require_once($template_diretorio . "/endpoints/foto_post.php");


update_option('large_size_w', 1000);
update_option('large_size_h', 1000);
update_option('large_crop', 1);


function change_api(){
    return 'json';
}

function expire_tokens(){
    return time() + (60 * 60 * 12);
}

add_filter('rest_url_prefix', 'change_api');
add_action('jwt_auth_expire', 'expire_tokens');


?>