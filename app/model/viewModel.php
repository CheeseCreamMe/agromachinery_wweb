<?php
class ViewModel
{
    protected $white_list = ['home', 'error', 'maquinaria', 'agricola', 'about', 'products','login'];
    protected function obtenerPagina($vista)
    {

        $white_list = $this->white_list;

        if (in_array($vista, $white_list)) {
            if (is_file(VIEW . $vista . "ViewPage.php")) {
                $pagina_deseada = VIEW . $vista . "ViewPage.php";
            } else {
                $pagina_deseada = VIEW . "homeViewPage.php";
            }
        } else {
            $pagina_deseada = VIEW . "notFoundViewPage.php";
        }

        return $pagina_deseada;
    }

    protected function obtenerPaginaAdmin($vista)
    {
        $white_list = $this->white_list;

        if (isset($_SESSION['admin'])) {
            if (in_array($vista, $white_list)) {
                if (is_file(ADMIN . $vista . "ViewPage.php")) {
                    $pagina_deseada = ADMIN . $vista . "ViewPage.php";
                } else {
                    $pagina_deseada = VIEW . "homeViewPage.php";
                }
            } else {
                $pagina_deseada = VIEW . "notFoundViewPage.php";
            }
        }
        // Si no hay sesión de administrador redirige a login
        else {
            $pagina_deseada = ADMIN."loginViewPage.php";
        }



        return $pagina_deseada;
    }
}