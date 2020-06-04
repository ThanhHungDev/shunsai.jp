<?php 
function connectDb(){
    $string = file_get_contents($_SERVER['DOCUMENT_ROOT']. "/db.json");
    return json_decode($string, true);
}

function food($slug){
   
    $database = connectDb();
    $foods = array();
    if( $database ){
        $foods = $database['foods'];
    }
    $food = [
        "name" => "チキン竜田生姜焼き弁当",
        "slug" => "chikintatsuta",
        "description"=> "食べ応えのある大ぶりのかつと特製醤油たれに付け込んだ「鮮魚の照焼き」はボリュームたっぷり大満足の逸品です。 ※写真は炊き込みご飯です。",
        "price"=> "630",
        "unit"=> "円"
    ];;
    for ($index=0; $index < count($foods); $index++) { 
        if( $slug == $foods[$index]['slug']){
            return $foods[$index];
        }
    }
    return $food;
}

function foods(){

    $database = connectDb();

    $foods = array();
    if( $database ){
        $foods = $database['foods'];
    }
    return $foods;
}