<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "site/index";
$route['404_override'] = 'site/not_found';

$route['signup'] = 'user/signup';

$route['admin'] = 'user/index';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';

$route['admin/painel'] = 'panel/index';

$route['admin/usuarios'] = 'user/list_all';
$route['admin/usuarios/listar'] = 'user/list_all';
$route['admin/usuarios/(:num)'] = 'user/list_all/$1';
$route['admin/usuarios/novo'] = 'user/create';
$route['admin/usuarios/editar/(:num)'] = 'user/update/$1';
$route['admin/usuarios/excluir/(:num)'] = 'user/delete/$1';

$route['admin/novidades'] = 'novidades/index';
$route['admin/novidades/(:num)'] = 'novidades/index/$1';
$route['admin/novidades/novo'] = 'novidades/create';
$route['admin/novidades/editar/(:num)'] = 'novidades/update/$1';
$route['admin/novidades/excluir/(:num)'] = 'novidades/delete/$1';

$route['admin/linguagens'] = 'linguagens/index';
$route['admin/linguagens/(:num)'] = 'linguagens/index/$1';
$route['admin/linguagens/novo'] = 'linguagens/create';
$route['admin/linguagens/editar/(:num)'] = 'linguagens/update/$1';
$route['admin/linguagens/excluir/(:num)'] = 'linguagens/delete/$1';

<<<<<<< HEAD
$route['admin/galerias'] = 'galerias/index';
$route['admin/galerias/(:num)'] = 'galerias/index/$1';
$route['admin/galerias/novo'] = 'galerias/create';
$route['admin/galerias/editar/(:num)'] = 'galerias/update/$1';
$route['admin/galerias/excluir/(:num)'] = 'galerias/delete/$1';
$route['admin/galerias/imagens/(:num)'] = 'galerias/list_images/$1';
=======
$route['admin/paginas'] = 'paginas/index';
$route['admin/paginas/(:num)'] = 'paginas/index/$1';
$route['admin/paginas/novo'] = 'paginas/create';
$route['admin/paginas/editar/(:num)'] = 'paginas/update/$1';
$route['admin/paginas/excluir/(:num)'] = 'paginas/delete/$1';
>>>>>>> origin/master

$route['home'] = 'site/index';
$route['novidades'] = 'site/novidades';
$route['novidades/(:any)'] = 'site/novidade_url';
$route['quem-sou'] = 'site/quem_sou';
$route['o-que-faco'] = 'site/o_que_faco';
$route['termos-de-uso'] = 'site/termos_de_uso';
$route['politicas-de-privacidade'] = 'site/politicas_de_privacidade';
$route['contato'] = 'site/contato';
$route['enviar'] = 'site/enviar_mensagem';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
