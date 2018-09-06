<?php if (!empty($ad)): ?>
    <?php
    //todo - needs discussion to depart from mvc but it keeps everything down to 1 call in 1 place
    AdUtility::createAdRecord($ad);
    ?>
    <a HREF="https://ad.doubleclick.net/jump/N9281.503.UNIVISION/B8070260.38;sz=1x1;ord=<?php echo time(); ?>?" style="position:absolute;">
        <img SRC="https://ad.doubleclick.net/ad/N9281.503.UNIVISION/B8070260.38;sz=1x1;ord=<?php echo time(); ?>?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement">
    </a>
    <div onmousedown="window.open('<?php echo $ad->url; ?>')">
        <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="320" HEIGHT="240" id="Yourfilename" ALIGN="">
            <PARAM NAME=movie VALUE="/webassets/swf/HYU_Life_FIFA_SPAN_Univ_SF_160x600.swf" width="160" height="600">
            <PARAM NAME=quality VALUE=high>
            <PARAM NAME="wmode" VALUE="transparent" />
            <EMBED src="/webassets/swf/HYU_Life_FIFA_SPAN_Univ_SF_160x600.swf"
                   quality=high
                   WIDTH="160"
                   HEIGHT="600"
                   WMODE="transparent"
                   NAME="Buscando"
                   ALIGN=""
                   TYPE="application/x-shockwave-flash"
                   PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">
            </EMBED>
        </OBJECT>
    </div>
    <?php
 endif ?>