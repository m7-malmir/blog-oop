<?php
// require_once 'dbh.classes.php';
class DeleteProduct extends Dbh{
   
    public function deleteProduct(){
        $query="delete from tablename where id=?";
    }
   


}
   