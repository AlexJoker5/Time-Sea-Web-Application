<?php

namespace App\Http\Controllers;
use App\Models\Watch;

use Illuminate\Http\Request;

class ListviewController1 extends Controller
{
    public function split_category($watch){
        $col_index_recommend = array();
        $col_index_new_arrival = array();
        $col_index_bestseller = array();
        $col_index_on_sale = array();
        
        foreach ($watch as $key => $info) {
            $jsonArray = json_decode($info->category, true);
            if ($jsonArray['recommend'] == 1) {
                $col_index_recommend[] = $key;
            }
            if($jsonArray['new_arrival'] == 1){
                $col_index_new_arrival[] = $key;
            }
            if($jsonArray['bestseller'] == 1){
                $col_index_bestseller[] = $key;
            }
            if($jsonArray['on_sale'] == 1){
                $col_index_on_sale[] = $key;
            }
        }
        $result = array(
            'col_index_recommend' => $col_index_recommend,
            'col_index_new_arrival' => $col_index_new_arrival,
            'col_index_bestseller' => $col_index_bestseller,
            'col_index_on_sale' => $col_index_on_sale
        );
        return $result;
    }
    public function listview($index, $watch){
        $row_count = 0;
        $col_count = 0;
        $col_index = $index;
        
        
        $min_row = count($col_index) > 10 ? ceil(count($col_index) / 5) : 2;
        $max_col = $min_row * 5;
        
        foreach($col_index as $key => $index) {
            if ($col_count <= 0) {
                echo '<div class="grid grid-rows-1 grid-flow-col row" style="margin-left:5rem">
                <div class="flex">  ';
            }
        
            echo '<a class="col-span-1 col" href="'.route('carousel.passId', ['index' => $index]).'">

                <div class="product-img">
                    <img src="'.asset($watch[$index]->image).'" alt="">
                </div>
                <div class="product-description">
                    <h6 class="companyName">'.$watch[$index]->company.'</h6>
                    <h5 class="watchName">'.$watch[$index]->serialName.'</h5>
                    <h6 class="watchPrice">$'.$watch[$index]->price.'</h6>
                </div>
            </a>';
        //onclick="indexSend('.$index.')"
            $max_col -= 1;
            $col_count += 1; 
        
            if($col_count > 4) {
                $row_count += 1;
                $col_count = 0;
                echo '</div></div>';
            }
        }
        
        if ($max_col > 0) {
            for( $i = 0; $i < $max_col; $i++) {
                if ($col_count <= 0) {
                    echo '<div class="grid grid-rows-1 grid-flow-col row">
                        <div class="col-span-1 col no-product">
                            
                        </div>';
                } else {
                    echo '<div class="col-span-1 col no-product">
                            
                        </div>';
                }
            
                $col_count += 1;
            
                if($col_count > 4) {
                    $row_count += 1;
                    $col_count = 0;
                    echo '</div></div>';
                }
            }
        }
        
    }
    public function toDetail($data)
    {
        echo "<script>alert('This is an alert box!');</script>";
    }
    public function index(){
        return view('listview.listview');
    }


}
