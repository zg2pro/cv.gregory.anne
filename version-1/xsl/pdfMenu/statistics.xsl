<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE stylesheet [
<!ENTITY Eacute  "&Eacute;" >
]>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="//project">
        <li>
            <xsl:value-of disable-output-escaping="yes" select="title"/>
        </li>
    </xsl:template>
</xsl:stylesheet>