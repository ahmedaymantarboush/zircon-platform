
///////////////////////////////////////////////////////
////////////search select/////////////////////////////
/////////////////////////////////////////////////////
$(".search-select-box").selectpicker();
////////////////////////////////////////////////////
//////////Auto Add student info to the card////////
//////////////////////////////////////////////////
$(document).ready(function (){
    $('.form-control').each(function (){
        if($(this).attr('name') == 'stu_name'){
            $('.stu_name').text($(this).val());
        }else if($(this).attr('name') == 'stu_number'){
            $('.stu_number').text($(this).val());
        }else if($(this).attr('name') == 'stu_parent_number'){
            $('.stu_parent_number').text($(this).val());
        }else if($(this).attr('name') == 'stu_code'){
            $('.stu_code').text($(this).val());
        }
    });
    $('.form-select').each(function (){
        var selectedValue = this.options[this.selectedIndex].text;
        if($(this).attr('name') == 'stu_gov'){
            $('.stu_gov').text(selectedValue);
        }else if($(this).attr('name') == 'stu_place'){
            $('.stu_place').text(selectedValue);
        }else if($(this).attr('name') == 'stu_grade'){
            $('.stu_grade').text(selectedValue);
        }
    });
});
$(document).on('change paste keyup','.form-control',function (){
    if($(this).attr('name') == 'stu_name'){
        $('.stu_name').text($(this).val());
    }else if($(this).attr('name') == 'stu_number'){
        $('.stu_number').text($(this).val());
    }else if($(this).attr('name') == 'stu_parent_number'){
        $('.stu_parent_number').text($(this).val());
    }else if($(this).attr('name') == 'stu_code'){
        $('.stu_code').text($(this).val());
    }
});
$(document).on('change','.form-select',function (){
    var selectedValue = this.options[this.selectedIndex].text;
    if($(this).attr('name') == 'stu_gov'){
        $('.stu_gov').text(selectedValue);
    }else if($(this).attr('name') == 'stu_place'){
        $('.stu_place').text(selectedValue);
    }else if($(this).attr('name') == 'stu_grade'){
        $('.stu_grade').text(selectedValue);
    }
});

