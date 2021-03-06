<?php
/**
 * Parsimony
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to contact@parsimony-cms.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Parsimony to newer
 * versions in the future. If you wish to customize Parsimony for your
 * needs please refer to http://www.parsimony.mobi for more information.
 *
 * @authors Julien Gras et Benoît Lorillot
 * @copyright  Julien Gras et Benoît Lorillot
 * @version  Release: 1.0
 * @category  Parsimony
 * @package core/blocks
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
?>
<style>
    fieldset{background: #EDEFF4;}
    .placeholder {background-color: #cfcfcf;}
    .ui-nestedSortable-error {background:#fbe3e4;color:#8a1f11;}
    ol {margin: 0;padding: 0;padding-left: 30px;}
    ol.sortable, ol.sortable ol {margin: 0 0 0 15px;padding: 0;list-style-type: none;}
    .sortable li {margin: 7px 0 0 0;padding: 0;}
    .sortable li  {/*background: #CBDDF3;border: 1px solid #2E63A5;*/padding: 3px;margin: 2px;line-height: 30px;border-radius: 4px;}
    .sortable li  input{background: transparent;}
    .ui-icon-closethick{margin-top: 10px;}
    #design-menu{border-radius:8px;color: #174F69;border: 1px solid #99BBE8;box-shadow: #F4F8FD 0 1px 0px 0 inset;font-weight: bold;padding-bottom: 5px;font-size: 13px;}
    legend{letter-spacing: 1.2px;font-size: 16px;}
    .parsimenu ul{top: 20px;left: -12px;}
    #linkmenu{border :1px solid #99BBE8;margin:10px; padding-bottom: 10px;border-radius: 8px;}
    #linkmenuAdd{padding-left: 8px;}
    linkmenuAdd{position: relative;top: 0px;margin-left: 25px;margin-top: 10px;margin-bottom: 10px;}
    #previewmenu{border :1px solid #99BBE8;margin:10px;border-radius: 8px;}
    .title1{text-align: left;margin: 10px 0px;}
    .title2{text-align: left;position: relative;top: 0px;margin-left: 25px;margin-bottom: 15px;border-radius: 8px;}
    .positionMenu{padding:11px 11px 0}
    #imgglyphish{overflow-y: scroll;height:143px;padding:5px;margin:5px;background:#222;border-radius: 3px;}
    #imgglyphish img:hover,.iconselect{background: #777;border-radius:3px}

    .sortable li{
	border: 1px solid #ccc ;font-weight: bold;color: #222 ;text-shadow: 0  1px  0  #ffffff ;
	background: #eee;
	background: -webkit-gradient(linear, left top, left bottom, from( #ffffff), to( #f1f1f1));
	background: -webkit-linear-gradient( #ffffff, #f1f1f1); 
	background: -moz-linear-gradient( #ffffff, #f1f1f1);
	background: -ms-linear-gradient( #ffffff, #f1f1f1);
	background: -o-linear-gradient( #ffffff, #f1f1f1);
	background: linear-gradient( #ffffff, #f1f1f1);
    }
</style>
<div id="item-menu-template" class="none">
    <li>
	    <div class="inline-block" style="width: 12%;box-sizing: border-box;"><img src=""><input type="hidden" class="input_icon" /></div>
            <div class="inline-block" style="width: 40%;box-sizing: border-box;"><input style="width: 100%;box-sizing: border-box;" type="text" class="input_title" value="" /></div>
            <div class="inline-block" style="width: 40%;box-sizing: border-box;"><input style="width: 100%;box-sizing: border-box;" class="input_url floatright" type="text"  value="" /></div>
            <div class="inline-block floatright" style="width: 4%;box-sizing: border-box;"><a href="#" onclick="$(this).closest('li').remove();refreshPos();"><span class="ui-icon ui-icon-closethick"></span></a></div>
    </li>
</div>
<fieldset id="design-menu">
    <fieldset id="linkmenu">
        <legend><?php echo t('Add Links', FALSE); ?></legend>
        <fieldset id="linkmenuAdd">
            <div class="title1"><?php echo t('Add A Link Manually', FALSE); ?></div>
            <input type="text" id="input_title" placeholder="<?php echo t('Title', FALSE); ?>" />
            <input type="text" id="input_url"  placeholder="http://" />
            <input type="hidden" id="input_icon" />
            <div id="imgglyphish">
		
            </div>
            <input type="button" value="<?php echo t('Add', FALSE); ?>" id="add-menu-item">
        </fieldset>
    </fieldset>
    <fieldset id="previewmenu">
        <legend><?php echo t('Preview Menu', FALSE); ?></legend>
        <ol class="sortable">
	    <?php
	    $menu = $this->getConfig('menu');
	    if (is_array($this->getConfig('menu'))) {
		foreach ($menu AS $id => $item) {
		    ?>
		    <li id="itemlist_<?php echo $id ?>">
			<div class="inline-block" style="width: 12%;box-sizing: border-box;"><img src="<?php echo BASE_PATH . 'lib/glyphish/glyphish-blue/' . $item['icon'] ?>.png"><input type="hidden" name="menu[<?php echo $id ?>][icon]"  value="<?php echo $item['icon'] ?>" /></div>
			<div class="inline-block" style="width: 40%;box-sizing: border-box;"><input style="width: 100%;box-sizing: border-box;" type="text" class="input_title" name="menu[<?php echo $id ?>][title]" value="<?php echo $item['title'] ?>" /></div>
			<div class="inline-block" style="width: 40%;box-sizing: border-box;"><input style="width: 100%;box-sizing: border-box;" class="input_url floatright" type="text" name="menu[<?php echo $id ?>][url]"  value="<?php echo $item['url'] ?>" /></div>
			<div class="inline-block floatright" style="width: 4%;box-sizing: border-box;"><a href="#" onclick="$(this).closest('li').remove();refreshPos();"><span class="ui-icon ui-icon-closethick"></span></a></div>
		    </li>
		    <?php
		}
	    }
	    ?>
        </ol>
    </fieldset>
</fieldset>
<script>
    $(document).ready(function() {
        function addLink(title,url,icon){
            var maxnb = 0;
            $("ol.sortable li").each(function(i) {
                var tab = $(this).attr("id").split(/itemlist_/);
                if(parseInt(tab[1]) > maxnb) maxnb = parseInt(tab[1]);
            });
            maxnb++;
            var obj = $('#item-menu-template > li').clone().attr("id","itemlist_" + maxnb);
            obj.find(".input_title").val(title).attr("name","menu[" + maxnb + "][title]");
            obj.find(".input_url").val(url).attr("name","menu[" + maxnb + "][url]");
            obj.find(".input_icon").val(icon).attr("name","menu[" + maxnb + "][icon]");
	    obj.find("img").attr("src",$(".iconselect").attr("src"));
            $("#input_title").val('');
            $("#input_url").val('');
            $("ol.sortable").append(obj);
        }
        $("#add-menu-item").click(function(){
            addLink($("#input_title").val(),$("#input_url").val(),$("#input_icon").val());
        });
        $(document).on("click","#imgglyphish img",function(){
            $('.iconselect').removeClass('iconselect');
            $(this).addClass('iconselect');
            $("#input_icon").val($(this).data('id'));
        });
        <?php
            $imgs = '';
            foreach (glob("lib/glyphish/glyphish-blue/*.png") as $filename) {
                $imgs .= '<img src="' . BASE_PATH . $filename . '" data-id="' . substr(basename($filename), 0, -4) . '" style="float:left;cursor:pointer"\>';
            }
        ?>
        $(window).load(function () {
            $('<?php echo $imgs ?>').appendTo("#imgglyphish");
        });
    });
</script>