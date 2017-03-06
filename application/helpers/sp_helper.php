<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if(!function_exists('replacer_print')){
    function replacer_print($list){
        switch ($list){
            case 'a.id':
            $pmr = 'id';
            break;
            
            case 'a.sales_order_code':
            $pmr = 'sales_order_code';
            break;
        
            case 'b.customer_name':
            $pmr = 'customer_name';
            break;
        
            case 'b.origin':
            $pmr = 'origin';
            break;
        
            case 'b.province':
            $pmr = 'province';
            break;
        
            case 'b.district':
            $pmr = 'district';
            break;
        
            case 'b.island_single':
            $pmr = 'island_single';
            break;
        
            case 'b.charge_option':
            $pmr = 'charge_option';
            break;
        
            case 'b.address':
            $pmr = 'address';
            break;
        
            case 'b.price':
            $pmr = 'price';
            break;
        
            default:
            break;
        
        }
    
    return $pmr;    
    }
}