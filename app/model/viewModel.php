<?php
class ViewModel {
    protected $white_list =[ 'home','error','maquinaria','agricola'];
    protected function obtenerPagina($vista) {
    
    $white_list = $this->white_list;

    if(in_array($vista , $white_list))
        {
            if(is_file(VIEW.$vista."ViewPage.php"))
            {
                $pagina_deseada = VIEW.$vista."ViewPage.php";
            }
            else
            {
                $pagina_deseada = VIEW."homeViewPage.php";
            }
        }
        else
        {
            $pagina_deseada = VIEW."notFoundViewPage.php";
        }

        return $pagina_deseada;
    }

    protected function obtenerPaginaAdmin($vista) {
        $white_list = $this->white_list;
        if(in_array($vista , $white_list))
        {
            if(is_file(ADMIN.$vista."ViewPage.php"))
            {
                $pagina_deseada = ADMIN.$vista."ViewPage.php";
            }
            else
            {
                $pagina_deseada = VIEW."homeViewPage.php";
            }
        }
        else
        {
            $pagina_deseada = VIEW."notFoundViewPage.php";
        }

        return $pagina_deseada;
    }
}