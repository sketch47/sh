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
}