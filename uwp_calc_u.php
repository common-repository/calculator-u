<?php
/*
Plugin Name: Calculator U.
Plugin URI: http://oleksandrustymenko.net.ua/calculator_u
Description: Simple and convenient calculator on the site. Simply enter the [uwp_calc] shortcode in a post or page.
Version: 1.0
Author: Oleksandr Ustymenko, Volodymyr Ustymenko
Author URI: http://oleksandrustymenko.net.ua
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


add_action('wp_enqueue_scripts', 'uwp_calc_u_front'); 
function uwp_calc_u_front()
{
    wp_enqueue_script('jquery');
}

function uwp_calc_a1_func()
{
    ?>
    <style>
    .uwp_calc_u_button,
    .uwp_calc_u_button:visited
    {
        width: 60px;
        height: 60px;
        background: #006bb3;
        float: left;
        margin: 0px 0px 0px 7px;
        border-radius: 10px;
        cursor: pointer;
        color: #331f00;
    }
        
    .uwp_calc_u_buttonl,
    .uwp_calc_u_buttonl:visited
    {
        width: 60px;
        height: 60px;
        background: #006bb3;
        float: left;
        margin: 0px 0px 0px 0px;
        border-radius: 10px;
        cursor: pointer;
        color: #331f00;
    }
        
    .uwp_calc_u_buttonr,
    .uwp_calc_u_buttonr:visited
    {
        width: 60px;
        height: 60px;
        background: #006bb3;
        float: left;
        margin: 0px 0px 0px 8px;
        border-radius: 10px;
        cursor: pointer;
        color: #331f00;
    }
        
    .uwp_calc_u_button:hover,
    .uwp_calc_u_buttonl:hover,
    .uwp_calc_u_buttonr:hover
    {
        background: #008ae6; 
        color: #ffffff;
        -moz-box-shadow: 0 0 1px 3px #e6f5ff inset;
        box-shadow: 0 0 1px 3px #000 inset;
    }
        
    </style>

    <div style="margin: 0 auto; width: 350px; background: #002e4d; color: #000000; min-height: 200px; border-radius: 10px; overflow: hidden; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">

        <div style="width: 330px; margin: 10px auto; border: 1px solid #006bb3;">
            <div id="uwp_calc_u_result_w1" style="display: none; padding: 6px; font-size: 14px; text-align: right; color: #f2f2f2;">0</div>    
            <div id="uwp_calc_u_result_w" style="padding: 6px; font-size: 24px; text-align: right; color: #f2f2f2;">0</div>    
        </div>
        
        <div style="width: 330px; margin: 10px auto; overflow: hidden;"> 
            <div onclick="uwp_calc_u_button_click('7'); return false;" class="uwp_calc_u_buttonl"><div style="padding: 10px; font-size:20px; text-align:center;">7</div></div>
            <div onclick="uwp_calc_u_button_click('8'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">8</div></div>
            <div onclick="uwp_calc_u_button_click('9'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">9</div></div>
            <div onclick="uwp_calc_u_button_click('22'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">/</div></div>
            <div onclick="uwp_calc_u_button_click('16'); return false;" class="uwp_calc_u_buttonr"><div style="padding: 10px; font-size:20px; text-align:center;">+/-</div></div> 
        </div>
        
        <div style="width: 330px; margin: 10px auto; overflow: hidden;"> 
            <div onclick="uwp_calc_u_button_click('4'); return false;" class="uwp_calc_u_buttonl"><div style="padding: 10px; font-size:20px; text-align:center;">4</div></div>
            <div onclick="uwp_calc_u_button_click('5'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">5</div></div>
            <div onclick="uwp_calc_u_button_click('6'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">6</div></div>
            <div onclick="uwp_calc_u_button_click('13'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">*</div></div>
            <div onclick="uwp_calc_u_button_click('14'); return false;" class="uwp_calc_u_buttonr"><div style="padding: 10px; font-size:20px; text-align:center;">Pi</div></div> 
        </div>
        
        <div style="width: 330px; margin: 10px auto; overflow: hidden;"> 
            <div onclick="uwp_calc_u_button_click('1'); return false;" class="uwp_calc_u_buttonl"><div style="padding: 10px; font-size:20px; text-align:center;">1</div></div>
            <div onclick="uwp_calc_u_button_click('2'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">2</div></div>
            <div onclick="uwp_calc_u_button_click('3'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">3</div></div>
            <div onclick="uwp_calc_u_button_click('11'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">-</div></div>
            <div onclick="uwp_calc_u_button_click('12'); return false;" class="uwp_calc_u_buttonr"><div style="padding: 10px; font-size:20px; text-align:center;">Del</div></div> 
        </div>
        
        <div style="width: 330px; margin: 10px auto; overflow: hidden;"> 
            <div onclick="uwp_calc_u_button_click('20'); return false;" class="uwp_calc_u_buttonl"><div style="padding: 10px; font-size:20px; text-align:center;">C</div></div> 
            <div onclick="uwp_calc_u_button_click('0'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">0</div></div>
            <div onclick="uwp_calc_u_button_click('17'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">.</div></div>
            <div onclick="uwp_calc_u_button_click('18'); return false;" class="uwp_calc_u_button"><div style="padding: 10px; font-size:20px; text-align:center;">+</div></div>
            <div onclick="uwp_calc_u_button_click('19'); return false;" class="uwp_calc_u_buttonr"><div style="padding: 10px; font-size:20px; text-align:center;">=</div></div>
        </div>
        
    </div> 

    <input type="hidden" autocomplete="off" id="uwp_calc_u_one">
    <input type="hidden" autocomplete="off" id="uwp_calc_u_two">
    <input type="hidden" autocomplete="off" id="uwp_calc_u_pos">

    <script>    
    var uwp_calc_u_start = 1;
    var uwp_calc_u_pm = 0;    
    var uwp_calc_u_n1orn2 = 0;
    var uwp_calc_u_choosem = 0;
    var uwp_calc_u_choosem2 = 0;
    var uwp_calc_u_choose = 0;
    var uwp_calc_u_history1;
    var uwp_calc_u_history2;
    var uwp_calc_u_history3 = 0;
    var uwp_calc_u_historyall;
    var uwp_calc_u_status_old = 0;
    var uwp_calc_u_status_one = 0;
       
    function uwp_calc_u_Float(x) { return !!(x % 1); }    
        
    function uwp_calc_u_button_click(button_click)
    {
        
        var uwp_calc_u_number = parseInt(button_click);
        var uwp_calc_u_numberA;
        var uwp_calc_u_numberAA;
        var uwp_calc_u_numberB;
        var uwp_calc_u_numberBB;
        var uwp_calc_u_last1;
        var uwp_calc_u_last2;
        var uwp_calc_u_result;
        var uwp_calc_u_number2;
        var uwp_calc_u_number_true1;
        var uwp_calc_u_number_true2;
        var uwp_calc_u_number_true3;
        
        if(uwp_calc_u_start ==1 && uwp_calc_u_number !=19)
        {
            jQuery("#uwp_calc_u_result_w").empty();
            uwp_calc_u_start = 2;
        }
        
        if(uwp_calc_u_choosem2 == 1 && uwp_calc_u_number !=13 && uwp_calc_u_number !=22 && uwp_calc_u_number !=11 && uwp_calc_u_number !=18 && uwp_calc_u_number !=19)
        {
            uwp_calc_u_choosem2 = 0;
            jQuery("#uwp_calc_u_result_w").empty();
            jQuery("#uwp_calc_u_result_w").html("0");
            jQuery("#uwp_calc_u_one").val("");
            jQuery("#uwp_calc_u_two").val("");
            jQuery("#uwp_calc_u_result_w1").hide();
            jQuery("#uwp_calc_u_result_w1").empty();
            uwp_calc_u_start = 1;
            uwp_calc_u_n1orn2 = 0;
            uwp_calc_u_choose = 0;
            uwp_calc_u_history1 = 0;
            uwp_calc_u_history2 = 0;
            uwp_calc_u_history3 = 0;
            uwp_calc_u_historyall = '';
            uwp_calc_u_status_old = 0;
            uwp_calc_u_status_one = 0;
        }
        
        if( uwp_calc_u_number ==20)
        {
            jQuery("#uwp_calc_u_result_w").empty();
            jQuery("#uwp_calc_u_result_w").html("0");
            jQuery("#uwp_calc_u_one").val("");
            jQuery("#uwp_calc_u_two").val("");
            jQuery("#uwp_calc_u_result_w1").hide();
            jQuery("#uwp_calc_u_result_w1").empty();
            uwp_calc_u_start = 1;
            uwp_calc_u_n1orn2 = 0;
            uwp_calc_u_choose = 0;
            uwp_calc_u_history1 = 0;
            uwp_calc_u_history2 = 0;
            uwp_calc_u_history3 = 0;
            uwp_calc_u_historyall = '';
            uwp_calc_u_status_old = 0;
            uwp_calc_u_status_one = 0;
        }
        else
        {
            if(uwp_calc_u_n1orn2 == 0)
            {
                uwp_calc_u_numberA = jQuery("#uwp_calc_u_one").val();
                                
                if(uwp_calc_u_number ==16)
                {
                    if(uwp_calc_u_numberA !=0 || uwp_calc_u_numberA !='' || uwp_calc_u_numberA != '0.')
                    {
                        uwp_calc_u_numberA = -uwp_calc_u_numberA;
                        jQuery("#uwp_calc_u_result_w").empty();
                        jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_numberA);
                        jQuery("#uwp_calc_u_one").val(uwp_calc_u_numberA);
                        uwp_calc_u_status_one = 1;
                    }
                }
                else
                if(uwp_calc_u_number ==12)
                {
                    uwp_calc_u_numberA = uwp_calc_u_numberA.slice(0,-1);
                    
                    if(uwp_calc_u_numberA =='' || uwp_calc_u_numberA == '-')
                    {
                        uwp_calc_u_numberA = 0;
                        //uwp_calc_u_choose = 0;
                        jQuery("#uwp_calc_u_result_w").empty();
                        jQuery("#uwp_calc_u_result_w").html("0");
                        jQuery("#uwp_calc_u_one").val("");
                        uwp_calc_u_start =1;
                        uwp_calc_u_status_one = 0; 
                    }
                    else
                    {
                        jQuery("#uwp_calc_u_result_w").empty();
                        jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_numberA);
                        jQuery("#uwp_calc_u_one").val(uwp_calc_u_numberA);
                        uwp_calc_u_status_one = 1;
                    }
                }
                else
                if(uwp_calc_u_number ==14)
                {
                    uwp_calc_u_number = 3.14;
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_number);
                    jQuery("#uwp_calc_u_one").val(uwp_calc_u_number);
                    uwp_calc_u_status_one = 1;
                }
                else
                if(uwp_calc_u_number ==17)
                {
                    if(uwp_calc_u_numberA == 0 || uwp_calc_u_numberA == '')
                    {
                        uwp_calc_u_number2 = '0.';
                        jQuery("#uwp_calc_u_result_w").empty();
                        jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_number2);
                        jQuery("#uwp_calc_u_one").val(uwp_calc_u_number2);
                    }
                    else
                    {
                        uwp_calc_u_number2 = uwp_calc_u_numberA+'.';
                        jQuery("#uwp_calc_u_result_w").empty();
                        jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_number2);
                        jQuery("#uwp_calc_u_one").val(uwp_calc_u_number2);
                    }
                    uwp_calc_u_status_one = 1;
                }
                else
                if(uwp_calc_u_number !=13 && uwp_calc_u_number !=22 && uwp_calc_u_number !=11 && uwp_calc_u_number !=18 && uwp_calc_u_number !=19 && uwp_calc_u_number !=13)
                {
                    if((uwp_calc_u_numberA == 0 || uwp_calc_u_numberA == '') && uwp_calc_u_number == 0)
                    {
                        jQuery("#uwp_calc_u_one").val('');
                        jQuery("#uwp_calc_u_result_w").html("0");
                    }
                    else
                    {
                        if(uwp_calc_u_numberA == 0 || uwp_calc_u_numberA == '')
                        {
                            jQuery("#uwp_calc_u_one").val(jQuery("#uwp_calc_u_one").val()+uwp_calc_u_number);
                            uwp_calc_u_numberAA = jQuery("#uwp_calc_u_one").val();
                            jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_numberAA);
                        }
                        else
                        {
                            jQuery("#uwp_calc_u_one").val(jQuery("#uwp_calc_u_one").val()+uwp_calc_u_number);
                            jQuery("#uwp_calc_u_result_w").append(uwp_calc_u_number);
                        }
                        
                    }
                    uwp_calc_u_status_one = 1;
                }
               
                
            }
            
            // ( * )
            if(uwp_calc_u_number ==13)
            {
                uwp_calc_u_numberA = jQuery("#uwp_calc_u_one").val();
                
                uwp_calc_u_last1 = uwp_calc_u_numberA.slice(-1);
                
                if(uwp_calc_u_last1 == '.')
                {
                    uwp_calc_u_numberA = uwp_calc_u_numberA.slice(0,-1);
                }
                
                if(uwp_calc_u_numberA == '')
                {
                    uwp_calc_u_numberA = 0;
                    jQuery("#uwp_calc_u_one").val("0");
                }
                
                if(uwp_calc_u_numberB != '')
                {
                if(uwp_calc_u_history3 ==1)
                {
                    uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    
                    uwp_calc_u_last2 = uwp_calc_u_numberB.slice(-1);
                
                    if(uwp_calc_u_last2 == '.')
                    {
                        uwp_calc_u_numberB = uwp_calc_u_numberB.slice(0,-1);
                    }
                    
                    if(uwp_calc_u_numberB == '')
                    {
                        uwp_calc_u_numberB = 0;
                    }
                    
                    uwp_calc_u_number_true1 = uwp_calc_u_Float(uwp_calc_u_numberA);
                    uwp_calc_u_number_true2 = uwp_calc_u_Float(uwp_calc_u_numberB);
                    
                    if(uwp_calc_u_number_true1 == true || uwp_calc_u_number_true1 == false)
                    {
                        if(uwp_calc_u_number_true1 == true)
                        {
                            uwp_calc_u_numberA = parseFloat(uwp_calc_u_numberA);
                        }
                        else
                        {
                            uwp_calc_u_numberA = parseInt(uwp_calc_u_numberA);
                        }
                    }
                    
                    if(uwp_calc_u_number_true2 == true || uwp_calc_u_number_true2 == false)
                    {
                        if(uwp_calc_u_number_true2 == true)
                        {
                            uwp_calc_u_numberB = parseFloat(uwp_calc_u_numberB);
                        }
                        else
                        {
                            uwp_calc_u_numberB = parseInt(uwp_calc_u_numberB);
                        }
                    }
                    
                    if(uwp_calc_u_status_old == 1)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA * uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 2)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA / uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 3)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA - uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 4)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA + uwp_calc_u_numberB;
                    }
                    
                    uwp_calc_u_history1 = uwp_calc_u_historyall+" * ";
                    
                    uwp_calc_u_number_true3 = uwp_calc_u_Float(uwp_calc_u_result);
                    
                    if(uwp_calc_u_number_true3 == true)
                    {
                        uwp_calc_u_result = eval(uwp_calc_u_result).toPrecision(10).replace(/\.?0+$/,"");
                    }
                    
                    jQuery("#uwp_calc_u_result_w1").empty();
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1);
                    jQuery("#uwp_calc_u_one").val(uwp_calc_u_result);
                    jQuery("#uwp_calc_u_two").val("");
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_result);
                    
                    
                    uwp_calc_u_choose = 1; // *
                    uwp_calc_u_n1orn2 = 1;
                    uwp_calc_u_history3 = 0;
                    uwp_calc_u_choosem = 1;
                    uwp_calc_u_choosem2 = 0;
                    uwp_calc_u_status_old = 1;
                }
                else
                {
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_numberA+ " * ");
                    uwp_calc_u_history1 = uwp_calc_u_numberA+ " * ";
                    jQuery("#uwp_calc_u_result_w1").show();
                    uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html("0");
                    uwp_calc_u_choose = 1; // *
                    uwp_calc_u_n1orn2 = 1;
                    uwp_calc_u_choosem2 = 0;
                    uwp_calc_u_status_old = 1;
                }
                    
                }
            }
            
            // ( / )
            if(uwp_calc_u_number ==22)
            {
                uwp_calc_u_numberA = jQuery("#uwp_calc_u_one").val();
                
                uwp_calc_u_last1 = uwp_calc_u_numberA.slice(-1);
                
                if(uwp_calc_u_last1 == '.')
                {
                    uwp_calc_u_numberA = uwp_calc_u_numberA.slice(0,-1);
                }
                
                if(uwp_calc_u_numberA == '')
                {
                    uwp_calc_u_numberA = 0;
                    jQuery("#uwp_calc_u_one").val("0");
                }
                
                if(uwp_calc_u_history3 ==1)
                {
                    uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    
                    uwp_calc_u_last2 = uwp_calc_u_numberB.slice(-1);
                
                    if(uwp_calc_u_last2 == '.')
                    {
                        uwp_calc_u_numberB = uwp_calc_u_numberB.slice(0,-1);
                    }
                    
                    if(uwp_calc_u_numberB == '')
                    {
                        uwp_calc_u_numberB = 0;
                    }
                    
                    uwp_calc_u_number_true1 = uwp_calc_u_Float(uwp_calc_u_numberA);
                    uwp_calc_u_number_true2 = uwp_calc_u_Float(uwp_calc_u_numberB);
                    
                    if(uwp_calc_u_number_true1 == true || uwp_calc_u_number_true1 == false)
                    {
                        if(uwp_calc_u_number_true1 == true)
                        {
                            uwp_calc_u_numberA = parseFloat(uwp_calc_u_numberA);
                        }
                        else
                        {
                            uwp_calc_u_numberA = parseInt(uwp_calc_u_numberA);
                        }
                    }
                    
                    if(uwp_calc_u_number_true2 == true || uwp_calc_u_number_true2 == false)
                    {
                        if(uwp_calc_u_number_true2 == true)
                        {
                            uwp_calc_u_numberB = parseFloat(uwp_calc_u_numberB);
                        }
                        else
                        {
                            uwp_calc_u_numberB = parseInt(uwp_calc_u_numberB);
                        }
                    }
                    
                    if(uwp_calc_u_status_old == 1)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA * uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 2)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA / uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 3)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA - uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 4)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA + uwp_calc_u_numberB;
                    }
                    
                    uwp_calc_u_history1 = uwp_calc_u_historyall+" / ";
                    
                    uwp_calc_u_number_true3 = uwp_calc_u_Float(uwp_calc_u_result);
                    
                    if(uwp_calc_u_number_true3 == true)
                    {
                        uwp_calc_u_result = eval(uwp_calc_u_result).toPrecision(10).replace(/\.?0+$/,"");
                    }
                    
                    jQuery("#uwp_calc_u_result_w1").empty();
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1);
                    jQuery("#uwp_calc_u_one").val(uwp_calc_u_result);
                    jQuery("#uwp_calc_u_two").val("");
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_result);
                    
                    
                    uwp_calc_u_choose = 2; // /
                    uwp_calc_u_n1orn2 = 1;
                    uwp_calc_u_history3 = 0;
                    uwp_calc_u_choosem = 1;
                    uwp_calc_u_choosem2 = 0;
                    uwp_calc_u_status_old = 2;
                }
                else
                {
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_numberA+ " / ");
                    uwp_calc_u_history1 = uwp_calc_u_numberA+ " / ";
                    jQuery("#uwp_calc_u_result_w1").show();
                    uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html("0");
                    uwp_calc_u_choose = 2; // /
                    uwp_calc_u_n1orn2 = 1;
                    uwp_calc_u_choosem2 = 0;
                    uwp_calc_u_status_old = 2;
                }
            }
            
            // ( - )
            if(uwp_calc_u_number ==11)
            {
                uwp_calc_u_numberA = jQuery("#uwp_calc_u_one").val();
                
                uwp_calc_u_last1 = uwp_calc_u_numberA.slice(-1);
                
                if(uwp_calc_u_last1 == '.')
                {
                    uwp_calc_u_numberA = uwp_calc_u_numberA.slice(0,-1);
                }
                
                if(uwp_calc_u_numberA == '')
                {
                    uwp_calc_u_numberA = 0;
                    jQuery("#uwp_calc_u_one").val("0");
                }
                
                if(uwp_calc_u_history3 ==1)
                {
                    uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    
                    uwp_calc_u_last2 = uwp_calc_u_numberB.slice(-1);
                
                    if(uwp_calc_u_last2 == '.')
                    {
                        uwp_calc_u_numberB = uwp_calc_u_numberB.slice(0,-1);
                    }
                    
                    if(uwp_calc_u_numberB == '')
                    {
                        uwp_calc_u_numberB = 0;
                    }
                    
                    uwp_calc_u_number_true1 = uwp_calc_u_Float(uwp_calc_u_numberA);
                    uwp_calc_u_number_true2 = uwp_calc_u_Float(uwp_calc_u_numberB);
                    
                    if(uwp_calc_u_number_true1 == true || uwp_calc_u_number_true1 == false)
                    {
                        if(uwp_calc_u_number_true1 == true)
                        {
                            uwp_calc_u_numberA = parseFloat(uwp_calc_u_numberA);
                        }
                        else
                        {
                            uwp_calc_u_numberA = parseInt(uwp_calc_u_numberA);
                        }
                    }
                    
                    if(uwp_calc_u_number_true2 == true || uwp_calc_u_number_true2 == false)
                    {
                        if(uwp_calc_u_number_true2 == true)
                        {
                            uwp_calc_u_numberB = parseFloat(uwp_calc_u_numberB);
                        }
                        else
                        {
                            uwp_calc_u_numberB = parseInt(uwp_calc_u_numberB);
                        }
                    }
                    
                    if(uwp_calc_u_status_old == 1)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA * uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 2)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA / uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 3)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA - uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 4)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA + uwp_calc_u_numberB;
                    }
                    
                    uwp_calc_u_history1 = uwp_calc_u_historyall+" - ";
                    
                    uwp_calc_u_number_true3 = uwp_calc_u_Float(uwp_calc_u_result);
                    
                    if(uwp_calc_u_number_true3 == true)
                    {
                        uwp_calc_u_result = eval(uwp_calc_u_result).toPrecision(10).replace(/\.?0+$/,"");
                    }
                    
                    jQuery("#uwp_calc_u_result_w1").empty();
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1);
                    jQuery("#uwp_calc_u_one").val(uwp_calc_u_result);
                    jQuery("#uwp_calc_u_two").val("");
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_result);
                    
                    uwp_calc_u_choose = 3; // -
                    uwp_calc_u_n1orn2 = 1;
                    uwp_calc_u_history3 = 0;
                    uwp_calc_u_choosem = 1;
                    uwp_calc_u_choosem2 = 0;
                    uwp_calc_u_status_old = 3;
                }
                else
                {
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_numberA+ " - ");
                    uwp_calc_u_history1 = uwp_calc_u_numberA+ " - ";
                    jQuery("#uwp_calc_u_result_w1").show();
                    uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html("0");
                    uwp_calc_u_choose = 3; // -
                    uwp_calc_u_n1orn2 = 1;
                    uwp_calc_u_choosem2 = 0;
                    uwp_calc_u_status_old = 3;
                }
            }
            
            // ( + )
            if(uwp_calc_u_number ==18)
            {
                uwp_calc_u_numberA = jQuery("#uwp_calc_u_one").val();
                
                uwp_calc_u_last1 = uwp_calc_u_numberA.slice(-1);
                
                if(uwp_calc_u_last1 == '.')
                {
                    uwp_calc_u_numberA = uwp_calc_u_numberA.slice(0,-1);
                }
                
                if(uwp_calc_u_numberA == '')
                {
                    uwp_calc_u_numberA = 0;
                    jQuery("#uwp_calc_u_one").val("0");
                }
                
                if(uwp_calc_u_history3 ==1)
                {
                    uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    
                    uwp_calc_u_last2 = uwp_calc_u_numberB.slice(-1);
                
                    if(uwp_calc_u_last2 == '.')
                    {
                        uwp_calc_u_numberB = uwp_calc_u_numberB.slice(0,-1);
                    }
                    
                    if(uwp_calc_u_numberB == '')
                    {
                        uwp_calc_u_numberB = 0;
                    }
                    
                    uwp_calc_u_number_true1 = uwp_calc_u_Float(uwp_calc_u_numberA);
                    uwp_calc_u_number_true2 = uwp_calc_u_Float(uwp_calc_u_numberB);
                    
                    if(uwp_calc_u_number_true1 == true || uwp_calc_u_number_true1 == false)
                    {
                        if(uwp_calc_u_number_true1 == true)
                        {
                            uwp_calc_u_numberA = parseFloat(uwp_calc_u_numberA);
                        }
                        else
                        {
                            uwp_calc_u_numberA = parseInt(uwp_calc_u_numberA);
                        }
                    }
                    
                    if(uwp_calc_u_number_true2 == true || uwp_calc_u_number_true2 == false)
                    {
                        if(uwp_calc_u_number_true2 == true)
                        {
                            uwp_calc_u_numberB = parseFloat(uwp_calc_u_numberB);
                        }
                        else
                        {
                            uwp_calc_u_numberB = parseInt(uwp_calc_u_numberB);
                        }
                    }
                    
                    if(uwp_calc_u_status_old == 1)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA * uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 2)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA / uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 3)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA - uwp_calc_u_numberB;
                    }
                    
                    if(uwp_calc_u_status_old == 4)
                    {
                        uwp_calc_u_result = uwp_calc_u_numberA + uwp_calc_u_numberB;
                    }
                    
                    uwp_calc_u_history1 = uwp_calc_u_historyall+" + ";
                    
                    uwp_calc_u_number_true3 = uwp_calc_u_Float(uwp_calc_u_result);
                    
                    if(uwp_calc_u_number_true3 == true)
                    {
                        uwp_calc_u_result = eval(uwp_calc_u_result).toPrecision(10).replace(/\.?0+$/,"");
                    }
                    
                    jQuery("#uwp_calc_u_result_w1").empty();
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1);
                    jQuery("#uwp_calc_u_one").val(uwp_calc_u_result);
                    jQuery("#uwp_calc_u_two").val("");
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_result);
                    
                    
                    uwp_calc_u_choose = 4; // +
                    uwp_calc_u_n1orn2 = 1;
                    uwp_calc_u_history3 = 0;
                    uwp_calc_u_choosem = 1;
                    uwp_calc_u_choosem2 = 0;
                    uwp_calc_u_status_old = 4;
                }
                else
                {
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_numberA+ " + ");
                    uwp_calc_u_history1 = uwp_calc_u_numberA+ " + ";
                    jQuery("#uwp_calc_u_result_w1").show();
                    uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html("0");
                    uwp_calc_u_choose = 4; // +
                    uwp_calc_u_n1orn2 = 1;
                    uwp_calc_u_choosem2 = 0;
                    uwp_calc_u_status_old = 4;
                }
            }
            
            
            if(uwp_calc_u_history3 == 1 && uwp_calc_u_number ==19)
            {
                uwp_calc_u_numberA = jQuery("#uwp_calc_u_one").val();
                
                uwp_calc_u_last1 = uwp_calc_u_numberA.slice(-1);
                
                if(uwp_calc_u_last1 == '.')
                {
                    uwp_calc_u_numberA = uwp_calc_u_numberA.slice(0,-1);
                }
                
                if(uwp_calc_u_numberA == '')
                {
                    uwp_calc_u_numberA = 0;
                    jQuery("#uwp_calc_u_one").val("0");
                }
                
                uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                    
                uwp_calc_u_last2 = uwp_calc_u_numberB.slice(-1);
                
                if(uwp_calc_u_last2 == '.')
                {
                    uwp_calc_u_numberB = uwp_calc_u_numberB.slice(0,-1);
                }
                    
                /*
                if(uwp_calc_u_numberB == '')
                {
                    uwp_calc_u_numberB = 0;
                }
                */
                    
                
                
                if(uwp_calc_u_numberB != '')
                {
                uwp_calc_u_number_true1 = uwp_calc_u_Float(uwp_calc_u_numberA);
                uwp_calc_u_number_true2 = uwp_calc_u_Float(uwp_calc_u_numberB);
                    
                if(uwp_calc_u_number_true1 == true || uwp_calc_u_number_true1 == false)
                {
                    if(uwp_calc_u_number_true1 == true)
                    {
                        uwp_calc_u_numberA = parseFloat(uwp_calc_u_numberA);
                    }
                    else
                    {
                        uwp_calc_u_numberA = parseInt(uwp_calc_u_numberA);
                    }
                }
                    
                if(uwp_calc_u_number_true2 == true || uwp_calc_u_number_true2 == false)
                {
                    if(uwp_calc_u_number_true2 == true)
                    {
                        uwp_calc_u_numberB = parseFloat(uwp_calc_u_numberB);
                    }
                    else
                    {
                        uwp_calc_u_numberB = parseInt(uwp_calc_u_numberB);
                    }
                }
                    
                if(uwp_calc_u_choose == 1)
                {
                    uwp_calc_u_result = uwp_calc_u_numberA * uwp_calc_u_numberB;
                }
                
                if(uwp_calc_u_choose == 2)
                {
                    uwp_calc_u_result = uwp_calc_u_numberA / uwp_calc_u_numberB;
                }
                
                if(uwp_calc_u_choose == 3)
                {
                    uwp_calc_u_result = uwp_calc_u_numberA - uwp_calc_u_numberB;
                }
                
                if(uwp_calc_u_choose == 4)
                {
                    uwp_calc_u_result = uwp_calc_u_numberA + uwp_calc_u_numberB;
                }
                
                uwp_calc_u_number_true3 = uwp_calc_u_Float(uwp_calc_u_result);
                    
                if(uwp_calc_u_number_true3 == true)
                {
                    uwp_calc_u_result = eval(uwp_calc_u_result).toPrecision(10).replace(/\.?0+$/,"");
                }
                    
                jQuery("#uwp_calc_u_one").val(uwp_calc_u_result);
                jQuery("#uwp_calc_u_two").val("");
                jQuery("#uwp_calc_u_result_w").empty();
                jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_result);
                    
                uwp_calc_u_n1orn2 = 1;
                uwp_calc_u_history3 = 0;
                uwp_calc_u_choosem = 1;
                uwp_calc_u_choosem2 = 1;
                }
            }
            
            if(uwp_calc_u_n1orn2 == 1)
            {
                uwp_calc_u_numberB = jQuery("#uwp_calc_u_two").val();
                
                if(uwp_calc_u_number ==16)
                {
                    uwp_calc_u_numberB = -uwp_calc_u_numberB;
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_numberB);
                    jQuery("#uwp_calc_u_two").val(uwp_calc_u_numberB);
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1+""+uwp_calc_u_numberB);
                    uwp_calc_u_historyall = uwp_calc_u_history1+""+uwp_calc_u_numberB;
                }
                else
                if(uwp_calc_u_number ==12)
                {
                    uwp_calc_u_numberB = uwp_calc_u_numberB.slice(0,-1);
                    
                    if(uwp_calc_u_numberB =='' || uwp_calc_u_numberB == '-')
                    {
                        uwp_calc_u_numberB = 0;
                        uwp_calc_u_choose = 0;
                    }
                    
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_numberB);
                    jQuery("#uwp_calc_u_two").val(uwp_calc_u_numberB);
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1+""+uwp_calc_u_numberB);
                    uwp_calc_u_historyall = uwp_calc_u_history1+""+uwp_calc_u_numberB;
                }
                else
                if(uwp_calc_u_number ==14)
                {
                    uwp_calc_u_number = 3.14;
                    jQuery("#uwp_calc_u_result_w").empty();
                    jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_number);
                    jQuery("#uwp_calc_u_two").val(uwp_calc_u_number);
                    jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1+""+uwp_calc_u_number);
                    uwp_calc_u_historyall = uwp_calc_u_history1+""+uwp_calc_u_number;
                }
                else
                if(uwp_calc_u_number ==17)
                {
                    if(uwp_calc_u_numberB == 0 || uwp_calc_u_numberB == '')
                    {
                        uwp_calc_u_number2 = '0.';
                        jQuery("#uwp_calc_u_result_w").empty();
                        jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_number2);
                        jQuery("#uwp_calc_u_two").val(uwp_calc_u_number2);
                        jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1+""+uwp_calc_u_number2);
                        uwp_calc_u_historyall = uwp_calc_u_history1+""+uwp_calc_u_number2;
                    }
                    else
                    {
                        uwp_calc_u_number2 = uwp_calc_u_numberB+'.';
                        jQuery("#uwp_calc_u_result_w").empty();
                        jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_number2);
                        jQuery("#uwp_calc_u_two").val(uwp_calc_u_number2);
                        jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1+""+uwp_calc_u_number2);
                        uwp_calc_u_historyall = uwp_calc_u_history1+""+uwp_calc_u_number2;
                    }
                }
                else
                if(uwp_calc_u_number !=13 && uwp_calc_u_number !=22 && uwp_calc_u_number !=11 && uwp_calc_u_number !=18 && uwp_calc_u_number !=19 && uwp_calc_u_number !=13)
                {
                    if((uwp_calc_u_numberB == 0 || uwp_calc_u_numberB == '') && uwp_calc_u_number == 0)
                    {
                        jQuery("#uwp_calc_u_two").val('');
                        jQuery("#uwp_calc_u_result_w").html("0");
                    }
                    else
                    {
                        if(uwp_calc_u_numberB == 0 || uwp_calc_u_numberB == '')
                        {
                            jQuery("#uwp_calc_u_two").val(jQuery("#uwp_calc_u_two").val()+uwp_calc_u_number);
                            
                            uwp_calc_u_numberBB = jQuery("#uwp_calc_u_two").val();
                            jQuery("#uwp_calc_u_result_w").html(uwp_calc_u_numberBB);
                            
                            uwp_calc_u_history2 = uwp_calc_u_numberBB;
                            jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1+""+uwp_calc_u_history2);
                            uwp_calc_u_historyall = uwp_calc_u_history1+""+uwp_calc_u_history2;
                        }
                        else
                        {
                            jQuery("#uwp_calc_u_two").val(jQuery("#uwp_calc_u_two").val()+uwp_calc_u_number);
                            jQuery("#uwp_calc_u_result_w").append(uwp_calc_u_number);
                            uwp_calc_u_history2 = jQuery("#uwp_calc_u_two").val();
                            jQuery("#uwp_calc_u_result_w1").html(uwp_calc_u_history1+""+uwp_calc_u_history2);
                            uwp_calc_u_historyall = uwp_calc_u_history1+""+uwp_calc_u_history2;
                        }
                        
                    }
                }
                
                uwp_calc_u_history3 = 1;
                
            }
            
        }
    }
    </script>    

    <?php
}

add_shortcode('uwp_calc', 'uwp_calc_a1_func');
?>