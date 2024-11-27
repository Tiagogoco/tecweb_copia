<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>

    <!-- Raíz de la transformación -->
    <xsl:template match="/">
        <html lang="es">
            <head>
                <meta charset="UTF-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <title>Catálogo VOD</title>
                <!-- CSS simple -->
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                        background-color: #f9f9f9;
                    }
                    header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    header img {
                        width: 150px;
                        height: auto;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    table th, table td {
                        border: 1px solid #ccc;
                        padding: 8px;
                        text-align: left;
                    }
                    table th {
                        background-color: #f2f2f2;
                    }
                </style>
            </head>
            <body>
                <!-- Logotipo -->
                <header>
                    <img src="img.avif" alt="Logotipo VOD"/>
                    <h1>Catálogo de Video Bajo Demanda</h1>
                </header>

                <!-- Tabla de Películas -->
                <section>
                    <h2>Películas</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Género</th>
                                <th>Título</th>
                                <th>Duración</th>
                            </tr>
                        </thead>
                        <tbody>
                            <xsl:for-each select="//peliculas/genero">
                                <xsl:for-each select="titulo">
                                    <tr>
                                        <td><xsl:value-of select="../@nombre"/></td>
                                        <td><xsl:value-of select="."/></td>
                                        <td><xsl:value-of select="@duracion"/></td>
                                    </tr>
                                </xsl:for-each>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </section>

                <!-- Tabla de Series -->
                <section>
                    <h2>Series</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Género</th>
                                <th>Título</th>
                                <th>Duración</th>
                            </tr>
                        </thead>
                        <tbody>
                            <xsl:for-each select="//series/genero">
                                <xsl:for-each select="titulo">
                                    <tr>
                                        <td><xsl:value-of select="../@nombre"/></td>
                                        <td><xsl:value-of select="."/></td>
                                        <td><xsl:value-of select="@duracion"/></td>
                                    </tr>
                                </xsl:for-each>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </section>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
