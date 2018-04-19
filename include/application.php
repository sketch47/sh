<?php


class app
{
   public function title($title){
       echo "<script id='title' type=\"text/javascript\">$('title').html('".$title."');$('script#title').remove()</script>";
   }
   public function addStyle($src){
       echo "<script id='link'  type=\"text/javascript\"> $('head').append('<link rel=\"stylesheet\" href=\"".$src."\" />');$('script#link').remove()</script>";
   }
   public function GetCurPage(){
       return $_SERVER['REQUEST_URI'];
   }
   public function ShowModal($title,$text){
       echo "
            <div class=\"Modal\" class=\"modal\">
                <div class=\"modal-content\">
                    <span class=\"close\">&times;</span><br>
                    ";
            if($title)
                echo "<div class='modal_title'>".$title."</div>";
                echo "<div class='modal_text'>".$text."</div>
                    <!--<div class='modal_button'><button>Закрыть</button></div>-->
                </div>
               
            </div>
            <script id='modal' type='text/javascript'>
            $('.close').click(function() {
               $('.Modal').remove();
               $('script#modal').remove()
               window.location.href = '".$_SERVER['REQUEST_URI']."';
            })
            </script>
       ";
   }

   public function YesOrNo($val)
   {
       echo "
       <div class=\"Modal\" class=\"modal\">
                <div class=\"modal-content\" style='width: 150px'>
                    <span class=\"close\">&times;</span><br>
                    ";

       echo "<div class='modal_text'><button  onclick='yes()'>Да</button><button onclick='no()'>Нет</button></div>
                </div>
               
            </div>
            <script id='modal' type='text/javascript'>
                function no() {
                    window.location.href = \"".explode('?',$_SERVER['REQUEST_URI'])[0];
                echo "\"}
                function yes() {
                   window.location.href = \"".$_SERVER['REQUEST_URI'].'?YesOrNo='.$val;
                echo "\"}
            $('.close').click(function() {
               $('.Modal').remove();
               $('script#modal').remove()
               window.location.href = '".$_SERVER['REQUEST_URI']."';
            })
            </script>";
   }
   public function RefreshPage()
   {
       echo "<script>window.location.href = '".explode('?',$_SERVER['REQUEST_URI'])[0]."';</script>";
   }

   public function Redirect($str)
   {
       echo "<script>window.location.href = '$str'</script>";
   }
   public function translit($str) {
       $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
       $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');

       return str_replace(" ","_",str_replace($rus, $lat, $str));
   }
}