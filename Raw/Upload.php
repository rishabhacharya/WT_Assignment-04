<?php
class Item_list
{
private $productList;
function __construct(array $productList){
        
    if(sizeof($productList)>0){
        $this->productList = $productList;}
    
    else{
        throw new Exception("No Data Availiable");}
    }

public function itemNames(){
    
    $ProductNames=array();
    foreach($this->productList as $list){
            
        $ProductNames[] = array(
        "Id"=>$list['id'],
        "Name"=>$list['name']);}
        
return json_encode($ProductNames); }
    
public function itemDetails($id) {
       
     $details=['Invalid Product Id'];
     foreach($this->productList as $list){
            if($id==$list['id']){
                
                $details=$list;
                break;
            }}
return json_encode($details); }
}
?>