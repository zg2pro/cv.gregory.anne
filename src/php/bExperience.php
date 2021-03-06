<?php
$result = readXml($hl, "experience.xml", "version-1/xsl/pdf/experience.xsl");
?>
<div class="section-content">
    <svg viewBox="0 0 500 30" preserveAspectRatio="xMinYMin meet">
    <path d="M0,15 C150,30 350,0 500,2 L500,00 L0,0 Z" style="stroke: none;" class="exp-color"></path>
    <text x="30" y="10" fill="white" font-size="10" ><?php echo $ext_string['summary.pe']; ?></text>
    </svg>
    <div class="rb-switcher">
        <ul>
            <?php
            $curDir = getcwd();
            chdir("version-1/" . $hl);
            echo pdfXsl($hl, "experience");
            chdir($curDir);
            ?>
        </ul>
    </div>
    <?php
    echo $result;
    ?>
</div>