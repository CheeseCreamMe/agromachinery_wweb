<?php
class ViewModel {

    protected function obtenerPagina($vista) {
    $white_list =[ 'home','error','products','contact','about', 'identify'];


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
        else if($vista == "index")
        {
            $pagina_deseada = VIEW."homeViewPage.php";
        }
        else if($vista == "error")
        {
            $pagina_deseada = VIEW."notFoundViewPage.php";
        }
        else if(!in_array($vista , $white_list))
        {
            $pagina_deseada = VIEW."notFoundViewPage.php";
        }

        return $pagina_deseada;
    }
}

