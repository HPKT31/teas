<?php
function error($content, $type='dangger')
{
    $_SESSION['erro'] = '
    <div class="alert alert-'.$type.'" role="alert">
  '.$content.'
</div>';

}
function checkerro(){
    if(isset( $_SESSION['erro'])){
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
    }
}