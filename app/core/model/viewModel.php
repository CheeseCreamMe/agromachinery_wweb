<?php

class viewModel
{


    protected $white_list = ['home', 'error', 'maquinaria','veterinaria' , 'agricola', 'about', 'products', 'login', 'marcas'];
    protected function obtenerPagina($vista)
    {
        $white_list = $this->white_list;

        if (in_array($vista, $white_list)) {
            if ($vista == "agricola" || $vista == "maquinaria" || $vista == "veterinaria") {
                $text = ucfirst ($vista);
                $pagina_deseada = USER_VIEW . "productsViewPage.php";
            } else {
                if (is_file(USER_VIEW . $vista . "ViewPage.php")) {

                    $pagina_deseada = USER_VIEW . $vista . "ViewPage.php";
                } else {
                    $pagina_deseada = USER_VIEW . "homeViewPage.php";
                }
            }


        } else {
            $pagina_deseada = USER_VIEW . "notFoundViewPage.php";
        }

        return require_once $pagina_deseada;
    }

    protected function obtenerPaginaAdmin($vista)
    {
        $white_list = $this->white_list;

        if (isset($_SESSION['admin'])) {
            if (in_array($vista, $white_list)) {
                if (is_file(ADMIN_VIEW . $vista . "AdminPage.php")) {
                    $pagina_deseada = ADMIN_VIEW . $vista . "AdminPage.php";
                } else {
                    $pagina_deseada = ADMIN_VIEW . "homeAdminPage.php";
                }
            } else {
                $pagina_deseada = ADMIN_VIEW . "notFoundAdminPage.php";
            }
        }
        // Si no hay sesión de administrador redirige a login
        else {
            $pagina_deseada = ADMIN_VIEW_TEMPLATE . "login.php";
        }



        return require_once $pagina_deseada;
    }
}