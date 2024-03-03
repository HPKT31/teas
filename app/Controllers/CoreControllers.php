<?php
// class CoreControllers{
//     public function loadview($viewName,$data=[]){
//         extract($data);
//         include_once '../app/Views/'.$viewName.'.php';
      

    
//     }
//     public function loadmodel($modelName){
//         return new($modelName."Model")();
//     }

// }
class CoreControllers {
    protected $data;
    protected $stro;
    public function loadView($viewName,$data=[],$stro=[]) {
       
        extract($data);
        extract($stro);
        include_once '../app/Views/hearder.php';
        include_once '../app/Views/'.$viewName.'.php';
        include_once '../app/Views/footer.php';

    }
    public function loadadmin($viewName,$data=[],$stro=[]) {
       
        extract($data);
        extract($stro);
        include_once '../app/Views/headerAdmin.php';
        include_once '../app/Views/'.$viewName.'.php';
        // include_once '../app/Views/footer.php';

    }
    // public function product($viewName,$data=[],$stro=[]){
    //     extract($data); 
    //     include_once '../app/Views/hearder.php';
    //     include_once '../app/Views/'.$viewName.'.php';
    //     include_once '../app/Views/footer.php';

    // }
    public function loadModel($modelName) {
        return new ($modelName."Model")();
    }
}