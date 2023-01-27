<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Libros</title>
            </head>
            <body>
                <table border="1px">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha de publicación</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                    <xsl:for-each select="catalog/book">
                        <tr>
                            <td>
                                <xsl:value-of select="./@id"/>
                            </td>
                            <td>
                                <xsl:value-of select="author"/>
                            </td>
                            <td>
                                <xsl:value-of select="title"/>
                            </td>
                            <td>
                                <xsl:value-of select="genre"/>
                            </td>
                            <td>
                                <xsl:value-of select="price"/>
                            </td>
                            <td>
                                <xsl:value-of select="publish_date"/>
                            </td>
                            <td>
                                <xsl:value-of select="description"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>