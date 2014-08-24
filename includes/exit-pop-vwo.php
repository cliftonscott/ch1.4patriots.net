<script type="text/javascript">
(function() {
    setTimeout(function() {
        var __redirect_to = '/checkout/thankyou.php';//

        var _tags = ['button', 'input', 'a'], _els, _i, _i2;
        for(_i in _tags) {
            _els = document.getElementsByTagName(_tags[_i]);
            for(_i2 in _els) {
                if((_tags[_i] == 'input' && _els[_i2].type != 'button' && _els[_i2].type != 'submit' && _els[_i2].type != 'image') || _els[_i2].target == '_blank') continue;
                _els[_i2].onclick = function() {window.onbeforeunload = function(){};}
}
}
setTimeout(function() {
    window.onbeforeunload = function() {
        setTimeout(function() {
            window.onbeforeunload = function() {};
	setTimeout(function() {
    fireVWO();
    document.location.href = __redirect_to;
    }, 500);
},5);
return 'Wait, before you leave... don\'t forget your bonuses.';
}
}, 500);
}, 5000);
})();

<?php $testRevenue = 1;?>
function fireVWO() {
    alert("VWO Post!");
	var _vis_opt_revenue = "<?php echo $testRevenue;?>";
	window._vis_opt_queue = window._vis_opt_queue || [];
	window._vis_opt_queue.push(function() {_vis_opt_revenue_conversion(_vis_opt_revenue);});
}
</script>