$(document).ready(function() {
    if(!Modernizr.meter){
        alert('Извините, но Ваш браузер не поддерживает HTML5 прогресс бар!');
    }
    else 
    {
        var progressbar = $('#progressbar'),
            max = progressbar.attr('max'),
            time = (1000/max)*5,	
            value = progressbar.val();
 
            var loading = function() {
                value += 1;
                addValue = progressbar.val(value);
 
                $('.progress-value').html(value + '%');
 
                if (value == max) {
                    clearInterval(animate);			           
                }
            };
 
            var animate = setInterval(function() {
                loading();
            }, time);
    };
});