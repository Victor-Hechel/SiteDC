<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['(?i)admin/login'] = '/ContaController/index';
$route['(?i)admin/logar'] = '/ContaController/index';
$route['(?i)admin/logout'] = '/ContaController/Logout';


$route['(?i)admin'] = '/NoticiasController/indexAdmin';
$route['(?i)admin/noticias'] = '/NoticiasController/indexAdmin';
$route['(?i)admin/Noticias/cadastrar'] = '/NoticiasController/AtualizarInfo';
$route['(?i)admin/Noticias/atualizarInfo'] = '/NoticiasController/AtualizarInfo';
$route['(?i)admin/Noticias/editar/(:any)'] = '/NoticiasController/AtualizarInfo';
$route['(?i)admin/Noticias/excluir/(:any)'] = '/NoticiasController/Excluir';
$route['(?i)admin/Noticias/detalhes/(:any)'] = '/NoticiasController/Detalhes';

$route['Admin/Noticias/ListarNoticias'] = '/NoticiasController/ListarNoticias';


$route['(?i)admin/Professores'] = '/ProfessoresController/indexAdmin';
$route['(?i)admin/Professores/cadastrar'] ='/ProfessoresController/AtualizarInfo';
$route['(?i)admin/Professores/excluir/(:any)'] ='/ProfessoresController/Excluir';
$route['(?i)admin/Professores/editar/(:any)'] ='/ProfessoresController/AtualizarInfo';
$route['(?i)admin/Professores/detalhes/(:any)'] ='/ProfessoresController/Detalhes';

$route['(?i)admin/Professores/Listar'] = '/ProfessoresController/Listar';
$route['(?i)Admin/Professores/AlterarAtivo/(:any)/(:any)'] = '/ProfessoresController/AlterarAtivo';


$route['(?i)admin/Tccs'] = '/TccsController/indexAdmin';
$route['(?i)admin/Tccs/cadastrar'] = '/TccsController/Cadastrar';
$route['(?i)admin/Tccs/editar/(:any)'] = '/TccsController/Cadastrar';
$route['(?i)admin/Tccs/excluir/(:any)'] = '/TccsController/Excluir';
$route['(?i)admin/Tccs/detalhes/(:any)'] = '/TccsController/Detalhes';

$route['(?i)admin/Tccs/Listar'] = '/TccsController/Listar';


$route['(?i)admin/Projetos'] = '/ProjetosController/indexAdmin';
$route['(?i)admin/Projetos/cadastrar'] = '/ProjetosController/Cadastrar';
$route['(?i)admin/Projetos/Excluir/(:any)'] = '/ProjetosController/Excluir';

$route['(?i)admin/Projetos/Listar'] = '/ProjetosController/Listar';
$route['(?i)admin/Projetos/editar/(:any)'] = '/ProjetosController/Cadastrar';



$route['(?i)Noticias'] = '/NoticiasController/indexUser';
$route['NoticiasFiltro/(:any)'] = '/NoticiasController/ListarNoticiasFiltro';
$route['NoticiasFiltro'] = '/NoticiasController/ListarNoticiasFiltro';
$route['Noticia/(:any)'] = '/NoticiasController/Detalhes';


$route['Professores'] = '/ProfessoresController/indexUser';

$route['Cursos/(:any)'] = '/CursosController';
$route['Cursos/(:any)/(:any)'] = '/CursosController/ListarTccsFiltro';

$route['Projetos/(:any)'] = '/ProjetosController/indexUser';
$route['ProjetosListar/(:any)/(:any)'] = '/ProjetosController/Listar';
$route['ProjetosListar/(:any)'] = '/ProjetosController/Listar';
$route['Projeto/(:any)'] = 'ProjetosController/Detalhes';